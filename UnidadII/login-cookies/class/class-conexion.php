<?php
	class Conexion{
		private $host = "localhost";
		private $usuario = "root";
		private $password = "";
		private $baseDatos = "db_9gag";
		private $puerto = 3306;
		private $link;

		public function __construct(){
			$this->link = mysqli_connect(
				$this->host,
				$this->usuario,
				$this->password,
				$this->baseDatos,
				$this->puerto
            );
		}

		public function ejecutarConsulta($sql){
			return mysqli_query($this->link, $sql);
		}

		public function obtenerFila($resultado){
			return mysqli_fetch_assoc($resultado);
		}

		public function cerrarConexion(){
			mysqli_close($this->link);
		}

		public function getLink(){
			return $this->link;
		}

		public function antiInyeccion($texto){
			return mysqli_real_escape_string($this->link, $texto);
		}

		public function ultimoId(){
			return mysqli_insert_id($this->link);
		}
	}

?>