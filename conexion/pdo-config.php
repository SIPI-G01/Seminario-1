<?php

function getConnection() {
	return new PDO("mysql:host=127.0.0.1;dbname=seminario1", "root", "");//local
}// getConnection

function getDbName() {
	return "seminario1";
}

?>