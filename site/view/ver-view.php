<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/PublicacionDao.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/PublicacionComentarioDao.php';

  class ver_view  {

    public $publi;

    function __construct($params) {
      $this->publi = PublicacionDao::getXalias($params);
      $this->publi = $this->publi[0];
    }
  }
 ?>
