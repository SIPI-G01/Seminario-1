<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');

final class publicacion_like extends GenericEntity{

	public $id;
	public $id_publicacion;
	public $id_usuario;
	public $tipo;
	public $activo;

	private $tiempo = null;
	public function __construct() {
		$this->setPk(array("id"));
	}
};
?>
