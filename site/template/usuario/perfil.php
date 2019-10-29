<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/perfil-view.php');
 $view = new perfil_view($params);
 $usuario = $view->usuario;
 ?>

<body>

  <!-- Navigation -->
  <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>-->

  <!-- Page Content -->
  <div class="container">

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
              <a href="#">
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
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
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
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
                <h5><?php echo $objetivo->getObjetivo()->nombre ?></h5>
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
                    <button id="eliminarPublicacion" style="margin-top:5px" onclick="" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar publicacion</button>
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
            $duracion = '';
            if($publicacion->categoria == 1){
              if($publicacion->tiempo != null)
              {
                $duracion .= ' (Duración: ' . $publicacion->tiempo . ' ' . $publicacion->getUnidadTiempo() . ')';
              }
        ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#">
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
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
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
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
               <p style="color:black" class="card-text" id="<?php echo 'desc-recetas'.$publicacion->id ?>">
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
                  <div class="row-center" style="text-align:center">
		                <button id="editarPublicacion" onClick="editarPublicacion('<?php echo $publicacion->alias; ?>')" class="btn btn-info"><i class="fa fa-pencil"></i> Editar publicación</button>
                    <button id="eliminarPublicacion" style="margin-top:5px" onclick="" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar publicacion</button>
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
              <a href="#">
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
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
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
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
                    <button id="eliminarPublicacion" style="margin-top:5px" onclick="" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar publicacion</button>
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

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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

function verMas(texto, id_publi)
{
  var elemento = document.getElementById("desc-"+id_publi);
  elemento.innerHTML = texto;
}

</script>