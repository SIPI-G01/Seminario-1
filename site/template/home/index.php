<?php
include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/home-view.php');
$view = new home_view();
?>

<div class= "container-fluid">
	<div class="row">
		<div class="col-md-1">
			<img class="imagen-inicio" src="/site/images/logo.png">
		</div>
		<div class="col-md-11">
			<h1>Desafio Saludable</h1>
		</div>
	</div>
	<div class="row texto-inicio">
		<div class="col-md-12">
			<h3>¿Cuántas veces le dijiste a tu elefante que tenía que bajar de peso?<br>Nosotros nunca lo hicimos, pero si necesitáramos un consejo... ¡entraríamos a esta página!<br>¡Publicá, puntuá, opiná y mucho más!</h3>
		</div>
	</div>
	<div id="selectObjetivos">
		<h5>¿Qué estás esperando?, ¡Empezá tu búsqueda ahora!</h5>
	</div>
	<div class="row">
		<div class="col-md-10" id="objetivosList">
			<div class="form-group">
					<select class="form-control" id="objetivos" name="objetivos" onChange="cambiarTiempos();">
						<option value="0" selected disabled>Seleccione un objetivo...</option>
						<?php foreach($view->objetivos as $objetivo){ ?>
							<option value="<?php echo $objetivo->id; ?>"><?php echo $objetivo->nombre; ?></option>
						<?php } ?>
					</select>
			</div>
		</div>
		<div class="col-md-2" id="botonBuscar">
			<button id="buscar" class="form-control" onclick="buscar();">Buscar</button>
		</div>
		<div class="col-md-10" id="tiempos">
		</div>
			
	</div>	

</div>

<script>
var tiempos = [];
tiempos = <?php echo json_encode($view->tiempos);?>;
console.log(tiempos);
var tiemposMostrar = [];
function cambiarTiempos()
{
	 var objetivo = $('#objetivos').val();
	$('#tiempos').html('');
	tiemposMostrar = [];	
	var resultado = '<div class="col-md-12"><div class="row">';	
	var i = 0;
	tiempos.forEach(function(tiempo) {
		if(tiempo.id_objetivo == objetivo)
		{
			tiemposMostrar[i] = tiempo;
			i++;
			resultado += '<div class="col-md-2"><input type="checkbox" id="tiempo_'+ tiempo.id +'">' + tiempo.tiempo + '</input></div>';
		}
	});
	resultado += '</div></div>';
	$('#tiempos').append(resultado);	

	 
}
function buscar()
{
	if($('#objetivos').val() != null)
	{
		var tiempos = "";
		tiemposMostrar.forEach(function(tiempo) {
			if($('#tiempo_'+ tiempo.id).is(":checked"))
			{
				tiempos += "_" + tiempo.id;
			}
		});
		
		if(tiempos != "")
		{
			tiempos = "_tiempos_" + tiempos;
		}

		window.location.href = "/publicaciones/index/objetivo_" + $('#objetivos').val() + tiempos;	
	}
}
</script>