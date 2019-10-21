<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/UsuarioDao.php';

  class perfil_view  {

    public $usuario;

    function __construct($params) {
      $this->usuario = UsuarioDao::getXalias($params);
      $this->usuario = $this->usuario[0];
    }
  }
 ?>