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
    
$link = $usuario->archivo;
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
$estilosAv = $view_home->estilosAv;
$compCab = $view_home->compCab;
$compAcc = $view_home->compAcc;
$compColSom = $view_home->compColSom;
$compColPelo = $view_home->compColPelo;
$compBarba = $view_home->compBarba;
$compColBarba = $view_home->compColBarba;
$compAtu = $view_home->compAtu;
$compColAtu = $view_home->compColAtu;
$compEst = $view_home->compEst;
$compOjos = $view_home->compOjos;
$compCejas = $view_home->compCejas;
$compBoca = $view_home->compBoca;
$compPiel = $view_home->compPiel;

$avatarUsuario = 'https://avataaars.io/?avatarStyle=Circle&topType=NoHair&accessoriesType=Blank&facialHairType=Blanck&facialHairColor=Auburn&clotheType=BlazerShirt&eyeType=Close&eyebrowType=Angry&mouthType=Concerned&skinColor=Tanned';

if($usuario->archivo != null && $usuario->archivo != '')
{
	$avatarUsuario = $usuario->archivo;
}
 ?>

<br>
<br>
<br>
<div class="container">
    <div class="row">
		<div class="col-md-3">
		     <!-- <div class="list-group " id="list-tab" role="tablist">
                <a href="#data" class="list-group-item list-group-item-action">Mis Datos</a>
                <a href="#password" class="list-group-item list-group-item-action">Cambiar Contraseña</a>
                <a href="#" class="list-group-item list-group-item-action">Editar Avatar</a>
                <a href="#" class="list-group-item list-group-item-action">Eliminar Cuenta</a>
            </div>  -->
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-primary list-group-item-action active" id="list-data-list" data-toggle="list" href="#data" role="tab" aria-controls="mis-datos">Mis Datos</a>
                <a class="list-group-item list-group-item-primary list-group-item-action" id="list-password-list" data-toggle="list" href="#password" role="tab" aria-controls="cambiar-contrasena">Cambiar Contraseña</a>
                <a class="list-group-item list-group-item-primary list-group-item-action" id="list-avatar-list" data-toggle="list" href="#avatar" role="tab" aria-controls="editar-avatar">Editar Avatar</a>
                <a class="list-group-item list-group-item-primary list-group-item-action" id="list-eliminar-list" data-toggle="list" href="#eliminar" role="tab" aria-controls="eliminar-cuenta">Eliminar Cuenta</a>
            </div>
            
		</div>
		<div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
                        <div id="msj-error">

                        </div>

                        <div id="avatar-generado" class="text-center">

                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane active" id="data" role="tabpanel" aria-labelledby="list-data-list">
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
                        <div class="tab-pane" id="password" role="tabpanel" aria-labelledby="list-password-list" >
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
                        </div><!--/tab-pane -->
                        <div class="tab-pane text-center" id="avatar" role="tabpanel" aria-labelledby="list-avatar-list">
                            <br>
                            <form class="form-horizontal" action="javascript:void(1);" method="post" id="frm-avatar">

                                <input type="hidden" name="accion" id="accion" value="generar-avatar"/>
                                <input type="hidden" name="token" id="token" value="<?php echo Utiles::obtenerToken(); ?>"/>
                            
                                <div class="row form-group">
                                    <div class="col-sm-12">
                                        <img class="text-center" src="<?php echo $avatarUsuario ?>"  id="avatar-edicion" alt="avatar">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"></div>
                                    <div id="alerta-cambios" class="col-md-offset-3 col-md-6 alert dark alert-alt alert-success fade in text-center" style="display:none"><i class="glyphicon glyphicon-hourglass"></i> Hay cambios sin guardar...</div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
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
                                                foreach($view_home->compCab as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $cabeza[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group" id="accesorios">
                                    <label for="accessoriesType" class="col-sm-3 control-label">↳ 👓 Accesorios</label>
                                    <div class="col-sm-9">
                                        <select id="accessoriesType" name="accessoriesType" class="form-control" onChange="cambioAvatar('accessoriesType', this.value);">
                                            <?php
                                                $i = 0;								
                                                foreach($view_home->compAcc as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $accesorios[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group" id="colorSombrero" style="display:none">
                                    <label for="hatColor" class="col-sm-3 control-label">🎨 Color Sombrero</label>
                                    <div class="col-sm-9">
                                        <select id="hatColor" name="hatColor" class="form-control" onChange="cambioAvatar('hatColor', this.value);">
                                            <?php 
                                                $i = 0;	
                                                foreach($view_home->compColSom as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorSombrero[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group" id="colorPelo">
                                    <label for="hairColor" class="col-sm-3 control-label">↳ 💈 Color Pelo</label>
                                    <div class="col-sm-9">
                                        <select id="hairColor" name="hairColor" class="form-control" onChange="cambioAvatar('hairColor', this.value);">
                                            <?php 
                                                $i = 0;	
                                                foreach($view_home->compColPelo as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorPelo[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="facialHairType" class="col-sm-3 control-label">Barba</label>
                                    <div class="col-sm-9">
                                        <select id="facialHairType" name="facialHairType" class="form-control" onChange="cambioAvatar('facialHairType', this.value);">
                                            <?php 
                                                $i = 0;	
                                                foreach($view_home->compBarba as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $barba[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group" id="colorBarba"> 
                                    <label for="facialHairColor" class="col-sm-3 control-label">↳ ✂️ Color Barba</label>
                                    <div class="col-sm-9">
                                        <select id="facialHairColor" name="facialHairColor" class="form-control" onChange="cambioAvatar('facialHairColor', this.value);">
                                            <?php 
                                                $i = 0;	
                                                foreach($view_home->compColBarba as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorPelo[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="clotheType" class="col-sm-3 control-label">👔 Atuendos</label>
                                    <div class="col-sm-9">
                                        <select id="clotheType" name="clotheType" class="form-control"  onChange="cambioAvatar('clotheType', this.value);">
                                            <?php 
                                                $i = 0;	
                                                foreach($view_home->compAtu as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $atuendo[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group" id="colorAtuendo">
                                    <label for="clotheColor" class="col-sm-3 control-label">↳ 🎨 Color Atuendo</label>
                                    <div class="col-sm-9">
                                        <select id="clotheColor" name="clotheColor" class="form-control" onChange="cambioAvatar('clotheColor', this.value);">
                                            <?php 
                                                $i = 0;	
                                                foreach($view_home->compColAtu as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $colorAtuendo[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group" id="estampa" style="display:none">
                                    <label for="graphicType" class="col-sm-3 control-label">↳ Estampa</label>
                                    <div class="col-sm-9">
                                        <select id="graphicType" name="graphicType" class="form-control" onChange="cambioAvatar('graphicType', this.value);">
                                            <?php 
                                                $i = 0;	
                                                foreach($view_home->compEst as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $estampa[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="eyeType" class="col-sm-3 control-label">👁 Ojos</label>
                                    <div class="col-sm-9">
                                        <select id="eyeType" name="eyeType" class="form-control" onChange="cambioAvatar('eyeType', this.value);">
                                            <?php 
                                                $i = 0;	
                                                foreach($view_home->compOjos as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $ojos[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="eyebrowType" class="col-sm-3 control-label">✏️ Cejas</label>
                                    <div class="col-sm-9">
                                        <select id="eyebrowType" name="eyebrowType" class="form-control" onChange="cambioAvatar('eyebrowType', this.value);">
                                            <?php 
                                                $i = 0;	
                                                foreach($view_home->compCejas as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $cejas[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="mouthType" class="col-sm-3 control-label">👄 Boca</label>
                                    <div class="col-sm-9">
                                        <select id="mouthType" name="mouthType" class="form-control" onChange="cambioAvatar('mouthType', this.value);">
                                            <?php 
                                                $i = 0;	
                                                foreach($view_home->compBoca as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $boca[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="skinColor" class="col-sm-3 control-label">🎨 Piel</label>
                                    <div class="col-sm-9">
                                        <select id="skinColor" name="skinColor" class="form-control" onChange="cambioAvatar('skinColor', this.value);">
                                            <?php 
                                                $i = 0;	
                                                foreach($view_home->compPiel as $componente){
                                            ?>
                                            <option value="<?php echo $componente->nombre_original; ?>" <?php echo ($componente->nombre_original == $piel[1] || $i == 0 ? 'selected' : ''); ?> ><?php echo $componente->nombre_traducido; ?></option>
                                            <?php 
                                            $i++;
                                            }; ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <button class="btn btn-lg btn-success" type="submit" onclick="generarAvatar();"><i class="glyphicon glyphicon-ok-sign"></i> Crear Avatar</button>
                            <button class="btn btn-lg btn-danger" type="submit" onclick="descartarCambios();"><i class="glyphicon glyphicon-remove"></i>  Descartar Cambios</button>
                            <button class="btn btn-lg btn-warning" type="submit" onclick="avatarRandom();"><i class="glyphicon glyphicon-random"></i> Avatar Random</button>
                        </div><!--/tab-pane-->
                        <div class="tab-pane" id="eliminar" role="tabpanel" aria-labelledby="list-eliminar-list">
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
                    </div>
		        </div>
		    </div>
		</div>
	</div>
</div>

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

var linkAvatar = '<?php echo $avatarUsuario; ?>';
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
   	linkAvatar = link;   
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