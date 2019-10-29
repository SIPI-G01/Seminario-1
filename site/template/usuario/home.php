<?php
 //include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/home-usuario-view.php');
 //$view = new home_usuario_view($params);
 $usuario = Utiles::obtenerUsuarioLogueado();
 ?>

<head>
  <title>Mi perfil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>



<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1><?php echo $usuario->nombre . ' ' . $usuario->apellido; ?></h1></div>
    	<!--<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>-->
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <?php if($usuario->archivo != null) { ?>
            <img src="\archivos\avatar-set\<?php echo $usuario->archivo;  ?>" class="avatar img-circle img-thumbnail" alt="avatar">
        <?php } else { ?>
            <img src="/site/images/faceless.jpg" alt="...">
        <?php } ?>
      </div><br>

               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
          </div>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Actividad <i class="fa fa-dashboard fa-1x"></i></li>
            <!--<li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>-->
            <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span><!-- Falta Dinamizar --></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Publicaciones</strong></span><!-- Falta Dinamizar --></li>
            <!--<li class="list-group-item text-right"><span class="pull-left"><strong>Seguidores</strong></span> 78</li>-->
          </ul> 
               
          <div class="panel panel-default">
            <div class="panel-heading">Redes Sociales</div>
            <div class="panel-body">
            	<i class="fab fa-facebook fa-2x"></i> <i class="fab fa-github fa-2x"></i> <i class="fab fa-twitter fa-2x"></i> <i class="fab fa-pinterest fa-2x"></i> <i class="fab fa-google-plus fa-2x"></i>
            </div>
          </div>
          
        </div><!--/col-3-->
    	<div class="col-sm-9"> 
            <ul class="nav nav-tabs" style="width:1000px;">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
                <li><a data-toggle="tab" href="#messages">Mis objetivos</a></li>
                <li><a data-toggle="tab" href="#settings">Mis publicaciones</a></li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" title="enter your mobile number if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Location</h4></label>
                              <input type="email" class="form-control" id="location" placeholder="somewhere" title="enter a location">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
               
                <iframe src="/usuario/objetivos" width="1000px" height="600px"></iframe>
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">
            		
                <iframe src="/usuario/perfil/<?php echo $usuario->alias; ?>" width="1000px" height="600px"></iframe>

             </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
                                                      