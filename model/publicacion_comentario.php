<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');

final class publicacion_comentario extends GenericEntity{

	public $id;
	public $id_publicacion;
    public $id_usuario;
    public $texto;
	public $fecha;
	
	private $usuario = null;

	public function __construct() {
		$this->setPk(array("id"));
	}

	public function getUsuario() {
		if($this->usuario == null)
		{
			$this->usuario = UsuarioDao::get($this->id_usuario);
		}
		return $this->usuario;
		//Metodo para obtener que usuario comentó la publicacion
	}
};
?>