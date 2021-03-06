<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/site/utiles/Utiles.php';

	$controller = (isset($_GET['controller']) && $_GET['controller'] != '') ? $_GET['controller'] : 'home';
	$accion = (isset($_GET['accion']) && $_GET['accion'] != '') ? $_GET['accion'] : 'index';
	$params = (isset($_GET['params'])) ? $_GET['params'] : '';


?>

<!DOCTYPE html>
<html lang="es">
	<head>
	  <title>Vita</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="shortcut icon" href="/site/images/favicon.ico">
	  

		<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/include/scripts-header.php'); ?>
	</head>

	<body  id="index-default">


		<!-- start main-->
	    <main>
				<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/include/cabecera.php'); ?>

				<?php

				if(file_exists($_SERVER["DOCUMENT_ROOT"] . '/site/template/' . $_GET['controller'] . '/' . $accion . '.php')) {
					include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/template/' . $_GET['controller'] . '/' . $accion . '.php');
				} else {
					include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/template/404/index.php');
				}

				?>

		</main>
    	<!-- end main-->
		<?php include_once ($_SERVER["DOCUMENT_ROOT"] . '/site/include/pie.php'); ?>

	</body>
</html>
