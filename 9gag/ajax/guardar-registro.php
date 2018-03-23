<?php
	
	
	$archivo = fopen("../data/memes.csv", "a+");
	fwrite( $archivo, 
			$_POST["codigo"].",".
			$_POST["descripcion"].",".
			$_POST["usuario"].",".
			$_POST["calificacion"].",".
			$_POST["imagen"]."\n"
	);
	fclose($archivo);

	echo ' <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">';
		echo '  <div class="well">';
		echo '    <strong>'.$_POST['usuario'].'</strong>';
		echo '    <p>'.$_POST["descripcion"].'</p>';
		echo '    <img src="'.$_POST['imagen'].'" class="img-responsive">';
		echo '    <span class="badge">Calificación: ';
		for ($i=0; $i<intval($_POST["calificacion"]);$i++)
			echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';

		echo 	'</span>';
		echo '    <span class="badge">Comentarios: 0</span>';
		echo '    <p>';
		echo '	  <hr><h4>Comentarios:</h4><div id="div-comentarios-'.$_POST["codigo"]. '">';
		echo '		</div><textarea class="form-control" placeholder="Comentario" id="txt-comentario-meme-'.$_POST["codigo"].'"></textarea>';
		echo '		<button type="button" class="btn btn-default" onclick="comentar('.$_POST["codigo"].');">Publicar comentario</button>';
		echo '    </p>';
		echo '  </div>';
		echo '</div>';	
?>