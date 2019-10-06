<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/GenericDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/objetivo_tiempo.php');

class ObjetivoTiempoDao {

	public static function get($id) {
		return GenericDao::get("objetivo_tiempo", array("id" => $id));
	}// get

	public static function listActivos() {
		return GenericDao::find("objetivo_tiempo", array(array("activo", "=", "1")));
	}

	public static function getXobjetivo($id) {
		return GenericDao::find("objetivo_tiempo", array(array("id_objetivo", "=", $id), array("activo", "=", "1")));
	}
	public static function getXaliasYObjetivo($alias, $id_objetivo) {
		return GenericDao::find("objetivo_tiempo", array(array("alias", "=", $alias), array("id_objetivo", "=", $id_objetivo), array("activo", "=", "1")));
	}

	public static function nuevo($item) {
		$item->activo = 1;

		return GenericDao::insert($item);
	}// nuevo

	public static function modificar($item) {

		GenericDao::update($item);
	}// modificar

	public static function eliminar($id) {
		$query = "UPDATE objetivo_tiempo SET
					activo = false,
					WHERE id = :id";

		$params = array(
						":id" => $id
		);

		GenericDao::executeQuery($query, $params);
	}// eliminar
}

?>
