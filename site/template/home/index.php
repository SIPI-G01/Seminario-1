<?php
include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/home-view.php');
$view = new home_view();
?>
<div class= "container-fluid">
	
	<div class="row texto-inicio">
		<div class="col-md-12">
			<h3 class="descHome">¿Cuántas veces le dijiste a tu elefante que tenía que bajar de peso?<br>Nosotros nunca lo hicimos, pero si necesitáramos un consejo... ¡entraríamos a esta página!<br>¡Publicá, puntuá, opiná y mucho más!</h3>
		</div>
	</div>
	<div id="selectObjetivos">
		<h5 class="descHome">¿Qué estás esperando?, ¡Empezá tu búsqueda ahora!</h5>
	</div>
	<div class="row buscador">
		<div class="col-md-12" id="objetivosList">
			<div class="form-group">
				<select class="form-control" id="categoria" name="categoria" onChange="seleccionarObjetivos();">	
					<option value="0" selected disabled>Seleccione una categoría...</option>									
					<option value="1">Recetas</option>
					<option value="2">Actividad física</option>
				</select>
			</div>
		</div>

		<div id="buscador-objetivos-receta" class="col-md-12" style="display: none;">
			<div class="col-md-10" id="objetivosList">
				<div class="form-group">
						<select class="form-control" id="objetivos-receta" name="objetivos-receta" onChange="cambiarTiempos();">
							<option value="0" selected disabled>Seleccione un objetivo...</option>
							<?php foreach($view->objetivosReceta as $objetivo){ ?>
								<option value="<?php echo $objetivo->id; ?>"><?php echo $objetivo->nombre; ?></option>
							<?php } ?>
						</select>
				</div>
			</div>
			<div class="col-md-2" id="botonBuscar">
				<button id="buscar" class="form-control" onclick="buscar();"><i class="fas fa-search"></i> Buscar</button>
			</div>
			<div class="col-md-10" id="tiempos-receta">
			</div>
		</div>	
		<div id="buscador-objetivos-actividad" class="col-md-12" style="display: none;">
			<div class="col-md-10" id="objetivosList">
				<div class="form-group">
						<select class="form-control" id="objetivos-actividad" name="objetivos-actividad" onChange="cambiarTiempos();">
							<option value="0" selected disabled>Seleccione un objetivo...</option>
							<?php foreach($view->objetivosActividad as $objetivo){ ?>
								<option value="<?php echo $objetivo->id; ?>"><?php echo $objetivo->nombre; ?></option>
							<?php } ?>
						</select>
				</div>
			</div>
			<div class="col-md-2" id="botonBuscar">
				<button id="buscar" class="form-control" onclick="buscar();"><i class="fas fa-search"></i> Buscar</button>
			</div>
			<div class="col-md-10" id="tiempos-actividad">
			</div>
		</div>	
		
		
	</div>	

</div>

<script>
var tiempos = [];
var objetivos = [];
var alias_objetivo = "";
var tiemposMostrar = [];
var categoria = 0;

function seleccionarObjetivos()
{
	if($('#categoria').val() == 1)
	{
		$('#buscador-objetivos-receta').fadeIn();
		$('#buscador-objetivos-actividad').fadeOut();
		$('#tiempos-receta').html('');
		$('#objetivos-receta').val(0);		
		tiempos = <?php echo json_encode($view->tiemposReceta);?>;
		objetivos = <?php echo json_encode($view->objetivosReceta);?>;
		categoria = "receta";
	}
	else
	{
		$('#buscador-objetivos-actividad').fadeIn();
		$('#buscador-objetivos-receta').fadeOut();
		$('#tiempos-actividad').html('');
		$('#objetivos-actividad').val(0);		
		tiempos = <?php echo json_encode($view->tiemposActividad);?>;
		objetivos = <?php echo json_encode($view->objetivosActividad);?>;
		categoria = "actividad-fisica";
	}
}

function cambiarTiempos()
{
	if($('#categoria').val() == 1)
	{
		var objetivo = $('#objetivos-receta').val();
		$('#tiempos-receta').html('');
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
		$('#tiempos-receta').append(resultado);	
		objetivos.forEach(function(objs) {
			if(objs.id == objetivo)
			{
				alias_objetivo = objs.alias;		
			}
		});
	}
	else
	{
		var objetivo = $('#objetivos-actividad').val();
		$('#tiempos-actividad').html('');
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
		$('#tiempos-actividad').append(resultado);	
		objetivos.forEach(function(objs) {
			if(objs.id == objetivo)
			{
				alias_objetivo = objs.alias;		
			}
		});
		
	}
	 
}
function buscar()
{
	if($('#categoria').val() == 1)
	{
		if($('#objetivos-receta').val() != null)
		{
			var tiempos = "";
			tiemposMostrar.forEach(function(tiempo) {
				if($('#tiempo_'+ tiempo.id).is(":checked"))
				{
					tiempos += "_" + tiempo.alias;
				}
			});
			
			if(tiempos != "")
			{
				tiempos = "_tiempos" + tiempos;
			}

			window.location.href = "/publicaciones/index/categoria_" + categoria + "_objetivo_" + alias_objetivo + tiempos;	
		}

	}
	else
	{
		if($('#objetivos-actividad').val() != null)
		{
			var tiempos = "";
			tiemposMostrar.forEach(function(tiempo) {
				if($('#tiempo_'+ tiempo.id).is(":checked"))
				{
					tiempos += "_" + tiempo.alias;
				}
			});
			
			if(tiempos != "")
			{
				tiempos = "_tiempos" + tiempos;
			}

			window.location.href = "/publicaciones/index/categoria_" + categoria + "_objetivo_" + alias_objetivo + tiempos;	
		}
		
	}	
	
}
</script>