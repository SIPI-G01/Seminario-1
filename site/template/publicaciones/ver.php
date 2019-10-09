<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->
<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/ver-view.php');
 $view = new ver_view($params);

 $publi = $view->publi;

 ?>
  <div class="verContainer">
    <div class="namePubli">NOMBRE PUBLICACION</div>
    <div class="tags">[TAGS]</div>
  </div>
  <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
   <ol class="carousel-indicators">
     <?php
     $i=0;
     foreach ($publi->getImagenes() as $imagen) {?>

     <li data-target="#carouselIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo ($i == 0 ? 'active' : ''); ?>"></li>
     <?php
     $i++;
      }?>   </ol>
   <div class="carousel-inner">
     <?php
     $i=0;
     foreach ($publi->getImagenes() as $imagen) {?>
       <div class="carousel-item  <?php echo ($i == 0 ? 'active' : ''); ?>">
         <img class="carousel-img" src="\archivos\recortes\<?php echo $imagen->archivo; ?>" class="d-block w-100" alt="Card image cap">
       </div>
     <?php
     $i++;
   }?>
   </div>
   <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="sr-only">Previous</span>
   </a>
   <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="sr-only">Next</span>
   </a>
 </div>


 <?php
  echo $publi->texto;
  ?>
