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
		return GenericDao::find(
				"publicacion_like", 
				array(
					array("id_publicacion", "=", $id_publicacion), 
					array('tipo', "=", $tipo ),
					array('activo', "=", 1)
				)
			);
	}

	public static function getReacciones($id_publicacion) {
		return GenericDao::find("publicacion_like", array(array("id_publicacion", "=", $id_publicacion)));
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

	public static function activar($id,$id_usuario) {
		$query = "UPDATE publicacion_like SET
									activo = 1
					WHERE id = :id AND id_usuario = :id_usuario";

		$params = array(
						":id" => $id,
						":id_usuario" => $id_usuario
		);

		GenericDao::executeQuery($query, $params);
	}// activar

	public static function eliminar($id,$id_usuario) {
		$query = "UPDATE publicacion_like SET
									activo = 0
					WHERE id = :id AND id_usuario = :id_usuario";

		$params = array(
						":id" => $id,
						":id_usuario" => $id_usuario
		);

		GenericDao::executeQuery($query, $params);
	}// eliminar

	public static function cambiarTipo($id, $tipo, $id_usuario){
		$query = "UPDATE publicacion_like SET
									tipo = :tipo,
									activo = 1
					WHERE id = :id AND id_usuario = :id_usuario";

		$params = array(
						":id" => $id,
						":tipo" => $tipo,
						":id_usuario" => $id_usuario
		);

		GenericDao::executeQuery($query, $params);

	}

	public static function cambiarActivo($id,$id_usuario){
		$query = "UPDATE publicacion_like SET
									activo = 0
					WHERE id = :id AND id_usuario = :id_usuario";

		$params = array(
						":id" => $id,
						":id_usuario" => $id_usuario
		);

		GenericDao::executeQuery($query, $params);

	}
	public static function chequearSiYaReacciono($id_publicacion, $id_usuario, $tipo) {

		$query = "SELECT COUNT(id) as cantidad FROM publicacion_like 
					WHERE id_publicacion = ".$id_publicacion." AND id_usuario = ".$id_usuario." AND tipo = ".$tipo." AND activo =1";
		
		$res = GenericDao::executeQuery($query, null, 'publicacion_like', true);
		return $res[0]->cantidad;
	}
}

?>
