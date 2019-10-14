<?php
ini_set("memory_limit","256M");

include_once ($_SERVER["DOCUMENT_ROOT"] . '/admin/utiles/Utiles.php');

Utiles::ValidarSesionIniciada();

include_once ($_SERVER["DOCUMENT_ROOT"] . '/admin/utiles/upload/FileUpload.php');

$imagenpost = isset($_POST['input']) ? $_POST['input'] : 'foto';
$repo = isset($_POST['repo']) ? $_POST['repo'] : 'files';


$foto = (isset($_SESSION[$imagenpost]) && $_SESSION[$imagenpost] != '') ? unserialize(serialize($_SESSION[$imagenpost])) : null;

$ext = explode(".", $foto->name);
$filename = $foto->namecode; 
$extension = $ext[count($ext) - 1];

file_put_contents($_SERVER["DOCUMENT_ROOT"] . '/admin/temp/' . $filename, $foto->content);

$uploadfile = $_SERVER["DOCUMENT_ROOT"] . '/admin/temp/' . $filename;

$Origen_Imagen = $uploadfile;
$Nuevo_Folder = $_SERVER["DOCUMENT_ROOT"] . '/admin/temp/' . $filename;


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