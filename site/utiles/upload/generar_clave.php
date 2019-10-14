<?php
function GenerarClave() {
	$intLowerBound = 100000;
	$intUpperBound = 999999;

	return rand($intLowerBound,$intUpperBound);
}

function Generar_Codigo() {
	$parteA = GenerarClave();
	$parteB = time();

	return $parteA . '-' . $parteB;
}
?>