<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/UsuarioDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionObjetivoDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionImagenDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionTiempoDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionComentarioDao.php');

final class publicacion extends GenericEntity{

	public $id;
	public $id_usuario;
	public $fecha;
	public $titulo;
	public $descripcion;
	public $texto;
	public $estado;
	public $alias;	
	public $activo;
	public $valoracion;
	
	private $usuario = null;
	private $objetivos = null;
	private $imagenes = null;
	private $tiempos = null;
	private $comentarios = null;

	public function __construct() {
		$this->setPk(array("id"));
	}


	public function getUsuario() {
		if($this->usuario == null)
		{
			$this->usuario = UsuarioDao::get($this->id_usuario);
		}
		return $this->usuario;
		//Metodo para obtener que usuario creó publicacion
	}
	public function getTiempos() {
		if($this->tiempos == null)
		{
			$this->tiempos = PublicacionTiempoDao::getXpublicacion($this->id);
		}
		return $this->tiempos;

		//Metodo para obtener cuales son los tiempos de la publicacion
	}
	public function getComentarios() {
		if($this->comentarios==null)
		{
			$this->comentarios = PublicacionComentarioDao::getXpublicacion($this->id);
		}
		return $this->comentarios;	
		
		//Metodo para obtener cuales son los comentarios de la publicacion
	}
	public function getLikes() {
		//Metodo para obtener cuales son los likes de la publicacion
	}
	public function getObjetivos() {
		if($this->objetivos == null)
		{
			$this->objetivos = PublicacionObjetivoDao::getXpublicacion($this->id);
		}
		return $this->objetivos;

		//Metodo para obtener cuales son los objetivos de la publicacion
	}
	public function getImagenes() {
		if($this->imagenes == null)
		{
			$this->imagenes = PublicacionImagenDao::getXpublicacion($this->id);
		}
		return $this->imagenes;

		//Metodo para obtener cuales son las imagenes de la publicacion
	}


};
?>
