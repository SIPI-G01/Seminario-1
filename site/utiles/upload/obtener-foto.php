<?php
ini_set("memory_limit","256M");

include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/Utiles.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/upload/funciones-imagenes.php');


include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/upload/FileUpload.php');

$imagenpost = isset($_POST['foto']) ? $_POST['foto'] : 'foto';
$repo = isset($_POST['repo']) ? $_POST['repo'] : 'files';
$recorte = isset($_POST['recorte']) ? $_POST['recorte'] : 1;


$foto = (isset($_SESSION[$imagenpost]) && $_SESSION[$imagenpost] != '') ? unserialize(serialize($_SESSION[$imagenpost])) : null;

$ext = explode(".", $foto->name);
$filename = $foto->namecode;

$extension = $ext[count($ext) - 1];

file_put_contents($_SERVER["DOCUMENT_ROOT"] . '/site/temp/' . $filename, $foto->content);

$Proporciones_Archivo = getimagesize($_SERVER["DOCUMENT_ROOT"] . '/site/temp/' . $filename);
$anchoOriginal = $Proporciones_Archivo[0];
$altoOriginal = $Proporciones_Archivo[1];

$uploadfile = $_SERVER["DOCUMENT_ROOT"] . '/site/temp/' . $filename;

$Origen_Imagen = $uploadfile;
$Nuevo_Folder = $_SERVER["DOCUMENT_ROOT"] . '/site/temp/' . $filename;
$Nuevo_Recorte = $_SERVER["DOCUMENT_ROOT"] . '/site/temp/recortes/' . $filename;


$size = GetImageSize($Nuevo_Folder);
$anchoReal = $size[0];
$altoReal = $size[1];

$altoprop = ObtenerAltoImagen(541, $Nuevo_Folder);

if ($altoReal > $anchoReal) {
	$porcentajeAncho = 100;

	if ($altoprop > 541) {
		$porcentajeAlto = (541 * 100) / $altoprop;
	} else {
		$porcentajeAlto = 100;
	}
} else {
	$porcentajeAlto = 100;


	$porcentajeAncho = $altoReal * 100 / $anchoReal;
}

if ($recorte) {
	$ancho = ($recorte * ($porcentajeAncho * $anchoReal / 100));
	$alto = $porcentajeAlto * $altoReal / 100;
} else {
	$ancho = $anchoReal;
	$alto = $altoReal;
}

$margenAncho = 0;
$margenAlto = 0;
$cuadrado = $porcentajeAncho * 541 / 100;

$foto->medidas = $cuadrado.",".$cuadrado.",541,".$altoprop.",".$margenAncho.",".$margenAlto;

if (strtolower($extension) == 'gif') {
	$origen = imagecreatefromgif($Nuevo_Folder);
	$destino_recorte = imagecreatetruecolor($ancho, $alto);

	$transparente = imagecolorallocate($destino_recorte, 255, 255, 255);
	imagefill($destino_recorte, 0, 0, $transparente);
	imagecolortransparent($destino_recorte, $transparente);

	imagecopy($destino_recorte, $origen, 0, 0, $margenAncho, $margenAlto, $ancho, $alto);
	imagegif($destino_recorte, $Nuevo_Recorte);
} elseif (strtolower($extension) == 'png') {
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
} else {
	$origen = imagecreatefromjpeg($Nuevo_Folder);
	$destino_recorte = imagecreatetruecolor($ancho, $alto);
	imagecopy($destino_recorte, $origen, 0, 0, $margenAncho, $margenAlto, $ancho, $alto);
	imagejpeg($destino_recorte, $Nuevo_Recorte);
}


//echo '<img src="/admin/temp/recortes/' . $filename . '" class="responsive borde" id="img-' . $imagenpost . '" />
//		<button onclick="javascript:eliminarimg(\''.$imagenpost.'\',\''.$repo.'\');" type="button" class="btn btn-danger btn-sm mr5"><i class="fa fa-trash"></i> Eliminar</button>
//		<button onclick="javascript:Recortar(\''.$filename.'\',\'temp\',\'img-'.$imagenpost.'\','.$recorte.');" type="button" class="btn btn-primary btn-sm mr5"><i class="fa fa-crop"></i> Recortar</button>
//		';

$ref = explode(".", $filename);

$img = new stdClass();
$img->id = 0;
$img->ref = $ref[0];
$img->name = $foto->name;
$img->namecode = $foto->namecode;
$img->place = "temp";

unset($_SESSION[$imagenpost]);

echo json_encode($img);

?>