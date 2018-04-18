<?php
	class Meme extends Post{

		private $calificacion;
		private $urlImagen;
		private $comentarios = array();

		public function __construct(
					$codigoPost,
					$descripcion,
					$fecha,
					$usuario,
					$calificacion,
					$urlImagen,
					$comentarios){
			parent::__construct($codigoPost,$descripcion,$fecha,$usuario);

			$this->calificacion = $calificacion;
			$this->urlImagen = $urlImagen;
			$this->comentarios = $comentarios;
		}
		public function getCalificacion(){
			return $this->calificacion;
		}
		public function setCalificacion($calificacion){
			$this->calificacion = $calificacion;
		}
		public function getUrlImagen(){
			return $this->urlImagen;
		}
		public function setUrlImagen($urlImagen){
			$this->urlImagen = $urlImagen;
		}
		public function getComentarios(){
			return $this->comentarios;
		}
		public function setComentarios($comentarios){
			$this->comentarios = $comentarios;
		}
		public function __toString(){
			return 
				"Codigo Post: ".$this->codigoPost.
				"DEscripcion: ".$this->descripcion.
				"Fecha: ".$this->fecha.
				"Usuario: ".$this->usuario.
				"Calificacion: " . $this->calificacion . 
				" UrlImagen: " . $this->urlImagen . 
				" Comentarios: " . $this->comentarios;
		}

		//Metodo sobreescrito a partir de la clase POST
		public function guardarPost(){
			echo "Guardando post...";
		}
	}
?>