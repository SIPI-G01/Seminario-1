<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/ObjetivoDao.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/UsuarioObjetivoDao.php';

  class mis_objetivos_view  {
    
  	public $objetivos;
    public $objetivosUsuario;
    public $usuario;

    function __construct() {
		$this->objetivos = ObjetivoDao::listActivos();
		$this->objetivosUsuario = UsuarioObjetivoDao::objetivosUsuario(Utiles::obtenerIdUsuarioLogueado());

		
    }
  }
 ?>

