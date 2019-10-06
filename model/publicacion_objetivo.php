<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/ObjetivoDao.php');

final class publicacion_objetivo extends GenericEntity{

	public $id;
	public $id_publicacion;
	public $id_objetivo;

	private $objetivo = null;
	public function __construct() {
		$this->setPk(array("id"));
	}


	public function getObjetivo() {
		if($this->objetivo == null)
		{
			$this->objetivo = ObjetivoDao::get($this->id_objetivo);
		}
		return $this->objetivo;
		//Metodo para obtener que usuario creó publicacion
	}
};
?>
