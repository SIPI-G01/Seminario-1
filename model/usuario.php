<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');

final class usuario extends GenericEntity{

	public $id;
	public $mail;
	public $usuario;
	public $password;
	public $nombre;
	public $apellido;
	public $fecha_nacimiento;
	public $imagen;	
	public $archivo;	
	public $activado;	
	public $activo;
	public $creado_fecha;		

	public function __construct() {
		$this->setPk(array("id"));
	}
	
	public function getObjetivos()
	{
		//Para obtener cuales son los objetivos del usuario
	}

};
?>
