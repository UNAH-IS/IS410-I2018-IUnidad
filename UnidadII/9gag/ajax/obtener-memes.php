<?php
	$archivo = fopen("../data/memes.csv","r");	
	while ($linea=fgets($archivo)) {
		$partes = explode(",", $linea);
		echo ' <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">';
		echo '  <div class="well">';
		echo '    <strong>'.$partes['2'].'</strong>';
		echo '    <p>'.$partes[1].'</p>';
		echo '	<button type="button" onclick="editarMeme('.$partes[0].');" class="btn btn-primary">Editar</button>';
		echo '    <img src="'.$partes[4].'" class="img-responsive">';
		echo '    <span class="badge">Calificación: ';
		for ($i=0; $i<intval($partes[3]);$i++)
			echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';

		echo 	'</span>';

		echo '    <span class="badge">Comentarios: 0</span>';
		echo '    <p>';
		echo '	  <hr><h4>Comentarios:</h4><div id="div-comentarios-'.$partes[0]. '">';

		//Leer archivo de comentarios.
		if (file_exists("../data/comentarios/comentarios-meme-".$partes[0].".csv")){
			$archivoComentarios = fopen("../data/comentarios/comentarios-meme-".$partes[0].".csv", "r");		
			while(($lineaComentario = fgets($archivoComentarios))){
				$partesComentario = explode(",",$lineaComentario);
				echo '<div><strong>'.$partesComentario[0].'</strong><p class="commentario">'.$partesComentario[1].'</p></div>';
			}
			fclose($archivoComentarios);
		}else{
			echo "<strong>No hay comentarios para este meme</strong>";
		}

		echo '		</div><textarea class="form-control" placeholder="Comentario" id="txt-comentario-meme-'.$partes[0].'"></textarea>';
		echo '		<button type="button" class="btn btn-default" onclick="comentar('.$partes[0].');">Publicar comentario</button>';
		echo '    </p>';
		echo '  </div>';
		echo '</div>';
	}
	fclose($archivo);
?>
