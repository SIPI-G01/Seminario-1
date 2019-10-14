<?php
function ObtenerStyleFoto($medidas, $ancho, $alto) {
	$sTXT = "";
	$vecmedidas = explode(',',$medidas);

	if($vecmedidas[0] !=0 and $vecmedidas[1] != 0){
		$rx = $ancho / $vecmedidas[0];
		$ry = $alto / $vecmedidas[1];
			
		$width = round($rx * $vecmedidas[2]) . 'px';
		$height = round($ry * $vecmedidas[3]) . 'px';
		$marginLeft = '-' . round($rx * $vecmedidas[4]) . 'px';
		$marginTop = '-' . round($ry * $vecmedidas[5]) . 'px';
			
		$sTXT = 'style="width: '. $width .'; height: '. $height .'; margin-left: '. $marginLeft .'; margin-top: '. $marginTop .';"';
	}

	return $sTXT;
}

function ObtenerAltoImagen($ancho, $imagen) {
	$size = GetImageSize($imagen);
	$anchoReal = $size[0];
	$altoReal = $size[1];

	$porcentajeAncho = (100 * $ancho) / $anchoReal;

	return round(($altoReal * $porcentajeAncho)/100);
}

function ObtenerAltoProporcional($ancho, $anchoReal, $altoReal) {
	$porcentajeAncho = (100 * $ancho) / $anchoReal;

	return round(($altoReal * $porcentajeAncho)/100);
}
?>