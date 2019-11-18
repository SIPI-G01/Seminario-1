<?php
    if(session_id() == '') {
        session_start();
    }
//set_time_limit(0);

date_default_timezone_set('America/Argentina/Buenos_Aires');

include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/UsuarioDao.php');


class Utiles {

	public static function iniciarSesion($usuario) {
		$_SESSION['usuario-logueado'] = $usuario;
		$_SESSION['usuario-token'] = $usuario->id . time();
	}// iniciarSesion

	
	public static function recargarSesion($usuario) {
		$_SESSION['usuario-logueado'] = $usuario;
	}// iniciarSesion

	public static function cerrarSesion() {
		unset($_SESSION['usuario-logueado']);
		unset($_SESSION['usuario-token']);
	}// cerrarSesion

	public static function sesionIniciada() {
		return (isset($_SESSION['usuario-logueado']) && $_SESSION['usuario-logueado'] != '') ? true : false;
	}// sesionIniciada

	public static function obtenerUsuarioLogueado() {
		return (isset($_SESSION['usuario-logueado']) && $_SESSION['usuario-logueado'] != '') ? unserialize(serialize($_SESSION['usuario-logueado'])) : null;
	}// obtenerUsuarioLogueado

	public static function obtenerIdUsuarioLogueado() {
		$logueado = Utiles::obtenerUsuarioLogueado();
		if($logueado != null)
		{
			return $logueado->id;
			
		}	
		else
		{
			return null;
		}
	}// obtenerIdUsuarioLogueado

	public static function obtenerToken() {
		return (isset($_SESSION['usuario-token']) && $_SESSION['usuario-token'] != '') ? $_SESSION['usuario-token'] : null;
	}// obtenerUsuarioLogueado

	public static final function ValidarSesionIniciada() {
		if (Utiles::sesionIniciada()) {
			Utiles::redirigir('/usuario');
		}
	}// ValidarSesionIniciada

	public static function generarAlias($nombre) {

		$chars = array (
			'Š'=>'S', 'š'=>'s', 'Đ'=>'D', 'đ'=>'d', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
			'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
			'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
			'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
			'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
			'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
			'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
			'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
		);

		$alias = preg_replace('/[^a-zA-Z0-9- ]/s', '', strtr($nombre, $chars));
		$alias = str_replace(" ", "-", $alias);

		return $alias;
	}
	public static function redirigir($url) {
		echo '<script> window.location.href = "' . $url . '"; </script>';
	}
	
	public static function enviarEmail($to, $cco, $asunto, $mensaje, $banner = '') {

		include_once ($_SERVER["DOCUMENT_ROOT"] . '/PHPMailer-master/PHPMailerAutoload.php');

		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = 'smtp.sendgrid.net';
		$mail->SMTPAuth = true;
		$mail->Username = 'AxelR';
		$mail->Password = 'VITA-seminario1';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;
		$mail->CharSet = 'UTF-8';

		$mail->SMTPOptions = array(
			'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
			)
		);

		$mail->SetFrom('info@vita.com', 'Vita');
		$mail->addReplyTo('info@vita.com', 'Vita');

		$mail->addAddress($to);
		foreach (explode(',', $cco) as $direccion) {
			if ($direccion != null && $direccion != '') {
				$mail->addBCC(trim($direccion));
			}
		}
		$mail->isHTML(true);											// Set email format to HTML

		$archivo = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/mails/esqueleto.html');
		$archivo = str_replace("#URL#",Utiles::getURL(), $archivo);
		$archivo = str_replace("#ASUNTO#", $asunto, $archivo);
		$archivo = str_replace("#CUERPO#", $mensaje, $archivo);
		$archivo = str_replace("#DESCRIPCION#", '', $archivo);
		$archivo = str_replace("#BANNER#", (($banner) ? '<tr>
			<td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;">
				<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
					<tr>
						<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400;">
							<img src="' .  $banner . '" width="100%" height="auto" style="display: block; border: 0px;" />
						</td>
					</tr>
				</table>
			</td>
		</tr>' : ''), $archivo);
		$archivo = str_replace("#URL_LOGO#",Utiles::getURL() . '/site/images/logo.png', $archivo);

		// ARMO EL FOOTER //
		$foot = "Vita | Seminario 1 Miércoles Mañana 2C 2019, Grupo 1";
		$archivo = str_replace("#TEXTO_FOOTER#", $foot, $archivo);
		// FIN FOOTER //


		$mail->Subject = $asunto;
		$mail->Body    = $archivo;

		if(!$mail->send()) {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}

	}// enviarEmail
	
	public static function getURL()
	{
		return 'localhost';
	}

}
?>
