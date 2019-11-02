<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/Utiles.php');


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
			$likes= $publi->getReacciones();
			foreach ($likes as $like ) {
				if($like ->id_usuario==Utiles::obtenerIdUsuarioLogueado())
				{
					//$idLike = (int) $like->id;
					//var_dump($idLike);
					if($like ->tipo == 1) {
						if($like ->activo == 1 ){
							PublicacionLikeDao::eliminar($like->id,Utiles::obtenerIdUsuarioLogueado());
						}else{
							PublicacionLikeDao::activar($like->id,Utiles::obtenerIdUsuarioLogueado());
						}
					} else {
							PublicacionLikeDao::cambiarTipo($like->id, 1, Utiles::obtenerIdUsuarioLogueado());
							PublicacionLikeDao::cambiarActivo($like->id,0, Utiles::obtenerIdUsuarioLogueado());
					}

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
				$dislikes= $publi->getReacciones();
				foreach ($dislikes as $dislike ) {
					if($dislike ->id_usuario==Utiles::obtenerIdUsuarioLogueado()){
						if($dislike ->tipo == -1) {
						if($dislike ->activo == 1 ){
							PublicacionLikeDao::eliminar($dislike->id,Utiles::obtenerIdUsuarioLogueado());
						}else{
							PublicacionLikeDao::activar($dislike->id,Utiles::obtenerIdUsuarioLogueado());
						}
					} else {
							PublicacionLikeDao::cambiarTipo($dislike->id, -1, Utiles::obtenerIdUsuarioLogueado());
								PublicacionLikeDao::cambiarActivo($dislike->id,0, Utiles::obtenerIdUsuarioLogueado());
					}

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