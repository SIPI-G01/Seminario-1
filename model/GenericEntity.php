<?php

class GenericEntity {

	private $pk;
	
	public function setPk($pk) {
		$this->pk = $pk;
	}// setPk

	public function getPk() {
		return $this->pk;
	}//getPk
}

?>