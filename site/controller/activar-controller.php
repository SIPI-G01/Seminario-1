<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/Utiles.php');


$token = isset($_POST['token']) ? $_POST['token'] : $_GET['token'];
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion'];

	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/UsuarioObjetivoDao.php');
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/UsuarioDao.php');

	switch ($accion) {
		case 'activar':

			$valido = true;
			$activado = false;
			$reenviar = false;
			$errores = '';

			if (!isset($_POST['id']) || $_POST['id'] == '0' || $_POST['id'] == 0) {
				$valido = false;
				$errores .= '<h3 class="text-center"><b>- Error al validar cuenta.</b></h3>';
			}
			if ($valido) {
				$item = UsuarioDao::get($_POST['id']);

				if ($item->activado == 0) {

					if (!isset($_POST['token']) || $_POST['token'] == "" || $item->token != $_POST['token']) {
						$valido = false;
						$errores .= '<h3 class="text-center"><b>- El código de activación es incorrecto.</b></h3>';
					}
					
					if($valido)
					{
						$item->activado = 1;
						UsuarioDao::modificar($item);

					}

				}
				else
				{
						$valido = false;
						$errores .= '<h3 class="text-center"><b>- El usuario ya fue activado previamente.</b></h3>';

				}
			}

			if($valido)
			{
				Utiles::iniciarSesion(UsuarioDao::get($_POST['id']));
				echo 'OK|';
	
			}else {
				echo 'ERROR|' . $errores;
			}
			break;


	}
?>
