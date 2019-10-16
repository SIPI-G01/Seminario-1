<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/Utiles.php');

Utiles::ValidarSesionIniciada();

$token = isset($_POST['token']) ? $_POST['token'] : $_GET['token'];
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion'];

if (isset($token) && $token == Utiles::obtenerToken()) {

	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionComentarioDao.php');

	switch ($accion) {
		case 'nuevo':
			$valido = true;
			$errores = '<strong>Ocurrieron los siguientes errores:</strong>';
			
			if (!isset($_POST['comentario']) || trim($_POST['comentario']) == '') {
				$errores .= '<p>- Debe escribir un comentario.</p>';
				$valido = false;
			}
		
			

			if ($valido) {
				$item = new publicacion_comentario();
				$item->id_publicacion = $_POST['id_publicacion'];
				$item->id_usuario = Utiles::obtenerIdUsuarioLogueado();
				$item->texto = $_POST['comentario'];

				$id = PublicacionComentarioDao::nuevo($item);
				
				
				echo 'OK|';

			} else {
				echo 'ERROR|<div class="alert dark alert-alt alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $errores . '</div>';
			}
			break;
	}

}
?>
