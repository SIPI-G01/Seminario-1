<?php
include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/publicaciones-view.php');
$view = new publicaciones_view($params);

$titulo = '';
if($view->objetivo == null)
{
	$titulo = "Todas las publicaciones";

	if($view->categoria == 1)
	{
		$titulo = "Recetas: Todas las publicaciones";
		
	}
	else if($view->categoria == 2)
	{
		$titulo = "Actividades físicas: Todas las publicaciones";
		
	}
	else
	{
		$titulo = "Todas las publicaciones";
		
	}

}
else
{
	if($view->categoria == 1)
	{
		$titulo = "Recetas: " . $view->objetivo->nombre;
		
	}
	else if($view->categoria == 2)
	{
		$titulo = "Actividades físicas: " . $view->objetivo->nombre;
		
	}
	else
	{
		$titulo = $view->objetivo->nombre;
		
	}
}




?>

<div class= "container-fluid">

	<div class="col-md-12">
		<h3 class="titleObj" style="/*border:5px solid black;*/ text-align:center; color: white"><?php echo $titulo;?></h3>
	</div>
	<?php if(count($view->publicaciones) == 0)
	{
		?>
		<div class="col-md-12">
			<p>No hay publicaciones que cumplan con los filtros solicitados.</p>
		</div>
		<?php
	}else { ?>
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6" style="/*border:5px solid black;*/ text-align:left;">
					<p><?php echo $view->pags;?></p>
				</div>
					
				<div class="col-md-6 ordenar">
					<div class="row">
						<div class="col-md-6" style="text-align: right;">
							<span>Ordenar por: </span>
						</div>					
						<div class="col-md-6">
							<select class="form-control" id="ordenar" onChange="reOrdenar();">
								<option value="0" selected>Más recientes</option>
								<option value="2">Más antiguos</option>								
								<option value="1" <?php echo ($view->orden == '1' ? 'selected' : ''); ?> >Valoración</option>
							</select>					
						</div>					
					</div>
				</div>
			</div>
		</div>

		<div class="row publicaciones">
		<?php foreach($view->publicaciones as $publicacion){ ?>	
			<div class="col-12 mt-3">
				<div class="card">
					<div class="card-horizontal row">
						<div class="img-square-wrapper col-md-3">
							<a href="/publicaciones/ver/<?php echo $publicacion->alias; ?>">
								<?php if($publicacion->getImagenes() != null) {?>
									<img style="width: 300px; height: 180px;" src="/archivos/recortes/<?php echo $publicacion->getImagenes()[0]->archivo;?>" alt="Foto de la publicacion">
								<?php } else { ?>
									<img style="width: 300px; height: 180px;" src="/site/images/no-image.png" alt="Sin foto">								
								<?php } ?>
							</a>
						
						</div>
						<div class="card-body col-md-9">
							<?php 
							$objetivos = '';
							foreach($publicacion->getObjetivos() as $objetivo){							
								$objetivos .= '[' . $objetivo->getObjetivo()->nombre . '] ';
							}
							
							$duracion = '';
							if($publicacion->tiempo != null)
							{
								$duracion .= ' (Duración: ' . $publicacion->tiempo . ' ' . $publicacion->getUnidadTiempo() . ')';
								
							}
							
							?>
							<a href="/publicaciones/ver/<?php echo $publicacion->alias; ?>"><h4 class="card-title"><?php echo $publicacion->titulo; ?> <?php echo $objetivos; ?> <?php echo $duracion; ?> </h4></a>
							<p class="card-text descripcion"><?php echo $publicacion->descripcion; ?></p>
						</div>
					</div>
					<div class="card-footer">
						<small class="text-muted">Creado por <?php echo $publicacion->getUsuario()->usuario; ?> el <?php echo date_format(date_create($publicacion->fecha),"d/m/Y"); ?> a las  <?php echo date_format(date_create($publicacion->fecha),"H:i"); ?><?php echo ($publicacion->fecha_modificado != null ? '. Modificado por última vez el ' . date_format(date_create($publicacion->fecha_modificado),"d/m/Y") . ' a las ' . date_format(date_create($publicacion->fecha_modificado),"H:i") : '')?></small>
					</div>
				</div>
			</div>
		<?php } ?>	
		</div>
		
		<nav aria-label="Page navigation example" class="text-center">
		  <ul class="pagination justify-content-center">
			<li class="page-item <?php echo ($view->pagActual == 1 ? 'disabled' : ''); ?>">
			  <a class="page-link" href="#" tabindex="-1"  onClick="cambiarPagina('<?php echo $view->pagActual - 1; ?>')">Anterior</a>
			</li>
			<?php $i = 1;
			while($i <= $view->totPags){
			?>
			<li class="page-item <?php echo ($view->pagActual == $i ? 'active' : ''); ?>" onClick="cambiarPagina('<?php echo $i; ?>')" ><a class="page-link" href="#"><?php echo $i;?></a></li>
			<?php $i++;
			}
			?>
			<li class="page-item <?php echo ($view->pagActual == $view->totPags ? 'disabled' : ''); ?>">
			  <a class="page-link" href="#"  onClick="cambiarPagina('<?php echo $view->pagActual + 1; ?>')">Siguiente</a>
			</li>
		  </ul>
		</nav>

	<?php } ?>
</div>

<script>
function reOrdenar()
{
	var orden = $('#ordenar').val();
	var ordenFiltro = 'fecha-recientes';
	if(orden == 1)
	{
		ordenFiltro = 'valoracion';		
	}
	else if(orden == 2)
	{
		ordenFiltro = 'fecha-antiguos';		
		
	}
	
	
	var filtrosActuales = '<?php echo $params; ?>';
	var filtros = '';
	var res = filtrosActuales.split("_");
	var filtroAnterior = '';
	var aparecio = false;
	res.forEach(function(filtro) {
		if(filtroAnterior == 'orden')
		{
			aparecio = true;
			filtros += "_" + ordenFiltro;
		}
		else{
			if(filtroAnterior == '')
			{
				filtros += filtro;
			}
			else
			{
				filtros += "_" + filtro;
			}
			  
		}
		filtroAnterior = filtro;
	});
	
	if(aparecio == false)
	{
		if(filtros == '')
		{
			filtros += "orden_" + ordenFiltro;			
		}
		else
		{
			filtros += "_orden_" + ordenFiltro;
		}
		
	}	
	
	window.location.href = '/publicaciones/index/' + filtros;
}

function cambiarPagina(nuevaPag)
{
	
	var filtrosActuales = '<?php echo $params; ?>';
	var filtros = '';
	var res = filtrosActuales.split("_");
	var filtroAnterior = '';
	var aparecio = false;
	res.forEach(function(filtro) {
		if(filtroAnterior == 'pagina')
		{
			aparecio = true;
			filtros += "_" + nuevaPag;
		}
		else{
			if(filtroAnterior == '')
			{
				filtros += filtro;
			}
			else
			{
				filtros += "_" + filtro;
			}
			  
		}
		filtroAnterior = filtro;
	});
	
	if(aparecio == false)
	{
		if(filtros == '')
		{
			filtros += "pagina_" + nuevaPag;			
		}
		else
		{
			filtros += "_pagina_" + nuevaPag;
		}
		
	}	
	
	window.location.href = '/publicaciones/index/' + filtros;

	
}

</script>