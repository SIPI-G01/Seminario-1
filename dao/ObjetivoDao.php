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
