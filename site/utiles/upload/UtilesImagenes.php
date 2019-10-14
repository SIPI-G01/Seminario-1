<?php

function subirArchivo($archivo, $bajar_calidad = true) {

	if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/admin/temp/" . $archivo)) {
		if($bajar_calidad){
			subirBaja($_SERVER["DOCUMENT_ROOT"] . "/admin/temp/" . $archivo, $_SERVER["DOCUMENT_ROOT"] . "/archivos/" . $archivo);
		}else{
			 copy($_SERVER["DOCUMENT_ROOT"] . "/admin/temp/" . $archivo, $_SERVER["DOCUMENT_ROOT"] . "/archivos/" . $archivo);
		}
		unlink($_SERVER["DOCUMENT_ROOT"] . "/admin/temp/" . $archivo);
	}


	if(file_exists($_SERVER["DOCUMENT_ROOT"] . "/admin/temp/recortes/" . $archivo)) {
		if($bajar_calidad){
			subirBaja($_SERVER["DOCUMENT_ROOT"] . "/admin/temp/recortes/" . $archivo, $_SERVER["DOCUMENT_ROOT"] . "/archivos/recortes/" . $archivo);
		}else{
			copy($_SERVER["DOCUMENT_ROOT"] . "/admin/temp/recortes/" . $archivo, $_SERVER["DOCUMENT_ROOT"] . "/archivos/recortes/" . $archivo);			
		}
		unlink($_SERVER["DOCUMENT_ROOT"] . "/admin/temp/recortes/" . $archivo);
	}
}

function subirBaja($url, $urlDestino){
	// OBTENGO LOS TAMAÑOS
	$tamaño = getimagesize($url);
	$anchoOriginal = $tamaño[0];
	$altoOriginal = $tamaño[1];

	if ($anchoOriginal > $altoOriginal) {
		// SI ES MAS ANCHO QUE ALTO Y EL ANCHO ES MAYOR A 800, EL ANCHO MAXIMO PASARA A SER 800
		if ($anchoOriginal > 800) {
			$nuevo_ancho = 800;
		} else {
			$nuevo_ancho = $anchoOriginal;
		}

		// OBTENGO EL NUEVO ALTO PROPORCIONAL
		$nuevo_alto = obtenerAltoProporcional($nuevo_ancho, $anchoOriginal, $altoOriginal);
	} else {
		// SI ES MAS ALTO QUE ANCHO Y EL ANCHO ES MAYOR A 800, EL ALTO MAXIMO PASARA A SER 800
		if ($anchoOriginal > 600) {
			$nuevo_alto = 600;
		} else {
			$nuevo_alto = $altoOriginal;
		}

		// OBTENGO EL NUEVO ANCHO PROPORCIONAL
		$nuevo_ancho = obtenerAnchoProporcional($nuevo_alto, $altoOriginal, $anchoOriginal);
	}

	resizeImage($url,$urlDestino,$nuevo_ancho,$nuevo_alto,85);
}

function obtenerAnchoProporcional($ancho, $anchoReal, $altoReal) {
	if ($anchoReal > 0) {
		$porcentajeAncho = (100 * $ancho) / $anchoReal;
	} else {
		$porcentajeAncho = 100;
	}

	return round(($altoReal * $porcentajeAncho) / 100);
}

function obtenerAltoProporcional($alto, $altoReal, $anchoReal) {
	if ($altoReal > 0) {
		$porcentajeAlto = (100 * $alto) / $altoReal;
	} else {
		$porcentajeAlto = 100;
	}

	return round(($anchoReal * $porcentajeAlto) / 100);
}

function resizeImage($SrcImage,$DestImage, $thumb_width,$thumb_height,$Quality)
{
    list($width,$height,$type) = getimagesize($SrcImage);
    switch(strtolower(image_type_to_mime_type($type)))
    {
        case 'image/gif':
            $NewImage = imagecreatefromgif($SrcImage);
            break;
        case 'image/png':
            $NewImage = imagecreatefrompng($SrcImage);
            break;
        case 'image/jpeg':
            $NewImage = imagecreatefromjpeg($SrcImage);
            break;
        default:
            return false;
            break;
    }
    $original_aspect = $width / $height;
    $positionwidth = 0;
    $positionheight = 0;
    if($original_aspect > 1)    {
        $new_width = $thumb_width;
        $new_height = $new_width/$original_aspect;
        while($new_height > $thumb_height) {
            $new_height = $new_height - 0.001111;
            $new_width  = $new_height * $original_aspect;
            while($new_width > $thumb_width) {
                $new_width = $new_width - 0.001111;
                $new_height = $new_width/$original_aspect;
            }

        }
    } else {
        $new_height = $thumb_height;
        $new_width = $new_height/$original_aspect;
        while($new_width > $thumb_width) {
            $new_width = $new_width - 0.001111;
            $new_height = $new_width/$original_aspect;
            while($new_height > $thumb_height) {
                $new_height = $new_height - 0.001111;
                $new_width  = $new_height * $original_aspect;
            }
        }
    }
    if($width < $new_width && $height < $new_height){
        $new_width = $width;
        $new_height = $height;
        $positionwidth = ($thumb_width - $new_width) / 2;
        $positionheight = ($thumb_height - $new_height) / 2;
    }elseif($width < $new_width && $height > $new_height){
        $new_width = $width;
        $positionwidth = ($thumb_width - $new_width) / 2;
        $positionheight = 0;
    }elseif($width > $new_width && $height < $new_height){
        $new_height = $height;
        $positionwidth = 0;
        $positionheight = ($thumb_height - $new_height) / 2;
    } elseif($width > $new_width && $height > $new_height){
        if($new_width < $thumb_width) {
            $positionwidth = ($thumb_width - $new_width) / 2;
        } elseif($new_height < $thumb_height) {
            $positionheight = ($thumb_height - $new_height) / 2;
        }
    }
    $thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
    /********************* FOR WHITE BACKGROUND  *************************/
        $white = imagecolorallocate($thumb, 255,255,255);
        imagefill($thumb, 0, 0, $white);
    if(imagecopyresampled($thumb, $NewImage,$positionwidth, $positionheight,0, 0, $new_width, $new_height, $width, $height)) {
        if(imagejpeg($thumb,$DestImage,$Quality)) {
            imagedestroy($thumb);
            return true;
        }
    }
}

?>
