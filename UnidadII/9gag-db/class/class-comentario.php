<?php 

	class Comentario extends Post{
		private $respuestas = array();

		public function __construct(
				$codigoPost,
				$descripcion,
				$fecha,
				$usuario,
				$respuestas
			){
			//Paamayin Nekudotayiin
			parent::__construct($codigoPost,$descripcion,$fecha,$usuario);
			$this->respuestas = $respuestas;
		}

		public function guardarPost(){
			echo "Guardando comentario";
		}
	}
?>