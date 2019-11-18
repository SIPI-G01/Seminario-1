<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');

final class mail extends GenericEntity{

	public $id;
	public $campo;
	public $valor;

	public function __construct() {
		$this->setPk(array("id"));
    }


};
?>
