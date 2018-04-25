<?php

	abstract class Post{
		protected $codigoPost;
		protected $descripcion;
		protected $fecha;
		protected $usuario;

		public function __construct($codigoPost,
					$descripcion,
					$fecha,
					$usuario){
			$this->codigoPost = $codigoPost;
			$this->descripcion = $descripcion;
			$this->fecha = $fecha;
			$this->usuario = $usuario;
		}
		public function getCodigoPost(){
			return $this->codigoPost;
		}
		public function setCodigoPost($codigoPost){
			$this->codigoPost = $codigoPost;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		public function getFecha(){
			return $this->fecha;
		}
		public function setFecha($fecha){
			$this->fecha = $fecha;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function __toString(){
			return "CodigoPost: " . $this->codigoPost . 
				" Descripcion: " . $this->descripcion . 
				" Fecha: " . $this->fecha . 
				" Usuario: " . $this->usuario;
		}

		public abstract function guardarPost($conexion);
	}
?>