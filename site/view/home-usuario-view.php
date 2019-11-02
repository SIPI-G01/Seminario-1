<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/ObjetivoDao.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/ObjetivoTiempoDao.php';

    class home_usuario_view {

		public $objetivosReceta;
		public $objetivosActividad;
		public $tiemposReceta;		
		public $tiemposActividad;

        function __construct() {
			$this->objetivosReceta = ObjetivoDao::listXcategoriaYusuario(1, Utiles::obtenerIdUsuarioLogueado());
			$this->objetivosActividad = ObjetivoDao::listXcategoriaYusuario(2, Utiles::obtenerIdUsuarioLogueado());
			
			$this->tiemposReceta = ObjetivoTiempoDao::listXcategoria(1);
			$this->tiemposActividad = ObjetivoTiempoDao::listXcategoria(2);
			
		}
    }
?>