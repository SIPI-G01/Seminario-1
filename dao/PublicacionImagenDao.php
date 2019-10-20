<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/GenericDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/publicacion_imagen.php');

class PublicacionImagenDao {

	public static function get($id) {
		return GenericDao::get("publicacion_imagen", array("id" => $id));
	}// get

	public static function listActivos() {
		return GenericDao::find("publicacion_imagen", array(array("activo", "=", "1")));
	}

	public static function getXpublicacion($id_publicacion) {
		return GenericDao::find("publicacion_imagen", array(array("id_publicacion", "=", $id_publicacion), array("activo", "=", "1")));
	}
	
	public static function nuevo($item) {
		$item->activo = 1;

		return GenericDao::insert($item);
	}// nuevo

	public static function modificar($item) {

		GenericDao::update($item);
	}// modificar

	public static function eliminar($id) {
		$query = "UPDATE publicacion_imagen SET
									activo = false
					WHERE id = :id";

		$params = array(
						":id" => $id
		);
		GenericDao::executeQuery($query, $params);
	}// eliminar
}

?>
