<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/UsuarioDao.php';

  class crear_publicacion_view  {

    public $objetivos;
    public $usuario;

    function __construct() {
		$this->usuario = UsuarioDao::get(Utiles::obtenerIdUsuarioLogueado());
    }
  }
 ?>
