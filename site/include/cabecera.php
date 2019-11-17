<?php

	include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';
?>
<header id="masthead" class="masthead">
<!--ACA VA EL HEADER-->

		
    <ul style="position: relative;">
        <li id="headerIzq" ><a class="active" href="/home">Inicio</a></li>
        <li id="headerIzq"><a href="/faq">FAQ</a></li>
		<li id="headerIzq" class="centrar">
			<a href="/home" style="padding-top: 7px; padding-bottom: 0px; font-size: 25px;"><img class="imagen-inicio" src="/site/images/logo.png"> Vita</a>
		</li>
		<?php if(Utiles::obtenerUsuarioLogueado() == null){ ?>
			<li id="headerDerLogIn">
			<form class="form" action="javascript:void(1);" method="post" id="frm-data">
				
				<input type="text" id="username" class="iniciarSesionInput" placeholder="Ingresar usuario" name="username" required>
				<input type="password" id="password" class="iniciarSesionInput" placeholder="Ingresar contraseña" name="password" required>
				<input type="button" class="btn btn-dark iniciarSesion" onclick="iniciarSesion();" value="Iniciar sesion">
				<input type="button" class="btn btn-primary" onclick="registrarse();" value="Registrarse">				
			</form>
			</li>
		<?php } else { ?>
			<li id="headerDer" onmouseover="$('#listOp').show();" onmouseout="$('#listOp').hide();">
				<a href="#">
					Hola <?php echo Utiles::obtenerUsuarioLogueado()->usuario; ?>
					<span class="avatar avatar-online">
						<?php if(Utiles::obtenerUsuarioLogueado()->archivo != null){?>
							<img src="<?php echo Utiles::obtenerUsuarioLogueado()->archivo; ?>" alt="...">
						<?php } else { ?>
							<img src="/site/images/faceless.jpg" alt="...">
						<?php } ?>
					</span>
				</a>

			</li>
		<?php } ?>

    </ul>
	
				  <ul id="listOp" class="dropdown" style="display: none; margin-top: -10px; right: 0%; z-index: 999999; position: absolute;" onmouseover="$('#listOp').show();" onmouseout="$('#listOp').hide();">
					<li><a href="/usuario">Inicio</a></li>
					<li><a href="/usuario/objetivos">Mis objetivos</a></li>
					<li><a href="/usuario/perfil/<?php echo Utiles::obtenerUsuarioLogueado()->alias; ?>">Mis publicaciones</a></li>	
					<li><a href="#" onclick="cerrarSesion();">Cerrar sesión</a></li>
				  </ul>
	
	<!--
    <div class="headContainer">
			<div class="headImg"><h1><a href="/home"><img class="imagen-vita" src="/site/images/logo.png"></a></h1></div>
			<div class="headTitle"><h1><a href="/home">Vita</a></h1></div>
    </div>
	-->
</header>

<script>
    function registrarse()
	{
		window.location = '/registrarse';
	}
	
	function cerrarSesion() {

		$.ajax({
			async:true,
			type: "POST",
			url: "/site/controller/usuario-controller.php",
			data: "accion=logout&token=" + '<?php echo Utiles::obtenerToken(); ?>',
			beforeSend:function(){
			},
			success:function(datos) {

				window.location.href = "/";
				return true;
			},
			timeout:8000,
			error:function(){
				alert('Error al cerrar sesion. Intentelo mas tarde.');
				return false;
			}
		});
    }

		function iniciarSesion(){
			$.ajax({
				async:true,
				type: "POST",
				url: "/site/controller/usuario-controller.php",
				data: "accion=login&username=" + $('#username').val() + "&password=" + $('#password').val() + "&token=" + '<?php echo Utiles::obtenerToken(); ?>',
				beforeSend:function(){
				},
				success:function(datos) {
					datos = datos.split('|');
					console.log(datos);
					if(datos[0] == 'OK')
					{
						window.location.href = "/";					
					}
					else
					{
						Swal.fire({
						  icon: 'error',
						  title: 'Oops...',
						  text: datos[1]
						})
						
					}
					return true;
				},
				timeout:8000,
				error:function(){
					alert('Error al iniciar sesion. Intentelo mas tarde.');
					return false;
				}
			});
		}

</script>
