<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/AvatarDao.php');

final class avatar extends GenericEntity{

	public $id;
	public $componente;
	public $nombre_original;
	public $nombre_traducido;

	public $activo;
	public function __construct() {
		$this->setPk(array("id"));
    }


};
?>