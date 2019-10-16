<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/GenericDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/publicacion_like.php');

class PublicacionLikeDao {

	public static function get($id) {
		return GenericDao::get("publicacion_like", array("id" => $id));
	}// get
		
	public static function listActivos() {
		return GenericDao::find("publicacion_like", array(array("activo", "=", "1")));
	}

	public static function getXtipo($id_publicacion,$tipo) {
		return GenericDao::find("publicacion_like", array(array("id_publicacion", "=", $id_publicacion), array("activo", "=", "1"),array("tipo", "=", $tipo)));
	}
	
	public static function getValoracionXpublicacion($id_publicacion) {
		$query =   "SELECT DISTINCT SUM(p.tipo) AS valoracion FROM publicacion_like pl
					WHERE p.activo = 1 AND p.id_publicacion = " . $id_publicacion;
		
		$res = GenericDao::executeQuery($query, null, 'publicacion_like', true);
		return $res[0]->valoracion;
	}


	public static function nuevo($item) {
		$item->activo = 1;

		return GenericDao::insert($item);
	}// nuevo

	public static function modificar($item) {

		GenericDao::update($item);
	}// modificar

	public static function eliminar($id) {
		$query = "UPDATE publicacion_like SET
									activo = 0
					WHERE id = :id";

		$params = array(
						":id" => $id
		);

		GenericDao::executeQuery($query, $params);
	}// eliminar
}

?>
