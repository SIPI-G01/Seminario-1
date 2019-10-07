<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/ObjetivoDao.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/ObjetivoTiempoDao.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/dao/PublicacionDao.php';

    class publicaciones_view {

		public $publicaciones;
		public $objetivo;
		public $tiempos;
		public $pags;
		public $orden;
		public $siguiente;
		public $anterior;
		public $totPags;
		public $pagActual;
		
        function __construct($params) {
			$parametros = explode("_", $params);
			$tipo = 1;
			$tipoTexto = '';
			$this->tiempos = array();
			$pagina = 1;
			$orden = '';
			$t = array();
			$objs = array();
			foreach ($parametros as $filtro) {

				$filtro = trim($filtro);
				if ($filtro && $filtro != '') {
					
					if($tipoTexto == 'tiempos' && $filtro != 'objetivo' && $filtro != 'pagina' && $filtro != 'orden')
					{
						$tipo = 0;
					}
					
					if ($tipo) {
						$tipoTexto = $filtro;
						$tipo = 0;
					} else {
						switch ($tipoTexto) {
							case 'objetivo':
								$obj = ObjetivoDao::getXalias($filtro);
								$this->objetivo = $obj[0];
								array_push($objs, $obj[0]->id);								
								break;
								
							case 'tiempos':
								$tiempo = ObjetivoTiempoDao::getXaliasYObjetivo($filtro, $this->objetivo->id);
								array_push($this->tiempos, $tiempo[0]);
								array_push($t, $tiempo[0]->id);
								
								break;

							case 'pagina':
								$pagina = ($filtro > 0 ? $filtro : 1);
								break;

							case 'orden':
								switch ($filtro) {
									default:                                
									case 'fecha':
										$orden = 0;
										break;

									case 'valoracion':
										$orden = 1;
										break;
								}
								$this->orden = $orden;								
								break;

						}
						$tipo = 1;
					}
				}
			}
			
			$this->publicaciones = PublicacionDao::filtrar($objs, $t, $pagina, $orden);
			
			$cant = PublicacionDao::cantPublicacionesFiltradas($objs, $t);
			$cantPags = ceil(($cant) / 20);  
			$this->siguiente = ($pagina + 1 <= $cantPags) ? $pagina + 1 : $cantPags;
			$this->anterior = ($pagina > 1) ? $pagina - 1 : 1;
			$this->totPags = $cantPags;
			$this->pagActual = $pagina;
			$this->pags = "Página " . $pagina . " de " . $cantPags;
			//$this->publicaciones = PublicacionDao::listActivos();
		}
    }
?>
