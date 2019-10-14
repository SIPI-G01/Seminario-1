<?php
include_once  ($_SERVER["DOCUMENT_ROOT"] . '/admin/view/simulacion-logueo-view.php');
$view = new simulacion_logueo_view();
?>
<div class= "container-fluid">
	
	<h1>Simulación de usuario logueado</h1>
	<button id="loguear" class="form-control" onclick="loguear();"><i class="fas fa-search"></i> Loguear usuario</button>
	<button id="desloguear" class="form-control" onclick="desloguear();"><i class="fas fa-search"></i> Desloguear usuario</button>
	<br>
	<p id="estado">Estado del usuario: <?php echo $view->estado; ?></p>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>

<script>
	function loguear() {
		$.ajax({
			async:true,
			type: "POST",
			url: "controller/simulacion-logueo-controller.php",
			data: "accion=loguear",
			beforeSend:function(){
			},
			success:function(datos) {
				console.log(datos);
				if (datos == '') {
					$('#estado').html("Estado del usuario: Logueado");
				} else {
					$('#estado').html("Estado del usuario: Deslogueado");
				}
				return true;
			},
			timeout:8000,
			error:function(){
				return false;
			}
		});
	}
	
	
	
	function desloguear()
	{
		$.ajax({
			async:true,
			type: "POST",
			url: "controller/simulacion-logueo-controller.php",
			data: "accion=desloguear",
			beforeSend:function(){
			},
			success:function(datos) {
				if (datos == '') {
					$('#estado').html("Estado del usuario: Deslogueado");
				} else {
					$('#estado').html("Estado del usuario: Logueado");
				}
				return true;
			},
			timeout:8000,
			error:function(){
				return false;
			}
		});
	}
</script>