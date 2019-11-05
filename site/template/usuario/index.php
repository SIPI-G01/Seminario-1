<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/home-usuario-view.php');
 include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';
 include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/AvatarDao.php';
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
    
$link = $usuario->archivo;
$estiloAvatar = array ('', '');
$cabeza = array ('', '');
$accesorios = array ('', '');
$colorSombrero = array ('', '');
$colorPelo = array ('', '');
$barba = array ('', '');
$colorBarba = array ('', '');
$atuendo = array ('', '');
$colorAtuendo = array ('', '');
$estampa = array ('', '');
$ojos = array ('', '');
$cejas = array ('', '');
$boca = array ('', '');
$piel = array ('', '');
$componentesLink = explode("&",$link);
if(count($componentesLink) > 1)
{
	$estiloAvatar = explode("=",$componentesLink[0]);
	$cabeza = explode("=",$componentesLink[1]);
	$accesorios = explode("=",$componentesLink[2]);
	$colorSombrero = explode("=",$componentesLink[3]);
	$colorPelo = explode("=",$componentesLink[4]);
	$barba = explode("=",$componentesLink[5]);
	$colorBarba = explode("=",$componentesLink[6]);
	$atuendo = explode("=",$componentesLink[7]);
	$colorAtuendo = explode("=",$componentesLink[8]);
	$estampa = explode("=",$componentesLink[9]);
	$ojos = explode("=",$componentesLink[10]);
	$cejas = explode("=",$componentesLink[11]);
	$boca = explode("=",$componentesLink[12]);
	$piel = explode("=",$componentesLink[13]);
}

$estilosAv = AvatarDao::getXcomponente('estilo_avatar');
$compCab = AvatarDao::getXcomponente('cabeza');
$compAcc = AvatarDao::getXcomponente('accesorios');
$compColSom = AvatarDao::getXcomponente('colorSombrero');
$compColPelo = AvatarDao::getXcomponente('colorPelo');
$compBarba = AvatarDao::getXcomponente('barba');
$compColBarba = AvatarDao::getXcomponente('colorBarba');
$compAtu = AvatarDao::getXcomponente('atuendos');
$compColAtu = AvatarDao::getXcomponente('colorTela');
$compEst = AvatarDao::getXcomponente('estampa');
$compOjos = AvatarDao::getXcomponente('ojos');
$compCejas = AvatarDao::getXcomponente('cejas');
$compBoca = AvatarDao::getXcomponente('boca');
$compPiel = AvatarDao::getXcomponente('piel');

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
				<h3><center>¡Buscá una publicación ahora!</center></h3>
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
            <!--<div class="alert dark alert-alt alert-danger fade in">Esta en desarrollo. Funicona pero necesita arreglos</div>-->
                <br>
                <br>
                <br>
                <form class="form-horizontal" action="javascript:void(1);" method="post" id="frm-avatar">

                    <input type="hidden" name="accion" id="accion" value="generar-avatar"/>
                    <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
                 
					<div class="row form-group">
                        <div class="col-md-offset-3 col-sm-9">
							<img class="text-center" src="<?php echo $usuario->archivo ?>"  id="avatar-edicion" alt="avatar">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div id="alerta-cambios" class="col-md-9 alert dark alert-alt alert-success fade in text-center" style="display:none"><i class="glyphicon glyphicon-hourglass"></i> Hay cambios sin guardar...</div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="row form-group">
                        <label for="avatar-style" class="col-sm-3 control-label">Tipo de Avatar</label>
                        <div class="col-sm-9">
                            <label><input type="radio" id="avatar-style-circle" name="avatar-style" value="Circle" onClick="cambioAvatar('avatarStyle', 'Circle');" <?php echo ($estiloAvatar[1] == 'Circle' ? 'checked' : ''); ?>> Redondo</label> 
                            <label><input type="radio" id="avatar-style-transparent" name="avatar-style" value="Transparent" onClick="cambioAvatar('avatarStyle', 'Transparent');" <?php echo ($estiloAvatar[1] == 'Transparent' ? 'checked' : ''); ?>> Transparente</label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="topType" class="col-sm-3 control-label">Cabeza</label>
                        <div class="col-sm-9 text-center">
                            <select id="topType" name="topType" class="form-control"  onChange="cambioAvatar('topType', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('cabeza') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $cabeza[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="NoHair">SinPelo</option>
                                <option value="Eyepatch">Parche</option>
                                <option value="Hat">Sombrero</option>
                                <option value="Hijab">Hijab</option>
                                <option value="Turban">Turbante</option>
                                <option value="WinterHat1">GorroInvernal1</option>
                                <option value="WinterHat2">GorroInvernal2</option>
                                <option value="WinterHat3">GorroInvernal3</option>
                                <option value="WinterHat4">GorroInvernal4</option>
                                <option value="LongHairBigHair">PeloLargoVoluminoso</option>
                                <option value="LongHairBob">PeloLargoBob</option>
                                <option value="LongHairBun">Rodete</option>
                                <option value="LongHairCurly">PeloLargoEnrulado</option>
                                <option value="LongHairCurvy">PeloLargoOndas</option>
                                <option value="LongHairDreads">Rastas</option>
                                <option value="LongHairFrida">FridaKahlo</option>
                                <option value="LongHairFro">Afro</option>
                                <option value="LongHairFroBand">AfroVincha</option>
                                <option value="LongHairNotTooLong">PeloMediaMelena</option>
                                <option value="LongHairShavedSides">PeloLargoCostadosRapados</option>
                                <option value="LongHairMiaWallace">CorteMiaWallace</option>
                                <option value="LongHairStraight">PeloLargoLasio</option>
                                <option value="LongHairStraight2">PeloLargoLasio2</option>
                                <option value="LongHairStraightStrand">PeloLargoLasioMechones</option>
                                <option value="ShortHairDreads01">PeloCortoRastas1</option>
                                <option value="ShortHairDreads02">PeloCortoRastas1</option>
                                <option value="ShortHairFrizzle">PeloCortoEncrespado</option>
                                <option value="ShortHairShaggyMullet">CorteShaggyMullet</option>
                                <option value="ShortHairShortCurly">PeloCortoEnrulado</option>
                                <option value="ShortHairShortFlat">PeloCortoPlano</option>
                                <option value="ShortHairShortRound">PeloCortoRedondeado</option>
                                <option value="ShortHairShortWaved">PeloCortoOndulado</option>
                                <option value="ShortHairSides">PeloALosCostados</option>
                                <option value="ShortHairTheCaesar">CorteTheCaesar</option>
                                <option value="ShortHairTheCaesarSidePart">CorteTheCaesarConRaya</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group" id="accesorios">
                        <label for="accessoriesType" class="col-sm-3 control-label">↳ 👓 Accesorios</label>
                        <div class="col-sm-9">
                            <select id="accessoriesType" name="accessoriesType" class="form-control" onChange="cambioAvatar('accessoriesType', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('accesorios') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $accesorios[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="Blank">Vacio</option>
                                <option value="Kurt">LentesDeSolKurtCobain</option>
                                <option value="Prescription01">Anteojos01</option>
                                <option value="Prescription02">Anteojos02</option>
                                <option value="Round">AnteojosHarryPotter</option>
                                <option value="Sunglasses">LentesDeSol</option>
                                <option value="Wayfarers">LentesDeSolRayBan</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group" id="colorSombrero" style="display:none">
                        <label for="hatColor" class="col-sm-3 control-label">🎨 Color Sombrero</label>
                        <div class="col-sm-9">
                            <select id="hatColor" name="hatColor" class="form-control" onChange="cambioAvatar('hatColor', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('colorSombrero') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorSombrero[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="Black">Negro</option>
                                <option value="Blue01">Azul01</option>
                                <option value="Blue02">Azul02</option>
                                <option value="Blue03">Azul03</option>
                                <option value="Gray01">Gris01</option>
                                <option value="Gray02">Gris02</option>
                                <option value="Heather">Gris03</option>
                                <option value="PastelBlue">AzulPastel</option>
                                <option value="PastelGreen">VerdePastel</option>
                                <option value="PastelOrange">NaranjaPastel</option>
                                <option value="PastelRed">RojoPastel</option>
                                <option value="PastelYellow">AmarilloPastel</option>
                                <option value="Pink">Rosa</option>
                                <option value="Red">Rojo</option>
                                <option value="White">Blanco</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group" id="colorPelo">
                        <label for="hairColor" class="col-sm-3 control-label">↳ 💈 Color Pelo</label>
                        <div class="col-sm-9">
                            <select id="hairColor" name="hairColor" class="form-control" onChange="cambioAvatar('hairColor', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('colorPelo') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorPelo[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="Auburn">Bermejo</option>
                                <option value="Black">Negro</option>
                                <option value="Blonde">Rubio</option>
                                <option value="BlondeGolden">RubioDorado</option>
                                <option value="Brown">Castaño</option>
                                <option value="BrownDark">CastañoOscuro</option>
                                <option value="PastelPink">RosaPastel</option>
                                <option value="Platinum">Platinado</option>
                                <option value="Red">Rojo</option>
                                <option value="SilverGray">GrisPlata</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="facialHairType" class="col-sm-3 control-label">Barba</label>
                        <div class="col-sm-9">
                            <select id="facialHairType" name="facialHairType" class="form-control" onChange="cambioAvatar('facialHairType', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('barba') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $barba[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="Blank">Rasurado</option>
                                <option value="BeardMedium">BarbaMedia</option>
                                <option value="BeardLight">BarbaTenue</option>
                                <option value="BeardMagestic">BarbaMagestuosa</option>
                                <option value="MoustacheFancy">MostachoFrances</option>
                                <option value="MoustacheMagnum">MostachoMagnum</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group" id="colorBarba"> 
                        <label for="facialHairColor" class="col-sm-3 control-label">↳ ✂️ Color Barba</label>
                        <div class="col-sm-9">
                            <select id="facialHairColor" name="facialHairColor" class="form-control" onChange="cambioAvatar('facialHairColor', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('colorBarba') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorPelo[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="Auburn">Bermejo</option>
                                <option value="Black">Negro</option>
                                <option value="Blonde">Rubio</option>
                                <option value="BlondeGolden">RubioDorado</option>
                                <option value="Brown">Castaño</option>
                                <option value="BrownDark">CastañoOscuro</option>
                                <option value="Platinum">Platinado</option>
                                <option value="Red">Rojo</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="clotheType" class="col-sm-3 control-label">👔 Atuendos</label>
                        <div class="col-sm-9">
                            <select id="clotheType" name="clotheType" class="form-control"  onChange="cambioAvatar('clotheType', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('atuendos') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $atuendo[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="BlazerShirt">RemeraConSaco</option>
                                <option value="BlazerSweater">PuloverConSaco</option>
                                <option value="CollarSweater">PuloverConCuello</option>
                                <option value="GraphicShirt">RemeraEstampada</option>
                                <option value="Hoodie">Cangurito</option>
                                <option value="Overall">Enterito</option>
                                <option value="ShirtCrewNeck">RemeraCuelloRedondo</option>
                                <option value="ShirtScoopNeck">RemeraCuelloRedondoAbierto</option>
                                <option value="ShirtVNeck">RemeraCuelloEnV</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group" id="colorAtuendo">
                        <label for="clotheColor" class="col-sm-3 control-label">↳ 🎨 Color Atuendo</label>
                        <div class="col-sm-9">
                            <select id="clotheColor" name="clotheColor" class="form-control" onChange="cambioAvatar('clotheColor', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('colorTela') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorAtuendo[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="Black">Negro</option>
                                <option value="Blue01">Azul01</option>
                                <option value="Blue02">Azul02</option>
                                <option value="Blue03">Azul03</option>
                                <option value="Gray01">Gris01</option>
                                <option value="Gray02">Gris02</option>
                                <option value="Heather">Gris03</option>
                                <option value="PastelBlue">AzulPastel</option>
                                <option value="PastelGreen">VerdePastel</option>
                                <option value="PastelOrange">NaranjaPastel</option>
                                <option value="PastelRed">RojoPastel</option>
                                <option value="PastelYellow">AmarilloPastel</option>
                                <option value="Pink">Rosa</option>
                                <option value="Red">Rojo</option>
                                <option value="White">Blanco</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group" id="estampa" style="display:none">
                        <label for="graphicType" class="col-sm-3 control-label">↳ Estampa</label>
                        <div class="col-sm-9">
                            <select id="graphicType" name="graphicType" class="form-control" onChange="cambioAvatar('graphicType', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('estampa') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $estampa[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="Bat">Murciélago</option>
                                <option value="Cumbia">Cumbia</option>
                                <option value="Deer">Ciervo</option>
                                <option value="Diamond">Diamante</option>
                                <option value="Hola">Hola</option>
                                <option value="Pizza">Pizza</option>
                                <option value="Resist">Resist</option>
                                <option value="Selena">Selena</option>
                                <option value="Bear">Oso</option>
                                <option value="SkullOutline">Calavera1</option>
                                <option value="Skull">Calavera2</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="eyeType" class="col-sm-3 control-label">👁 Ojos</label>
                        <div class="col-sm-9">
                            <select id="eyeType" name="eyeType" class="form-control" onChange="cambioAvatar('eyeType', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('ojos') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $ojos[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="Close">Cerrados</option>
                                <option value="Cry">Llorando</option>
                                <option value="Default">PorDefecto</option>
                                <option value="Dizzy">EnCruz</option>
                                <option value="EyeRoll">RodarOjos</option>
                                <option value="Happy">Feliz</option>
                                <option value="Hearts">Corazones</option>
                                <option value="Side">Picaro</option>
                                <option value="Squint">Entrecerrados</option>
                                <option value="Surprised">Sorprendido</option>
                                <option value="Wink">Guiño1</option>
                                <option value="WinkWacky">Guiño2</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="eyebrowType" class="col-sm-3 control-label">✏️ Cejas</label>
                        <div class="col-sm-9">
                            <select id="eyebrowType" name="eyebrowType" class="form-control" onChange="cambioAvatar('eyebrowType', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('cejas') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $cejas[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="Angry">Enojado1</option>
                                <option value="AngryNatural">Enojado2</option>
                                <option value="Default">PorDefecto1</option>
                                <option value="DefaultNatural">PorDefecto2</option>
                                <option value="FlatNatural">Chatas</option>
                                <option value="RaisedExcited">Elevadas1</option>
                                <option value="RaisedExcitedNatural">Elevadas2</option>
                                <option value="SadConcerned">TristePreocupado1</option>
                                <option value="SadConcernedNatural">TristePreocupado2</option>
                                <option value="UnibrowNatural">Uniceja</option>
                                <option value="UpDown">UnaCejaElevada1</option>
                                <option value="UpDownNatural">UnaCejaElevada2</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="mouthType" class="col-sm-3 control-label">👄 Boca</label>
                        <div class="col-sm-9">
                            <select id="mouthType" name="mouthType" class="form-control" onChange="cambioAvatar('mouthType', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('boca') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $boca[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="Concerned">Preocupado</option>
                                <option value="Default">PorDefecto</option>
                                <option value="Disbelief">Boquiabierto</option>
                                <option value="Eating">Sonrojado</option>
                                <option value="Grimace">Mueca</option>
                                <option value="Sad">Triste</option>
                                <option value="ScreamOpen">Asustado</option>
                                <option value="Serious">Serio</option>
                                <option value="Smile">SonrisaDientes</option>
                                <option value="Tongue">Lengua</option>
                                <option value="Twinkle">Sonrisa</option>
                                <option value="Vomit">Vomito</option>-->
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="skinColor" class="col-sm-3 control-label">🎨 Piel</label>
                        <div class="col-sm-9">
                            <select id="skinColor" name="skinColor" class="form-control" onChange="cambioAvatar('skinColor', this.value);">
                                <?php 
                                    foreach(AvatarDao::getXcomponente('piel') as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $piel[1] ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php }; ?>
                                <!--<option value="Tanned">Bronceado</option>
                                <option value="Yellow">Amarillenta</option>
                                <option value="Pale">Palido</option>
                                <option value="Light">Claro</option>
                                <option value="Brown">Moreno</option>
                                <option value="DarkBrown">MorenoOscuro1</option>
                                <option value="Black">MorenoOscuro2</option>-->
                            </select>
                        </div>
                    </div>
                </form>
                <br>
                <button class="btn btn-lg btn-success" type="submit" onclick="generarAvatar();"><i class="glyphicon glyphicon-ok-sign"></i> Crear Avatar</button>
                <button class="btn btn-lg btn-danger" type="submit" onclick="descartarCambios();"><i class="glyphicon glyphicon-remove"></i>  Descartar Cambios</button>
                <button class="btn btn-lg btn-warning" type="submit" onclick="avatarRandom();"><i class="glyphicon glyphicon-random"></i> Avatar Random</button>
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

<?php 
    
    //echo "<script>";
    //echo "restriccionesPrecargado('topType', 'Eyepatch')";
    //echo "</script>";
?>
                              
<script>
restriccionesPrecargado('<?php echo $cabeza[0]; ?>','<?php echo $cabeza[1]; ?>');
restriccionesPrecargado('<?php echo $barba[0]; ?>','<?php echo $barba[1]; ?>');
restriccionesPrecargado('<?php echo $atuendo[0]; ?>','<?php echo $atuendo[1]; ?>');

function restriccionesPrecargado(tipo, valor)
{
    if(tipo == 'topType')
    {
        if(valor == 'Eyepatch')
        {
            var accesorios = document.getElementById("accesorios");
            accesorios.style.display = 'none';
        }else {
            var accesorios = document.getElementById("accesorios");
            accesorios.style.display = 'block';
        }
        if(valor == 'Hijab' || valor == 'Turban'|| valor == 'WinterHat1' || valor == 'WinterHat2' || valor == 'WinterHat3' || valor == 'WinterHat4')
        {
            var colorSombrero = document.getElementById("colorSombrero");
            colorSombrero.style.display = 'block';
        }else {
            var colorSombrero = document.getElementById("colorSombrero");
            colorSombrero.style.display = 'none';
        }
        if(valor == 'NoHair' || valor == 'Eyepatch' || valor == 'Hat' || valor == 'Hijab' || valor == 'Turban' || valor == 'WinterHat1' || valor == 'WinterHat2' || valor == 'WinterHat3' || valor == 'WinterHat4' || valor == 'LongHairFrida' || valor == 'LongHairShavedSides')
        {
            var colorPelo = document.getElementById("colorPelo");
            colorPelo.style.display = 'none';
        }else{
            var colorPelo = document.getElementById("colorPelo");
            colorPelo.style.display = 'block';
        }
    }
    if(tipo == 'facialHairType')
    {
        if(valor == 'Blank' )
        {
            var colorBarba = document.getElementById("colorBarba");
            colorBarba.style.display = 'none';
        }else {
            var colorBarba = document.getElementById("colorBarba");
            colorBarba.style.display = 'block';
        }
    }
    if(tipo == 'clotheType')
    {
        if(valor == 'BlazerShirt' || valor == 'BlazerSweater')
        {
            var colorAtuendo = document.getElementById("colorAtuendo");
            colorAtuendo.style.display = 'none';
        }else {
            var colorAtuendo = document.getElementById("colorAtuendo");
            colorAtuendo.style.display = 'block';
        }
        if(valor == 'GraphicShirt')
        {
            var estampa = document.getElementById("estampa");
            estampa.style.display = 'block';
        }else
        {
            var estampa = document.getElementById("estampa");
            estampa.style.display = 'none';
        }
    }
}

var linkAvatar = '<?php echo $usuario->imagen; ?>';
function cambioAvatar(tipo, valor)
{
    var alerta_cambios = document.getElementById("alerta-cambios");
    alerta_cambios.style.display = 'block';
    if(tipo == 'topType')
    {
        if(valor == 'Eyepatch')
        {
            var accesorios = document.getElementById("accesorios");
            accesorios.style.display = 'none';
        }else {
            var accesorios = document.getElementById("accesorios");
            accesorios.style.display = 'block';
        }
        if(valor == 'Hijab' || valor == 'Turban'|| valor == 'WinterHat1' || valor == 'WinterHat2' || valor == 'WinterHat3' || valor == 'WinterHat4')
        {
            var colorSombrero = document.getElementById("colorSombrero");
            colorSombrero.style.display = 'block';
        }else {
            var colorSombrero = document.getElementById("colorSombrero");
            colorSombrero.style.display = 'none';
        }
        if(valor == 'NoHair' || valor == 'Eyepatch' || valor == 'Hat' || valor == 'Hijab' || valor == 'Turban' || valor == 'WinterHat1' || valor == 'WinterHat2' || valor == 'WinterHat3' || valor == 'WinterHat4' || valor == 'LongHairFrida' || valor == 'LongHairShavedSides')
        {
            var colorPelo = document.getElementById("colorPelo");
            colorPelo.style.display = 'none';
        }else{
            var colorPelo = document.getElementById("colorPelo");
            colorPelo.style.display = 'block';
        }
    }
    if(tipo == 'facialHairType')
    {
        if(valor == 'Blank' )
        {
            var colorBarba = document.getElementById("colorBarba");
            colorBarba.style.display = 'none';
        }else {
            var colorBarba = document.getElementById("colorBarba");
            colorBarba.style.display = 'block';
        }
    }
    if(tipo == 'clotheType')
    {
        if(valor == 'BlazerShirt' || valor == 'BlazerSweater')
        {
            var colorAtuendo = document.getElementById("colorAtuendo");
            colorAtuendo.style.display = 'none';
        }else {
            var colorAtuendo = document.getElementById("colorAtuendo");
            colorAtuendo.style.display = 'block';
        }
        if(valor == 'GraphicShirt')
        {
            var estampa = document.getElementById("estampa");
            estampa.style.display = 'block';
        }else
        {
            var estampa = document.getElementById("estampa");
            estampa.style.display = 'none';
        }
    }
    

	var partesLink = linkAvatar.split(tipo);
	if(partesLink.length == 1)
	{
		var partesFinLink = partesLink[0].split('&');
		if(partesFinLink.lenght == 1)
		{
			linkAvatar = partesFinLink + "?" + tipo + "=" + valor;			
		}
		else
		{
			linkAvatar = partesLink[0] + "&" + tipo + "=" + valor;	
		}
	}
	else
	{
		var partesFinLink = partesLink[1].split('&');
		var finLink = '';
		var i = 0;
		partesFinLink.forEach(function(parte) {
		  
			if(i > 0)
			{
				finLink += '&' + parte;					
			}
			i++;
		});
		linkAvatar = partesLink[0] + tipo + "=" + valor + finLink;	
	}
	$("#avatar-edicion").attr("src", linkAvatar);	
}

function descartarCambios(){

    let link = '<?php echo $link; ?>';

    if('<?php echo $estiloAvatar[1]; ?>' == 'Circle'){
        $("#avatar-style-circle").prop("checked", true);
    }else {
        $("#avatar-style-transparent").prop("checked", true);
    }
    $('#topType').val('<?php echo $cabeza[1]; ?>');
    $('#accessoriesType').val('<?php echo $accesorios[1]; ?>');
    $('#hatColor').val('<?php echo $colorSombrero[1]; ?>');
    $('#hairColor').val('<?php echo $colorPelo[1]; ?>');
    $('#facialHairType').val('<?php echo $barba[1]; ?>');
    $('#facialHairColor').val('<?php echo $colorBarba[1]; ?>');
    $('#clotheType').val('<?php echo $atuendo[1]; ?>');
    $('#clotheColor').val('<?php echo $colorAtuendo[1]; ?>');
    $('#graphicType').val('<?php echo $estampa[1]; ?>');
    $('#eyeType').val('<?php echo $ojos[1]; ?>');
    $('#eyebrowType').val('<?php echo $cejas[1]; ?>');
    $('#mouthType').val('<?php echo $boca[1]; ?>');
    $('#skinColor').val('<?php echo $piel[1]; ?>');

    $("#avatar-edicion").attr("src", link);

}

function avatarRandom()
{

    var alerta_cambios = document.getElementById("alerta-cambios");
    alerta_cambios.style.display = 'block';

    var estilos = <?php echo json_encode($estilosAv); ?>;
    var estilo = estilos[Math.floor(Math.random() * estilos.length)].nombre_original

    var compCab = <?php echo json_encode($compCab); ?>;
    var cabeza = compCab[Math.floor(Math.random() * compCab.length)].nombre_original

    var compAcc = <?php echo json_encode($compAcc); ?>;
    var accesorio = compAcc[Math.floor(Math.random() * compAcc.length)].nombre_original

    var compColSom = <?php echo json_encode($compColSom); ?>;
    var colorSombrero = compColSom[Math.floor(Math.random() * compColSom.length)].nombre_original

    var compColPelo = <?php echo json_encode($compColPelo); ?>;
    var colorPelo = compColPelo[Math.floor(Math.random() * compColPelo.length)].nombre_original

    var compBarba = <?php echo json_encode($compBarba); ?>;
    var barba = compBarba[Math.floor(Math.random() * compBarba.length)].nombre_original

    var compColBarba = <?php echo json_encode($compColBarba); ?>;
    var colorBarba = compColBarba[Math.floor(Math.random() * compColBarba.length)].nombre_original

    var compAtu = <?php echo json_encode($compAtu); ?>;
    var atuendo = compAtu[Math.floor(Math.random() * compAtu.length)].nombre_original

    var compColAtu = <?php echo json_encode($compColAtu); ?>;
    var colorAtuendo = compColAtu[Math.floor(Math.random() * compColAtu.length)].nombre_original

    var compEst = <?php echo json_encode($compEst); ?>;
    var estampa = compEst[Math.floor(Math.random() * compEst.length)].nombre_original

    var compOjos = <?php echo json_encode($compOjos); ?>;
    var ojos = compOjos[Math.floor(Math.random() * compOjos.length)].nombre_original

    var compCejas = <?php echo json_encode($compCejas); ?>;
    var cejas = compCejas[Math.floor(Math.random() * compCejas.length)].nombre_original

    var compBoca = <?php echo json_encode($compBoca); ?>;
    var boca = compBoca[Math.floor(Math.random() * compBoca.length)].nombre_original

    var compPiel = <?php echo json_encode($compPiel); ?>;
    var piel = compPiel[Math.floor(Math.random() * compPiel.length)].nombre_original


    //$("input[name='avatar-style']:checked").val();
    if(estilo == 'Circle'){
        $("#avatar-style-circle").prop("checked", true);
    }else {
        $("#avatar-style-transparent").prop("checked", true);
    }
    $('#topType').val(cabeza);
    $('#accessoriesType').val(accesorio);
    $('#hatColor').val(colorSombrero);
    $('#hairColor').val(colorPelo);
    $('#facialHairType').val(barba);
    $('#facialHairColor').val(colorBarba);
    $('#clotheType').val(atuendo);
    $('#clotheColor').val(colorAtuendo);
    $('#graphicType').val(estampa);
    $('#eyeType').val(ojos);
    $('#eyebrowType').val(cejas);
    $('#mouthType').val(boca);
    $('#skinColor').val(piel);
    
    var link = 'https://avataaars.io/?avatarStyle='+ estilo +'&topType='+ cabeza +'&accessoriesType='+ accesorio +'&hatColor='+ colorSombrero +'&hairColor='+ colorPelo +'&facialHairType='+ barba +'&facialHairColor='+ colorBarba +'&clotheType='+ atuendo +'&clotheColor='+ colorAtuendo +'&graphicType='+ estampa +'&eyeType='+ ojos +'&eyebrowType='+ cejas +'&mouthType='+ boca +'&skinColor='+ piel; 
    $("#avatar-edicion").attr("src", link);

    restriccionesPrecargado('topType',cabeza);
    restriccionesPrecargado('facialHairType',barba);
    restriccionesPrecargado('clotheType',atuendo);	

}


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
				window.location = "/";
				
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

    var alerta_cambios = document.getElementById("alerta-cambios");
    alerta_cambios.style.display = 'none';

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
