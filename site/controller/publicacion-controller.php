<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/Utiles.php');

Utiles::ValidarSesionIniciada();

$token = isset($_POST['token']) ? $_POST['token'] : $_GET['token'];
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion'];

if (isset($token) && $token == Utiles::obtenerToken()) {

	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionDao.php');
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionObjetivoDao.php');
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/PublicacionImagenDao.php');

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
			if (isset($_POST['tiempo']) && $_POST['tiempo'] != '') {
				if(!is_numeric($_POST['tiempo']) || $_POST['tiempo'] <= 0)
				{
					$errores .= '<p>- El tiempo debe ser un número mayor o igual a 0.</p>';
					$valido = false;
					
				}
			}			

			if ($valido) {
				$item = new publicacion();
				$item->id_usuario = Utiles::obtenerIdUsuarioLogueado();
				$item->titulo = $_POST['titulo'];
				$item->alias = Utiles::generarAlias($item->titulo) . "-" . Utiles::generarAlias(date("Ymdhis"));
				$item->descripcion = $_POST['descripcion'];
				$item->categoria = $_POST['categoria'];				
				$item->texto = $_POST['texto'];
				$item->estado = $_POST['estado'];
				$item->tiempo = $_POST['tiempo'];
				$item->unidad_tiempo = $_POST['unidad_tiempo'];
				
				if($_POST['tiempo'] != null || $_POST['tiempo'] != '')
				{
					if($item->unidad_tiempo == 1)
					{
						$item->tiempo_minutos = $_POST['tiempo'];						
					}
					else if($item->unidad_tiempo == 2)
					{
						$item->tiempo_minutos = $_POST['tiempo'] * 60;						
						
					}
					else if($item->unidad_tiempo == 3)
					{
						$item->tiempo_minutos = $_POST['tiempo'] * 60 * 24;						
						
					}		
					else if($item->unidad_tiempo == 4)
					{
						$item->tiempo_minutos = $_POST['tiempo'] * 60 * 24 * 7;						
						
					}					
					else if($item->unidad_tiempo == 5)
					{
						$item->tiempo_minutos = $_POST['tiempo'] * 60 * 24 * 7 * 30;											
					}										
				}
				else
				{
					$item->tiempo_minutos = null;				
				}

				$id = PublicacionDao::nuevo($item);
				
				$objetivos = json_decode($_POST['objetivos']);
				
				foreach($objetivos as $objetivo)
				{
					$obj = new publicacion_objetivo();
					$obj->id_publicacion = $id;
					$obj->id_objetivo = $objetivo->id;
					
					PublicacionObjetivoDao::nuevo($obj);
				}
				
				/*$tiempos = explode(",",$_POST['tiempos']);
				if ($tiempos[0] != '' && $tiempos != null && count($tiempos) > 0) 
				{
				
					foreach($tiempos as $tiempo)
					{
						$t = new publicacion_tiempo();
						$t->id_publicacion = $id;
						$t->id_tiempo = $tiempo;

						PublicacionTiempoDao::nuevo($t);
						
					}
				}*/
				
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
			case 'editar':
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
			if (isset($_POST['tiempo']) && $_POST['tiempo'] != '') {
				if(!is_numeric($_POST['tiempo']) || $_POST['tiempo'] <= 0)
				{
					$errores .= '<p>- El tiempo debe ser un número mayor o igual a 0.</p>';
					$valido = false;
					
				}
			}			
			

			if ($valido) {
				$item = PublicacionDao::get($_POST['id']);
				$item->titulo = $_POST['titulo'];
				$item->descripcion = $_POST['descripcion'];
				$item->categoria = $_POST['categoria'];				
				$item->texto = $_POST['texto'];
				$item->estado = $_POST['estado'];
				$item->tiempo = $_POST['tiempo'];
				$item->unidad_tiempo = $_POST['unidad_tiempo'];
				
				if($_POST['tiempo'] != null || $_POST['tiempo'] != '')
				{
					if($item->unidad_tiempo == 1)
					{
						$item->tiempo_minutos = $_POST['tiempo'];						
					}
					else if($item->unidad_tiempo == 2)
					{
						$item->tiempo_minutos = $_POST['tiempo'] * 60;						
						
					}
					else if($item->unidad_tiempo == 3)
					{
						$item->tiempo_minutos = $_POST['tiempo'] * 60 * 24;						
						
					}		
					else if($item->unidad_tiempo == 4)
					{
						$item->tiempo_minutos = $_POST['tiempo'] * 60 * 24 * 7;						
						
					}					
					else if($item->unidad_tiempo == 5)
					{
						$item->tiempo_minutos = $_POST['tiempo'] * 60 * 24 * 7 * 30;											
					}										
				}
				else
				{
					$item->tiempo_minutos = null;				
				}
				

				PublicacionDao::modificar($item);
				
				$objetivos = json_decode($_POST['objetivos']);
				//Elimino objetivos
				foreach ($item->getObjetivos() as $objetivosActuales) {
					$borrar = true;
					$i = 0;
					foreach ($objetivos as $objetivo) {
						if ($objetivo->id == $objetivosActuales->id_objetivo) {
							$borrar = false;
							array_splice($objetivos, $i, 1);
						}
						$i++;
					}

					if ($borrar) {

						PublicacionObjetivoDao::eliminar($objetivosActuales);
					}
				}

				// Guardo objetivos
				if ($objetivos != null && count($objetivos) > 0) {
					foreach($objetivos as $objetivo)
					{
						$obj = new publicacion_objetivo();
						$obj->id_publicacion = $_POST['id'];
						$obj->id_objetivo = $objetivo->id;
						
						PublicacionObjetivoDao::nuevo($obj);
					}
				}

				
				
				/*$tiempos = explode(",",$_POST['tiempos']);
				if ($tiempos[0] != '' && $tiempos != null && count($tiempos) > 0) 
				{
				
					//Elimino tiempos
					foreach ($item->getTiempos() as $tiemposActuales) {
						$borrar = true;
						$i = 0;
						foreach ($tiempos as $tiempo) {
							if ($tiempo == $tiemposActuales->id_tiempo) {
								$borrar = false;
								array_splice($tiempos, $i, 1);								
							}
							$i++;
						}

						if ($borrar) {

							PublicacionTiempoDao::eliminar($tiemposActuales);
						}
					}

					// Guardo tiempos
					if ($tiempos != null && count($tiempos) > 0) {
						foreach($tiempos as $tiempo)
						{
							$t = new publicacion_tiempo();
							$t->id_publicacion = $_POST['id'];
							$t->id_tiempo = $tiempo;

							PublicacionTiempoDao::nuevo($t);
							
						}
					}
				}
				else
				{
					foreach ($item->getTiempos() as $tiemposActuales) {
						PublicacionTiempoDao::eliminar($tiemposActuales);
					}					
				}*/
				
				
				//Edito las imagenes
				$imagenes = json_decode($_POST['imagenes']);

				// ELIMINO IMAGENES
				
				foreach ($item->getImagenes() as $imagen) {
					$borrar = true;
					$i = 0;
					foreach ($imagenes as $upload) {
						if ($imagen->id == $upload->id) {
							$borrar = false;
							array_splice($imagenes, $i, 1);								

						}
						$i++;
					}

					if ($borrar) {
						if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/archivos/" . $imagen->archivo)) {
							unlink($_SERVER["DOCUMENT_ROOT"] . "/archivos/" . $imagen->archivo);
						}

						if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/archivos/recortes/" . $imagen->archivo)) {
							unlink($_SERVER["DOCUMENT_ROOT"] . "/archivos/recortes/" . $imagen->archivo);
						}

						PublicacionImagenDao::eliminar($imagen->id);
					}
				}

				// GUARDO IMAGENES
				if ($imagenes != null && count($imagenes) > 0) {
					foreach ($imagenes as $imagen) {

						subirArchivo($imagen->namecode);
						if ($imagen->place == 'temp') {

							$item_imagen = new publicacion_imagen();
							$item_imagen->id_publicacion = $_POST['id'];
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
