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
		public function guardarPost($conexion){
			$sql = 	sprintf("INSERT INTO tb_memes(descripcion, fecha_publicacion, ".
					"calificacion, url_imagen, codigo_usuario) ".
					"VALUES ('%s',STR_TO_DATE('%s','%s'),%s,'%s',%s)",
					$conexion->antiInyeccion($this->descripcion),
					$conexion->antiInyeccion($this->fecha),
					'%d/%m/%Y',
					$conexion->antiInyeccion($this->calificacion),
					$conexion->antiInyeccion($this->urlImagen),
					$conexion->antiInyeccion($this->usuario) //Se asume que es el código del usuario y no un objeto del tipo usuario.
				);
			
			$resultado = $conexion->ejecutarConsulta($sql);
			if ($resultado){
				//Se agrego con exito
				$sql = 	sprintf("SELECT codigo_meme, descripcion, fecha_publicacion, ".
						"calificacion, url_imagen, codigo_usuario ".
						"FROM tb_memes ".
						"WHERE codigo_meme = %s",
						$conexion->ultimoId()
					);
				$resultadoMeme = $conexion->ejecutarConsulta($sql);
				$fila = $conexion->obtenerFila($resultadoMeme);
				$fila["codigo_resultado"] = 0;
				$fila["mensaje_resultado"] = "Registro insertado con éxito";
				echo json_encode($fila);
			}else{
				//Fallo
				$respuesta["codigo_resultado"] = 1;
				$respuesta["mensaje_resultado"] = "No se pudo guardar el registro";
				$respuesta["sql"] = $sql;
				echo json_encode($respuesta);
			}
		}

		public function imprimirMeme(){
			echo ' <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">';
			echo '  <div class="well">';
			echo '    <strong>'.$this->usuario.'</strong>';
			echo '    <p>'.$this->descripcion.'</p>';
			echo '    <img src="'.$this->urlImagen.'" class="img-responsive">';
			echo '    <span class="badge">Calificación: ';
			for ($i=0; $i<intval($this->calificacion);$i++)
				echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';

			echo 	'</span>';
			echo '    <span class="badge">Comentarios: 0</span>';
			echo '    <p>';
			echo '	  <hr><h4>Comentarios:</h4><div id="div-comentarios-'.$this->codigoPost. '">';
			echo '		</div><textarea class="form-control" placeholder="Comentario" id="txt-comentario-meme-'.$this->codigoPost.'"></textarea>';
			echo '		<button type="button" class="btn btn-default" onclick="comentar('.$this->codigoPost.');">Publicar comentario</button>';
			echo '    </p>';
			echo '  </div>';
			echo '</div>';	
		}
	}
?>