<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');

final class publicacion_imagen extends GenericEntity{

	public $id;
	public $id_publicacion;
	public $imagen;
	public $archivo;
	public $activo;

	private $objetivo = null;
	public function __construct() {
		$this->setPk(array("id"));
	}
};
?>
