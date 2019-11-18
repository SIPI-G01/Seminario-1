<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');

final class publicacion extends GenericEntity{

	public $id;
	public $campo;
	public $valor;
};
?>
