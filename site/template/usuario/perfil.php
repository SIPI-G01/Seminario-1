<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/perfil-view.php');
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/utiles/Utiles.php');

 if(isset($usuario->alias))
 {
	$params = $usuario->alias;
 }
 
 $view = new perfil_view($params);
 $usuario = $view->usuario;
 ?>

<body>

  <!-- Page Content -->
  <div class="container" style="width: auto;">

      <!-- Jumbotron Header -->
      <?php if(Utiles::obtenerIdUsuarioLogueado() !=  $usuario->id){ ?>
      <header class="jumbotron my-4">
      <h1 class="display-3">¡Bienvenido al perfil de <?php echo $usuario->nombre;?> <?php echo $usuario->apellido; ?>!</h1>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
      </header>
      <?php } ?>

    <div class="row">

      <div class="col-lg-3">

      <?php if(Utiles::obtenerIdUsuarioLogueado() ==  $usuario->id){ ?>
        <h2 class="my-4">Mis Publicaciones</h2>
      <?php }
          else{ 
      ?>
        <h2 class="my-4">Publicaciones del Usuario</h2>
      <?php } ?>
        <div class="list-group">
          <p><strong>CATEGORIAS</strong></p>
          <button href="#" class="list-group-item" onclick="verRecetas();">Recetas</button>
          <button href="#" class="list-group-item" onclick="verActFis();">Actividades Fisicas</button>
          <button href="#" class="list-group-item" onclick="verAmbas();">Ambas</button>
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row" id="ambas">
        <?php 
          $publicaciones = $usuario->getPublicaciones();
          foreach($publicaciones as $publicacion){
            $duracion = '';
            if($publicacion->tiempo != null)
            {
              $duracion .= ' (Duración: ' . $publicacion->tiempo . ' ' . $publicacion->getUnidadTiempo() . ')';
            }
        ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
			  <?php if($publicacion->estado == 2){ ?>
				   <div class="ribbon"><span>BORRADOR</span></div>
			  <?php } ?>
              <a href="#">
                <div id="carouselExampleIndicators_<?php echo $publicacion->id; ?>" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <?php  
                        $i=0;
                        foreach($publicacion->getImagenes() as $imagen){
                      ?>
                      <li data-target="#carouselIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0 ? 'active' : ''); ?>"></li>
                      <?php
                        $i++;
                        }
                      ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
					  <?php  
                        $i=0;
                        foreach($publicacion->getImagenes() as $imagen){
                      ?>
                      <div class="carousel-item  <?php echo ($i == 0 ? 'active' : ''); ?>" style="width:253px; height:200px;">
                        <img class="d-block img-fluid" src="\archivos\recortes\<?php echo $imagen->archivo; ?>" alt="First slide" style="width:100%; height:100%">
                      </div>
                      <?php
                        $i++;
                        }
                      ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators_<?php echo $publicacion->id; ?>" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators_<?php echo $publicacion->id; ?>" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
              </a>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="/publicaciones/ver/<?php echo $publicacion->alias; ?>"><?php echo $publicacion->titulo . $duracion; ?></a>
                </h3>
                <?php 
                  foreach($publicacion->getObjetivos() as $objetivo){
                ?>
                <h5><?php //echo $objetivo->getObjetivo()->nombre ?></h5>
               <?php } ?>
                <p style="color:black" class="card-text" id="<?php echo 'desc-ambas'.$publicacion->id ?>">
                <?php 
                  if(strlen($publicacion->descripcion )>100)
                  {
                    $publicacion->descripcion = substr($publicacion->descripcion, 0, 100) . '... <a href="javascript:void(0)" onclick="verMas('."'".$publicacion->descripcion."'".', '."'".'ambas'.$publicacion->id."'".');">Ver mas</a>';
                  }
                  echo $publicacion->descripcion ;
                ?>
                </p>
              </div>
              <div class="card-footer">
                <small class="text-muted float-left"><i class="fas fa-thumbs-up"></i> Likes: <?php echo sizeof($publicacion->getLikes());?></small>
                <small class="text-muted float-right"><i class="fas fa-thumbs-down"></i> Dislikes: <?php echo sizeof($publicacion->getDislikes());?></small>
                <?php if(Utiles::obtenerIdUsuarioLogueado() ==  $usuario->id){ ?>
                  <div class="row-center" style="text-align:center;">
                    <button id="editarPublicacion" style="margin-top:10px;" onClick="editarPublicacion('<?php echo $publicacion->alias; ?>')" class="btn btn-info"><i class="fa fa-pencil"></i> Editar publicación</button>
                    <button id="eliminarPublicacion" style="margin-top:5px" onClick="eliminarPublicacion('<?php echo $publicacion->alias; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar publicacion</button>
		              </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <?php
            }
          ?>

        </div>
        <!-- /.row ambas -->
        
        
        <div class="row" id="recetas" style="display:none">
        <?php 
          $publicaciones = $usuario->getPublicaciones();
          foreach($publicaciones as $publicacion){
			if($publicacion->categoria == 1)
			{
				$duracion = '';
				if($publicacion->tiempo != null)
				{
				  $duracion .= ' (Duración: ' . $publicacion->tiempo . ' ' . $publicacion->getUnidadTiempo() . ')';
				}
		?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
			  <?php if($publicacion->estado == 2){ ?>
				   <div class="ribbon"><span>BORRADOR</span></div>
			  <?php } ?>
			
              <a href="#">
                <div id="carouselExampleIndicators_<?php echo $publicacion->id; ?>" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <?php  
                        $i=0;
                        foreach($publicacion->getImagenes() as $imagen){
                      ?>
                      <li data-target="#carouselIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0 ? 'active' : ''); ?>"></li>
                      <?php
                        $i++;
                        }
                      ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                      <?php  
                        $i=0;
                        foreach($publicacion->getImagenes() as $imagen){
                      ?>
                      <div class="carousel-item  <?php echo ($i == 0 ? 'active' : ''); ?>" style="width:253px; height:200px;">
                        <img class="d-block img-fluid" src="\archivos\recortes\<?php echo $imagen->archivo; ?>" alt="First slide" style="width:100%; height:100%">
                      </div>
                      <?php
                        $i++;
                        }
                      ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators_<?php echo $publicacion->id; ?>" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators_<?php echo $publicacion->id; ?>" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
              </a>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="/publicaciones/ver/<?php echo $publicacion->alias; ?>"><?php echo $publicacion->titulo . $duracion; ?></a>
                </h3>
                <?php 
                  foreach($publicacion->getObjetivos() as $objetivo){
                ?>
                <h5><?php //echo $objetivo->getObjetivo()->nombre ?></h5>
               <?php } ?>
                <p style="color:black" class="card-text" id="<?php echo 'desc-ambas'.$publicacion->id ?>">
                <?php 
                  if(strlen($publicacion->descripcion )>100)
                  {
                    $publicacion->descripcion = substr($publicacion->descripcion, 0, 100) . '... <a href="javascript:void(0)" onclick="verMas('."'".$publicacion->descripcion."'".', '."'".'recetas'.$publicacion->id."'".');">Ver mas</a>';
                  }
                  echo $publicacion->descripcion ;
                ?>
                </p>
              </div>
              <div class="card-footer">
                <small class="text-muted float-left"><i class="fas fa-thumbs-up"></i> Likes: <?php echo sizeof($publicacion->getLikes());?></small>
                <small class="text-muted float-right"><i class="fas fa-thumbs-down"></i> Dislikes: <?php echo sizeof($publicacion->getDislikes());?></small>
                <?php if(Utiles::obtenerIdUsuarioLogueado() ==  $usuario->id){ ?>
                  <div class="row-center" style="text-align:center;">
                    <button id="editarPublicacion" style="margin-top:10px;" onClick="editarPublicacion('<?php echo $publicacion->alias; ?>')" class="btn btn-info"><i class="fa fa-pencil"></i> Editar publicación</button>
                    <button id="eliminarPublicacion" style="margin-top:5px" onClick="eliminarPublicacion('<?php echo $publicacion->alias; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar publicacion</button>
		              </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <?php
			}
            }
          ?>

        </div>

        <!-- /.row recetas -->
        
        <div class="row" id="act-fis" style="display:none">
        <?php 
          $publicaciones = $usuario->getPublicaciones();
          foreach($publicaciones as $publicacion){
            $duracion = '';
            if($publicacion->categoria == 2){
              if($publicacion->tiempo != null)
              {
                $duracion .= ' (Duración: ' . $publicacion->tiempo . ' ' . $publicacion->getUnidadTiempo() . ')';
              }
        ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
			  <?php if($publicacion->estado == 2){ ?>
				   <div class="ribbon"><span>BORRADOR</span></div>
			  <?php } ?>
			
              <a href="#">
                <div id="carouselExampleIndicators_<?php echo $publicacion->id; ?>" class="carousel slide my-4" data-ride="carousel">
                      <ol class="carousel-indicators">
                      <?php  
                        $i=0;
                        foreach($publicacion->getImagenes() as $imagen){
                      ?>
                      <li data-target="#carouselIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0 ? 'active' : ''); ?>"></li>
                      <?php
                        $i++;
                        }
                      ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                      <?php  
                        $i=0;
                        foreach($publicacion->getImagenes() as $imagen){
                      ?>
                      <div class="carousel-item  <?php echo ($i == 0 ? 'active' : ''); ?>" style="width:253px; height:200px;">
                        <img class="d-block img-fluid" src="\archivos\recortes\<?php echo $imagen->archivo; ?>" alt="First slide" style="width:100%; height:100%">
                      </div>
                      <?php
                        $i++;
                        }
                      ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators_<?php echo $publicacion->id; ?>" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators_<?php echo $publicacion->id; ?>" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>
              </a>
              <div class="card-body">
                <h3 class="card-title">
                  <a href="#"><?php echo $publicacion->titulo . $duracion; ?></a>
                </h3>
                <?php 
                  foreach($publicacion->getObjetivos() as $objetivo){
                ?>
                <h5><?php echo $objetivo->getObjetivo()->nombre ?></h5>
               <?php } ?>
               <p style="color:black" class="card-text" id="<?php echo 'desc-act-fis'.$publicacion->id ?>">
                <?php 
                  if(strlen($publicacion->descripcion )>100)
                  {
                    $publicacion->descripcion = substr($publicacion->descripcion, 0, 100) . '... <a href="javascript:void(0)" onclick="verMas('."'".$publicacion->descripcion."'".', '."'".'act-fis'.$publicacion->id."'".');">Ver mas</a>';
                  }
                  echo $publicacion->descripcion ;
                ?>
                </p>
              </div>
              <div class="card-footer">
                <small class="text-muted float-left"><i class="fas fa-thumbs-up"></i> Likes: <?php echo sizeof($publicacion->getLikes());?></small>
                <small class="text-muted float-right"><i class="fas fa-thumbs-down"></i> Dislikes: <?php echo sizeof($publicacion->getDislikes());?></small>
                <?php if(Utiles::obtenerIdUsuarioLogueado() ==  $usuario->id){ ?>
                  <div class="row-center" style="text-align:center">
		                <button id="editarPublicacion" onClick="editarPublicacion('<?php echo $publicacion->alias; ?>')" class="btn btn-info"><i class="fa fa-pencil"></i> Editar publicación</button>
                    <button id="eliminarPublicacion" style="margin-top:5px"  onClick="eliminarPublicacion('<?php echo $publicacion->alias; ?>')" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar publicacion</button>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>

          <?php
            }
          }
          ?>

        </div>

        <!-- /.row actividades fisicas-->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

</body>


<script>

function verRecetas(){

  x = document.getElementById("ambas");
  if(x.style.display != 'none'){
    x.style.display = 'none';
  }
  else {
    x = document.getElementById("act-fis");
    x.style.display = 'none';
  }

  x = document.getElementById("recetas");
  x.style.display = 'block';

}

function verActFis(){

x = document.getElementById("ambas");
if(x.style.display != 'none'){
  x.style.display = 'none';
}
else {
  x = document.getElementById("recetas");
  x.style.display = 'none';
}

x = document.getElementById("act-fis");
x.style.display = 'block';

}

function verAmbas(){

x = document.getElementById("recetas");
if(x.style.display != 'none'){
  x.style.display = 'none';
}
else {
  x = document.getElementById("act-fis");
  x.style.display = 'none';
}

x = document.getElementById("ambas");
x.style.display = 'block';

}

function editarPublicacion(alias)
  {
	  window.location = '/publicaciones/editar/' + alias;
  }
function eliminarPublicacion(alias)
  {
		$.ajax({
		async:true,
		type: "POST",
		url: "/site/controller/publicacion-controller.php",
		data: "accion=eliminar&publicacion=" + alias + "&token=" + '<?php echo Utiles::obtenerToken(); ?>',
		beforeSend:function(){
		},
		success:function(datos) {
			
			window.location.reload();
			return true;
		},
		timeout:8000,
		error:function(){
			alert('Error. Intentelo mas tarde.');
			return false;
		}
	});

  }

function verMas(texto, id_publi)
{
  var elemento = document.getElementById("desc-"+id_publi);
  elemento.innerHTML = texto;
}

</script>