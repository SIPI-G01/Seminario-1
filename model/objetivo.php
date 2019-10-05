<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/model/GenericEntity.php');

final class objetivo extends GenericEntity{

	public $id;
	public $nombre;
	public $descripcion;

	public $activo;
	private $tiempos = null;
	public function __construct() {
		$this->setPk(array("id"));
	}

	public function getTiempos() {
		if ($this->tiempos == null) {
			$this->tiempos = ObjetivoTiempo::getXobjetivo($this->id);
		}
		return $this->tiempos;
	}


};
?>
