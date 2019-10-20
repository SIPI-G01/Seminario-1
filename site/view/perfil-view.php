<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/PublicacionDao.php';

  class perfil_view  {

    public $publi;
    public $usuario;

    function __construct($params) {
      $this->publi = PublicacionDao::getXalias($params);
      $this->publi = $this->publi[0];
      $this->usuario = $this->publi->getUsuario();
    }
  }
 ?>