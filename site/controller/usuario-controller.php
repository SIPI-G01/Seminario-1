<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/Utiles.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/AvatarDao.php');


$token = isset($_POST['token']) ? $_POST['token'] : $_GET['token'];
$accion = isset($_POST['accion']) ? $_POST['accion'] : $_GET['accion'];
if (isset($token) && $token == Utiles::obtenerToken()) {

	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/UsuarioObjetivoDao.php');
	include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/UsuarioDao.php');

	switch ($accion) {
		case 'logout':
			Utiles::cerrarSesion();

		break;
		case 'login':
			//var_dump($_POST);
			$valido = true;
			$error = '';
			if(!isset($_POST['username']) || $_POST['username'] == '' || $_POST['username'] == null)
			{
				$valido = false;
				$error = 'Debe ingresar un nombre de usuario';
			}
			else if (!isset($_POST['pwd']) || $_POST['pwd'] == '' || $_POST['pwd'] == null)
			{
				$valido = false;
				$error = 'Debe ingresar una contraseña';
			}
			else
			{
				$usuario = UsuarioDao::getXUsernameYPassword($_POST['username'], md5($_POST['pwd']));
				if($usuario == null)
				{
					$valido = false;
					$usuario = UsuarioDao::getXUsername($_POST['username']);
					if($usuario == null)
					{
						$error = "No existe el usuario";
					}
					else
					{
						$error = "Contraseña incorrecta";
					}
				}
				else
				{
					if($usuario[0]->activado == 0)
					{
						$valido = false;
						$error = "Para poder iniciar sesión, primero debe activar su cuenta desde su casilla de mail.";

					}
					else
					{
						Utiles::iniciarSesion($usuario[0]);
						echo 'OK|';	
					}
				}
	
			}
			
			if(!$valido)
			{
				echo 'ERROR|' . $error;				
			}
						
			
		break;
		case 'modificar-objetivos':
			$valido = true;
			$errores = '<strong>Ocurrieron los siguientes errores:</strong>';

			$objetivos = json_decode($_POST['objetivos']);

			if (!isset($objetivos) || $objetivos == ''  || count($objetivos) == 0) {
				$errores .= '<p>- Debe seleccionar al menos un objetivo.</p>';
				$valido = false;
			}

			if ($valido) {
				$objetivosUsuario = UsuarioObjetivoDao::listXusuario(Utiles::obtenerIdUsuarioLogueado());
				//Elimino objetivos
				foreach ($objetivosUsuario as $objetivosActuales) {
					$borrar = true;
					$i = 0;
					foreach ($objetivos as $objetivo) {
						if ($objetivo->id == $objetivosActuales->id_objetivo) {
							$borrar = false;

							$objetivosActuales->fecha_inicio = ($objetivo->fecha_inicio == null || $objetivo->fecha_inicio == '' ? null : $objetivo->fecha_inicio);
							$objetivosActuales->fecha_fin = ($objetivo->fecha_fin == null || $objetivo->fecha_fin == '' ? null : $objetivo->fecha_fin);

							UsuarioObjetivoDao::modificar($objetivosActuales);

							array_splice($objetivos, $i, 1);
						}
						$i++;
					}

					if ($borrar) {

						UsuarioObjetivoDao::eliminar($objetivosActuales->id);
					}
				}

				// Guardo objetivos
				if ($objetivos != null && count($objetivos) > 0) {
					foreach($objetivos as $objetivo)
					{
						$obj = new usuario_objetivo();
						$obj->id_usuario = Utiles::obtenerIdUsuarioLogueado();
						$obj->id_objetivo = $objetivo->id;
						$obj->fecha_inicio = ($objetivo->fecha_inicio == null || $objetivo->fecha_inicio == '' ? null : $objetivo->fecha_inicio);
						$obj->fecha_fin = ($objetivo->fecha_fin == null || $objetivo->fecha_fin == '' ? null : $objetivo->fecha_fin);

						UsuarioObjetivoDao::nuevo($obj);
					}
				}

				echo 'OK|';

			} else {
				echo 'ERROR|<div class="alert dark alert-alt alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $errores . '</div>';
			}
			break;

		case 'editar-perfil':

			$valido = true;
			$item = new usuario();
			$errores = '<strong>Ocurrieron los siguientes errores:</strong>';

			if (!isset($_POST['first_name']) || trim($_POST['first_name']) == '') {
				$errores .= '<p>- Debe ingresar al menos un nombre.</p>';
				$valido = false;

			}
			if (!isset($_POST['last_name']) || trim($_POST['last_name']) == '') {
				$errores .= '<p>- Debe ingresar al menos un apellido.</p>';
				$valido = false;

			}
			if (!isset($_POST['user_name']) || trim($_POST['user_name']) == '') {
				$errores .= '<p>- Debe ingresar un nombre de usuario.</p>';
				$valido = false;

			}
			foreach(UsuarioDao::listActivos() as $usuario){
				if(Utiles::obtenerUsuarioLogueado()->usuario != $_POST['user_name']){
					if($usuario->usuario == $_POST['user_name']){
						$errores .= '<p>- Nombre de usuario en uso. Por favor elija otro</p>';
						$valido = false;
					}
				}
			}
			if (!isset($_POST['email']) || trim($_POST['email']) == '') {
				$errores .= '<p>- Debe ingresar un email.</p>';
				$valido = false;

			}
			foreach(UsuarioDao::listActivos() as $usuario){
				if(Utiles::obtenerUsuarioLogueado()->mail != $_POST['email']){
					if($usuario->mail == $_POST['email']){
						$errores .= '<p>- Ya hay un usuario registrado con ese email.</p>';
						$valido = false;
					}
				}
			}
			if (!isset($_POST['fecha_nac']) || trim($_POST['fecha_nac']) == '') {
				$errores .= '<p>- Debe ingresar una fecha de nacimiento.</p>';
				$valido = false;

			}

			if($valido) {

				$item = UsuarioDao::get(Utiles::obtenerIdUsuarioLogueado());
				$item->nombre = $_POST['first_name'];
				$item->apellido = $_POST['last_name'];
				$item->usuario = $_POST['user_name'];
				$item->mail = $_POST['email'];
				$item->fecha_nacimiento = $_POST['fecha_nac'];

				UsuarioDao::modificar($item);

				Utiles::recargarSesion($item);


				echo 'OK|';

			}else {
				echo 'ERROR|<div class="alert dark alert-alt alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $errores . '</div>';
			}

		break;
		case 'cambiar-password' :

			$valido = true;
			$item = new usuario();
			$item = UsuarioDao::get(Utiles::obtenerIdUsuarioLogueado());
			$errores = '<strong>Ocurrieron los siguientes errores:</strong>';

			if (!isset($_POST['password']) || trim($_POST['password']) == '') {
				$errores .= '<p>- La contraseña no puede estar vacia</p>';
				$valido = false;
			}else if (!isset($_POST['password2']) || trim($_POST['password2']) == '') {
				$errores .= '<p>- La nueva contraseña no puede estar vacia</p>';
				$valido = false;
			}else if($item->password != md5($_POST['password'])){
				$errores .= '<p>- La contraseña ingresada no es correcta. Intente nuevamente</p>';
				$valido = false;
			}


			if($valido) {

				$item->password = md5($_POST['password2']);

				UsuarioDao::modificar($item);

				Utiles::recargarSesion($item);


				echo 'OK|';

			}else {
				echo 'ERROR|<div class="alert dark alert-alt alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $errores . '</div>';
			}

		break;
		case 'eliminar-cuenta' :

			$valido = true;
			$item = new usuario();
			$item = UsuarioDao::get(Utiles::obtenerIdUsuarioLogueado());
			$errores = '<strong>Ocurrieron los siguientes errores:</strong>';

			if (!isset($_POST['password']) || trim($_POST['password']) == '') {
				$errores .= '<p>- La contraseña no puede estar vacia</p>';
				$valido = false;
			}else if (!isset($_POST['password2']) || trim($_POST['password2']) == '') {
				$errores .= '<p>- Debe completar ambos campos</p>';
				$valido = false;
			}else if($item->password != md5($_POST['password'])){
				$errores .= '<p>- La contraseña ingresada no es correcta. Intente nuevamente</p>';
				$valido = false;
			}else if(md5($_POST['password']) != md5($_POST['password2'])){
				$errores .= '<p>- Las contraseñas no coinciden. Intente nuevamente</p>';
				$valido = false;
			}

			if($valido) {

				$item->activo = 0;

				UsuarioDao::modificar($item);

				Utiles::cerrarSesion($item);


				echo 'OK|';

			}else {
				echo 'ERROR|<div class="alert dark alert-alt alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $errores . '</div>';
			}
		break;
		case 'generar-avatar':

			$valido = true;
			$item = Utiles::obtenerUsuarioLogueado();
			$errores = '<strong>Ocurrieron los siguientes errores:</strong>';

			if (!isset($_POST['avatar-style']) || trim($_POST['avatar-style']) == '') {

				$errores .= '<p>- Debe elegir un estilo de avatar.</p>';
				$valido = false;

			}

			if($valido) {

				$item->archivo = 'https://avataaars.io/?avatarStyle=' .$_POST['avatar-style']. '&topType=' .$_POST['topType']. '&accessoriesType='.$_POST['accessoriesType']. '&hatColor=' .$_POST['hatColor']. '&hairColor=' .$_POST['hairColor']. '&facialHairType=' .$_POST['facialHairType']. '&facialHairColor=' .$_POST['facialHairColor']. '&clotheType=' .$_POST['clotheType']. '&clotheColor=' .$_POST['clotheColor']. '&graphicType=' .$_POST['graphicType']. '&eyeType=' .$_POST['eyeType']. '&eyebrowType=' .$_POST['eyebrowType']. '&mouthType=' .$_POST['mouthType']. '&skinColor=' .$_POST['skinColor'];
				$item->imagen = 'https://avataaars.io/?avatarStyle=' .$_POST['avatar-style']. '&topType=' .$_POST['topType']. '&accessoriesType='.$_POST['accessoriesType']. '&hatColor=' .$_POST['hatColor']. '&hairColor=' .$_POST['hairColor']. '&facialHairType=' .$_POST['facialHairType']. '&facialHairColor=' .$_POST['facialHairColor']. '&clotheType=' .$_POST['clotheType']. '&clotheColor=' .$_POST['clotheColor']. '&graphicType=' .$_POST['graphicType']. '&eyeType=' .$_POST['eyeType']. '&eyebrowType=' .$_POST['eyebrowType']. '&mouthType=' .$_POST['mouthType']. '&skinColor=' .$_POST['skinColor'];

				UsuarioDao::modificar($item);

				Utiles::recargarSesion($item);

				echo 'OK|';

			}else {
				echo 'ERROR|<div class="alert dark alert-alt alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $errores . '</div>';
			}
		break;
		
		case 'verificacion-datos-registro':

			$valido = true;
			$errores = '<strong>Ocurrieron los siguientes errores:</strong>';

			if (!isset($_POST['first_name']) || trim($_POST['first_name']) == '') {
				$errores .= '<p>- Debe completar el campo nombre.</p>';
				$valido = false;

			}
			if (!isset($_POST['last_name']) || trim($_POST['last_name']) == '') {
				$errores .= '<p>- Debe completar el campo apellido.</p>';
				$valido = false;

			}
			if (!isset($_POST['user_name']) || trim($_POST['user_name']) == '') {
				$errores .= '<p>- Debe ingresar un nombre de usuario.</p>';
				$valido = false;

			}
			foreach(UsuarioDao::listActivos() as $usuario){
					if($usuario->usuario == $_POST['user_name']){
						$errores .= '<p>- Nombre de usuario en uso. Por favor elija otro</p>';
						$valido = false;
					}
			}
			if (!isset($_POST['email']) || trim($_POST['email']) == '') {
				$errores .= '<p>- Debe ingresar un email.</p>';
				$valido = false;

			}
			foreach(UsuarioDao::listActivos() as $usuario){
					if($usuario->mail == $_POST['email']){
						$errores .= '<p>- Ya hay un usuario registrado con ese email.</p>';
						$valido = false;
					}
			}
			if (!isset($_POST['fecha_nac']) || trim($_POST['fecha_nac']) == '') {
				$errores .= '<p>- Debe ingresar una fecha de nacimiento.</p>';
				$valido = false;
			}
			
			if (!isset($_POST['password']) || trim($_POST['password']) == '') {
				$errores .= '<p>- El campo contraseña no puede estar vacío.</p>';
				$valido = false;
			}else if (!isset($_POST['password2']) || trim($_POST['password2']) == '') {
				$errores .= '<p>- El campo repetir contraseña no puede estar vacío.</p>';
				$valido = false;
			}else if($_POST['password2'] != $_POST['password']){
				$errores .= '<p>- Las contraseñas ingresadas no coinciden.</p>';
				$valido = false;
			}
			
			if($valido) {

				echo 'OK|';

			}else {
				echo 'ERROR|<div class="alert dark alert-alt alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $errores . '</div>';
			}

		break;
		case 'nuevo-avatar':

			$valido = true;
			$errores = '<strong>Ocurrieron los siguientes errores:</strong>';

			if (!isset($_POST['avatar-style']) || trim($_POST['avatar-style']) == '') {

				$errores .= '<p>- Debe elegir un estilo de avatar.</p>';
				$valido = false;

			}

			if($valido) {

				echo 'OK|';

			}else {
				echo 'ERROR|<div class="alert dark alert-alt alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $errores . '</div>';
			}
		break;
		case 'registrar':
			$valido = true;
			$errores = '<strong>Ocurrieron los siguientes errores:</strong>';

			$objetivos = json_decode($_POST['objetivos']);

			if (!isset($objetivos) || $objetivos == ''  || count($objetivos) == 0) {
				$errores .= '<p>- Debe seleccionar al menos un objetivo.</p>';
				$valido = false;
			}
			foreach(UsuarioDao::listActivos() as $usuario){
					if($usuario->usuario == $_POST['usuario']){
						$errores .= '<p>- Nombre de usuario en uso. Por favor elija otro</p>';
						$valido = false;
					}
			}
			foreach(UsuarioDao::listActivos() as $usuario){
					if($usuario->mail == $_POST['email']){
						$errores .= '<p>- Ya hay un usuario registrado con ese email.</p>';
						$valido = false;
					}
			}

			if ($valido) {
				$item = new usuario();
				$item->mail = $_POST['email'];
				$item->usuario = $_POST['usuario'];
				$item->alias = Utiles::generarAlias($_POST['usuario']);
				$item->password = md5($_POST['password']);
				$item->nombre = $_POST['nombre'];
				$item->apellido = $_POST['apellido'];
				$item->fecha_nacimiento = $_POST['fecha_nacimiento'];
				$item->imagen = $_POST['avatar'];
				$item->archivo = $_POST['avatar'];
				$item->activado = 0;
				$item->token = time();

				$idUsuario = UsuarioDao::nuevo($item);
				
				// Guardo objetivos
				if ($objetivos != null && count($objetivos) > 0) {
					foreach($objetivos as $objetivo)
					{
						$obj = new usuario_objetivo();
						$obj->id_usuario = $idUsuario;
						$obj->id_objetivo = $objetivo->id;
						$obj->fecha_inicio = ($objetivo->fecha_inicio == null || $objetivo->fecha_inicio == '' ? null : $objetivo->fecha_inicio);
						$obj->fecha_fin = ($objetivo->fecha_fin == null || $objetivo->fecha_fin == '' ? null : $objetivo->fecha_fin);

						UsuarioObjetivoDao::nuevo($obj);
					}
				}
				
				/*
				 * Mando mail para la activacion
				 */

				$archivo = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/mails/confirma.html');
				
				$linkActivacion = "http://" . $_SERVER["SERVER_NAME"] . "/usuario/activacion/" . $item->token . "-" . $idUsuario;

				$archivo = str_replace("#URL_CONFIRMAR#",$linkActivacion, $archivo);
				
					$archivo = str_replace("#TEXTO_BOTON#",'Activar mi cuenta', $archivo);
					$archivo = str_replace("#TEXTO_DESC#",'¡Hacé click en el botón para activar tu cuenta!', $archivo);
					$archivo = str_replace("#TITULO#",'Ya casi terminamos...', $archivo);
					$archivo = str_replace("#PEQ_DESC#",'Falta solo un paso para terminar de registrarte.', $archivo);
					$archivo = str_replace("#NOMBRE#",'Hola ' . ucfirst($_POST['nombre']), $archivo);

				$banner = '';
				Utiles::enviarEmail($_POST['email'], '', '¡Activá tu cuenta!', $archivo, $banner);				

				echo 'OK|';

			} else {
				echo 'ERROR|<div class="alert dark alert-alt alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $errores . '</div>';
			}
		break;


	}

}
?>
