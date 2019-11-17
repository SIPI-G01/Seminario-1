<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/GenericDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/publicacion_objetivo.php');

class PublicacionObjetivoDao {

	public static function get($id) {
		return GenericDao::get("publicacion_objetivo", array("id" => $id));
	}// get
	
	
	public static function listActivos() {
		return GenericDao::find("publicacion_objetivo");
	}

	public static function getXpublicacion($id_publicacion) {
		return GenericDao::find("publicacion_objetivo", array(array("id_publicacion", "=", $id_publicacion)));
	}
	public static function listXobjetivo($id_objetivo){
		return GenericDao::find("publicacion_objetivo", array(array("id_objetivo", "=", $id_objetivo)));
	}

	public static function nuevo($item) {

		return GenericDao::insert($item);
	}// nuevo

	public static function modificar($item) {

		GenericDao::update($item);
	}// modificar

	public static function eliminar($item) {
		GenericDao::delete($item);
	}// eliminar
}

?>
