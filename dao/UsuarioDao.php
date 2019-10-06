<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/GenericDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/usuario.php');

class UsuarioDao {

	public static function get($id) {
		return GenericDao::get("usuario", array("id" => $id));
	}// get
	
	
	public static function listActivos() {
		return GenericDao::find("usuario", array(array("activo", "=", "1")));
	}

	public static function nuevo($item) {
		$item->creado_fecha = date("Y-m-d H:i:s", time());
		$item->activo = 1;

		return GenericDao::insert($item);
	}// nuevo

	public static function modificar($item) {

		GenericDao::update($item);
	}// modificar

	public static function eliminar($id) {
		$query = "UPDATE usuario SET
									activo = false,
					WHERE id = :id";

		$params = array(
						":id" => $id
		);

		GenericDao::executeQuery($query, $params);
	}// eliminar
}

?>
