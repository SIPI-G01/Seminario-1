<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/UsuarioObjetivoDao.php');

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

	private $objetivos = null;
	public function __construct() {
		$this->setPk(array("id"));
	}
	
	public function getObjetivos()
	{
		if($objetivos == null)
		{
			$objs = UsuarioObjetivoDao::listXusuario($id);
			$objetivos = array();
			
			foreach($objs as $obj)
			{
				$objetivo = $obj->getObjetivo();
				array_push($objetivos, $objetivo);
			}
		
		}
		return $objetivos;
		//Para obtener cuales son los objetivos del usuario
	}

};
?>
