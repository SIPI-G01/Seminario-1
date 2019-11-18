<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/dao/GenericDao.php');
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/mail.php');

class MailDao {

    public static function get($id) {
        return GenericDao::get("mail", array("id" => $id));
    }// get

}
?>