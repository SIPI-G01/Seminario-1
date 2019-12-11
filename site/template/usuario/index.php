<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/home-usuario-view.php');
 include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';
 $usuario = Utiles::obtenerUsuarioLogueado();
 $view_home = '';
	if($usuario == null)
	{
		echo '<script>window.location.href = "/"; </script>';
	}
	else
	{
		$view_home = new home_usuario_view();	
    }
 ?>




<div class="container bootstrap snippet" style="width: auto;">
    	<!--<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>-->
  		<!-- <div class="col-sm-12">
			<ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#inicio">Inicio</a></li> -->
				<!-- <li><a data-toggle="tab" href="#objetivos">Mis objetivos</a></li>
                <li><a data-toggle="tab" href="#publicaciones">Mis publicaciones</a></li>				 -->
                <!-- <li><a data-toggle="tab" href="#profile">Mi Perfil</a></li> -->
                <!-- <li class="nav-item dropdown" onmouseover="$('#listOp2').show();" onmouseout="$('#listOp2').hide();">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mi perfil</a>
                    <div class="dropdown-menu">
                    </div>
                </li> -->
                <!-- <li><a data-toggle="tab" href="#objetivos">Mis objetivos</a></li>
                <li><a data-toggle="tab" href="#publicaciones">Mis publicaciones</a></li> -->
			<!-- </ul>
			<ul id="listOp2" class="dropdown" style="display: none; margin-top: -10px; left: 38%; z-index: 999999; position: absolute;" onmouseover="$('#listOp2').show();" onmouseout="$('#listOp2').hide();">
					<li><a data-toggle="tab" href="#data">Mis datos</a></li>
					<li> <a data-toggle="tab" href="#password">Cambiar Contraseña</a></li>
					<li><a data-toggle="tab" href="#avatar">Editar Avatar</a></li>	
					<li><a data-toggle="tab" href="#eliminar">Eliminar Mi Cuenta</a></li>
			</ul>

		</div> -->
		

		
		<div class="col-md-3"><!--left col-->
              

            <div class="text-center">
                <?php if($usuario->archivo != null) { ?>
                    <img src="<?php echo $usuario->archivo ?>"  alt="avatar" heigth="50%" width="50%">
                <?php } else { ?>
                    <img src="/site/images/faceless.jpg" alt="...">
                <?php } ?>
                <div class="form-group">
                    <div class="col-md-12">
                        <label><h4><?php echo $usuario->usuario; ?></h4></label><br>					
                        <label for="mobile"><p>Miembro desde: <?php echo date_format(date_create($usuario->creado_fecha),'d/m/Y'); ?></p></label>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>

               
          <!--<div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>-->
          
          
            <ul class="list-group">
                <p class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i></li>
                <!--<li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>-->
                <?php 
                    
                    $cantLikes = 0;
                    $cantDislikes = 0;
                    $cantPubli= 0;
                    foreach ($usuario->getPublicaciones() as $publicacion){
                        $cantPubli ++;
                        $cantLikes += sizeof($publicacion->getLikes());
                        $cantDislikes += sizeof($publicacion->getDislikes());
                    }
                ?>
                <p class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span><?php echo $cantLikes ?></li>
                <p class="list-group-item text-right"><span class="pull-left"><strong>Dislikes</strong></span><?php echo $cantDislikes ?></li>  
                <p class="list-group-item text-right"><span class="pull-left"><strong>Publicaciones</strong></span><?php echo $cantPubli ?></li>            <!--<li class="list-group-item text-right"><span class="pull-left"><strong>Seguidores</strong></span> 78</li>-->
            </ul> 
          
        </div><!--/col-3-->
    	<div class="col-md-9"> 


          <div class="tab-content">
		    <div class="tab-pane active text-center" id="inicio">

                <h2>Hola, <?php echo $usuario->usuario ?>.</h2>
                <h3><center>¡Buscá una publicación ahora!</center></h3>
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
										<?php foreach($view_home->objetivosReceta as $objetivo){ ?>
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
										<?php foreach($view_home->objetivosActividad as $objetivo){ ?>
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
				<hr>
				<div class="text-center"><h3>O bien, podrías crear una nueva</h3><br>
					<button id="crearPublicacion" onClick="crearPublicacion()" class="btn btn-success"><i class="fa fa-pencil"></i> Crear publicación</button>
                </div>

			  <div class="publicaciones-recomendadas">

				<?php if (count($view_home->recomendados) > 0){ ?>
				 <h3 class="lines-effect">Publicaciones recientes</h3>
                <br>
				<?php } ?>
                <?php

                    foreach($view_home->recomendados as $pubTop){

                        $duracion = '';
                        if($pubTop->tiempo != null)
                        {
                            $duracion .= ' (Duración: ' . $pubTop->tiempo . ' ' . $pubTop->getUnidadTiempo() . ')';
                        }
                ?>
                <div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100">
					  <a href="/publicaciones/ver/<?php echo $pubTop->alias; ?>">
						<div id="carouselExampleIndicators_<?php echo $pubTop->id; ?>" class="carousel slide my-4" data-ride="carousel">
							<ol class="carousel-indicators">
							  <?php  
								$i=0;
								if($pubTop != null){
								foreach($pubTop->getImagenes() as $imagen){
							  ?>
							  <li data-target="#carouselIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0 ? 'active' : ''); ?>"></li>
							  <?php
								$i++;
									}
								}
							  ?>
							</ol>
							<div class="carousel-inner" role="listbox">
							  <?php  
								$i=0;
								if($pubTop !=null){
								foreach($pubTop->getImagenes() as $imagen){
							  ?>
							  <div class="carousel-item  <?php echo ($i == 0 ? 'active' : ''); ?>" style="width:253px; height:200px;">
								<img class="d-block img-fluid" src="\archivos\recortes\<?php echo $imagen->archivo; ?>" alt="First slide" style="width:100%; height:100%">
							  </div>
							  <?php
								$i++;
									}
								}
							  ?>
							</div>
							<a class="carousel-control-prev" href="#carouselExampleIndicators_<?php echo $pubTop->id; ?>" role="button" data-slide="prev">
							  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							  <span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleIndicators_<?php echo $pubTop->id; ?>" role="button" data-slide="next">
							  <span class="carousel-control-next-icon" aria-hidden="true"></span>
							  <span class="sr-only">Next</span>
							</a>
						</div>
					  </a>
					  <div class="card-body">
						<h3 class="card-title">
						  <a href="/publicaciones/ver/<?php echo $pubTop->alias; ?>"><?php echo $pubTop->titulo; ?></a>
						  <br>
						  <span><?php if($pubTop->tiempo != null){ ?><i class="far fa-clock"></i> <?php echo $pubTop->tiempo . ' ' . $pubTop->getUnidadTiempo(); ?><?php } ?></span>
						</h3>
						<?php 
							$objetivos = '';
							foreach($pubTop->getObjetivos() as $objetivo){			
								
								$objetivos .= '<span style="color:' . ($objetivo->getObjetivo()->color_texto != null ? $objetivo->getObjetivo()->color_texto : 'white') .'; background-color: ' . ($objetivo->getObjetivo()->color_fondo != null ? $objetivo->getObjetivo()->color_fondo : '#4da4da') .'; border-radius: 10px; padding: 2px; margin-top: 100px">' . $objetivo->getObjetivo()->nombre . '</span><br> ';
							}
						?>
						<?php echo $objetivos ?>
						<p style="color:black" class="card-text" id="<?php echo 'desc-ambas'.$pubTop->id ?>">
						<?php 
						  if(strlen($pubTop->descripcion )>100)
						  {
							$pubTop->descripcion = substr($pubTop->descripcion, 0, 100) . '... <a href="javascript:void(0)" onclick="verMas('."'".$pubTop->descripcion."'".', '."'".'ambas'.$pubTop->id."'".');">Ver mas</a>';
						  }
						  echo $pubTop->descripcion ;
						?>
						</p>
					  </div>
					  <div class="card-footer">
						<small class="text-muted float-left"><i class="fas fa-thumbs-up"></i> Likes: <?php echo sizeof($pubTop->getLikes());?></small>
						<small class="text-muted float-right"><i class="fas fa-thumbs-down"></i> Dislikes: <?php echo sizeof($pubTop->getDislikes());?></small>
						<?php if(Utiles::obtenerIdUsuarioLogueado() ==  $usuario->id){ ?>
						  <div class="row-center" style="text-align:center;">
							<button id="editarPublicacion" style="margin-top:10px;" onClick="editarPublicacion('<?php echo $pubTop->alias; ?>')" class="btn btn-info"><i class="fa fa-pencil"></i> Editar publicación</button>
							<button id="eliminarPublicacion" style="margin-top:5px" onClick="eliminarPublicacion('<?php echo $pubTop->alias; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar publicacion</button>
							  </div>
						<?php } ?>
					  </div>
					</div>
				  </div>

				  <?php
					}
				  ?>
				  </div>
				  <br>

               
                
            </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
</div>
                              


<script>

function crearPublicacion()
{
  window.location = '/publicaciones/crear';
}

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
		tiempos = <?php echo json_encode($view_home->tiemposReceta);?>;
		objetivos = <?php echo json_encode($view_home->objetivosReceta);?>;
		categoria = "receta";
	}
	else
	{
		$('#buscador-objetivos-actividad').fadeIn();
		$('#buscador-objetivos-receta').fadeOut();
		$('#tiempos-actividad').html('');
		$('#objetivos-actividad').val(0);
		tiempos = <?php echo json_encode($view_home->tiemposActividad);?>;
		objetivos = <?php echo json_encode($view_home->objetivosActividad);?>;
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
		resultado += '<div class="col-md-3"><strong>Tiempo que insume: </strong></div><div class="col-md-9">';
		tiempos.forEach(function(tiempo) {
			if(tiempo.id_objetivo == objetivo)
			{
				tiemposMostrar[i] = tiempo;
				i++;
				resultado += '<div class="col-md-3"><input type="checkbox" id="tiempo_'+ tiempo.id +'">' + tiempo.tiempo + '</input></div>';
			}
		});
		resultado += '</div></div></div></div>';
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
		resultado += '<div class="col-md-3"><strong>Tiempo que insume: </strong></div><div class="col-md-9">';		
		tiempos.forEach(function(tiempo) {
			if(tiempo.id_objetivo == objetivo)
			{
				tiemposMostrar[i] = tiempo;
				i++;
				resultado += '<div class="col-md-3"><input type="checkbox" id="tiempo_'+ tiempo.id +'">' + tiempo.tiempo + '</input></div>';
			}
		});
		resultado += '</div></div></div></div>';
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
