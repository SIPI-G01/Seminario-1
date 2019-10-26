<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');

final class objetivo_tiempo extends GenericEntity{

	public $id;
	public $id_objetivo;
	public $tiempo;
	public $alias;
	public $categoria; //1: Recetas, 2: Actividad fisica
	public $desde; //En minutos
	public $hasta; //En minutos

	public $activo;
	
	public function __construct() {
		$this->setPk(array("id"));
	}

};
?>
