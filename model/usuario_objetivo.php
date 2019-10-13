<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/ObjetivoDao.php');

final class usuario_objetivo extends GenericEntity{

	public $id;
	public $id_usuario;
	public $id_objetivo;
	public $fecha_inicio;
	public $fecha_fin;

	public $activo;
	
	private $objetivo = null;

	public function __construct() {
		$this->setPk(array("id"));
	}
	
	public function getObjetivo()
	{
		if($objetivo == null)
		{
			$objetivo = ObjetivoDao::get($id_objetivo);
		}
		
		return $objetivo;
		//Para obtener cuales son los objetivos del usuario
	}

};
?>
