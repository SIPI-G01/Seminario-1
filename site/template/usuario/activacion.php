<?php

$redireccionar = (isset($_GET['params']) ? 1 : 0);
$params = ($redireccionar == 1 ? $_GET['params'] : '');

$params = explode('-', $params);

if ($params[0] == "") {
	echo "<script>window.location = '/';</script>";
}

?>



<section class="intro text-center">
    <div class="section-padding ptb50">
      	<div id="message" class="container">
        	<div class="section-top margin-0">
          		<h3 class="section-title">Estamos validando su cuenta... <span></span></h3><!-- /.section-title -->
        	</div><!-- /.section-top -->
    	</div>
	</div>
</section>

<script type="text/javascript">
var redireccionar = '<?php echo $redireccionar; ?>';
var token = '<?php echo (isset($params[0]) && $params[0] != "" ? $params[0] : 0); ?>';
var id = '<?php echo (isset($params[1]) && $params[1] != "" ? $params[1] : 0); ?>';
var parametro = '<?php echo (isset($params[2]) && $params[2] != "" ? $params[2] : ""); ?>';

$(document).ready(function() {
	activar();
});

function activar() {
	$.ajax({
		async:true,
		type: "POST",
		url: "/site/controller/activar-controller.php",
		data: "accion=activar&id="+ id + "&token=" + token,
		beforeSend:function(){
		},
		success:function(datos) {
			datos = datos.split("|");
			var html = "";
			if (datos[0] == "ERROR") {

				html = '<div class="alert alert-danger" role="alert"><h3><i class="icon ti-na"></i>Ocurrieron los siguientes errores al tratar de activar su cuenta</h3><br>';

				html += datos[1];

				html += "</div>";
				$("#message").html(html);

			}
			if (datos[0] == "OK") {
				window.location.href = '/';
			}


			return true;
		},
		timeout:50000,
		error:function(){
			alert('Error al enviar su pedido. Intentelo mas tarde.');
			return false;
		}
	});
}

function reenviar() {
	$.ajax({
		async:true,
		type: "POST",
		url: "/site/controller/cliente-controller.php",
		data: "accion=reenviaractivacion&id="+ id + "&token=" + token,
		beforeSend:function(){
			// iniciarCargando();
		},
		success:function(datos) {
			datos = datos.split("|");
			var html = "";

			if (datos[0] == "OK") {
				html = '<div class="alert alert-info" role="alert"><h3><i class="icon ti-info-alt"></i>Se le ha reenviado un e-mail para que vuelva a intentar la activaci&oacute;n de su cuenta</h3></div><a href="javascript:reenviar();" class="btn">Reenviar email</a>';

				$("#message").html(html);
			}

			// finCargando();
			return true;
		},
		timeout:50000,
		error:function(){
			finCargando();
			alert('Error al enviar su pedido. Intentelo mas tarde.');
			return false;
		}
	});
}

function checkout() {
	window.location.href = "/carrito/checkout/";
}
</script>
