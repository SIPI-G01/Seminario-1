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
                    <h3 class="media-heading"><?php echo $usuario->nombre . " " . $usuario->apellido;?><small>USA</small></h3>
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
   <div class="carousel-inner">
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
 <?php
  echo '<h5 class="descPub">'.$publi->texto.'</h5>';
  ?>
  </div>
</div>
