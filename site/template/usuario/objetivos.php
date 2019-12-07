<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/mis-objetivos-view.php');
 
 $tienePermiso = (Utiles::obtenerUsuarioLogueado() == null ? false : true);
 
 if($tienePermiso)
 {
	$view_objetivos = new mis_objetivos_view(); 
 }
 
 ?>

<div class="container-fluid">
	<?php if($tienePermiso){ ?>
	
	<div class="container" style="width: auto;">
		<div class="row">
			<div class="col-md-12">
				<h3>Mis objetivos</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
		
				<form class="form-horizontal" action="javascript:void(1);" id="frm">
					<div class="col-md-12">
						<div class="panel-body">
							<div id="error">
							</div>
								<input type="hidden" name="accion" id="accion" value="modificar-objetivos"/>
								<input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
							
								<div class="form-group row">
									<label class="col-sm-2 control-label">Objetivo/s *</label>
									<div class="col-md-10 row">
										<div class="col-sm-12">
											<select class="form-control" id="selector_objetivo" name="selector_objetivo" onchange="javascript:agregarObjetivo();">	
												<option value="0" selected disabled>Seleccione un objetivo...</option>																				
												<?php foreach($view_objetivos->objetivos as $objetivo){ ?>
												<option value="<?php echo $objetivo->id; ?>"><?php echo $objetivo->nombre; ?></option>									
												<?php } ?>
											</select>
										</div>
										<div class="col-md-12" style="margin-top:25px;">
											<!--TABLA-->
											<div id="mensajes-error-tabla"></div>												
											<table id="tabla"></table>
										</div>

									</div>

								</div>
									
									
									
								
								<div class="text-right">
									<a href="javascript: guardar(); void 0"><button type="button" class="btn guardar btn-primary"><span><i class="fa fa-save"></i> Guardar</span></button></a>
								</div>

						</div>
					</div>
				</form>
			</div>	
		</div>
	</div>

	<?php } else { ?>
		<div class="text-center">
			<h3 class="sub-title">Parece que el contenido que estás buscando no existe o no es visible para tí.</h3><!-- /.sub-title -->
			<a href="/" class="btn">Ir a la home</a><!-- /.btn -->
		</div>
	<?php } ?>
</div>
<script>


var objetivosListado = <?php echo json_encode($view_objetivos->objetivos); ?>;
var tabla = [];
var idTabla = [];
var objetivosSeleccionados = [];
var datosGuardados = [];

precargarObjetivos();

function precargarObjetivos()
{								

	objetivosSeleccionados = <?php echo json_encode($view_objetivos->objetivosUsuario); ?>;
	tabla.push("<tr><th>Objetivo</th><th>Fecha de inicio</th><th>Fecha de finalización</th><th></th></tr>");
	$('#tabla').append("<tr><th class='text-center'>Objetivo</th><th class='text-center'>Fecha de inicio</th><th class='text-center'>Fecha de finalización</th><th></th></tr>");						

	objetivosSeleccionados.forEach(function(objetivo) {
		//objetivosSeleccionados.push(objetivo);
		var lineas = "<tr><td class='text-center' style='font-weight: bold;'>" + objetivo.nombre + "</td><td><input onchange='actualizarGuardarDatos(" + objetivo.id + ", 1)' type='date' name='fecha_inicio_"+ objetivo.id +"' id='fecha_inicio_"+ objetivo.id +"' value='" + objetivo.fecha_inicio + "'/></td><td><input onchange='actualizarGuardarDatos(" + objetivo.id + ", 2)' type='date' name='fecha_fin_"+ objetivo.id +"' id='fecha_fin_"+ objetivo.id +"' value='" + objetivo.fecha_fin + "'/></td><td class='text-right'><button onclick='javascript:eliminarObjetivo("+ objetivo.id + ");' type='button' class='btn btn-danger btn-sm mr5'><i class='fa fa-trash'></i> Eliminar</button></td></tr>";
		tabla.push(lineas);
		idTabla.push(objetivo.id);
		datosGuardados.push(objetivo);
		$('#tabla').append(lineas);						

	});
}

function actualizarGuardarDatos(id, tipo)
{
	if(tipo == 1)
	{
		//Fecha inicio
		datosGuardados.forEach(function(dato) {
			if(dato.id == id)
			{
				dato.fecha_inicio = $('#fecha_inicio_' + id).val();
			}
		});
		
	}
	else if(tipo == 2)
	{
		//Fecha fin
		datosGuardados.forEach(function(dato) {
			if(dato.id == id)
			{
				dato.fecha_fin = $('#fecha_fin_' + id).val();
			}
		});		
	}
}

function agregarObjetivo()
{
		$('#mensajes-error-tabla').html('');
		$('#mensajes-error-tabla').fadeOut();	
		
		if($('#selector_objetivo').val() == 0 || $('#selector_objetivo').val() == null)
		{
			$('#mensajes-error-tabla').html("<p><b>Ocurrieron los siguientes errores:</b><br> - Debe seleccionar un objetivo</p>");
			$('#mensajes-error-tabla').fadeIn();			
		}
		else
		{
			var aparecio = false;
			objetivosSeleccionados.forEach(function(objetivo) {
				if(objetivo.id == $('#selector_objetivo').val())
				{
					aparecio = true;
				}
			});
			
			if(aparecio == false)
			{
				var lineas = '';
				objetivosListado.forEach(function(objetivo) {
					if(objetivo.id == $('#selector_objetivo').val())
					{
						datosGuardados.push({id: objetivo.id, nombre: objetivo.nombre, fecha_inicio: null, fecha_fin: null});
						objetivosSeleccionados.push(objetivo);
						lineas = "<tr><td class='text-center' style='font-weight: bold;'>" + objetivo.nombre + "</td><td><input onchange='actualizarGuardarDatos(" + objetivo.id + ", 1)' type='date' name='fecha_inicio_"+ objetivo.id +"' id='fecha_inicio_"+ objetivo.id +"' value='" + objetivo.fecha_inicio + "'/></td><td><input onchange='actualizarGuardarDatos(" + objetivo.id + ", 2)' type='date' name='fecha_fin_"+ objetivo.id +"' id='fecha_fin_"+ objetivo.id +"' value='" + objetivo.fecha_fin + "'/></td><td class='text-right'><button onclick='javascript:eliminarObjetivo("+ objetivo.id + ");' type='button' class='btn btn-danger btn-sm mr5'><i class='fa fa-trash'></i> Eliminar</button></td></tr>";
					}
				});
				
				tabla.push(lineas);
				idTabla.push($('#selector_objetivo').val());
				
				$('#tabla').append(lineas);
				$('#selector_objetivo').val(0);	
			}
			else
			{
				$('#mensajes-error-tabla').html("<p><b>Ocurrieron los siguientes errores:</b><br> - El objetivo ya se había agregado previamente.</p>");
				$('#mensajes-error-tabla').fadeIn();			
				
			}		
		}
}

function eliminarObjetivo(id)
{
		$('#mensajes-error-tabla').html('');
		$('#mensajes-error-tabla').fadeOut();	
		

	var i = 0;
	idTabla.forEach(function(t) {
		if(t == id)
		{
			idTabla.splice(i, 1);
			tabla.splice(i+1, 1);
			datosGuardados.splice(i, 1);
			
		}
		i++;
	});
	
	i = 0;
	objetivosSeleccionados.forEach(function(objetivo) {
		if(objetivo.id == id)
		{
			objetivosSeleccionados.splice(i, 1);
		}
		i++;
	});
	
	rearmarTabla();
}

function rearmarTabla()
{
		$('#tabla').html('');
		tabla.forEach(function(t) {
			$('#tabla').append(t);
		});
}

function guardar() {
	$.ajax({
		async:true,
		type: "POST",
		url: "/site/controller/usuario-controller.php",
		data: $('#frm').serialize() + "&objetivos=" + JSON.stringify(datosGuardados),
		beforeSend:function(){
		},
		success:function(datos) {
			datos = datos.split("|");
			
			if (datos[0] == 'OK') {
				window.location = '/';
				
			} else {
				$('#error').html(datos[1]);
				location.hash = 'error';
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
