<?php 
	class Usuario{
		private $codigoUsuario;
		private $nombreUsuario;
		private $genero;
		private $edad;
		private $correo;
		public static $atributoEstatico;

		public function __construct($codigoUsuario,$nombreUsuario,$genero,$edad,$correo){
			$this->codigoUsuario=$codigoUsuario;
			$this->nombreUsuario=$nombreUsuario;
			$this->genero=$genero;
			$this->edad=$edad;
			$this->correo=$correo;
		}

		public function getCodigoUsuario(){
			return $this->codigoUsuario;
		}

		public function setCodigoUsuario($codigoUsuario){
			$this->codigoUsuario = $codigoUsuario;
		}

		public function setNombreUsuario($nombreUsuario){
			$this->nombreUsuario = $nombreUsuario;
		}
		public function setGenero($genero){
			$this->genero = $genero;
		}
		public function setEdad($edad){
			$this->edad = $edad;
		}
		public function setCorreo($correo){
			$this->correo = $correo;
		}

		public function getNombreUsuario(){
			return $this->nombreUsuario;
		}
		public function getGenero(){
			return $this->genero;
		}
		public function getEdad(){
			return $this->edad;
		}
		public function getCorreo(){
			return $this->correo;
		}

		public function __toString(){
			return $this->codigoUsuario.",".$this->nombreUsuario.",".$this->genero.",".$this->edad.",".$this->correo;
		}

	}
?>