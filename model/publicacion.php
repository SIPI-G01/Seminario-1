<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/UsuarioDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionObjetivoDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionImagenDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionComentarioDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionLikeDao.php');

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
	public $fecha_modificado;
	public $tiempo;
	public $unidad_tiempo; //1: Minutos, 2: Horas, 3: Dias, 4: Semanas, 5: Meses
	public $tiempo_minutos;
	
	private $usuario = null;
	private $objetivos = null;
	private $imagenes = null;
	private $comentarios = null;
	private $respuestas = null;
	private $likes =null;
	private $dislikes =null;
	private $votoLike = false;
	private $votoDislike = false;
	private $unidad = null;
	
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
	public function getComentarios() {
		if($this->comentarios==null)
		{
			$this->comentarios = PublicacionComentarioDao::getXpublicacion($this->id);
		}
		return $this->comentarios;	
		
		//Metodo para obtener cuales son los comentarios de la publicacion
	}

	public function getRespuestas($id_comentario) {

		$this->respuestas = PublicacionComentarioDao::getXcomentario($this->id,$id_comentario);
		return $this->respuestas;
		
		
		//Metodo para obtener cuales son los comentarios de la publicacion
	}
public function getReacciones() {
		return PublicacionLikeDao::getReacciones($this->id);
	}

	public function getLikes() {
			if($this->likes==null)
		{
			$this->likes = PublicacionLikeDao::getXtipo($this->id,1);

		}
		return $this->likes;	
		
	}
	public function getDislikes() {
				if($this->dislikes==null)
		{
			$this->dislikes = PublicacionLikeDao::getXtipo($this->id,-1);

		}
		return $this->dislikes;	
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
	
	public function votoLike(){		
		$voto = PublicacionLikeDao::chequearSiYaReacciono($this->id, Utiles::obtenerIdUsuarioLogueado(), 1);

	//	if($voto > 0){
			//echo "disabled";
	//	}
	}


	public function votoDisLike(){
		$voto = PublicacionLikeDao::chequearSiYaReacciono($this->id, Utiles::obtenerIdUsuarioLogueado(), -1);

		//if($voto > 0){
		//	echo "disabled";
	//	}
	}
	
	public function getUnidadTiempo()
	{
			if($this->unidad_tiempo == 1 || $this->unidad_tiempo == '1')
			{
				if($this->tiempo == 1)
				{
					$this->unidad = 'minuto';

				}
				else
				{
					$this->unidad = 'minutos';

				}
			}
			else if($this->unidad_tiempo == 2 || $this->unidad_tiempo == '2')
			{
				if($this->tiempo == 1)
				{
					$this->unidad = 'hora';

				}
				else
				{
					$this->unidad = 'horas';

				}
				
			}
			else if($this->unidad_tiempo == 3 || $this->unidad_tiempo == '3')
			{
				if($this->tiempo == 1)
				{
					$this->unidad = 'dia';

				}
				else
				{
					$this->unidad = 'dias';

				}
				
			}
			else if($this->unidad_tiempo == 4 || $this->unidad_tiempo == '4')
			{
				if($this->tiempo == 1)
				{
					$this->unidad = 'semana';

				}
				else
				{
					$this->unidad = 'semanas';

				}
				
			}
			else
			{
				if($this->tiempo == 1)
				{
					$this->unidad = 'mes';

				}
				else
				{
					$this->unidad = 'meses';

				}
				
			}					
		
		return $this->unidad;
	}

};
?>
