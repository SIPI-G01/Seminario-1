<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/ObjetivoDao.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/ObjetivoTiempoDao.php';

    class home_view {

		public $objetivos;
		public $tiempos;

        function __construct() {
			$this->objetivos = ObjetivoDao::listActivos();
			$this->tiempos = ObjetivoTiempoDao::listActivos();
			
		}
    }
?>
