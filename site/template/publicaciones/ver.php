<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->
<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/ver-view.php');
 $view = new ver_view($params);
 $publi = $view->publi;
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
  <div class="row">
   <div class="col-md-3" >
   </div>
   <div class="col-md-9">
      <button id="like" class="btn btn-success" onclick="alert('Te gusta esta publicacion')">Like</button>
      <button id="dislike" class="btn btn-danger" onclick="alert('No te gusta esta publicacion')">Dislike</button>
   </div>
  </div>  

  <div class="col-md-12" style="text-align:left; margin-top: 10px; border: 2px solid black; border-radius:10px">
    <?php
    echo '<h5>'.$publi->texto.'</h5>';
    ?>
  </div>

<!--<div id="L" class="col-md-12">

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

        $query = mysql_query("INSERT INTO publicacion_comentario (texto, id_usuario, fecha) value ('".$_POST['comentario']."', '".$SESSION['usuario-logueado']."', NOW())");
        
        if($query) {header ("Location: \site\template\publicaciones\ver.php");}

      }
    ?>

    <?php
      if (isset($_POST['reply'])){

        $query = mysql_query("INSERT INTO publicacion_comentario (texto, id_usuario, fecha, reply) value ('".$_POST['comentario']."', '".$SESSION['usuario-logueado']."', NOW()), '".$GET['usuario-logueado']."'");
        
        if($query) {header ("Location: \site\template\publicaciones\ver.php");}

      }
    ?>

    <br>

    <div id="container-comentarios">
      <ul id="comments">

      <?php

      /*$comentarios = mysql_query("SELECT * FROM publicacion_comentario WHERE reply = 0 ORDER BY id DESC");
      while($row = mysql_fetc_array($comentarios)){

        $usuario_c = mysql_query("SELECT * FROM usuario WHERE id = '".$row['usuario']."'");
        $user = mysql_fetc_array($usuario_c);

      } */ 
      ?>

        <li class="cmmnt">
          <div class="avatar">
            <img src="<?php /*echo $user['imagen']; */ ?>" alt="NOT IMAGE LOADED" height="55" width="55">
            <img src="\archivos\avatar-set\boy-1.png" alt="" height="55" width="55">
          </div>
          <div class="cmmnt-content">
            <header>
              <a id="a-cmmnt" href="#" class="userlink"><?php /*echo $user['usuario']; */ ?>Usuario 1</a> - <span class="pubdate"> 13/10/2019 17:24<?php /*echo $row['fecha'];*/ ?></span>
            </header>
            <p id="p-cmmnt">
            <?php /*echo $row['comentario']; */?>
            asdasdasdsadsadsadsadasdsadsadsadsadsad
            </p>
            <span>

            </span>
          </div>
        </li>




      </ul>


    </div>


   </div>-->

