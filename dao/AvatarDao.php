<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/GenericDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/avatar.php');

class AvatarDao {

    public static function get($id) {
        return GenericDao::get("avatar", array("id" => $id));
    }// get

    public static function listActivos() {
		return GenericDao::find("avatar", array(array("activo", "=", "1")));
    }
    
    public static function getXnombreoriginal($nombre_original) {
		return GenericDao::find("avatar", array(array("nombre_original", "=", $nombre_original), array("activo", "=", "1")));
    }
    
    public static function getXnombretraducido($nombre_traducido) {
		return GenericDao::find("avatar", array(array("nombre_original", "=", $nombre_traducido), array("activo", "=", "1")));
    }
    
    public static function getXcomponente($componente) {
		return GenericDao::find("avatar", array(array("componente", "=", $componente), array("activo", "=", "1")));
    }

}
?>