
<style>

        @import url('https://fonts.googleapis.com/css?family=Titillium+Web&display=swap');

		.accordion {
            background-color: #18d8cecc;
            font-family: 'Titillium Web', sans-serif !important;
		    color: #5a595a;
		    cursor: pointer;
		    padding: 18px;
		    width: 100%;
		    text-align: left;
		    border: 1px solid white;
		    outline: none;
		    transition: 0.4s;
		    font: 20px Lato, sans-serif;
		}

		.accordion.active, .accordion:hover {
            background-color: #20aaa3;
            color: #FFF;
		}

		.panel {
		    padding: 0 18px;
            background-color: white;
            text-align: left;
		    max-height: 0;
		    overflow: hidden;
		    transition: max-height 0.2s ease-out;
		}

		.panel p{
            font: 16px Lato, sans-serif; 
            font-family: 'Titillium Web', sans-serif !important;
            color: #5a595a;
		}

		.accordion:after {
		    content: '\02795'; 
		    font-size: 13px;
		    float: right;
		    margin-left: 5px;
		}

		.accordion.active:after {
		    content: "\2796"; 
		}
</style>

<div class= "container-fluid">
	<div class="headContainer">
			<div class="headTitle">
                <h1>
                    <a href="/faq">Preguntas Frecuentes</a>
                </h1>
                <h2>
                    Descargo de responsabilidad.
                </h2>
                <h4>
                Vita comunica que bajo ningún concepto las publicaciones de los usuarios pueden considerarse una alternativa a un profesional de la salud. Ante cualquier duda consulte a un médico.
                </h4>
            </div>
    </div>

	<div class="row texto-inicio">
		<div class="col-md-12">
            <button class="accordion">¿Qué es Vita?</button>
            <div class="panel">
                <p>Vita es una plataforma interactiva en la cual las personas pueden escoger un objetivo específico y comprometerse con el mismo, enriqueciéndose y motivándose con lo aportado por otras que comparten la misma meta. Así también, estas pueden compartir recetas y distintos ejercicios físicos relacionados a un objetivo y establecer el tiempo que insumen para que a la hora de buscar puedan escogerse publicaciones que coincidan con el tiempo libre que cada uno tiene en su día a día.</p>
            </div>

            <button class="accordion">¿Por qué registrarme?</button>
            <div class="panel">
                <p>Como usuario registrado podrás escoger objetivos con los que comprometerte y buscar o crear publicaciones de estos para ayudar a otros a superar su meta, al mismo tiempo que ellos te ayudan a ti. También podrás comentar y recibir comentarios en las distintas publicaciones para aportar ideas o conocimientos sobre el tema en cuestión.</p>
            </div>

            <button class="accordion">¿Cómo me registro?</button>
            <div class="panel">
                <p>Registrarse en Vita sencillo, solo tiene que acceder desde la página principal a la opción “Registrarse” y completar los campos requeridos.</p>
            </div>

            <button class="accordion">¿Qué es un objetivo?</button>
            <div class="panel">
                <p>¿Cuántas veces dijo “el lunes empiezo la dieta” y cuántas realmente la empezó? Mediante el establecimiento de objetivos Vita busca estimularlo en el desarrollo de sus metas, permitiéndole filtrar sus búsquedas, para así encontrar recetas o actividades físicas que la comunidad considera acordes para el mismo. Un objetivo es algo que uno se propone a realizar, empezando en una fecha específica.</p>
            </div>

            <button class="accordion">¿Cómo defino o cambio un objetivo?</button>
            <div class="panel">
                <p>Así como se pueden definir al registrarse en la página, también se puede agregar nuevos objetivos o editar los ya existentes en la pestaña “Mis Objetivos” dentro de “Mi Perfil”.</p>
            </div>

            <button class="accordion">¿Puedo tener más de un objetivo a la vez?</button>
            <div class="panel">
                <p>¡Por supuesto! Los objetivos son independientes entre sí. De igual manera, nuestra recomendación es que no te comprometas con muchos objetivos diversos a la vez, ya que podría ser una dificultad el seguirlos todos.</p>
            </div>

            <button class="accordion">¿Qué pasa si terminé mi objetivo?</button>
            <div class="panel">
                <p>Al cumplir tu objetivo debes marcar en tus objetivos la fecha en que lo das por finalizado. Esto se hace entrando a la pestaña “Mis Objetivos” desde el panel “Mi Perfil”. Próximamente podrás también ver tu progreso respecto al objetivo una vez cumplido, y tu historia con el mismo.</p>
            </div>

            <button class="accordion">¿Cómo busco una publicación determinada?</button>
            <div class="panel">
                <p>El buscador de Vita puede accederse desde la página principal. Este permite buscar publicaciones de una categoría (receta o actividad física) referidas a un objetivo y filtrarlas por el tiempo que insumen. En el caso de no seleccionarse ningún filtro de tiempo, el buscador encontrará todas las publicaciones relacionadas al objetivo en cuestión.</p>
            </div>

            <button class="accordion">¿Cómo creo una publicación?</button>
            <div class="panel">
                <p>Para crear su propia publicación puede hacerlo o bien desde la página principal o bien desde la pestaña de publicaciones de su perfil con el botón “Crear Publicación”. Esto le permitirá acceder a la página de creación de su publicación. Allí, en el apartado superior, deberá especificar si su publicación va a ser pública o por ahora solo un borrador, el tiempo que insume llevar a cabo lo que usted esté publicando (En minutos, horas, días, semanas o meses) y la categoría de la publicación (si es una receta o una actividad física). Luego de seleccionar esto se le permitirá agregar objetivos relacionados a la publicación. Finalmente usted podrá escribir un título y una descripción para su publicación, para escribir posteriormente su contenido. También puede agregar de forma opcional fotos a su publicación, las cuales se mostrarán al ingresar al contenido de la misma al principio, antes del cuerpo.</p>
            </div>

            <button class="accordion">¿Qué pasa si mi publicación no se adapta a ningún objetivo?</button>
            <div class="panel">
                <p>Si desea crear una publicación y notifica que ninguno de los objetivos (ni los que usted escogió previamente ni los que pueda escoger) se adecúa a su publicación, háganoslo saber enviando un mail a soporte@vita.org. Nuestro equipo evaluará su comentario para decidir si incluir un objetivo nuevo o no. Su mensaje nos ayuda a crecer y a darle siempre la mejor experiencia como usuario.</p>
            </div>
		</div>
	</div>
</div>

<script type="text/javascript">
		var acc = document.getElementsByClassName("accordion");
		var i;

		for (i = 0; i < acc.length; i++) {
		  acc[i].addEventListener("click", function() {
		    this.classList.toggle("active");
		    var panel = this.nextElementSibling;
		    if (panel.style.maxHeight){
		      panel.style.maxHeight = null;
		    } else {
		      panel.style.maxHeight = panel.scrollHeight + "px";
		    } 
		  });
		}
</script>