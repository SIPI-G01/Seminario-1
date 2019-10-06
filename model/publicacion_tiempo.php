<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/ObjetivoTiempoDao.php');

final class publicacion_tiempo extends GenericEntity{

	public $id;
	public $id_publicacion;
	public $id_tiempo;

	private $tiempo = null;
	public function __construct() {
		$this->setPk(array("id"));
	}


	public function getTiempo() {
		if($this->tiempo == null)
		{
			$this->tiempo = ObjetivoTiempoDao::get($this->id_tiempo);
		}
		return $this->tiempo;
		//Metodo para obtener que usuario creó publicacion
	}
};
?>
