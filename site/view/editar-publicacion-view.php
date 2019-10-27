<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/UsuarioDao.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/ObjetivoDao.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/PublicacionDao.php';

  class editar_publicacion_view  {
    
  	public $objetivosReceta;
    public $objetivosActividadFisica;
    public $usuario;

    function __construct($params) {
		$this->publicacion = PublicacionDao::getXalias($params);
		if($this->publicacion != null)
		{
			$this->publicacion = $this->publicacion[0];			
		}
		$this->usuario = UsuarioDao::get(Utiles::obtenerIdUsuarioLogueado());
		//$this->objetivosReceta = ObjetivoDao::listXcategoria(1);
		//$this->objetivosActividadFisica = ObjetivoDao::listXcategoria(2);
		$this->objetivosReceta = ObjetivoDao::listXcategoriaYusuario(1, Utiles::obtenerIdUsuarioLogueado());
		$this->objetivosActividadFisica = ObjetivoDao::listXcategoriaYusuario(2, Utiles::obtenerIdUsuarioLogueado());
		
		/*$this->tiemposReceta = ObjetivoTiempoDao::listXcategoria(1);
		$this->tiemposActividadFisica = ObjetivoTiempoDao::listXcategoria(2);*/
		
    }
  }
 ?>
