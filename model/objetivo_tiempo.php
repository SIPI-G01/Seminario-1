<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');

final class objetivo_tiempo extends GenericEntity{

	public $id;
	public $id_objetivo;
	public $tiempo;

	public $activo;
	
	public function __construct() {
		$this->setPk(array("id"));
	}

};
?>
