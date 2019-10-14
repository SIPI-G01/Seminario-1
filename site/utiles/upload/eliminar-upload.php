<?php

$path = ($_POST['place'] == 'temp') ? "/admin/temp/" : "/archivos/";
$pathRecortes = ($_POST['place'] == 'temp') ? "/admin/temp/recortes/" : "/archivos/recortes/";

if($_POST['file'] != null){
	if(file_exists($_SERVER["DOCUMENT_ROOT"] . $path . $_POST['file']) && trim($_POST['file']) !=''){
		unlink($_SERVER["DOCUMENT_ROOT"] . $path . $_POST['file']);
	}

	if(file_exists($_SERVER["DOCUMENT_ROOT"] . $pathRecortes . $_POST['file']) && trim($_POST['file']) !=''){
		unlink($_SERVER["DOCUMENT_ROOT"] . $pathRecortes . $_POST['file']);
	}
}
?>