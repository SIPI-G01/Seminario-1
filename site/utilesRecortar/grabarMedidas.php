<?php
include ("funciones-imagenes.php");

$foto = $_POST['foto'];
$medidas = $_POST['medidas'];
$ruta = $_POST['ruta'];
		
if(file_exists($_SERVER["DOCUMENT_ROOT"] .'/site/temp/recortes/' . trim($foto))){
	unlink($_SERVER["DOCUMENT_ROOT"] .'/site/temp/recortes/' . trim($foto));
}

$ext = explode(".", $foto);
$extension = $ext[count($ext) - 1];

$Nuevo_Folder = $_SERVER["DOCUMENT_ROOT"] . '/'.$ruta.'/'.trim($foto);
$Nuevo_Recorte = $_SERVER["DOCUMENT_ROOT"] . '/site/temp/recortes/'.trim($foto);

$vecMedidas = explode(',',$medidas);

$altoprop = ObtenerAltoImagen(300,$Nuevo_Folder);

$size = GetImageSize($Nuevo_Folder);
$anchoReal = $size[0];
$altoReal = $size[1];

$porcentajeAncho = $vecMedidas[0] * 100 / 300;
$porcentajeAlto = $vecMedidas[1] * 100 / $altoprop;
$ancho = $porcentajeAncho * $anchoReal / 100;
$alto = $porcentajeAlto * $altoReal / 100;

$porcentajeMargenAncho = $vecMedidas[4] * 100 / 300;
$porcentajeMargenAlto = $vecMedidas[5] * 100 / $altoprop;
$margenAncho = $porcentajeMargenAncho * $anchoReal / 100;
$margenAlto = $porcentajeMargenAlto * $altoReal / 100;


if(strtolower($extension)=='gif'){
	$origen = imagecreatefromgif($Nuevo_Folder);						
	$destino_recorte = imagecreatetruecolor($ancho, $alto);
	
	$transparente = imagecolorallocate($destino_recorte, 255, 255, 255);
	imagefill($destino_recorte, 0, 0, $transparente);
	imagecolortransparent($destino_recorte, $transparente);
	
	imagecopy($destino_recorte, $origen, 0, 0, $margenAncho, $margenAlto, $ancho, $alto);
	imagegif($destino_recorte, $Nuevo_Recorte);
}
elseif(strtolower($extension)=='png'){			
	$origen = imagecreatefrompng($Nuevo_Folder);						
	$destino_recorte = imagecreatetruecolor($ancho, $alto);
	
	imagesavealpha($destino_recorte, true);
	imagealphablending($destino_recorte, false);
	$white = imagecolorallocatealpha($destino_recorte, 255, 255, 255, 127);
	imagefill($destino_recorte, 0, 0, $white);
	
	// $transparente = imagecolorallocate($destino_recorte, 255, 255, 255);
	// imagefill($destino_recorte, 0, 0, $transparente);
	// imagecolortransparent($destino_recorte, $transparente);
	
	imagecopy($destino_recorte, $origen, 0, 0, $margenAncho, $margenAlto, $ancho, $alto);
	imagepng($destino_recorte, $Nuevo_Recorte);
}
else{
	$origen = imagecreatefromjpeg($Nuevo_Folder);						
	$destino_recorte = imagecreatetruecolor($ancho, $alto);
	imagecopy($destino_recorte, $origen, 0, 0, $margenAncho, $margenAlto, $ancho, $alto);
	imagejpeg($destino_recorte, $Nuevo_Recorte);
}

?>