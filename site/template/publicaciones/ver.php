<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/ver-view.php');
 $view = new ver_view($params);
 ?>

 <?php
  $publi = $view->publi;
  echo $publi->texto;
  ?>
