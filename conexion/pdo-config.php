<?php

function getConnection() {
	return new PDO("mysql:host=localhost;dbname=seminario1","root","");//local
}// getConnection

function getDbName() {
	return "seminario1";
}

?>