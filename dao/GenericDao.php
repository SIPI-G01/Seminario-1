<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/conexion/pdo-config.php');

class GenericDao {

	/**
	 * Retorna de la tabla pasada como parametro el registro correspondiente al id
	 * tambien pasado como parametro.
	 *
	 * @param string $table : Nombre de la tabla.
	 * @param array $id : Array con los valores de la pk del objeto
	 * 						["pk_1" => valor_1, ..., "pk_n" => valor_n].
	 * @return PDOStatement
	 */
	public static function get($table, $id) {
		$obj = new $table();
		$pk = $obj->getPk();

		$params = array();

		$where = "";
		$i = 0;
		foreach ($pk as $field) {
			if ($i == 0) {
				$where = " $field = :$field";
			} else {
				$where .= " AND $field = :$field";
			}// if-else

			$params[":$field"] = $id[$field];

			$i++;
		}// foreach pk field

		$query = "SELECT * FROM $table WHERE" . $where;

		$DBH = getConnection();
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute($params);

		return GenericDao::toEntity($STH, $table, false);
	}// get

	/**
	 *
	 * @param string $table : Nombre de la tabla.
	 * @param array $conditions [optional]
	 * @param string $orderby [optional] : Nombre del campo por el cual se deben ordenar los resultados.
	 * 										En caso de ser dos o mas separarlos con ",".
	 * @param int $from [optional] : Posicion del primer registro a retornar, primer
	 * 								  parametro de LIMIT.
	 * @param int $to [optional] : Posicion del ultimo registro a retornar, segundo
	 * 								parametro de LIMIT.
	 */
	public static function find($table, $conditions = NULL, $orderby = NULL, $from = NULL, $to = NULL) {
		$where = "";
		$params = array();
		$count = count($conditions);

		$i = 0;
		if ($conditions != NULL) {
			while ($i < $count) {
				$condition = $conditions[$i];

				if ($i == 0) {
					$where .= " WHERE ";
				} else {
					$where .= " AND ";
				}// if-else

				$where .= $condition[0] . " " . $condition[1] . " :" . $condition[0];
				$params[":" . $condition[0]] = $condition[2];

				$i++;
			}// while conditions
		}// if conditions

		$query = "SELECT * FROM " . $table . $where;


		if (isset($orderby) && $orderby != NULL) {
			$query .= " ORDER BY " . $orderby;
		}// if order by

		if (isset($from) && is_numeric($from) && isset($to) && is_numeric($to)) {
			$query .= " LIMIT $from, $to";
		}// if limit

		$DBH = getConnection();
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute($params);

		return GenericDao::toEntity($STH, $table, true);
	}// find

	/**
	 * Ejecuta la query recibida como parametro y devuelve una clase o un recordset segn se indique.
	 *
	 * @param string $sql : Sentencia SQL a ser ejecutada.
	 * @param array $params [optional] : Parametros necesarios para ejecutar la query.
	 * @param string $class [optional] : Nombre de la clase que se desea retornar.
	 * @param boolean $list [optional] : true si retorna un array de objetos, false si retorna un unico objeto.
	 */
	public static function executeQuery($sql, $params = NULL, $class = NULL, $list = FALSE, $returnId = FALSE) {

		if ($params == NULL){
			$params = array();
		}

		$DBH = getConnection();
		$STH = $DBH->prepare($sql);
		$STH->setFetchMode(PDO::FETCH_ASSOC);

		if (!$STH->execute($params)) {
			echo "ERROR: ";
			print_r($STH->errorInfo());
			echo "<br>";
		}

		if ($class != null) {
			return GenericDao::toEntity($STH, $class, $list);
		} if ($returnId == true) {
			return $DBH->lastInsertId();
		} else {
			return $STH;
		}// if-else
	}// find

	/**
	 * Retorna todos los registros de la tabla recibida como parametro.
	 *
	 * @param string $table
	 * @return PDOStatement
	 */
	public static function listAll($table) {
		$query = "SELECT * FROM " . $table;

		$DBH = getConnection();
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();

		return GenericDao::toEntity($STH, $table, true);
	}// listAll

	/**
	 * Inserta un registro en la base de datos mapeando los valores del objeto
	 * recibido como parametro.
	 *
	 * @param object $obj
	 */
	public static function insert($obj) {
		$objArray = get_object_vars($obj);

		$keys = array_keys($objArray);
		$values = array_values($objArray);

		$queryFields = " (";
		$queryValues = " (";
		$params = array();
		$count = count($keys);
		$i = 0;

		while ($i < $count) {

			if ($i < $count - 1) {
				$queryFields .= $keys[$i] . ", ";
				$queryValues .= ":" . $keys[$i] . ", ";
			} else {
				$queryFields .= $keys[$i] . ")";
				$queryValues .= ":" . $keys[$i] . ")";
			}// if-else

			$params[':' . $keys[$i]] = $values[$i];

			$i++;
		}// foreach keys

		$query = "INSERT INTO " . get_class($obj) . $queryFields . " VALUES" . $queryValues;
		
		$DBH = getConnection();
		$STH = $DBH->prepare($query);

		if (!$STH->execute($params)) {
			echo "ERROR: ";
			print_r($STH->errorInfo());
			echo "<br>";
		}

		return $DBH->lastInsertId();

	}// insert

	/**
	 * Inserta todos los objetos del array en la tabla indicada
	 *
	 * @param string $class : Nombre de la clase a insertar
	 * @param array $items : Array de objetos a insertar
	 */
	public static function insertAll($class, $items) {
		if (is_array($items) && count($items) > 0) {
			$entity = new $class();
			$entityArray = get_object_vars($entity);
			$keys = array_keys($entityArray);

			$count = count($keys);
			$queryFields = " (";
			$i = 0;
			while ($i < $count) {
				if ($i < $count - 1) {
					$queryFields .= $keys[$i] . ", ";
				} else {
					$queryFields .= $keys[$i] . ")";
				}// if-else

				$i++;
			}// while fields

			$queryValues = "";
			$params = array();
			$cantItems = count($items);
			$j = 0;
			while ($j < $cantItems) {

				$itemArray = get_object_vars($items[$j]);
				$values = array_values($itemArray);

				$queryValues .= " (";
				$count = count($values);
				$i = 0;
				while ($i < $count) {

					if ($i < $count - 1) {
						$queryValues .= ":" . $keys[$i] . $j . ", ";
					} else {
						$queryValues .= ":" . $keys[$i] . $j . ")";
					}// if-else

					$params[':' . $keys[$i] . $j] = $values[$i];

					$i++;

				}// while values

				if ($j < $cantItems - 1) {
					$queryValues .= ', ';
				} else {
					$queryValues .= ';';
				}// if-else

				$j++;

			}// while items

			$query = "INSERT INTO " . $class . " " . $queryFields . " VALUES" . $queryValues;

			$DBH = getConnection();
			$STH = $DBH->prepare($query);

			if (!$STH->execute($params)) {
				echo "ERROR: ";
				print_r($STH->errorInfo());
				echo "<br>";
			}

		}// if es array y tiene elementos

	}// insertAll

	/**
	 * Actualiza un registro en la base de datos mapeando los valores del objeto
	 * recibido como parametro.
	 *
	 * @param object $obj
	 */
	public static function update($obj) {

		$objArray = get_object_vars($obj);

		$keys = array_keys($objArray);
		$values = array_values($objArray);

		$fields = "";
		$params = array();
		$count = count($keys);
		$i = 0;

		while ($i < $count) {
			if (!in_array($keys[$i], $obj->getPk())) {
				$fields .= $keys[$i] . " = " . ":" . $keys[$i];

				if ($i < $count - 1) {
					$fields .= ", ";
				}// if last field

				$params[':' . $keys[$i]] = $values[$i];
			}// if no es pk

			$i++;
		}// while campos

		$where = "";
		$i = 0;
		foreach ($obj->getPk() as $field) {
			if ($i == 0) {
				$where = " WHERE $field = :$field";
			} else {
				$where .= " AND $field = :$field";
			}// if-else

			$params[":$field"] = $obj->$field;

			$i++;
		}// foreach pk field

		$query = "UPDATE " . get_class($obj) . " SET " . $fields . $where;

		$DBH = getConnection();
		$STH = $DBH->prepare($query);

		if (!$STH->execute($params)) {
			echo "ERROR: ";
			print_r($STH->errorInfo());
			echo "<br>";
		}

	}// update

	/**
	 * Elimina un registro de la base de datos mapeando los valores del objeto
	 * recibido como parametro.
	 *
	 * @param object $obj
	 */
	public static function delete($obj) {
		$where = "";
		$params = array();
		$i = 0;

		foreach ($obj->getPk() as $field) {
			if ($i == 0) {
				$where = " WHERE $field = :$field";
			} else {
				$where .= " AND $field = :$field";
			}// if-else

			$params[":$field"] = $obj->$field;

			$i++;
		}// foreach pk field

		$query = "DELETE FROM " . get_class($obj) . $where;
		echo $query;
		$DBH = getConnection();
		$STH = $DBH->prepare($query);

		if (!$STH->execute($params)) {
			echo "ERROR: ";
			print_r($STH->errorInfo());
			echo "<br>";
		}

	}// delete

	/**
	 * Elimina de la tabla recibida como parametros los registros con los id
	 * contenidos en el array
	 *
	 * @param string $class : Nombre de la clase a eliminar
	 * @param array $ids : Array con los id de los registros a eliminar
	 */
	public static function deleteAll($class, $ids) {
		$params = array();
		$where = "";
		for ($i = 0; $i < count($ids); $i++) {
			if ($i == 0) {
				$where .= ":id" . $i;
			} else {
				$where .= ", :id" . $i;
			}

			$params[':id' . $i] = $ids[$i];
		}

		$entidad = new $class();
		$pk = $entidad->getPk();

		$query = "DELETE FROM " . $class . " WHERE " . $pk[0] . " IN (" . $where . ")";

		$DBH = getConnection();
		$STH = $DBH->prepare($query);

		if (!$STH->execute($params)) {
			echo "ERROR: ";
			print_r($STH->errorInfo());
			echo "<br>";
		}

	}// deleteAll

	/**
	 * Devuelv la cantidad de registros de la tabla enviada como parametro
	 * que cumplen las condiciones enviadas como parametros.
	 *
	 * @param string $table : Nombre de la tabla.
	 * @param array $conditions [optional]
	 */
	public static function count($table, $conditions = NULL) {
		$where = "";
		$params = array();
		$count = count($conditions);

		$i = 0;
		if ($conditions != NULL) {
			while ($i < $count) {
				$condition = $conditions[$i];

				if ($i == 0) {
					$where .= " WHERE ";
				} else {
					$where .= " AND ";
				}// if-else

				$where .= $condition[0] . " " . $condition[1] . " :" . $condition[0];
				$params[":" . $condition[0]] = $condition[2];

				$i++;
			}// while conditions
		}// if conditions

		$query = "SELECT COUNT(*) as count FROM " . $table . $where;

		$DBH = getConnection();
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute($params);

		$count = null;

		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
				$count = $row['count'];
			}// while
		}// if

		return $count;
	}// count

	/**
	 * Recibe un PDOStatement con la query ya ejecutada y retorna un objeto o un array de objetos de
	 * la clase especificada en el parametro $list.
	 *
	 * @param PDOStatement $STH : PDOStatement con la query ya ejecutada.
	 * @param string $class : Nombre de la clase que se debe retornar.
	 * @param boolean $list : true si retorna un array de objetos, false si retorna un unico objeto.
	 */
	public static function toEntity($STH, $class, $list) {
		$result = array();
		$item = null;
		$count = 0;

		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
				$item = new $class();

				foreach ($row as $key => $value) {
					$item->$key = $value;
				}// foreach campo

				$result[$count] = $item;
				$count++;
			}// while
		}// if


		if ($list) {
			return $result;
		} else {
			return $item;
		}// if-else
	}// toEntity
	public static function exist($table,$condition)
	{
		$query="SELECT id FROM ".$table." WHERE ".$condition ;
		$DBH = getConnection();
		$STH = $DBH->prepare($query);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();

		/*if($STH->rowCount()>0)
		{
			$result=true;
		}
		else
		{
			$result=false;
		}*/
		$result = -1;
		if($STH->rowCount()>0)
		{
			$row = $STH->fetch();
			$result = $row["id"];
		}

		return $result;
	}

	public static function obtenerTablas() {

		$dbName = getDbName();
		$keyName = 'Tables_in_' . $dbName;

		$sql = "SHOW FULL TABLES FROM " . $dbName;

		$DBH = getConnection();
		$STH = $DBH->prepare($sql);
		$STH->setFetchMode(PDO::FETCH_ASSOC);		
		$STH->execute();

		$result = array();
		$item = null;
		$count = 0;

		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
				$item = new stdClass();

				foreach ($row as $key => $value) {
					$item->$key = $value;
					$item->fields = GenericDao::obtenerCampos($item->$keyName, $dbName);
				}// foreach campo

				$result[$count] = $item;
				$count++;
			}// while
		}// if

		return $result;

	}// obtenerTablas

	public static function obtenerCampos($tabla, $base) {

		$sql = "SHOW FULL COLUMNS FROM " . $tabla . " FROM " . $base;

		$DBH = getConnection();
		$STH = $DBH->prepare($sql);
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH->execute();

		$result = array();
		$item = null;
		$count = 0;

		if ($STH->rowCount() > 0) {
			while($row = $STH->fetch()) {
				$item = new stdClass();

				foreach ($row as $key => $value) {
					$item->$key = $value;
				}// foreach campo

				$result[$count] = $item;
				$count++;
			}// while
		}// if

		return $result;
	}// obtenerCampos
}
?>