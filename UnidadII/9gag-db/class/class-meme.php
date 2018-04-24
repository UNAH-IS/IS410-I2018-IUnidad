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
			$archivo = fopen("../data/memes.csv", "a+");
			fwrite( $archivo, 
					$this->codigoPost.",".
					$this->descripcion.",".
					$this->usuario.",".
					$this->calificacion.",".
					$this->urlImagen."\n"
			);
			fclose($archivo);
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