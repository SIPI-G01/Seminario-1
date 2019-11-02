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
                    <img src="<?php echo $usuario->archivo ?>"  alt="avatar">
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

          <div id="avatar-generado" class="text-center">

          </div>
          <div class="tab-content">
		    <div class="tab-pane active" id="inicio">

				<h2>Hola, <?php echo $usuario->usuario ?>.</h2>
				<h3><center>¡Buscá una pulicación ahora!</center></h3>
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

            <div class="tab-pane text-center" id="avatar">
            <div class="alert dark alert-alt alert-danger fade in">Esta en desarrollo. Funicona pero necesita arreglos</div>
                <br>
                <br>
                <br>
                <form class="form-horizontal" action="javascript:void(1);" method="post" id="frm-avatar">

                    <input type="hidden" name="accion" id="accion" value="generar-avatar"/>
                    <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>

                    <div class="row form-group">
                        <label for="avatar-style" class="col-sm-3 control-label">Avatar Style</label>
                        <div class="col-sm-9">
                            <label><input type="radio" id="avatar-style-circle" name="avatar-style" value="Circle"> Circle</label> 
                            <label><input type="radio" id="avatar-style-transparent" name="avatar-style" value="Transparent"> Transparent</label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="topType" class="col-sm-3 control-label">Top</label>
                        <div class="col-sm-9">
                            <select id="topType" name="topType" class="form-control">
                                <option value="NoHair">NoHair</option>
                                <option value="Eyepatch">Eyepatch</option>
                                <option value="Hat">Hat</option>
                                <option value="Hijab">Hijab</option>
                                <option value="Turban">Turban</option>
                                <option value="WinterHat1">WinterHat1</option>
                                <option value="WinterHat2">WinterHat2</option>
                                <option value="WinterHat3">WinterHat3</option>
                                <option value="WinterHat4">WinterHat4</option>
                                <option value="LongHairBigHair">LongHairBigHair</option>
                                <option value="LongHairBob">LongHairBob</option>
                                <option value="LongHairBun">LongHairBun</option>
                                <option value="LongHairCurly">LongHairCurly</option>
                                <option value="LongHairCurvy">LongHairCurvy</option>
                                <option value="LongHairDreads">LongHairDreads</option>
                                <option value="LongHairFrida">LongHairFrida</option>
                                <option value="LongHairFro">LongHairFro</option>
                                <option value="LongHairFroBand">LongHairFroBand</option>
                                <option value="LongHairNotTooLong">LongHairNotTooLong</option>
                                <option value="LongHairShavedSides">LongHairShavedSides</option>
                                <option value="LongHairMiaWallace">LongHairMiaWallace</option>
                                <option value="LongHairStraight">LongHairStraight</option>
                                <option value="LongHairStraight2">LongHairStraight2</option>
                                <option value="LongHairStraightStrand">LongHairStraightStrand</option>
                                <option value="ShortHairDreads01">ShortHairDreads01</option>
                                <option value="ShortHairDreads02">ShortHairDreads02</option>
                                <option value="ShortHairFrizzle">ShortHairFrizzle</option>
                                <option value="ShortHairShaggyMullet">ShortHairShaggyMullet</option>
                                <option value="ShortHairShortCurly">ShortHairShortCurly</option>
                                <option value="ShortHairShortFlat">ShortHairShortFlat</option>
                                <option value="ShortHairShortRound">ShortHairShortRound</option>
                                <option value="ShortHairShortWaved">ShortHairShortWaved</option>
                                <option value="ShortHairSides">ShortHairSides</option>
                                <option value="ShortHairTheCaesar">ShortHairTheCaesar</option>
                                <option value="ShortHairTheCaesarSidePart">ShortHairTheCaesarSidePart</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="accessoriesType" class="col-sm-3 control-label">↳ 👓 Accessories</label>
                        <div class="col-sm-9">
                            <select id="accessoriesType" name="accessoriesType" class="form-control">
                                <option value="Blank">Blank</option>
                                <option value="Kurt">Kurt</option>
                                <option value="Prescription01">Prescription01</option>
                                <option value="Prescription02">Prescription02</option>
                                <option value="Round">Round</option>
                                <option value="Sunglasses">Sunglasses</option>
                                <option value="Wayfarers">Wayfarers</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="hatColor" class="col-sm-3 control-label">🎨 HatColor</label>
                        <div class="col-sm-9">
                            <select id="hatColor" class="form-control">
                                <option value="Black">Black</option>
                                <option value="Blue01">Blue01</option>
                                <option value="Blue02">Blue02</option>
                                <option value="Blue03">Blue03</option>
                                <option value="Gray01">Gray01</option>
                                <option value="Gray02">Gray02</option>
                                <option value="Heather">Heather</option>
                                <option value="PastelBlue">PastelBlue</option>
                                <option value="PastelGreen">PastelGreen</option>
                                <option value="PastelOrange">PastelOrange</option>
                                <option value="PastelRed">PastelRed</option>
                                <option value="PastelYellow">PastelYellow</option>
                                <option value="Pink">Pink</option>
                                <option value="Red">Red</option>
                                <option value="White">White</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="hairColor" class="col-sm-3 control-label">↳ 💈 Hair Color</label>
                        <div class="col-sm-9">
                            <select id="hairColor" name="hairColor" class="form-control">
                                <option value="Auburn">Auburn</option>
                                <option value="Black">Black</option>
                                <option value="Blonde">Blonde</option>
                                <option value="BlondeGolden">BlondeGolden</option>
                                <option value="Brown">Brown</option>
                                <option value="BrownDark">BrownDark</option>
                                <option value="PastelPink">PastelPink</option>
                                <option value="Platinum">Platinum</option>
                                <option value="Red">Red</option>
                                <option value="SilverGray">SilverGray</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="facialHairType" class="col-sm-3 control-label">Facial Hair</label>
                        <div class="col-sm-9">
                            <select id="facialHairType" name="facialHairType" class="form-control">
                                <option value="Blank">Blank</option>
                                <option value="BeardMedium">BeardMedium</option>
                                <option value="BeardLight">BeardLight</option>
                                <option value="BeardMagestic">BeardMagestic</option>
                                <option value="MoustacheFancy">MoustacheFancy</option>
                                <option value="MoustacheMagnum">MoustacheMagnum</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="facialHairColor" class="col-sm-3 control-label">↳ ✂️ Facial Hair Color</label>
                        <div class="col-sm-9">
                            <select id="facialHairColor" name="facialHairColor" class="form-control">
                                <option value="Auburn">Auburn</option>
                                <option value="Black">Black</option>
                                <option value="Blonde">Blonde</option>
                                <option value="BlondeGolden">BlondeGolden</option>
                                <option value="Brown">Brown</option>
                                <option value="BrownDark">BrownDark</option>
                                <option value="Platinum">Platinum</option>
                                <option value="Red">Red</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="clotheType" class="col-sm-3 control-label">👔 Clothes</label>
                        <div class="col-sm-9">
                            <select id="clotheType" name="clotheType" class="form-control">
                                <option value="BlazerShirt">BlazerShirt</option>
                                <option value="BlazerSweater">BlazerSweater</option>
                                <option value="CollarSweater">CollarSweater</option>
                                <option value="GraphicShirt">GraphicShirt</option>
                                <option value="Hoodie">Hoodie</option>
                                <option value="Overall">Overall</option>
                                <option value="ShirtCrewNeck">ShirtCrewNeck</option>
                                <option value="ShirtScoopNeck">ShirtScoopNeck</option>
                                <option value="ShirtVNeck">ShirtVNeck</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="clotheColor" class="col-sm-3 control-label">↳ Color Fabric</label>
                        <div class="col-sm-9">
                            <select id="clotheColor" class="form-control">
                                <option value="Black">Black</option>
                                <option value="Blue01">Blue01</option>
                                <option value="Blue02">Blue02</option>
                                <option value="Blue03">Blue03</option>
                                <option value="Gray01">Gray01</option>
                                <option value="Gray02">Gray02</option>
                                <option value="Heather">Heather</option>
                                <option value="PastelBlue">PastelBlue</option>
                                <option value="PastelGreen">PastelGreen</option>
                                <option value="PastelOrange">PastelOrange</option>
                                <option value="PastelRed">PastelRed</option>
                                <option value="PastelYellow">PastelYellow</option>
                                <option value="Pink">Pink</option>
                                <option value="Red">Red</option>
                                <option value="White">White</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="eyeType" class="col-sm-3 control-label">👁 Eyes</label>
                        <div class="col-sm-9">
                            <select id="eyeType" name="eyeType" class="form-control">
                                <option value="Close">Close</option>
                                <option value="Cry">Cry</option>
                                <option value="Default">Default</option>
                                <option value="Dizzy">Dizzy</option>
                                <option value="EyeRoll">EyeRoll</option>
                                <option value="Happy">Happy</option>
                                <option value="Hearts">Hearts</option>
                                <option value="Side">Side</option>
                                <option value="Squint">Squint</option>
                                <option value="Surprised">Surprised</option>
                                <option value="Wink">Wink</option>
                                <option value="WinkWacky">WinkWacky</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="eyebrowType" class="col-sm-3 control-label">✏️ Eyebrow</label>
                        <div class="col-sm-9">
                            <select id="eyebrowType" name="eyebrowType" class="form-control">
                                <option value="Angry">Angry</option>
                                <option value="AngryNatural">AngryNatural</option>
                                <option value="Default">Default</option>
                                <option value="DefaultNatural">DefaultNatural</option>
                                <option value="FlatNatural">FlatNatural</option>
                                <option value="RaisedExcited">RaisedExcited</option>
                                <option value="RaisedExcitedNatural">RaisedExcitedNatural</option>
                                <option value="SadConcerned">SadConcerned</option>
                                <option value="SadConcernedNatural">SadConcernedNatural</option>
                                <option value="UnibrowNatural">UnibrowNatural</option>
                                <option value="UpDown">UpDown</option>
                                <option value="UpDownNatural">UpDownNatural</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="mouthType" class="col-sm-3 control-label">👄 Mouth</label>
                        <div class="col-sm-9">
                            <select id="mouthType" name="mouthType" class="form-control">
                                <option value="Concerned">Concerned</option>
                                <option value="Default">Default</option>
                                <option value="Disbelief">Disbelief</option>
                                <option value="Eating">Eating</option>
                                <option value="Grimace">Grimace</option>
                                <option value="Sad">Sad</option>
                                <option value="ScreamOpen">ScreamOpen</option>
                                <option value="Serious">Serious</option>
                                <option value="Smile">Smile</option>
                                <option value="Tongue">Tongue</option>
                                <option value="Twinkle">Twinkle</option>
                                <option value="Vomit">Vomit</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="skinColor" class="col-sm-3 control-label">🎨 Skin</label>
                        <div class="col-sm-9">
                            <select id="skinColor" name="skinColor" class="form-control">
                                <option value="Tanned">Tanned</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Pale">Pale</option>
                                <option value="Light">Light</option>
                                <option value="Brown">Brown</option>
                                <option value="DarkBrown">DarkBrown</option>
                                <option value="Black">Black</option>
                            </select>
                        </div>
                    </div>
                </form>
                <br>
                <button class="btn btn-lg btn-success" type="submit" onclick="generarAvatar();"><i class="glyphicon glyphicon-ok-sign"></i> Crear Avatar</button>
                <button class="btn btn-lg btn-warning" type="submit" onclick="generarAvatarRandom();"><i class="glyphicon glyphicon-random"></i> Avatar Random</button>
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

function generarAvatar(){

    $.ajax({
    async:true,
    type: "POST",
    url: "/site/controller/usuario-controller.php",
    data: $('#frm-avatar').serialize(),
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
            window.location.reload();
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
		tiempos.forEach(function(tiempo) {
			if(tiempo.id_objetivo == objetivo)
			{
				tiemposMostrar[i] = tiempo;
				i++;
				resultado += '<div class="col-md-2"><input type="checkbox" id="tiempo_'+ tiempo.id +'">' + tiempo.tiempo + '</input></div>';
			}
		});
		resultado += '</div></div>';
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
		tiempos.forEach(function(tiempo) {
			if(tiempo.id_objetivo == objetivo)
			{
				tiemposMostrar[i] = tiempo;
				i++;
				resultado += '<div class="col-md-2"><input type="checkbox" id="tiempo_'+ tiempo.id +'">' + tiempo.tiempo + '</input></div>';
			}
		});
		resultado += '</div></div>';
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
