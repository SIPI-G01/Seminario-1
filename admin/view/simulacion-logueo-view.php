<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';

    class simulacion_logueo_view {

		public $estado;

        function __construct() {			
			if(Utiles::obtenerUsuarioLogueado() == null)
			{
				$this->estado = 'Deslogueado';
			}
			else
			{
				$this->estado = 'Logueado';
			}
			
		}
    }
?>
