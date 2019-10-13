<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/crear-publicacion-view.php');
 
 $tienePermiso = (Utiles::obtenerUsuarioLogueado() == null ? false : true);
 
 if($tienePermiso)
 {
	$view = new crear_publicacion_view($params); 
 }

 ?>

<div class="container-fluid">
	<?php if($tienePermiso){ ?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Nueva publicación</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
		
				<form class="form-horizontal" action="javascript:void(1);" id="frm">
					<div class="col-md-12">
						<div class="panel-body">
							<div id="mensajes-error">
							</div>
								<input type="hidden" name="accion" id="accion" value="nuevo"/>
								<input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
								<div class="form-group row">
									<label class="col-sm-2 control-label">Visualización *</label>
									<div class="col-sm-10">
										<select class="form-control" id="estado" name="estado">
											<option value="1" selected>Público</option>
											<option value="2" selected>Privado</option>
										</select>
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 control-label">Título *</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="titulo" name="titulo" value=""/>
									</div>
								</div>
								<hr>
								<div class="form-group">
									<input type="hidden" name="imagen-modificada" id="imagen-modificada" value="0" />
									<input type="hidden" id="imagenRecorte" name="imagenRecorte" value="0"/>
									<label class="col-sm-3 control-label">Imagen *<br><small>(hasta 1.5MB)</small></label>
									<div class="col-sm-9">
										<input id="fileupload" type="file" name="fileupload" class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div id="progress" class="col-sm-9 progress">
										<div class="progress-bar progress-bar-success" id="fileupload-progres"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">&nbsp;</label>
									<div class="col-sm-9">
										<table id="tabla-imagenes" class="table table-hover no-m">
											<tbody>
												
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

	<?php } else { ?>
		<div class="text-center">
			<h3 class="sub-title">Para crear una publicación, es necesario iniciar sesión.</h3><!-- /.sub-title -->
			<a href="/" class="btn">Ir a la home</a><!-- /.btn -->
		</div>
	<?php } ?>
</div>