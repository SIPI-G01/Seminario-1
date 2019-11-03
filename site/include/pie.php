	<div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 text-left">
                   <h2>Vita</h2>

					<p class="pr-5 text-white-50">Tu mejor opcion a la hora de necesitar un consejo en cuantos a recetas,actividades y mucho mas! </p>
				</div>
				<div class="col-lg-2 col-xs-6 location">
				  <h4 class="mt-lg-0 mt-sm-4">Ubicacion</h4>
				  <p>Lima 775, C1073 CABA</p>
				  <p class="mb-0"><i class="fa fa-phone mr-3"></i>011 4000-7600</p>
				  <p><i class="fa fa-envelope-o mr-3"></i>infovita@gmail.com</p>
				</div>
				 <div class="col-lg-2 col-xs-6 location">
				  <h4 class="mt-lg-0 mt-sm-2">Links</h4>
				  <a href="/home"><p  class="mb-0"style="color:white;font-size:15px;">Home</p></a>
				 <a href="/FAQ"><p class="mb-0" style="color:white;font-size:15px;">FAQ</p></a>
				 <?php if(!Utiles::obtenerIdUsuarioLogueado()) { ?>
				 <a href="/registrarse"><p style="color:white;font-size:15px;">Registrarse</p></a>
				 <?php } ?>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col copyright">
				  <p class=""><medium class="text-white-50">©Vita 2019 Todos los derechos reservados.</medium></p>
				</div>
            </div>
            <div class="clear"></div>
        </div><!-- /.container -->
    </div><!-- /.footer-bottom -->