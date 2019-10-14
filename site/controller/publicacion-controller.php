<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/Utiles.php');

Utiles::ValidarSesionIniciada();

$token = isset($_POST['token']) ? $_POST['token'] : $_GET['token'];
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion'];

if (isset($token) && $token == Utiles::obtenerToken()) {

	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionDao.php');
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionObjetivoDao.php');
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionImagenDao.php');
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionTiempoDao.php');

	include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/upload/UtilesImagenes.php');

	switch ($accion) {
		case 'nuevo':
			$valido = true;
			$errores = '<strong>Ocurrieron los siguientes errores:</strong>';
			
			if (!isset($_POST['categoria']) || $_POST['categoria'] == ''  || $_POST['categoria'] <= 0) {
				$errores .= '<p>- Debe seleccionar una categoría.</p>';
				$valido = false;
			}
			if (!isset($_POST['objetivos']) || $_POST['objetivos'] == ''  || count(json_decode($_POST['objetivos'])) == 0) {
				$errores .= '<p>- Debe seleccionar al menos un objetivo.</p>';
				$valido = false;
			}
			if (!isset($_POST['titulo']) || $_POST['titulo'] == '') {
				$errores .= '<p>- Debe completar el título.</p>';
				$valido = false;
			}
			if (!isset($_POST['descripcion']) || $_POST['descripcion'] == '') {
				$errores .= '<p>- Debe completar la descripción.</p>';
				$valido = false;
			}			
			if (!isset($_POST['texto']) || $_POST['texto'] == '') {
				$errores .= '<p>- Debe completar el contenido de la publicación.</p>';
				$valido = false;
			}
			

			if ($valido) {
				$item = new publicacion();
				$item->id_usuario = Utiles::obtenerIdUsuarioLogueado();
				$item->titulo = $_POST['titulo'];
				$item->alias = Utiles::generarAlias($item->titulo) . "-" . Utiles::generarAlias(date("Y-m-d h:i:sa"));
				$item->descripcion = $_POST['descripcion'];
				$item->categoria = $_POST['categoria'];				
				$item->texto = $_POST['texto'];
				$item->estado = $_POST['estado'];

				$id = PublicacionDao::nuevo($item);
				
				$objetivos = json_decode($_POST['objetivos']);
				
				foreach($objetivos as $objetivo)
				{
					$obj = new publicacion_objetivo();
					$obj->id_publicacion = $id;
					$obj->id_objetivo = $objetivo->id;
					
					PublicacionObjetivoDao::nuevo($obj);
				}
				
				$tiempos = explode(",",$_POST['tiempos']);
				if ($tiempos[0] != '' && $tiempos != null && count($tiempos) > 0) 
				{
				
					foreach($tiempos as $tiempo)
					{
						$t = new publicacion_tiempo();
						$t->id_publicacion = $id;
						$t->id_tiempo = $tiempo;

						PublicacionTiempoDao::nuevo($t);
						
					}
				}
				
				$imagenes = json_decode($_POST['imagenes']);
				if ($imagenes != null && count($imagenes) > 0) {
					foreach ($imagenes as $imagen) {
						if ($imagen->place == 'temp') {

							subirArchivo($imagen->namecode);

							$item_imagen = new publicacion_imagen();
							$item_imagen->id_publicacion = $id;
							$item_imagen->imagen = $imagen->name;
							$item_imagen->archivo = $imagen->namecode;


							PublicacionImagenDao::nuevo($item_imagen);
						}
					}
				}
				
				echo 'OK|' . $item->alias;

			} else {
				echo 'ERROR|<div class="alert dark alert-alt alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $errores . '</div>';
			}
			break;
	}

}
?>
