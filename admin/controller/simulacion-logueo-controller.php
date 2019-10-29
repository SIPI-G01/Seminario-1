<?php
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/UsuarioDao.php');
	include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';
	
	$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion'];

	switch ($accion) {
		case 'loguear':
		
			$valido = true;

			if(UsuarioDao::get(2) == null)
			{
				$valido = false;
			}

			if($valido)
			{
				if(Utiles::obtenerUsuarioLogueado() == null)
				{
					$usuario = UsuarioDao::get(2);	
					Utiles::iniciarSesion($usuario);
				}
			} 
			else 
			{
				echo 'ERROR';
			}
			
			break;

		case 'desloguear':
		
			$valido = true;

			if($valido)
			{
				if(Utiles::obtenerUsuarioLogueado() != null)
				{
					Utiles::cerrarSesion();
				}
			} 
			else {
				echo 'ERROR';
			}
			break;
	}// switch accion
?>
