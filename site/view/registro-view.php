<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/ObjetivoDao.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/AvatarDao.php';

    class registro_view {

		public $objetivos;
		public $estilosAv;
		public $compCab;
		public $compAcc;
		public $compColSom;
		public $compColPelo;
		public $compBarba;
		public $compColBarba;
		public $compAtu;
		public $compColAtu;
		public $compEst;
		public $compOjos;
		public $compCejas;
		public $compBoca;
		public $compPiel;

		public $recomendados;


        function __construct() {
			$this->objetivos = ObjetivoDao::listActivos();
			
			$this->estilosAv = AvatarDao::getXcomponente('estilo_avatar');
			$this->compCab = AvatarDao::getXcomponente('cabeza');
			$this->compAcc = AvatarDao::getXcomponente('accesorios');
			$this->compColSom = AvatarDao::getXcomponente('colorSombrero');
			$this->compColPelo = AvatarDao::getXcomponente('colorPelo');
			$this->compBarba = AvatarDao::getXcomponente('barba');
			$this->compColBarba = AvatarDao::getXcomponente('colorBarba');
			$this->compAtu = AvatarDao::getXcomponente('atuendos');
			$this->compColAtu = AvatarDao::getXcomponente('colorTela');
			$this->compEst = AvatarDao::getXcomponente('estampa');
			$this->compOjos = AvatarDao::getXcomponente('ojos');
			$this->compCejas = AvatarDao::getXcomponente('cejas');
			$this->compBoca = AvatarDao::getXcomponente('boca');
			$this->compPiel = AvatarDao::getXcomponente('piel');

			
		}
    }
?>