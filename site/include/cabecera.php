<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';
?>
<header id="masthead" class="masthead">
<!--ACA VA EL HEADER-->
    <ul>
        <li id="headerIzq" ><a class="active" href="/home">Inicio</a></li>
        <li id="headerIzq"><a href="#faq">FAQ</a></li>
		<?php if(Utiles::obtenerUsuarioLogueado() == null){ ?>
			<li id="headerDer"><a href="#registro">Registrarse</a></li>
			<li id="headerDer"><a href="#inicio_sesion">Iniciar sesion</a></li>
		<?php } else { ?>
			<li id="headerDer">
				<a href="#">
					Hola <?php echo Utiles::obtenerUsuarioLogueado()->usuario; ?> 
					<span class="avatar avatar-online">
						<?php if(Utiles::obtenerUsuarioLogueado()->archivo != null){?>
							<img src="/archivos/recortes/<?php echo Utiles::obtenerUsuarioLogueado()->archivo; ?>" alt="...">
						<?php } else { ?>
							<img src="/site/images/faceless.jpg" alt="...">
						<?php } ?>
					</span>
				</a>
			</li>
		<?php } ?>
		
    </ul>
    <div class="headContainer">
			<div class="headImg"><h1><a href="/home"><img class="imagen-inicio" src="/site/images/logo.png"></a></h1></div>
			<div class="headTitle"><h1><a href="/home">Vita</a></h1></div>		
    </div>
    <!--<div class="divLine">
			<h1 class="line">⚜</h1>
    </div>-->
</header>
