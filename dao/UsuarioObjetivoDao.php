<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/GenericDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/usuario.php');

class UsuarioObjetivoDao {

	public static function get($id) {
		return GenericDao::get("usuario_objetivo", array("id" => $id));
	}// get
	
	
	public static function listActivos() {
		return GenericDao::find("usuario_objetivo", array(array("activo", "=", "1")));
	}
	
	public static function listXusuario($id_usuario) {
		return GenericDao::find("usuario_objetivo", array(array("activo", "=", "1"), array("id_usuario", "=", $id_usuario)));
	}

	public static function nuevo($item) {
		$item->activo = 1;

		return GenericDao::insert($item);
	}// nuevo

	public static function modificar($item) {

		GenericDao::update($item);
	}// modificar

	public static function eliminar($id) {
		$query = "UPDATE usuario_objetivo SET
									activo = false,
					WHERE id = :id";

		$params = array(
						":id" => $id
		);

		GenericDao::executeQuery($query, $params);
	}// eliminar
}

?>
