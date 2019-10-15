<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->
<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/ver-view.php');
 $view = new ver_view($params);
 //$comentario = new comentario_view();
 $publi = $view->publi;
 //$coment = $comentario->coment;
 ?>

<div class="verContainer">
<?php
$objetivos = '';
foreach($publi->getObjetivos() as $objetivo){
  $tiemposObj = $objetivo->getObjetivo()->getTiempos();
  $tiempoTexto = '';
  foreach($tiemposObj as $tO)
  {
    foreach($publi->getTiempos() as $tiempo)
    {
      if($tiempo->id_tiempo == $tO->id)
      {
        $tiempoTexto .= " - " . $tO->tiempo;
      }
    }
  }
  $objetivos .= '[' . $objetivo->getObjetivo()->nombre . $tiempoTexto . '] ';
}
echo $publi->titulo . $objetivos;
?>
</div>

<div class="row" style="margin:0px 5px">
    <!--<div class="col-md-2" style="border: 5px solid black;">-->
    <!--ACA VAN LOS DATOS DEL USUARIO-->

<!--- Include the above in your HEAD tag ---------->
<div class="col-md-3" style="width: 15rem;">
<a href="#aboutModal" data-toggle="modal" data-target="#myModal"><img class="userImg" src="\archivos\avatar-set\boy.png" name="aboutme" width="80" height="80"></a>
  <div class="card-body" id="userCardBody">
    <h5 class="card-title" id="userCardTitle"><?php $usuario = $publi->getUsuario();
                            echo $usuario->nombre . " " . $usuario->apellido;?></h5>
    <em class="card-text" id="userCardText"><?php echo "Miembro desde el " . $usuario->creado_fecha;?></em><br><br>
    <a href="#aboutModal" data-toggle="modal" data-target="#myModal" class="btn btn-dark">Acerca de mi</a>
  </div>
</div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel"><?php echo $usuario->nombre . " " . $usuario->apellido;?></h4>
                    </div>
                <div class="modal-body">
                    <div style="text-align:center;">
                      <!--Cambiar foto por foto de usuario-->
                    <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRbezqZpEuwGSvitKy3wrwnth5kysKdRqBW54cAszm_wiutku3R" name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                    <h3 class="media-heading"><?php echo $usuario->nombre . " " . $usuario->apellido;?></h3>
                    <span><strong>Fecha de nacimiento: </strong></span><span class="label label-info"><?php echo $usuario->fecha_nacimiento;?></span><br>
                    <span><strong>Mail: </strong></span><span class="label label-info"><?php echo $usuario->mail;?></span>
                    </div>
                    <hr>
                </div>
                <div class="modal-footer">
                    <div style="text-align:center;">
                    <button type="button" class="button1" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--</div>-->


<div class="col-md-9">
  <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
   <ol class="carousel-indicators">
     <?php
     $i=0;
     foreach ($publi->getImagenes() as $imagen) {?>

     <li data-target="#carouselIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0 ? 'active' : ''); ?>"></li>
     <?php
     $i++;
      }?>   </ol>
   <div class="carousel-inner" style="padding-bottom:15px">
     <?php
     $i=0;
     foreach ($publi->getImagenes() as $imagen) {?>
       <div class="carousel-item  <?php echo ($i == 0 ? 'active' : ''); ?>">
         <img class="carousel-img" src="\archivos\recortes\<?php echo $imagen->archivo; ?>" class="d-block w-100" alt="Card image cap">
       </div>
     <?php
     $i++;
   }?>
   </div>
   <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
   </a>
   </div>
  </div>
  </div>

  <?php  $tienePermiso = (Utiles::obtenerUsuarioLogueado() == null ? false : true); ?>
  <?php if($tienePermiso){?>
  <div class="row">
  
    <div class="col-md-3" >
    </div>
    <div class="col-md-9">
      <button id="like" class="btn btn-success" onclick="likePub()">Like</button>
      <button id="dislike" class="btn btn-danger" onclick="dislikePub()">Dislike</button>
    </div>
  </div>
  <?php 
    } 
  ?>

  <div class="col-md-12" style="text-align:left; margin-top: 10px; border: 2px solid black; border-radius:10px">
    <?php
    echo '<h5>'.$publi->texto.'</h5>';
    ?>
  </div>

<?php  $tienePermiso = (Utiles::obtenerUsuarioLogueado() == null ? false : true); ?>
<?php if($tienePermiso){?>
  <div class="row">
    <div id="L" class="col-md-12">

    <h2 id="h2-cmmnt">SISTEMA DE COMENTARIOS <a href="/home">(SALIR)</a></h2>

    <form name="form1" method="post" action="">
      <label for="textarea"></label>
      <p id="p-cmmnt">
        <textarea name="comentario" cols="80" rows="5" id="textarea"><?php if(isset($_GET['user'])) { ?>@<?php echo $_GET['user']; ?><?php } ?> </textarea>
      </p>
      <p id="p-cmmnt">
        <input type="submit" <?php if (isset($_GET['id'])) { ?>name="reply"<?php } else { ?>name="comentar"<?php } ?>value="Comentar">
      </p>
    </form>

    <?php

      if (isset($_POST['comentar'])){

        

        /*$query = mysql_query("INSERT INTO publicacion_comentario (texto, id_usuario, fecha) value ('".$_POST['comentario']."', '".$SESSION['usuario-logueado']."', NOW())");
        
        if($query) {header ("Location: \site\template\publicaciones\ver.php");}
*/
      }
    ?>

    <br>

    <div id="container-comentarios">
      <ul id="comments">
      <?php
        $i=0;
        foreach ($publi->getComentarios() as $comentario) {
      ?>
        <li class="cmmnt">
          <div class="avatar">
            <img src="<?php echo($comentario->getUsuario()->imagen);  ?>" height="55" width="55">
          </div>

          <div class="cmmnt-content">
            <header>
              <a id="a-cmmnt"><?php echo($comentario->getusuario()->usuario); ?></a>
              <span class="pubdate"><?php echo $comentario->fecha; ?></span>
            </header>
            <p id="p-cmmnt"> 
              <?php echo $comentario->texto; ?>
            </p>
            <span>
              <button type="button" class="btn btn-info">Responder</button>
            </span>

            <?php
              $i++;
              }
            ?>
        </div>
        </li>
        </ul>
      </div>
  


   </div>

   </div>

   <?php 
    } 
  ?>

  </div>

<script>

  function likePub(){

    <?php 

      $item = new publicacion_like();

    ?>

  }

  function dislikePub(){

    alert("Funcion para sumar dislikes")

  }

</script>
