<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/mis-objetivos-view.php');
 
 $tienePermiso = (Utiles::obtenerUsuarioLogueado() == null ? false : true);
 
 if($tienePermiso)
 {
	$view = new mis_objetivos_view(); 
 }
 
 ?>

<div class="container-fluid">
	<?php if($tienePermiso){ ?>
	
	<div class="container">
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
								<input type="hidden" name="accion" id="accion" value="nuevo"/>
								<input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
							
								<div class="form-group row">
									<label class="col-sm-2 control-label">Objetivo/s *</label>
									<div class="col-md-10 row">
										<div class="col-sm-10">
											<select class="form-control" id="selector_objetivo" name="selector_objetivo">	
												<option value="0" selected disabled>Seleccione un objetivo...</option>																				
												<?php foreach($view->objetivos as $objetivo){ ?>
												<option value="<?php echo $objetivo->id; ?>"><?php echo $objetivo->nombre; ?></option>									
												<?php } ?>
											</select>
										</div>
										<div class="col-md-2">
											<button type="button" onclick="javascript:agregarObjetivo();" class="btn btn-animate btn-animate-side btn-success">
												<span><i class="icon fa fa-plus" aria-hidden="true"></i> Agregar</span>
											</button>									
										</div>
										<div class="col-md-12" style="margin-top:25px;">
											<!--TABLA-->
											<div id="mensajes-error-tabla"></div>												
											<table id="tabla"></table>
										</div>

									</div>

								</div>
									
									
									
								
								<div class="text-right">
									<button type="button" class="btn  btn-dark" onclick="volver();"><span><i class="fa fa-arrow-left"></i> Volver</span></button>
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


var objetivos = [];
var tabla = [];
var idTabla = [];
//var tiempoCheck = [];
var objetivosSeleccionados = [];

precargarObjetivos();

function precargarObjetivos()
{
	objetivos = <?php echo json_encode($view->objetivosUsuario); ?>;
	
	objetivos.forEach(function(objetivo) {
		objetivosSeleccionados.push(objetivo);
		var lineas = "<tr><th>" + objetivo.nombre + "</th><td class='text-right'><button onclick='javascript:eliminarObjetivo("+ objetivo.id + ");' type='button' class='btn btn-danger btn-sm mr5'><i class='fa fa-trash'></i> Eliminar</button></td></tr>";
		tabla.push(lineas);
		idTabla.push(objetivo.id);
		
		$('#tabla').append(lineas);						

	});
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
				objetivos.forEach(function(objetivo) {
					if(objetivo.id == $('#selector_objetivo').val())
					{
						objetivosSeleccionados.push(objetivo);
						lineas += "<tr><th>" + objetivo.nombre + "</th><td class='text-right'><button onclick='javascript:eliminarObjetivo("+ objetivo.id + ");' type='button' class='btn btn-danger btn-sm mr5'><i class='fa fa-trash'></i> Eliminar</button></td></tr>";
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
			tabla.splice(i, 1);
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


function volver()
{
	history.back();
}

function guardar() {
/*	$.ajax({
		async:true,
		type: "POST",
		url: "/site/controller/publicacion-controller.php",
		data: $('#frm').serialize() + "&imagenes=" + JSON.stringify(imagenes) + "&objetivos=" + JSON.stringify(objetivosSeleccionados),
		beforeSend:function(){
		},
		success:function(datos) {
			datos = datos.split("|");
			
			if (datos[0] == 'OK') {
				window.location = "/publicaciones/ver/" + datos[1];
				
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
	});*/
	
}

</script>
