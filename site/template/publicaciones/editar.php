<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/editar-publicacion-view.php');
 
 $tienePermiso = (Utiles::obtenerUsuarioLogueado() == null ? false : true);
 $mensajeError = 'Para editar una publicación, es necesario iniciar sesión.';
 
 
 if($tienePermiso)
 {
	$view = new editar_publicacion_view($params); 
	$objetivosNum = array();
	
	if($view->publicacion != null)
	{
		$objetivosNum = $view->publicacion->getObjetivos();	
	}
	else
	{
		$tienePermiso = false;
		$mensajeError = 'Página inexistente.';
		
	}
		
	$objetivosSeleccionados = array();
	
	foreach($objetivosNum as $obj)
	{
		$objetivo = $obj->getObjetivo();
		array_push($objetivosSeleccionados, $objetivo);
	}	
 }
 
 if($tienePermiso)
 {
	$tienePermiso = (Utiles::obtenerIdUsuarioLogueado() == $view->publicacion->id_usuario ? true : false);
	$mensajeError = 'No puede editar una publicación que no fue creada por usted.';

 }

 
 $propRecorte = "0";

 ?>

<div class="container-fluid">
	<?php if($tienePermiso){ ?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Editar publicación</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
		
				<form class="form-horizontal" action="javascript:void(1);" id="frm">
					<div class="col-md-12">
						<div class="panel-body">
							<div id="error">
							</div>
								<input type="hidden" name="accion" id="accion" value="editar"/>
								<input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
								<input type="hidden" name="id" id="id" value="<?php echo $view->publicacion->id; ?>"/>
								
								<div class="form-group row">
									<label class="col-sm-2 control-label">Visualización *</label>
									<div class="col-sm-10">
										<select class="form-control" id="estado" name="estado">
											<option value="1" <?php echo ($view->publicacion->estado == 1 ? 'selected' : ''); ?> >Público</option>
											<option value="2" <?php echo ($view->publicacion->estado == 2 ? 'selected' : ''); ?> >Borrador</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Tiempo que insume</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="tiempo" name="tiempo" value="<?php echo $view->publicacion->tiempo; ?>"/>
									</div>								
									<div class="col-sm-5">
										<select class="form-control" id="unidad_tiempo" name="unidad_tiempo">	
											<option value="1" selected >Minutos</option>
											<option value="2" <?php echo ($view->publicacion->unidad_tiempo == 2 ? 'selected' : ''); ?> >Horas</option>									
											<option value="3" <?php echo ($view->publicacion->unidad_tiempo == 3 ? 'selected' : ''); ?> >Dias</option>									
											<option value="4" <?php echo ($view->publicacion->unidad_tiempo == 4 ? 'selected' : ''); ?> >Semanas</option>									
											<option value="5" <?php echo ($view->publicacion->unidad_tiempo == 5 ? 'selected' : ''); ?> >Meses</option>																			
										</select>
									</div>
								</div>								
								<div class="form-group row">
									<label class="col-sm-2 control-label">Categoria *</label>
									<div class="col-sm-10">
										<select class="form-control" id="categoria" name="categoria" onChange="seleccionarObjetivos();">	
											<option value="0" selected disabled>Seleccione una categoría...</option>									
											<?php echo ($view->objetivosReceta != null ? '<option value="1" ' . ($view->publicacion->categoria == 1 ? 'selected' : '') . '>Recetas</option>': '');?>
											<?php echo ($view->objetivosActividadFisica != null ? '<option value="2" ' . ($view->publicacion->categoria == 2 ? 'selected' : '') . '>Actividad física</option>': '');?>
										</select>
									</div>
								</div>
								<div id="recetas" style="display: none;">
								
									<div class="form-group row">
										<label class="col-sm-2 control-label">Objetivo/s *</label>
										<div class="col-md-10 row">
											<div class="col-sm-12">
												<select class="form-control" id="selector_objetivo_receta" name="selector_objetivo_receta"  onChange="javascript:agregarObjetivo();">		
													<option value="0" selected disabled>Seleccione un objetivo...</option>																				
													<?php foreach($view->objetivosReceta as $objetivo){ ?>
													<option value="<?php echo $objetivo->id; ?>"><?php echo $objetivo->nombre; ?></option>									
													<?php } ?>
												</select>
											</div>
											<div class="col-md-12" style="margin-top:25px;">
												<!--TABLA-->
												<div id="mensajes-error-tabla-receta"></div>												
												<table id="tabla-receta"></table>
											</div>

										</div>

									</div>
									
									
									
								</div>
								<div id="actividad_fisica" style="display: none;">
								
									<div class="form-group row">
										<label class="col-sm-2 control-label">Objetivo/s *</label>
										<div class="col-md-10 row">
											<div class="col-sm-12">
												<select class="form-control" id="selector_objetivo_actividad" name="selector_objetivo_actividad"  onChange="javascript:agregarObjetivo();">		
													<option value="0" selected disabled>Seleccione un objetivo...</option>																				
													<?php foreach($view->objetivosActividadFisica as $objetivo){ ?>
													<option value="<?php echo $objetivo->id; ?>"><?php echo $objetivo->nombre; ?></option>									
													<?php } ?>
												</select>
											</div>
											<div class="col-md-12" style="margin-top:25px;">
												<!--TABLA-->
												<div id="mensajes-error-tabla-actividad"></div>																								
												<table id="tabla-actividad"></table>

											</div>
										</div>
									</div>


									

								</div>
								
								<hr>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Título *</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $view->publicacion->titulo; ?>"/>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Descripción *<br><small>(max. 400 caracteres)</small></label>
									<div class="col-sm-10">
										<textarea id="descripcion" name="descripcion" class="form-control" maxlength="400" rows="5"><?php echo $view->publicacion->descripcion; ?></textarea>
									</div>
								</div>								
								<div class="form-group row">
									<label class="col-sm-2 control-label">Contenido *</label>
									<div class="col-sm-10">
										<textarea id="texto" name="texto"><?php echo $view->publicacion->texto; ?></textarea>
									</div>
								</div>
								

								<hr>
								<div class="form-group">
									<input type="hidden" name="imagen-modificada" id="imagen-modificada" value="0" />
									<input type="hidden" id="imagenRecorte" name="imagenRecorte" value="0"/>
									<label class="col-sm-2 control-label">Imágenes <br><small>(hasta 1.5MB)</small><br><small>(máximo 5)</small></label>
									<div class="col-sm-10">
										<input id="fileupload" type="file" name="fileupload" class="form-control" />
									</div>
								</div>								
								<div class="form-group">
									<label class="col-sm-2 control-label">&nbsp;</label>
									<div id="progress" class="col-sm-9 progress">
										<div class="progress-bar progress-bar-success" id="fileupload-progres"></div>
									</div>
								</div>
								<div id="mensajes-error-imagenes"></div>												
								
								<div class="form-group">
									<label class="col-sm-2 control-label">&nbsp;</label>
									<div class="col-sm-10">
										<table id="tabla-imagenes" class="table table-hover no-m">
											<tbody>
												   <?php
														if ($view->publicacion->getImagenes() != null)
														{
															foreach($view->publicacion->getImagenes() as $img)
															{
																$ext = explode(".", $img->archivo);

																echo '
																<tr id="' . $ext[0] . '">
																	<td>
																		<img id="img-recorte" src="/archivos/recortes/' . $img->archivo . '" width="70px"/></td>
																	</td>
																	<td>
																		' . $img->imagen . '
																	</td>
																	<td>
																		<button onclick="javascript:recortar(\'' . $img->archivo . '\',\'archivos\',\'img-recorte\', ' . $propRecorte . ', \'imagenPrincipalRecorte\');" type="button" class="btn btn-info btn-sm mr5" title="Recortar foto"><i class="fa fa-scissors"></i> </button>
																		<button onclick="javascript:eliminarimg(\'' . $ext[0] . '\');" type="button" class="btn btn-danger btn-sm mr5" title="Ordenar"><i class="fa fa-trash"></i> </button>
																	</td>
																</tr>
																';															
															}
														}
                                                    ?>
											</tbody>
										</table>
									</div>
								</div>
								<hr>
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
	
	<!-- MODAL IMAGEN -->
	<div class="modal fade modal-primary" id = "myModalImagen" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 id="modal-titulo-imagen"></h4>
				</div>
				<div class="modal-body" id="modal-content-imagen" style="padding: 0; margin: 0;">
					<img style="margin: 0 auto;" class="img img-responsive" src="">
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- MODAL IMAGEN -->

	<!-- MODAL RECORTAR! -->
	<div class="modal fade bs-modal-sm" tabindex="-1" data-backdrop="static" role="dialog" aria-hidden="true" id="modal-crop">
			<div class="modal-dialog">
					<div class="modal-content" style="width: 300px; margin: 0 auto;" >
							<div class="modal-header">
									<button type="button" class="close" style="    margin-left: 0px;" data-dismiss="modal" aria-hidden="true">×</button>
									<button type='button' id='btnguardarcambios' disabled name='btnguardarcambios' onclick='GrabarMedidas();' value='' class='btnguardar_disabled btn btn-info'><i class="fa fa-save"></i> Guardar recorte</button>
							</div>
							<div class="modal-body" style="padding: 0;">
									<div id="recortar-imagen">
									</div>
							</div>                    
					</div>
			</div>
	</div>
	<!-- MODAL RECORTAR! -->


	<?php } else { ?>
		<div class="text-center">
			<h3 class="sub-title"><?php echo $mensajeError; ?></h3><!-- /.sub-title -->
			<a href="/" class="btn">Ir a la home</a><!-- /.btn -->
		</div>
	<?php } ?>
</div>
<script>

    $(document).ready(function() {
        $('#texto').summernote({
		  height: 300, 
		  minHeight: null,  
		  maxHeight: null,
		  focus: false 
		});
    });


var categoria = 0;
//var tiempos = [];
var objetivos = [];
var tabla = [];
var idTabla = [];
//var tiempoCheck = [];
var objetivosSeleccionados = [];

seleccionarObjetivos();
precargarObjetivosYTiempos();

function precargarObjetivosYTiempos()
{
	var objetivos = <?php echo json_encode($objetivosSeleccionados); ?>;
	//var tiempos = <?php //echo json_encode($view->publicacion->getTiempos()); ?>;
	
	objetivos.forEach(function(objetivo) {
		objetivosSeleccionados.push(objetivo);
		var lineas = "<tr><td style='font-weight: bold;'>" + objetivo.nombre + "</td><td class='text-right'><button onclick='javascript:eliminarObjetivo("+ objetivo.id + ");' type='button' class='btn btn-danger btn-sm mr5'><i class='fa fa-trash'></i> Eliminar</button></td></tr>";
		//var tiempos = traerTiempos(objetivo.id);
		/*if(tiempos != null)
		{
			lineas += "<tr><td>" + tiempos + "</td><td></td></tr>";
		}*/
		tabla.push(lineas);
		idTabla.push(objetivo.id);
		
		if($('#categoria').val() == 1)
		{
			$('#tabla-receta').append(lineas);						
		}
		else
		{
			$('#tabla-actividad').append(lineas);			
		}		
	});
	
	/*tiempos.forEach(function(t) {
		$('#tiempo_'+t.id_tiempo).prop('checked', true);
		tiempoCheck.push(t.id_tiempo);
	});*/
}

function seleccionarObjetivos()
{
	if($('#categoria').val() == 1)
	{
		categoria = 1;
		objetivos = <?php echo json_encode($view->objetivosReceta);?>;
		//tiempos = <?php //echo json_encode($view->tiemposReceta);?>;
		tabla = [];
		idTabla = [];		
		//tiempoCheck = [];	
		objetivosSeleccionados = [];
		$('#tabla-actividad').html('');
		$('#actividad_fisica').fadeOut();		
		$('#recetas').fadeIn();
		$('#mensajes-error-tabla-actividad').html('');
		$('#mensajes-error-tabla-actividad').fadeOut();	
		$('#selector_objetivo_actividad').val(0);	

	}
	else
	{
		categoria = 2;
		objetivos = <?php echo json_encode($view->objetivosActividadFisica);?>;	
		//tiempos = <?php //echo json_encode($view->tiemposActividadFisica);?>;
		tabla = [];
		idTabla = [];				
		//tiempoCheck = [];
		objetivosSeleccionados = [];
		$('#tabla-receta').html('');
		$('#recetas').fadeOut();		
		$('#actividad_fisica').fadeIn();
		$('#mensajes-error-tabla-receta').html('');
		$('#mensajes-error-tabla-receta').fadeOut();	
		$('#selector_objetivo_receta').val(0);	
		
		
	}
}


function agregarObjetivo()
{
	if($('#categoria').val() == 1)
	{
		//Recetas
		$('#mensajes-error-tabla-receta').html('');
		$('#mensajes-error-tabla-receta').fadeOut();	
		
		if($('#selector_objetivo_receta').val() == 0 || $('#selector_objetivo_receta').val() == null)
		{
			$('#mensajes-error-tabla-receta').html("<p><b>Ocurrieron los siguientes errores:</b><br> - Debe seleccionar un objetivo</p>");
			$('#mensajes-error-tabla-receta').fadeIn();			
		}
		else
		{
			var aparecio = false;
			objetivosSeleccionados.forEach(function(objetivo) {
				if(objetivo.id == $('#selector_objetivo_receta').val())
				{
					aparecio = true;
				}
			});
			
			if(aparecio == false)
			{
				var lineas = '';
				objetivos.forEach(function(objetivo) {
					if(objetivo.id == $('#selector_objetivo_receta').val())
					{
						objetivosSeleccionados.push(objetivo);
						lineas += "<tr><td style='font-weight: bold;'>" + objetivo.nombre + "</td><td class='text-right'><button onclick='javascript:eliminarObjetivo("+ objetivo.id + ");' type='button' class='btn btn-danger btn-sm mr5'><i class='fa fa-trash'></i> Eliminar</button></td></tr>";
						/*var tiempos = traerTiempos(objetivo.id);
						if(tiempos != null)
						{
							lineas += "<tr><td>" + tiempos + "</td><td></td></tr>";
						}*/
					}
				});
				
				tabla.push(lineas);
				idTabla.push($('#selector_objetivo_receta').val());
				
				$('#tabla-receta').append(lineas);
				$('#selector_objetivo_receta').val(0);	
			}
			else
			{
				$('#mensajes-error-tabla-receta').html("<p><b>Ocurrieron los siguientes errores:</b><br> - El objetivo ya se había agregado previamente.</p>");
				$('#mensajes-error-tabla-receta').fadeIn();			
				
			}		
		}
		
	}
	else
	{
		//Actividad Fisica
		$('#mensajes-error-tabla-actividad').html('');
		$('#mensajes-error-tabla-actividad').fadeOut();	
		if($('#selector_objetivo_actividad').val() == 0 || $('#selector_objetivo_actividad').val() == null)
		{
			$('#mensajes-error-tabla-actividad').html("<p><b>Ocurrieron los siguientes errores:</b><br> - Debe seleccionar un objetivo</p>");
			$('#mensajes-error-tabla-actividad').fadeIn();			
		}
		else
		{
			var aparecio = false;
			objetivosSeleccionados.forEach(function(objetivo) {
				if(objetivo.id == $('#selector_objetivo_actividad').val())
				{
					aparecio = true;
				}
			});
			
			if(aparecio == false)
			{
				var lineas = '';
				objetivos.forEach(function(objetivo) {
					if(objetivo.id == $('#selector_objetivo_actividad').val())
					{
						objetivosSeleccionados.push(objetivo);
						lineas += "<tr><td style='font-weight: bold;'>" + objetivo.nombre + "</td><td class='text-right'><button onclick='javascript:eliminarObjetivo("+ objetivo.id + ");' type='button' class='btn btn-danger btn-sm mr5'><i class='fa fa-trash'></i> Eliminar</button></td></tr>";
						/*var tiempos = traerTiempos(objetivo.id);
						if(tiempos != null)
						{
							lineas += "<tr><td>" + tiempos + "</td><td></td></tr>";
						}*/
					}
				});
				
				tabla.push(lineas);
				idTabla.push($('#selector_objetivo_actividad').val());
				
				$('#tabla-actividad').append(lineas);
				$('#selector_objetivo_actividad').val(0);	
			}
			else
			{
				$('#mensajes-error-tabla-actividad').html("<p><b>Ocurrieron los siguientes errores:</b><br> - El objetivo ya se había agregado previamente.</p>");
				$('#mensajes-error-tabla-actividad').fadeIn();			
				
			}		
		}
		
	}

}

/*var tiemposMostrar = [];

function traerTiempos(objetivo)
{
	tiemposMostrar = [];	
	var resultado = '<div class="col-md-12"><div class="row">';	
	var i = 0;
	var entro = false;
	tiempos.forEach(function(tiempo) {
		if(tiempo.id_objetivo == objetivo)
		{
			entro = true;
			tiemposMostrar[i] = tiempo;
			i++;
			resultado += '<div class="col-md-2"><input type="checkbox" id="tiempo_'+ tiempo.id +'" onClick="cambioCheck(' + tiempo.id + ');">' + tiempo.tiempo + '</input></div>';
		}
	});
	resultado += '</div></div>';
	if(entro == false)
	{
		resultado = null;
	}
	return resultado;	
	
}

function cambioCheck(idTiempo)
{
	var i = 0;
	var aparece = false;
	tiempoCheck.forEach(function(t) {
		if(t == idTiempo)
		{
			aparece = true;
			tiempoCheck.splice(i, 1);
		}
		i++;
	});
	
	if(aparece == false)
	{
		tiempoCheck.push(idTiempo);
	}
}*/

function eliminarObjetivo(id)
{
	if($('#categoria').val() == 1)
	{
		$('#mensajes-error-tabla-receta').html('');
		$('#mensajes-error-tabla-receta').fadeOut();	
		
	}
	else
	{
		$('#mensajes-error-tabla-actividad').html('');
		$('#mensajes-error-tabla-actividad').fadeOut();	
		
	}

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
	
	if($('#categoria').val() == 1)
	{
		$('#tabla-receta').html('');
		tabla.forEach(function(t) {
			$('#tabla-receta').append(t);
		});

	}
	else
	{
		$('#tabla-actividad').html('');
		tabla.forEach(function(t) {
			$('#tabla-actividad').append(t);
		});
		
	}
	

	/*tiempoCheck.forEach(function(t) {
		$('#tiempo_'+t).prop('checked', true);
	});*/


}


function volver()
{
	history.back();
}

function guardar() {
	// + "&tiempos=" + tiempoCheck
	$.ajax({
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
	});
	
}

</script>

    <!-- UPLOAD FOTO -->
    <script>
        var propRecorte = <?php echo $propRecorte; ?>;
        var imagenes = [];

       var jsonImagenes = '<?php echo json_encode($view->publicacion->getImagenes()); ?>';
       imagenes = JSON.parse(jsonImagenes);

        $(function () {
            'use strict';

            // Call the fileupload widget and set some parameter
            $('#fileupload').fileupload({
                url: '/site/utiles/upload/files.php?nombre_input=fileupload',
                dataType: 'json',
                done: function (e, data) {

                    $.ajax({
                        async:true,
                        type: "POST",
                        url: "/site/utiles/upload/obtener-foto.php",
                        data: 'foto=fileupload&repo=files&recorte=' + propRecorte,
                        beforeSend:function(xhr){
							$('#mensajes-error-imagenes').html('');
							$('#mensajes-error-imagenes').fadeOut();	

                            if(data.originalFiles[0].name.split('.')[1].toLowerCase() != 'png' && data.originalFiles[0].name.split('.')[1].toLowerCase() != 'jpg' && data.originalFiles[0].name.split('.')[1].toLowerCase() != 'jpeg' && data.originalFiles[0].name.split('.')[1].toLowerCase() != 'gif'){
								xhr.abort();
								$('#mensajes-error-imagenes').html("<p><b>Ocurrieron los siguientes errores:</b><br> - La imagen seleccionada no es de un tipo admitido.</p>");
								$('#mensajes-error-imagenes').fadeIn();	
                                $('#progress .progress-bar').css('width','0%');
                            }
							
                        },

                        success:function(datos) {

                            //$('#fileupload').attr('disabled', true);

                            var imagen = JSON.parse(datos);
                            imagen.orden=imagenes.length+1;
                            imagenes.push(imagen);
							
							if (imagenes.length > 0 && imagenes.length == 5) {
								$('#fileupload').attr('disabled', true);
							}

                            $('#imagen-modificada').val('1');

                            var linea = '<tr id="' + imagen.ref + '">';
                            linea += '<td><input type="hidden" name="recortegaleria-' + imagen.ref + '" id="recortegaleria-' + imagen.ref + '" value="0"> <img id="galeria-' + imagen.ref + '" src="/site/temp/recortes/' + imagen.namecode + '" width="70px" /></td>';
                            linea += '<td>' + imagen.name + '</td>';
                            linea += '<td><button onclick="javascript:recortar(\'' + imagen.namecode + '\',\'site/temp\',\'galeria-' + imagen.ref + '\', ' + propRecorte + ', \'recortegaleria-' + imagen.ref + '\');" type="button" class="btn btn-primary btn-sm mr5" title="Recortar foto"><i class="fa fa-scissors"></i> </button> ';
                            linea += ' <button onclick="javascript:eliminarimg(' + imagen.ref + ');" type="button" class="btn btn-danger btn-sm mr5" title="Quitar Imagen"><i class="fa fa-trash"></i> </button></td></tr>';


                            $("#tabla-imagenes tbody").append(linea);

                            $('#progress .progress-bar').css('width','0%');


                            return true;
                        },
                        timeout:8000,
                        error:function(){
								$('#mensajes-error-imagenes').html("<p><b>Ocurrieron los siguientes errores:</b><br> - Error al subir la imagen.</p>");
								$('#mensajes-error-imagenes').fadeIn();	
                            return false;
                        }
                    });

                },
                progressall: function (e, data) {
                    // Update the progress bar while files are being uploaded
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#fileupload-progres').css(
                        'width',
                        progress + '%'
                    );
                }
            });


        });


        function eliminarimg(ref) {
			$('#mensajes-error-imagenes').html("");
			$('#mensajes-error-imagenes').fadeOut();	

            $("#" + ref).remove();
            $("#" + ref + "-pie").remove();

            imagenes.forEach(
                function eliminar(imagen) {
                    if (imagen.ref == ref) {
                        if (imagen.id == 0 && imagen.place == 'temp') {
                            $.ajax({
                                async:true,
                                type: "POST",
                                url: "/site/utiles/upload/eliminar-upload.php",
                                data: "file=" + imagen.namecode + '&place=' + imagen.place,
                                beforeSend:function(){},
                                success:function(datos) {
                                    return true;

                                },
                                timeout:8000,
                                error:function(){
								$('#mensajes-error-imagenes').html("<p><b>Ocurrieron los siguientes errores:</b><br> - Error al eliminar la imagen.</p>");
								$('#mensajes-error-imagenes').fadeIn();	
                                    return false;
                                }
                            });
                        }

                        $('#imagen-modificada').val('1');
                        var pos = imagenes.indexOf(imagen);
                        imagenes.splice(pos, 1);
                        $('#fileupload').attr('disabled', false);
                    }
					else if(imagen.id == ref)
					{
                        $('#imagen-modificada').val('1');
                        var pos = imagenes.indexOf(imagen);
                        imagenes.splice(pos, 1);
                        $('#fileupload').attr('disabled', false);
						
					}
                }
            );

        }
		
		function recortar(img,ruta,input,recorte, change = ''){
		  if(typeof recorte == 'undefined' || recorte == 'undefined'){
			recorte = 1;
		  }

		  var vec = img.split('.');
		  URL = '/site/utilesRecortar/recortar.php?foto='+vec[0]+'&ext='+vec[1]+'&ruta='+ruta+'&input='+input+'&recorte='+recorte + '&change=' + change;

		  $("#recortar-imagen").load(URL);
		  $('#modal-crop').modal('show');
		  $('#btnguardarcambios').attr('disabled', 'disabled');
		}


    </script>
    <!-- UPLOAD FOTO -->