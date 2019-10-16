<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/Utiles.php');

Utiles::ValidarSesionIniciada();

$token = isset($_POST['token']) ? $_POST['token'] : $_GET['token'];
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion'];

if (isset($token) && $token == Utiles::obtenerToken()) {

	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionLikeDao.php');
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionDao.php');
	//var_dump($_POST);
	switch ($accion) {
		case 'like':
			$valido = true;
			$errores = '<strong>Ocurrieron los siguientes errores:</strong>';
			$publi= PublicacionDao::get($_POST['id_publicacion']);
			$likes= $publi->getLikes();
			foreach ($likes as $like ) {
				if($like ->id_usuario==Utiles::obtenerIdUsuarioLogueado())
				{
					//$idLike = (int) $like->id;
					//var_dump($idLike);
					PublicacionLikeDao::eliminar($like->id);
					$valido=false;
				}
				

			}
			if ($valido) {
				$item = new publicacion_like();
				$item->id_publicacion = $_POST['id_publicacion'];
				$item->id_usuario = Utiles::obtenerIdUsuarioLogueado();
				$item->tipo =1;

				$id = PublicacionLikeDao::nuevo($item);
				
				
				$publicacion = PublicacionDao::get($_POST['id_publicacion']);
				$publicacion->valoracion += 1;
				PublicacionDao::modificar($publicacion); 

				echo 'OK|';

			} 
					
			break;

			case 'dislike':
				$valido = true;
				$errores = '<strong>Ocurrieron los siguientes errores:</strong>';
				$publi= PublicacionDao::get($_POST['id_publicacion']);
				$likes= $publi->getDislikes();
				foreach ($dislikes as $dislike ) {
					if($dislike ->id_usuario==Utiles::obtenerIdUsuarioLogueado())
					{
						//$idLike = (int) $like->id;
						//var_dump($idLike);
						PublicacionLikeDao::eliminar($dislike->id);
						$valido=false;
					}
					

				}
				if ($valido) {
					$item = new publicacion_like();
					$item->id_publicacion = $_POST['id_publicacion'];
					$item->id_usuario = Utiles::obtenerIdUsuarioLogueado();
					$item->tipo =-1;

					$id = PublicacionLikeDao::nuevo($item);
					
					
					$publicacion = PublicacionDao::get($_POST['id_publicacion']);
					$publicacion->valoracion -= 1;
					PublicacionDao::modificar($publicacion); 

					echo 'OK|';

				} 
					
			break;
	}

}
?>
