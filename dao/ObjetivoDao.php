<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/GenericDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/objetivo.php');

class ObjetivoDao {

	public static function get($id) {
		return GenericDao::get("objetivo", array("id" => $id));
	}// get

	public static function listActivos() {
		return GenericDao::find("objetivo", array(array("activo", "=", "1")));
	}

	public static function getXnombre($nombre) {
		return GenericDao::find("objetivo", array(array("nombre", "=", $nombre), array("activo", "=", "1")));
	}
	public static function listXcategoria($idCategoria) {
		$query =   "SELECT * FROM objetivo WHERE activo = 1 AND categoria IN (:categoria, 3)";

		$params = array(
						":categoria" => $idCategoria
		);

		return GenericDao::executeQuery($query, $params, 'objetivo', true);
	}
	
		public static function listXcategoriaYusuario($idCategoria, $idUsuario) {
		$query =   "SELECT o.* FROM objetivo AS o INNER JOIN usuario_objetivo AS uo ON uo.id_objetivo = o.id WHERE o.activo = 1 AND o.categoria IN (:categoria, 3) AND uo.id_usuario = :usuario";

		$params = array(
						":categoria" => $idCategoria,
						":usuario" => $idUsuario
		);

		return GenericDao::executeQuery($query, $params, 'objetivo', true);
	}

	
	public static function getXalias($alias) {
		return GenericDao::find("objetivo", array(array("alias", "=", $alias), array("activo", "=", "1")));
	}

	public static function nuevo($item) {
		$item->activo = 1;

		return GenericDao::insert($item);
	}// nuevo

	public static function modificar($item) {

		GenericDao::update($item);
	}// modificar

	public static function eliminar($id) {
		$query = "UPDATE objetivo SET
									activo = false,
					WHERE id = :id";

		$params = array(
						":id" => $id
		);

		GenericDao::executeQuery($query, $params);
	}// eliminar
}

?>
