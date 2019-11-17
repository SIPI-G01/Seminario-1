<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/GenericDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/publicacion.php');

class PublicacionDao {

	public static function get($id) {
		return GenericDao::get("publicacion", array("id" => $id));
	}// get

	public static function filtrar($objetivos = array(), $tiempos = array(), $pagina = 1, $orden=0, $categoria = '') {
		$cantidad = 20;
		$inicio = ($pagina - 1) * $cantidad;

		$query =   "SELECT DISTINCT p.* FROM publicacion p
					LEFT JOIN publicacion_objetivo po ON po.id_publicacion = p.id
					WHERE p.activo = 1 AND p.estado = 1";

		if (sizeof($objetivos) > 0) {
			$in = "(";
			$coma = false;
			for ($i=0; $i < sizeof($objetivos); $i++) {
				if ($objetivos[$i] && trim($objetivos[$i]) != '') {
					$in .= ($coma ? ', ' : '') . '"' . $objetivos[$i] . '"';
					$coma = true;
				}
			}
			$in .= ")";

			$query .= ($coma ? " AND po.id_objetivo IN " . $in : '');
		}

		if (sizeof($tiempos) > 0) {
			$t = " AND (";
			$entro = false;
			for ($i=0; $i < sizeof($tiempos); $i++) {
				
				if($entro)
				{
					$t .= " OR";
				}
				
				$t .= " (";
				$entro = true;
				if($tiempos[$i]->desde != null)
				{ 
					if($tiempos[$i]->hasta != null)
					{
						$t .= " p.tiempo_minutos >= " . $tiempos[$i]->desde . " AND";									
					}
					else
					{
						$t .= " p.tiempo_minutos >= " . $tiempos[$i]->desde;			
					}
				}
				if($tiempos[$i]->hasta != null)
				{
					$t .= " p.tiempo_minutos <= " . $tiempos[$i]->hasta;
				}
				$t .= ")";
			}
			
			$t .= ")";
			$query .= $t;
			/*$coma = false;
			for ($i=0; $i < sizeof($tiempos); $i++) {
				if ($tiempos[$i] && trim($tiempos[$i]) != '') {
					$in .= ($coma ? ', ' : '') . '"' . $tiempos[$i] . '"';
					$coma = true;
				}
			}
			$in .= ")";

			$query .= ($coma ? " AND pt.id_tiempo IN " . $in : '');*/
		}
		
		if($categoria != '')
		{
			$query .= " AND p.categoria = " . $categoria;
		}

		switch ($orden) {
			case 0:
				// ORDEN POR FECHA RECIENTE
				$query .= ' ORDER BY p.fecha DESC';
				break;
			case 1:
				//ORDEN POR VALORACION
				$query .= ' ORDER BY p.valoracion DESC';
				break;
			case 2:
				// ORDEN POR FECHA ANTIGUOS
				$query .= ' ORDER BY p.fecha ASC';
				break;
				
		}
		$query .=  ($pagina >= 0 && $cantidad >= 0 ? " LIMIT " . $inicio . ", " . $cantidad : '');
				
		return GenericDao::executeQuery($query, null, 'publicacion', true);

	}

	public static function cantPublicacionesFiltradas($objetivos = array(), $tiempos = array(), $categoria = '') {

		$query =   "SELECT DISTINCT p.* FROM publicacion p
					LEFT JOIN publicacion_objetivo po ON po.id_publicacion = p.id
					WHERE p.activo = 1 AND p.estado = 1";

		if (sizeof($objetivos) > 0) {
			$in = "(";
			$coma = false;
			for ($i=0; $i < sizeof($objetivos); $i++) {
				if ($objetivos[$i] && trim($objetivos[$i]) != '') {
					$in .= ($coma ? ', ' : '') . '"' . $objetivos[$i] . '"';
					$coma = true;
				}
			}
			$in .= ")";

			$query .= ($coma ? " AND po.id_objetivo IN " . $in : '');
		}

		if (sizeof($tiempos) > 0) {
			
			$t = " AND (";
			$entro = false;
			for ($i=0; $i < sizeof($tiempos); $i++) {
				
				if($entro)
				{
					$t .= " OR";
				}
				
				$t .= " (";
				$entro = true;
				if($tiempos[$i]->desde != null)
				{ 
					if($tiempos[$i]->hasta != null)
					{
						$t .= " p.tiempo_minutos >= " . $tiempos[$i]->desde . " AND";									
					}
					else
					{
						$t .= " p.tiempo_minutos >= " . $tiempos[$i]->desde;			
					}
				}
				if($tiempos[$i]->hasta != null)
				{
					$t .= " p.tiempo_minutos <= " . $tiempos[$i]->hasta;
				}
				$t .= ")";
			}
			
			$t .= ")";
			$query .= $t;
			
			/*$in = "(";
			$coma = false;
			for ($i=0; $i < sizeof($tiempos); $i++) {
				if ($tiempos[$i] && trim($tiempos[$i]) != '') {
					$in .= ($coma ? ', ' : '') . '"' . $tiempos[$i] . '"';
					$coma = true;
				}
			}
			$in .= ")";

			$query .= ($coma ? " AND pt.id_tiempo IN " . $in : '');*/
		}
		
		if($categoria != '')
		{
			$query .= " AND p.categoria = " . $categoria;
		}


		$res = GenericDao::executeQuery($query, null, "publicacion", true);
		return count($res);
	}
	
	
	public static function publicacionesRecomendadas() {
		$cantidad = 3;
		$objetivos = Utiles::obtenerUsuarioLogueado()->getObjetivos();

		$query =   "SELECT DISTINCT p.* FROM publicacion p
					LEFT JOIN publicacion_objetivo po ON po.id_publicacion = p.id
					WHERE p.activo = 1 AND p.estado = 1";

		if (sizeof($objetivos) > 0) {
			$in = "(";
			$coma = false;
			for ($i=0; $i < sizeof($objetivos); $i++) {
					$in .= ($coma ? ', ' : '') . '"' . $objetivos[$i]->id . '"';
					$coma = true;
			}
			$in .= ")";

			$query .= ($coma ? " AND po.id_objetivo IN " . $in : '');
		}
		$query .= " AND p.id_usuario <> " . Utiles::obtenerIdUsuarioLogueado();		
		$query .= " ORDER BY p.fecha DESC";
		$query .=  ($cantidad >= 0 ? " LIMIT " . $cantidad : '');
		return GenericDao::executeQuery($query, null, 'publicacion', true);

	}

	public static function listActivos() {
		return GenericDao::find("publicacion", array(array("activo", "=", "1")));
	}

	public static function getXnombre($nombre) {
		return GenericDao::find("publicacion", array(array("nombre", "=", $nombre), array("activo", "=", "1")));
	}

	public static function getXalias($alias) {
		return GenericDao::find("publicacion", array(array("alias", "=", $alias), array("activo", "=", "1")));
	}

	public static function getXusuario($id_usuario) {
		return GenericDao::find("publicacion", array(array("id_usuario", "=", $id_usuario), array("activo", "=", "1")));
	}



	public static function nuevo($item) {
		$item->fecha = date("Y-m-d H:i:s", time());
		$item->activo = 1;

		return GenericDao::insert($item);
	}// nuevo

	public static function modificar($item) {
		$item->fecha_modificado = date("Y-m-d H:i:s", time());
		GenericDao::update($item);
	}// modificar

	public static function eliminar($id) {
		$query = "UPDATE publicacion SET
									activo = false
					WHERE id = :id";

		$params = array(
						":id" => $id
		);

		GenericDao::executeQuery($query, $params);
	}// eliminar

	public static function topPublicaciones($objetivos = array(), $orden=0, $categoria = ''){

	}
}

?>
