<?php session_start(); ?>
<?php include ($_SERVER["DOCUMENT_ROOT"] . "/site/utilesRecortar/funciones-imagenes.php");?>
<?php include ($_SERVER["DOCUMENT_ROOT"] . "/site/utilesRecortar/generar_clave.php");?>

<?php
	//Nombre del archivo
	$archivo = isset($_GET['foto']) ? $_GET['foto'] : '';
	//Tipo del archivo
	$ext = isset($_GET['ext']) ? $_GET['ext'] : '';
	//Ruta completa, sin primer / "admin/temp", "archivos", etc.
	$ruta = isset($_GET['ruta']) ? $_GET['ruta'] : '';
	//Nombre del input donde se muestra la foto
	$input = isset($_GET['input']) ? $_GET['input'] : '';
	//Nombre del input que avisara que se recorto la imagen
	$change = isset($_GET['change']) ? $_GET['change'] : '';
	$recorte = isset($_GET['recorte']) ? $_GET['recorte'] : 1;	

	//Se completa el nombre del archivo
	$archivo .= '.' . $ext;		
?>

<link href="/site/assets/css/jquery.Jcrop.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/site/utilesRecortar/js/jquery.Jcrop.js"></script>

<!--<div style="position: absolute; margin-top: 20px; z-index: 1000; right: 0; background-color: rgba(96, 105, 178, 0.9); color: #FFF; padding: 5px 5px 5px 10px;"><i class="fa fa-scissors"></i>  Marca la zona a recortar</div>-->
<img class="img-responsive" id='target_editable' src='/<?php echo $ruta;?>/<?php echo $archivo;?>?rnd=<?php echo GenerarClave(); ?>' width='300px' height='<?php echo ObtenerAltoImagen(300, $_SERVER["DOCUMENT_ROOT"] . '/' .$ruta.'/'.$archivo);?>px' align='right' />
<input type='hidden' id='medidas' name='medidas' />
<input type='hidden' id='foto' name='foto' value='<?php echo $archivo;?>' />
<input type='hidden' id='ruta' name='ruta' value='<?php echo $ruta;?>' />
<input type='hidden' id='input' name='input' value='<?php echo $input;?>' />
<input type='hidden' id='change' name='change' value='<?php echo $change;?>' />

<script>

var jcrop_api, boundx, boundy;

jQuery(function($){	
	$('#target_editable').Jcrop({
		onChange: updatePreview,
		onSelect: updatePreview,
		aspectRatio: <?php echo $recorte; ?>
	},function(){
		// Use the API to get the real image size
		var bounds = this.getBounds();
		boundx = bounds[0];
		boundy = bounds[1];
		// Store the API in the jcrop_api variable
		jcrop_api = this;

		$('.jcrop-holder').css('margin', '0 auto');
	});

	function updatePreview(c){
		if (parseInt(c.w) > 0){		  
			$("#btnguardarcambios").removeAttr("disabled");

		  	var params = c.w+","+c.h+","+boundx+","+boundy+","+c.x+","+c.y;
		  
		  	$("#medidas").val(params);				  				  
		}
	};
	
	
});

function GrabarMedidas(){
	//Valido que haya seleccionado algo
	if($('#medidas').val()) {
		var params = "foto="+$("#foto").val()+"&medidas="+$("#medidas").val()+"&ruta="+$("#ruta").val();
		var input = $("#input").val();	
		//Enviar por ajax para guardar la foto recortada en admin/temp/recortes
		$.ajax({
			async:true,
			type: "POST",
			url: "/site/utilesRecortar/grabarMedidas.php",
			data:params,
			beforeSend:function(){},
			success:function(datos){
				jcrop_api.release();

				//Cambio la imagen que se muestra por el recorte
				$("#"+input).attr("src", "/site/temp/recortes/"+$("#foto").val()+"?timestamp=" + new Date().getTime());

				if ($('#change').val() != '') {
					//Cambio el input para saber que se recorto la foto
					$('#' + $('#change').val()).val(1).change();
				};

				//Cierro el modal
				$('#modal-crop').modal('toggle');

				//Pongo como disabled el boton
				$("#btnguardarcambios").attr("disabled", true);

				return true;
			},
			timeout:80000,
			error:function(){
				alert("Ocurrio un problema en la conexion mientras se intentaba guardar el recorte realizado. Intente nuevamente");
				return false;
			}
		});
	} else {
		$.msgbox('Seleccione algo.', {type: "error"});
	}
}
</script>