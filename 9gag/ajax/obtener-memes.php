<?php
	$archivo = fopen("../data/memes.csv","r");	
	while ($linea=fgets($archivo)) {
		$partes = explode(",", $linea);
		//echo $linea;

		echo ' <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">';
		echo '  <div class="well">';
		echo '    <strong>'.$partes[1].'</strong>';
		echo '    <p>'.$partes[0].'</p>';
		echo '    <img src="'.$partes[3].'" class="img-responsive">';
		echo '    <span class="badge">Puntos: '.$partes[2].'</span>';
		echo '    <span class="badge">Comentarios: 5</span>';
		echo '    <p>';
		echo '      <hr>';
		echo '      <h4>Comentarios:</h4>';
		$partesComentarios = explode(":", $partes[4]);
		for ($i=0;$i<sizeof($partesComentarios);$i++){
			$usuarioComentario = explode("|", $partesComentarios[$i]);
			echo '      <div>';
			echo '        <b>'.$usuarioComentario[0].'</b>';
			echo '        <p class="commentario">'.$usuarioComentario[1].'</p>  ';
			echo '      </div>';
		}
		echo '<textarea class="form-control" placeholder="Nuevo comentario"></textarea>';
		echo '<input type = "button" value="Comentar" class="btn btn-default" onclick="comentar(\'Puede enviar por aquí el codigo del meme\');">';
		echo '    </p>';
		echo '  </div>';
		echo '</div>';
	}
	fclose($archivo);
?>
