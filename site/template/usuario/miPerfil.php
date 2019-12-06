<?php
    $usuario = Utiles::obtenerUsuarioLogueado();
?>

<div class="container">
<div class="row">
		<div class="col-md-3 ">
		     <div class="list-group ">
              <div class="active"><a href="#" class="list-group-item list-group-item-action active">Dashboard</a></div>
              <a href="#data" class="list-group-item list-group-item-action">Mis Datos</a>
              <a href="#password" class="list-group-item list-group-item-action">Cambiar Contraseña</a>
              <a href="#" class="list-group-item list-group-item-action">Editar Avatar</a>
              <a href="#" class="list-group-item list-group-item-action">Eliminar Cuenta</a>
              <!-- <a href="#" class="list-group-item list-group-item-action">Media</a>
              <a href="#" class="list-group-item list-group-item-action">Post</a>
              <a href="#" class="list-group-item list-group-item-action">Category</a>
              <a href="#" class="list-group-item list-group-item-action">New</a>
              <a href="#" class="list-group-item list-group-item-action">Comments</a>
              <a href="#" class="list-group-item list-group-item-action">Appearance</a>
              <a href="#" class="list-group-item list-group-item-action">Reports</a>
              <a href="#" class="list-group-item list-group-item-action">Settings</a> -->
              
              
            </div> 
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>Mi perfil</h4>
		                </div>
		            </div>
		            <div class="tab-pane" id="data">
                  <form class="form" action="javascript:void(1);" method="post" id="frm-data">

                      <input type="hidden" name="accion" id="accion" value="editar-perfil"/>
                      <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nombre/s</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nombre" title="Editar nombre" value="<?php echo $usuario->nombre ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Apellido/s</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido" title="Editar apellido" value="<?php echo $usuario->apellido ?>">
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
                              <input type="email" class="form-control" name="email" id="email" placeholder="mi@email.com" title="Editar email" value="<?php echo $usuario->mail ?>">
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
            <!-- <div class="tab-pane" id="password">
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
               
            </div>/tab-pane -->
		        </div>
		    </div>
		</div>
	</div>
</div>