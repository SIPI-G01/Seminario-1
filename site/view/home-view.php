<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/ObjetivoDao.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/ObjetivoTiempoDao.php';

    class home_view {

		public $objetivosReceta;
		public $objetivosActividad;
		public $tiemposReceta;		
		public $tiemposActividad;

        function __construct() {
			$this->objetivosReceta = ObjetivoDao::listXcategoria(1);
			$this->objetivosActividad = ObjetivoDao::listXcategoria(2);
			
			$this->tiemposReceta = ObjetivoTiempoDao::listXcategoria(1);
			$this->tiemposActividad = ObjetivoTiempoDao::listXcategoria(2);
			
		}
    }
?>
