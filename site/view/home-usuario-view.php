<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/UsuarioDao.php';

  class home_usuario_view  {

    public $usuario;

    function __construct($params) {
      $this->usuario = UsuarioDao::get($params);
      $this->usuario = $this->usuario[0];
    }
  }
 ?>