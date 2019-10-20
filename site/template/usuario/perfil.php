<?php
 include_once  ($_SERVER["DOCUMENT_ROOT"] . '/site/view/perfil-view.php');
 $view = new perfil_view($params);
 $publi = $view->publi;
 ?>