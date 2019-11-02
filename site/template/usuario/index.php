<?php
 //include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/home-usuario-view.php');
 include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';
 //$view = new home_usuario_view($params);
 $usuario = Utiles::obtenerUsuarioLogueado();
 ?>




<div class="container bootstrap snippet" style="width: auto;">
  		<div class="col-sm-12"><h1><?php echo $usuario->nombre . ' ' . $usuario->apellido; ?></h1></div>
    	<!--<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>-->
  		<div class="col-sm-12">
			<ul class="nav nav-tabs" style="margin-bottom: 20px;">
				<li class="active"><a data-toggle="tab" href="#inicio">Inicio</a></li>			
				<li><a data-toggle="tab" href="#data">Mis datos</a></li>
				<li><a data-toggle="tab" href="#password">Cambiar Contraseña</a></li>
				<li><a data-toggle="tab" href="#objetivos">Mis objetivos</a></li>
				<li><a data-toggle="tab" href="#publicaciones">Mis publicaciones</a></li>
				<li><a data-toggle="tab" href="#avatar">Editar Avatar</a></li>
				<li><a data-toggle="tab" href="#eliminar">Eliminar Mi Cuenta</a></li>
			</ul>
		
		</div>
		

		
		<div class="col-md-3"><!--left col-->
              

            <div class="text-center">
                <?php if($usuario->archivo != null) { ?>
                    <img src='https://avataaars.io/?avatarStyle=Circle&topType=NoHair&accessoriesType=Kurt&facialHairType=BeardMagestic&facialHairColor=BrownDark&clotheType=ShirtCrewNeck&clotheColor=Gray01&eyeType=WinkWacky&eyebrowType=RaisedExcited&mouthType=Sad&skinColor=DarkBrown'  alt="avatar">
                <?php } else { ?>
                    <img src="/site/images/faceless.jpg" alt="...">
                <?php } ?>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="mobile"><h4>Miembro desde</h4></label>
                        <input type="text" class="form-control" name="fecha_miembro" id="fecha_miembro" placeholder="Fecha de registro" title="Estas con nosotros desde esta fecha" value="<?php echo date_format(date_create($usuario->creado_fecha),'d/m/Y'); ?>" disabled >
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
                <li class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i></li>
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
                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span><?php echo $cantLikes ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Dislikes</strong></span><?php echo $cantDislikes ?></li>  
                <li class="list-group-item text-right"><span class="pull-left"><strong>Publicaciones</strong></span><?php echo $cantPubli ?></li>            <!--<li class="list-group-item text-right"><span class="pull-left"><strong>Seguidores</strong></span> 78</li>-->
            </ul> 
               
          <!--<div class="panel panel-default">
            <div class="panel-heading">Redes Sociales</div>
            <div class="panel-body">
            	<i class="fab fa-facebook fa-2x"></i> <i class="fab fa-github fa-2x"></i> <i class="fab fa-twitter fa-2x"></i> <i class="fab fa-pinterest fa-2x"></i> <i class="fab fa-google-plus fa-2x"></i>
            </div>
          </div>-->
          
        </div><!--/col-3-->
    	<div class="col-md-9"> 

          <div id="msj-error">

          </div>
          <div class="tab-content">
		    <div class="tab-pane active" id="inicio">

			<h1>PROXIMAMENTE.</h1>
			
            </div><!--/tab-pane-->

            <div class="tab-pane" id="data">
                <hr>
                  <form class="form" action="javascript:void(1);" method="post" id="frm-data">

                      <input type="hidden" name="accion" id="accion" value="editar-perfil"/>
                      <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nombre/s</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" title="Editar nombre" value="<?php echo $usuario->nombre ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Apellido/s</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" title="Editar apellido" value="<?php echo $usuario->apellido ?>">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="user_name"><h4>Nombre de usuario</h4></label>
                              <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Nombre de usuario" title="Editar nombre de usuario" value="<?php echo $usuario->usuario ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="Editar email" value="<?php echo $usuario->mail ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="fecha_nac"><h4>Fecha de nacimiento</h4></label>
                              <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" placeholder="Fecha de nacimiento" title="Editar fecha de nacimiento" value="<?php echo $usuario->fecha_nacimiento ?>">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit" onclick="guardarData();"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	    </form>
              
              
              
            </div><!--/tab-pane-->
            <div class="tab-pane" id="password">
               
                <hr>
                <form class="form" action="javascript:void(1);" method="post" id="frm-pass">

                    <input type="hidden" name="accion" id="accion" value="cambiar-password"/>
                    <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>

                    <div class="form-group">         
                        <div class="col-xs-6">
                            <label for="password"><h4>Contraseña</h4></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" title="Contraseña actual">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="password2"><h4>Nueva Contraseña</h4></label>
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Nueva Contraseña" title="Cambiar contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                            <button class="btn btn-lg btn-success" type="submit" onclick="guardarPass();"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                            <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                        </div>
                    </div>
                </form>
               
            </div><!--/tab-pane-->
            <div class="tab-pane" id="objetivos">
				<?php include $_SERVER['DOCUMENT_ROOT'] . '/site/template/usuario/objetivos.php';?>
                              
            </div><!--/tab-pane-->
            <div class="tab-pane" id="publicaciones">
            		
				<?php include $_SERVER['DOCUMENT_ROOT'] . '/site/template/usuario/perfil.php'; ?>
               
            </div><!--/tab-pane-->

            <div class="tab-pane" id="avatar">
            		
                <iframe src="https://getavataaars.com/?avatarStyle=Circle&topType=NoHair&accessoriesType=Kurt&facialHairType=Blank&facialHairColor=BrownDark&clotheType=ShirtCrewNeck&clotheColor=Gray01&eyeType=WinkWacky&eyebrowType=RaisedExcited&mouthType=Sad&skinColor=DarkBrown" width="100%" height="600px"></iframe>

             </div><!--/tab-pane-->

             <div class="tab-pane" id="eliminar">
               
               <hr>
               <form class="form" action="javascript:void(1);" method="post" id="frm-eliminar">

                   <input type="hidden" name="accion" id="accion" value="eliminar-cuenta"/>
                   <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>

                   <div class="form-group">         
                       <div class="col-xs-6">
                           <label for="password"><h4>Contraseña</h4></label>
                           <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" title="Contraseña actual">
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="col-xs-6">
                           <label for="password2"><h4>Repetir Contraseña</h4></label>
                           <input type="password" class="form-control" name="password2" id="password2" placeholder="Contraseña" title="Contraseña actual">
                       </div>
                   </div>
                   <div class="form-group">
                       <div class="col-xs-12">
                           <br>
                           <button class="btn btn-lg btn-danger" type="submit" onclick="eliminarCuenta();"><i class="glyphicon glyphicon-remove"></i> Eliminar</button>
                       </div>
                   </div>
               </form>
              
            </div><!--/tab pane-->

          </div><!--/tab-content-->

        </div><!--/col-9-->
</div>
                              
<script>

function guardarData() {

	$.ajax({
		async:true,
		type: "POST",
		url: "/site/controller/usuario-controller.php",
		data: $('#frm-data').serialize(),
		beforeSend:function(){
		},
		success:function(datos) {
			datos = datos.split("|");

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

function guardarPass() {

$.ajax({
    async:true,
    type: "POST",
    url: "/site/controller/usuario-controller.php",
    data: $('#frm-pass').serialize(),
    beforeSend:function(){
    },
    success:function(datos) {
        datos = datos.split("|");

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

function eliminarCuenta() {

$.ajax({
    async:true,
    type: "POST",
    url: "/site/controller/usuario-controller.php",
    data: $('#frm-eliminar').serialize(),
    beforeSend:function(){
    },
    success:function(datos) {
        datos = datos.split("|");

        if (datos[0] == 'OK') {
            window.location = "/home";
            
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

</script>