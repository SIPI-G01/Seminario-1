<?php
include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/publicaciones-view.php');
$view = new publicaciones_view($params);

$titulo = '';
if($view->objetivo == null)
{
	$titulo = "Todas las publicaciones";

}
else
{
	$titulo = $view->objetivo->nombre;
}
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
	<div class="col-md-12">
		<h3><?php echo $titulo;?></h3>
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6">
				<p><?php echo $view->pags;?></p>
			</div>
				
			<div class="col-md-6 ordenar">
				<div class="row">
					<div class="col-md-6">
						<span>Ordenar por: </span>
					</div>					
					<div class="col-md-6">
						<select class="form-control" id="ordenar" onChange="reOrdenar();">
							<option value="0" selected>Fecha</option>
							<option value="1" <?php echo ($view->orden == '1' ? 'selected' : ''); ?> >Valoración</option>
						</select>					
					</div>					
			</div>
		</div>
	</div>
	
	<div class="row">
	<?php foreach($view->publicaciones as $publicacion){ ?>	
		<div class="col-12 mt-3">
			<div class="card">
				<div class="card-horizontal row">
					<div class="img-square-wrapper col-md-3">
						<a href="/publicaciones/ver/<?php echo $publicacion->alias; ?>"><img src="/archivos/recortes/<?php echo $publicacion->getImagenes()[0]->archivo;?>" alt="Card image cap"></a>
					</div>
					<div class="card-body col-md-9">
						<?php 
						$objetivos = '';
						foreach($publicacion->getObjetivos() as $objetivo){
							$tiemposObj = $objetivo->getObjetivo()->getTiempos();
							$tiempoTexto = '';
							foreach($tiemposObj as $tO)
							{
								foreach($publicacion->getTiempos() as $tiempo)
								{
									if($tiempo->id_tiempo == $tO->id)
									{
										$tiempoTexto .= " - " . $tO->tiempo;
									}
								}
							}
							
							$objetivos .= '[' . $objetivo->getObjetivo()->nombre . $tiempoTexto . '] ';
						}?>
						<a href="/publicaciones/ver/<?php echo $publicacion->alias; ?>"><h4 class="card-title"><?php echo $publicacion->titulo; ?> <?php echo $objetivos; ?></h4></a>
						<p class="card-text descripcion"><?php echo $publicacion->descripcion; ?></p>
					</div>
				</div>
				<div class="card-footer">
					<small class="text-muted">Creado por <?php echo $publicacion->getUsuario()->usuario; ?> el <?php echo date_format(date_create($publicacion->fecha),"d/m/Y"); ?> a las  <?php echo date_format(date_create($publicacion->fecha),"H:i"); ?></small>
				</div>
			</div>
		</div>
	<?php } ?>		
	</div>
</div>

<script>
function reOrdenar()
{
	var orden = $('#ordenar').val();
	var ordenFiltro = 'fecha';
	if(orden == 1)
	{
		ordenFiltro = 'valoracion';		
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



</script>