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
  $objetivos .= '[' . $objetivo->getObjetivo()->nombre . '] ';
}
$duracion = '';
if($publi->tiempo != null)
{
	$duracion .= ' (Duración: ' . $publi->tiempo . ' ' . $publi->getUnidadTiempo() . ')';
	
}
echo $publi->titulo . $objetivos . $duracion;
?>
</div>

<?php if(Utiles::obtenerIdUsuarioLogueado() ==  $publi->getUsuario()->id){ ?>
		<div class="row text-center">
		<button style="margin-left: 45%;" id="editarPublicacion" onClick="editarPublicacion('<?php echo $publi->alias; ?>')" class="btn btn-info"><i class="fa fa-pencil"></i> Editar publicación</button>
		</div>
<?php } ?>

<div class="row" style="margin:0px 5px">
    <!--<div class="col-md-2" style="border: 5px solid black;">-->
    <!--ACA VAN LOS DATOS DEL USUARIO-->

<!--- Include the above in your HEAD tag ---------->
<div class="col-md-3" style="width: 15rem;">
  <a href="\usuario\perfil\<?php echo $publi->getUsuario()->alias; ?>" ><img class="userImg" src="\archivos\avatar-set\<?php echo $publi->getUsuario()->archivo; ?>" name="aboutme" width="80" height="80"></a>
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
                    <img src="\archivos\avatar-set\<?php echo $usuario->archivo; ?>" name="aboutme" width="140" height="140" class="img-circle"></a>
                    <h3 class="media-heading"><?php echo $usuario->nombre . " " . $usuario->apellido;?></h3>
                    <span><strong>Fecha de nacimiento: </strong></span><span class="label label-info"><?php echo $usuario->fecha_nacimiento;?></span><br>
                    <span><strong>Mail: </strong></span><span class="label label-info"><?php echo $usuario->mail;?></span><br>
                    <span><strong>Objetivos del usuario</strong></span><br>
                    <?php
                    foreach($usuario->getObjetivos() as $objetivoUsuario){
                      ?>
                      <span class="label label-info"><?php echo $objetivoUsuario->nombre; ?></span><br>
                    <?php } ?>

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
  <div id="carouselIndicators_<?php echo $publi->id; ?>" class="carousel slide" data-ride="carousel">
   <ol class="carousel-indicators">
     <?php
     $i=0;
     foreach ($publi->getImagenes() as $imagen) { ?>

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
   <a class="carousel-control-prev" href="#carouselIndicators_<?php echo $publi->id; ?>" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#carouselIndicators_<?php echo $publi->id; ?>" role="button" data-slide="next">
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
      <span class="label label-success"><?php echo sizeof($publi->getLikes());?></span>

      <button id="like" class="btn btn-success btn-sm" onclick="likePub()" <?php $publi->votoLike();?>><i class="fas fa-thumbs-up"></i></button>
      <button id="dislike" class="btn btn-danger btn-sm" onclick="dislikePub()" <?php $publi->votoDisLike();?>><i class="fas fa-thumbs-down"></i></button>
            <span class="label label-warning"><?php echo sizeof($publi->getDislikes());?></span>
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

    <!--<h2 id="h2-cmmnt">SISTEMA DE COMENTARIOS</h2>-->

	<div class="row text-center">
		<div id="msj-error">

		</div>

		<form name="form1" id="frm"  style="margin-left: 23.5%;" action="javascript:void(1);">
		<input type="hidden" name="accion" id="accion" value="nuevo"/>
			<input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
		<input type="hidden" name="id_publicacion" id="id_publicacion" value="<?php echo $publi->id; ?>"/>

		  <label for="comentario"></label>
		  <p style="color:black;">
			<textarea name="comentario" cols="80" rows="5" id="comentario"><?php if(isset($_GET['user'])) { ?>@<?php echo $_GET['user']; ?><?php } ?> </textarea>
		  </p>
		  <p style="color:black">
			<input class="btn btn-warning btn-lg" type="submit" name="comentar" onClick="agregarComentario();" value="Comentar">
		  </p>
		</form>
  </div>
  <?php
    }
  ?>
    <br>
    <h2 class="text-center">Comentarios</h2>
    <?php
        $i=0;
        foreach ($publi->getComentarios() as $comentario) {

          if($comentario->reply==0){
    ?>

    <div class="container">


	<div class="card">
	    <div class="card-body" style="color:black">
	        <div class="row">
        	    <div class="col-md-2">
        	        <img src="/archivos/recortes/<?php echo($comentario->getUsuario()->imagen);  ?>" alt="" width="60" height="60" class="img img-rounded img-fluid"/>
        	        <p class="text-secondary text-center"><?php echo($comentario->fecha);  ?></p>
        	    </div>
        	    <div class="col-md-10">
        	        <p>
                      <a class="float-left" href="#"><strong><?php echo($comentario->getusuario()->usuario); ?></strong></a>
                      <!-- Valoracion del comentario
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                      <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>
        	            <span class="float-right"><i class="text-warning fa fa-star"></i></span>-->

        	       </p>
        	       <div class="clearfix"></div>
        	        <p style="color:black;text-align:left"><?php echo $comentario->texto; ?></p>
        	        <p>
        	            <button class="float-right btn btn-info ml-2" onclick="responder(<?php echo $comentario->id ?>);"> <i class="fa fa-reply"></i> Responder</button>
        	            <!--<button class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</button>-->
        	       </p>
        	    </div>
          </div>
          <div id="<?php echo 'div-resp'.$comentario->id; ?>" style="display:none">
            <form name="<?php echo 'form'.$comentario->id; ?>" id="<?php echo 'formResp'.$comentario->id; ?>"action="javascript:void(1);">
              <input type="hidden" name="accion" id="accion" value="nuevoResp"/>
              <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
              <input type="hidden" name="id_publicacion" id="id_publicacion" value="<?php echo $publi->id; ?>"/>

              <label for="<?php echo 'respuesta'.$comentario->id; ?>"></label>
				<p style="color:black;">
                  <textarea name="<?php echo 'respuesta'.$comentario->id; ?>" cols="60" rows="3" id="<?php echo 'respuesta'.$comentario->id; ?>" style="text-align:left"></textarea>
                </p>
                <p>
                  <input class="btn btn-warning btn-lg" type="submit" name="<?php echo 'responder'.$comentario->id; ?>" onclick="agregarRespuesta(<?php echo $comentario->id ?>);" value="Responder">
                </p>
            </form>
          </div>
          <!-- Esta parte corresponde a las respuestas del comentario -->
          <?php
            $j=0;
            foreach($publi->getRespuestas($comentario->id) as $respuesta){

              if($comentario->id == $respuesta->reply){
          ?>
	        	<div class="card card-inner">
            	    <div class="card-body">
            	        <div class="row">
                    	    <div class="col-md-2">
                    	        <img src="/archivos/recortes/<?php echo($respuesta->getUsuario()->imagen);  ?>" width="60" height="60" class="img img-rounded img-fluid"/>
                    	        <p class="text-secondary text-center"><?php echo($respuesta->fecha);  ?></p>
                    	    </div>
                    	    <div class="col-md-10 text-left respuestaComentario" style="color:black;">
                    	        <p><a href="#"><strong><?php echo($respuesta->getusuario()->usuario); ?></strong></a></p>
                    	        <p><?php echo $respuesta->texto; ?></p>
                    	        <p>
                    	            <!--<a class="float-right btn btn-info ml-2">  <i class="fa fa-reply"></i> Responder</a>
                    	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>-->
                    	       </p>
                    	    </div>
            	        </div>
            	    </div>
            </div>
            <?php
                }
              $j++;
              }
            ?>
	    </div>
	</div>
</div>
          <?php
                }
              $i++;
              }
            ?>



   </div>

   </div>

<script>

$(document).ready(function() {
      $('#comentario').summernote({
		  height: 150,
		  minHeight: null,
		  maxHeight: null,
		  focus: false
		});
  });

  function editarPublicacion(alias)
  {
	  window.location = '/publicaciones/editar/' + alias;
  }

  function agregarComentario()
  {
    $.ajax({
      async:true,
      type: "POST",
      url: "/site/controller/comentario-controller.php",
      data: $('#frm').serialize(),
      beforeSend:function(){
      },
      success:function(datos) {
        datos = datos.split("|");
        console.log(datos[1]);
        if (datos[0] == 'OK') {
         window.location.reload();

        } else {
          location.hash = '';
          $('#msj-error').html(datos[1]);
          location.hash = 'msj-error';
        }
        return true;
      },
      timeout:8000,
      error:function(){
        return false;
      }
    });
  }
  function responder(id){

    var x = document.getElementById('div-resp'+id);
    if (x.style.display === 'none') {
	  $('#respuesta' + id).summernote({
		  height: 150,
		  minHeight: null,
		  maxHeight: null,
		  focus: false
		});

      x.style.display = 'block';
    } else {
      x.style.display = 'none';
    }

  }

  function agregarRespuesta(id){

    $.ajax({
      async:true,
      type: "POST",
      url: "/site/controller/comentario-controller.php",
      data: $('#formResp' + id).serialize() + "&id_comentario=" + id,
      beforeSend:function(){
      },
      success:function(datos) {
        datos = datos.split("|");
        console.log(datos[1]);
        if (datos[0] == 'OK') {
         window.location.reload();

        } else {
          location.hash = '';
          $('#msj-error').html(datos[1]);
          location.hash = 'msj-error';
        }
        return true;
      },
      timeout:8000,
      error:function(){
        return false;
      }
    });

  }

function likePub(){

    $.ajax({
      async:true,
      type: "POST",
      url: "/site/controller/like-controller.php",
      data: "id_publicacion=" + <?php echo $publi->id; ?> + "&accion=like&token=" + <?php echo Utiles::obtenerToken(); ?>,
      beforeSend:function(){
      },
      success:function(datos) {
         window.location.reload();

        return true;
      },
      timeout:8000,
      error:function(){
        return false;
      }
    });
  }

  function dislikePub(){

    $.ajax({
      async:true,
      type: "POST",
      url: "/site/controller/like-controller.php",
      data: "id_publicacion=" + <?php echo $publi->id; ?> + "&accion=dislike&token=" + <?php echo Utiles::obtenerToken(); ?>,
      beforeSend:function(){
      },
      success:function(datos) {
         window.location.reload();

        return true;
      },
      timeout:8000,
      error:function(){
        return false;
      }
    });
  }
</script>
