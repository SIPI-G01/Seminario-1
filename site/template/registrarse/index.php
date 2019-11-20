<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/registro-view.php');
 include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';
 $view = new registro_view();	
    
$estiloAvatar = array ('avatarStyle', 'Circle');
$cabeza = array ('topType', 'NoHair');
$accesorios = array ('accessoriesType', 'Blank');
$colorSombrero = array ('', '');
$colorPelo = array ('', '');
$barba = array ('facialHairType', 'Blanck');
$colorBarba = array ('facialHairColor', 'Auburn');
$atuendo = array ('clotheType', 'BlazerShirt');
$colorAtuendo = array ('', '');
$estampa = array ('', '');
$ojos = array ('eyeType', 'Close');
$cejas = array ('eyebrowType', 'Angry');
$boca = array ('mouthType', 'Concerned');
$piel = array ('skinColor', 'Tanned');

$estilosAv = $view->estilosAv;
$compCab = $view->compCab;
$compAcc = $view->compAcc;
$compColSom = $view->compColSom;
$compColPelo = $view->compColPelo;
$compBarba = $view->compBarba;
$compColBarba = $view->compColBarba;
$compAtu = $view->compAtu;
$compColAtu = $view->compColAtu;
$compEst = $view->compEst;
$compOjos = $view->compOjos;
$compCejas = $view->compCejas;
$compBoca = $view->compBoca;
$compPiel = $view->compPiel;

$avatarUsuario = 'https://avataaars.io/?avatarStyle=Circle&topType=NoHair&accessoriesType=Blank&facialHairType=Blanck&facialHairColor=Auburn&clotheType=BlazerShirt&eyeType=Close&eyebrowType=Angry&mouthType=Concerned&skinColor=Tanned';
$link = 'https://avataaars.io/?avatarStyle=Circle&topType=NoHair&accessoriesType=Blank&facialHairType=Blanck&facialHairColor=Auburn&clotheType=BlazerShirt&eyeType=Close&eyebrowType=Angry&mouthType=Concerned&skinColor=Tanned';

?>
<div class="container bootstrap snippet" style="width: auto;">
    	<!--<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>-->
  		<div class="col-sm-12">
			<ul class="nav nav-tabs" style="display: none;">
                <li class="active"><a data-toggle="tab" href="#data">Mis datos</a></li>
				<li><a data-toggle="tab" href="#avatar">Editar Avatar</a></li>					
				<li><a data-toggle="tab" href="#objetivos">Mis objetivos</a></li>
				<li><a data-toggle="tab" href="#fin">Fin</a></li>				
			</ul>

		</div>
		<h2 style="text-align: center;">Registro</h2>
    	<div class="col-md-12"> 

          <div id="msj-error">

          </div>

          <div id="avatar-generado" class="text-center">

          </div>
          <div class="tab-content">

            <div class="tab-pane active" id="data">
			       <div id="msj-error-data">

					</div>

                  <form class="form" action="javascript:void(1);" method="post" id="frm-data">

                      <input type="hidden" name="accion" id="accion" value="verificacion-datos-registro"/>
                      <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nombre/s</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nombre" title="Editar nombre" value="">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Apellido/s</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellido" title="Editar apellido" value="">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-12">
                              <label for="fecha_nac"><h4>Fecha de nacimiento</h4></label>
                              <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" placeholder="Fecha de nacimiento" title="Editar fecha de nacimiento" value="">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-12">
                              <label for="email"><h4>Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="mi@email.com" title="Editar email" value="">
                          </div>
                      </div>
        
                      <div class="form-group">
                          
                          <div class="col-xs-12">
                              <label for="user_name"><h4>Nombre de usuario</h4></label>
                              <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Nombre de usuario" title="Editar nombre de usuario" value="">
                          </div>
                      </div>
					  <div class="form-group">         
                        <div class="col-xs-6">
                            <label for="password"><h4>Contraseña</h4></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" title="Contraseña">
                        </div>
                    </div>
					<div class="form-group">         
                        <div class="col-xs-6">
                            <label for="password2"><h4>Repetir contraseña</h4></label>
                            <input type="password" class="form-control" name="password2" id="password2" placeholder="Contraseña" title="Contraseña">
                        </div>
                    </div>
                      <div class="form-group text-right">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-info" type="submit" onclick="guardarData();">Continuar</button>
                            </div>
                      </div>
              	    </form>
              
              
              
            </div><!--/tab-pane-->
            <div class="tab-pane text-center" id="avatar">
            <!--<div class="alert dark alert-alt alert-danger fade in">Esta en desarrollo. Funicona pero necesita arreglos</div>-->
                <br>
                <br>
                <br>
                <form class="form-horizontal" action="javascript:void(1);" method="post" id="frm-avatar">
			       <div id="msj-error-avatar">

					</div>

                    <input type="hidden" name="accion" id="accion" value="nuevo-avatar"/>
                    <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
                 
					<div class="row form-group">
                        <div class="col-md-offset-3 col-sm-9">
							<img class="text-center" src="<?php echo $avatarUsuario ?>"  id="avatar-edicion" alt="avatar">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                    </div>
                    <br>
                    <br>
                    <div class="row form-group text-center">
                        <div class="col-md-offset-3 col-sm-9">
							<button class="btn  btn-warning" type="submit" onclick="avatarRandom();"><i class="glyphicon glyphicon-random"></i> Avatar Random</button>
                        </div>                    
					</div>
                    <div class="row form-group">
                        <label for="avatar-style" class="col-sm-3 control-label">Tipo de Avatar</label>
                        <div class="col-sm-9">
                            <label><input type="radio" id="avatar-style-circle" name="avatar-style" value="Circle" onClick="cambioAvatar('avatarStyle', 'Circle');" <?php echo ($estiloAvatar[1] == 'Circle' || $estiloAvatar[1] == '' ? 'checked' : ''); ?>> Redondo</label> 
                            <label><input type="radio" id="avatar-style-transparent" name="avatar-style" value="Transparent" onClick="cambioAvatar('avatarStyle', 'Transparent');" <?php echo ($estiloAvatar[1] == 'Transparent' ? 'checked' : ''); ?>> Transparente</label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label for="topType" class="col-sm-3 control-label">Cabeza</label>
                        <div class="col-sm-9 text-center">
                            <select id="topType" name="topType" class="form-control"  onChange="cambioAvatar('topType', this.value);">
                                <?php 
									$i = 0;	
                                    foreach($view->compCab as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $cabeza[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;								
                                    foreach($view->compAcc as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $accesorios[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;	
                                    foreach($view->compColSom as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorSombrero[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;	
                                    foreach($view->compColPelo as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorPelo[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;	
                                    foreach($view->compBarba as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $barba[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;	
                                    foreach($view->compColBarba as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorPelo[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;	
                                    foreach($view->compAtu as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $atuendo[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;	
                                    foreach($view->compColAtu as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorAtuendo[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;	
                                    foreach($view->compEst as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $estampa[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;	
                                    foreach($view->compOjos as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $ojos[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;	
                                    foreach($view->compCejas as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $cejas[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;	
                                    foreach($view->compBoca as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $boca[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
									$i = 0;	
                                    foreach($view->compPiel as $componente){
                                ?>
                                <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $piel[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                <?php 
								$i++;
								}; ?>
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
					<div class="row form-group">
                        <div class="col-sm-offset-3 col-sm-9">
						   <div class="col-xs-6 text-left">
								<button class="btn  btn-info text-left" type="submit" onclick="atras1();"> Atras</button>
							</div>
						   <div class="col-xs-6 text-right">
								<button class="btn  btn-info text-right" type="submit" onclick="generarAvatar();"> Continuar</button>				
							</div>
                        </div>
                    </div>

                </form>

             </div><!--/tab-pane-->
            <div class="tab-pane" id="objetivos">
				<form class="form-horizontal" action="javascript:void(1);" id="frm-objetivos">
					<div class="col-md-12" style="margin-top: 20px;">
							<div id="error">
							</div>
								<input type="hidden" name="accion" id="accion" value="registrar"/>
								<input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
							
								<div class="form-group row">
									<label class="col-sm-2 control-label">Objetivo/s *</label>
									<div class="col-md-10 row">
										<div class="col-sm-10">
											<select class="form-control" id="selector_objetivo" name="selector_objetivo">	
												<option value="0" selected disabled>Seleccione un objetivo...</option>																				
												<?php foreach($view->objetivos as $objetivo){ ?>
												<option value="<?php echo $objetivo->id; ?>"><?php echo $objetivo->nombre; ?></option>									
												<?php } ?>
											</select>
										</div>
										<div class="col-md-2">
											<button type="button" onclick="javascript:agregarObjetivo();" class="btn btn-animate btn-animate-side btn-success">
												<span><i class="icon fa fa-plus" aria-hidden="true"></i> Agregar</span>
											</button>									
										</div>
										<div class="col-md-12" style="margin-top:25px;">
											<!--TABLA-->
											<div id="mensajes-error-tabla"></div>												
											<table id="tabla"></table>
										</div>

									</div>

								</div>
									
									
									
								<div class="row form-group">
									<div class="col-md-12">
									   <div class="col-xs-6 text-left">
											<button class="btn  btn-info text-left" type="submit" onclick="atras2();"> Atras</button>
										</div>
									   <div class="col-xs-6 text-right">
											<button class="btn  btn-info text-right" type="submit" onclick="guardar();"> Registrarme</button>				
										</div>
									</div>
								</div>
						</div>
				</form>
                              
            </div><!--/tab-pane-->
            <div class="tab-pane" id="fin">
                <h2 class="main-title">Usuario registrado</h2><!-- /.main-title -->
                <h3 class="sub-title">Le hemos enviado un mail para activar su cuenta.</h3><!-- /.sub-title -->
                <a href="/" class="btn">Ir a la home</a><!-- /.btn -->
            </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
</div>

<?php 
    
    //echo "<script>";
    //echo "restriccionesPrecargado('topType', 'Eyepatch')";
    //echo "</script>";
?>
                              
<script>

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
restriccionesPrecargado('<?php echo $cabeza[0]; ?>','<?php echo $cabeza[1]; ?>');
restriccionesPrecargado('<?php echo $barba[0]; ?>','<?php echo $barba[1]; ?>');
restriccionesPrecargado('<?php echo $atuendo[0]; ?>','<?php echo $atuendo[1]; ?>');

var linkAvatar = '<?php echo $avatarUsuario; ?>';
function cambioAvatar(tipo, valor)
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
    
	var partesLink = linkAvatar.split(tipo);
	if(partesLink.length == 1)
	{
		var partesFinLink = partesLink[0].split('&');
		var cantPartes = 0;
		partesFinLink.forEach(function(parte) {
			cantPartes++;
		});

		if(cantPartes == 1)
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

function avatarRandom()
{
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
	linkAvatar = link;   
   $("#avatar-edicion").attr("src", link);

    restriccionesPrecargado('topType',cabeza);
    restriccionesPrecargado('facialHairType',barba);
    restriccionesPrecargado('clotheType',atuendo);	

}
avatarRandom();


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
                $('[href="#avatar"]').click();
				
			} else {
        location.hash = '';
				$('#msj-error-data').html(datos[1]);
				location.hash = 'msj-error-data';
			}
			return true;
		},
		timeout:8000,
		error:function(){
			return false;
		}
	});
	
}

function atras1()
{
	$('[href="#data"]').click();
}
function atras2()
{
	$('[href="#avatar"]').click();
}

function generarAvatar(){

	console.log(linkAvatar);
    $.ajax({
    async:true,
    type: "POST",
    url: "/site/controller/usuario-controller.php",
    data: $('#frm-avatar').serialize(),
    beforeSend:function(){
    },
    success:function(datos) {
        datos = datos.split("|");
		console.log(datos);
        if (datos[0] == 'OK') {
			$('[href="#objetivos"]').click();
        } else {
            $('#msj-error-avatar').html(datos[1]);
            location.hash = 'msj-error-avatar';
        }
        return true;
    },
    timeout:8000,
    error:function(){
        return false;
    }
});

}




var objetivosListado = <?php echo json_encode($view->objetivos); ?>;
var tabla = [];
var idTabla = [];
var objetivosSeleccionados = [];
var datosGuardados = [];

function actualizarGuardarDatos(id, tipo)
{
	if(tipo == 1)
	{
		//Fecha inicio
		datosGuardados.forEach(function(dato) {
			if(dato.id == id)
			{
				dato.fecha_inicio = $('#fecha_inicio_' + id).val();
			}
		});
		
	}
	else if(tipo == 2)
	{
		//Fecha fin
		datosGuardados.forEach(function(dato) {
			if(dato.id == id)
			{
				dato.fecha_fin = $('#fecha_fin_' + id).val();
			}
		});		
	}
}

function precargarObjetivos()
{								
	tabla.push("<tr><th>Objetivo</th><th>Fecha de inicio</th><th>Fecha de finalización</th><th></th></tr>");
	$('#tabla').append("<tr><th class='text-center'>Objetivo</th><th class='text-center'>Fecha de inicio</th><th class='text-center'>Fecha de finalización</th><th></th></tr>");						
}

precargarObjetivos();

function agregarObjetivo()
{
	$('#mensajes-error-tabla').html('');
	$('#mensajes-error-tabla').fadeOut();	
	
	if($('#selector_objetivo').val() == 0 || $('#selector_objetivo').val() == null)
	{
		$('#mensajes-error-tabla').html("<p><b>Ocurrieron los siguientes errores:</b><br> - Debe seleccionar un objetivo</p>");
		$('#mensajes-error-tabla').fadeIn();			
	}
	else
	{
		var aparecio = false;
		objetivosSeleccionados.forEach(function(objetivo) {
			if(objetivo.id == $('#selector_objetivo').val())
			{
				aparecio = true;
			}
		});
		
		if(aparecio == false)
		{
			var lineas = '';
			objetivosListado.forEach(function(objetivo) {
				if(objetivo.id == $('#selector_objetivo').val())
				{
					datosGuardados.push({id: objetivo.id, nombre: objetivo.nombre, fecha_inicio: null, fecha_fin: null});
					objetivosSeleccionados.push(objetivo);
					lineas = "<tr><th class='text-center'>" + objetivo.nombre + "</th><td><input onchange='actualizarGuardarDatos(" + objetivo.id + ", 1)' type='date' name='fecha_inicio_"+ objetivo.id +"' id='fecha_inicio_"+ objetivo.id +"' value='" + objetivo.fecha_inicio + "'/></td><td><input onchange='actualizarGuardarDatos(" + objetivo.id + ", 2)' type='date' name='fecha_fin_"+ objetivo.id +"' id='fecha_fin_"+ objetivo.id +"' value='" + objetivo.fecha_fin + "'/></td><td class='text-right'><button onclick='javascript:eliminarObjetivo("+ objetivo.id + ");' type='button' class='btn btn-danger btn-sm mr5'><i class='fa fa-trash'></i> Eliminar</button></td></tr>";
				}
			});
			
			tabla.push(lineas);
			idTabla.push($('#selector_objetivo').val());
			console.log(lineas);
			$('#tabla').append(lineas);
			$('#selector_objetivo').val(0);	
		}
		else
		{
			$('#mensajes-error-tabla').html("<p><b>Ocurrieron los siguientes errores:</b><br> - El objetivo ya se había agregado previamente.</p>");
			$('#mensajes-error-tabla').fadeIn();			
			
		}		
	}
}

function eliminarObjetivo(id)
{
		$('#mensajes-error-tabla').html('');
		$('#mensajes-error-tabla').fadeOut();	
		

	var i = 0;
	idTabla.forEach(function(t) {
		if(t == id)
		{
			idTabla.splice(i, 1);
			tabla.splice(i+1, 1);
			datosGuardados.splice(i, 1);
			
		}
		i++;
	});
	
	i = 0;
	objetivosSeleccionados.forEach(function(objetivo) {
		if(objetivo.id == id)
		{
			objetivosSeleccionados.splice(i, 1);
		}
		i++;
	});
	
	rearmarTabla();
}

function rearmarTabla()
{
		$('#tabla').html('');
		tabla.forEach(function(t) {
			$('#tabla').append(t);
		});
}

function guardar() {
/*let timerInterval;
Swal.fire({
  title: 'Enviando mail',
  html: 'Recuerde chequear su mail para activar su cuenta.',
  timer: 8000,
  timerProgressBar: true,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      Swal.getContent().querySelector('b')
        .textContent = Swal.getTimerLeft()
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (
    result.dismiss === Swal.DismissReason.timer
  ) {
  }
})
*/

	$.ajax({
		async:true,
		type: "POST",
		url: "/site/controller/usuario-controller.php",
		data: $('#frm-objetivos').serialize() + "&objetivos=" + JSON.stringify(datosGuardados) + "&avatar=" + btoa(linkAvatar) + "&nombre=" + $('#first_name').val() + "&apellido=" + $('#last_name').val() + "&fecha_nacimiento=" + $('#fecha_nac').val() + "&usuario=" + $('#user_name').val() + "&email=" + $('#email').val() + "&password=" + $('#password').val(),
		beforeSend:function(){
		},
		success:function(datos) {
			datos = datos.split("|");
			if (datos[0] == 'OK') {
				$('[href="#fin"]').click();
			} else {
				$('#error').html(datos[1]);
				location.hash = 'error';
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