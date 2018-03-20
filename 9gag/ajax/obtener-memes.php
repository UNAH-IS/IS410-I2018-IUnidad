<?php
	$archivo = fopen("../data/memes.csv","r");	
	while ($linea=fgets($archivo)) {
		$partes = explode(",", $linea);
		echo ' <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">';
		echo '  <div class="well">';
		echo '    <strong>'.$partes['2'].'</strong>';
		echo '    <p>'.$partes[1].'</p>';
		echo '    <img src="'.$partes[4].'" class="img-responsive">';
		echo '    <span class="badge">Puntos: '.$partes[3].'</span>';
		echo '    <span class="badge">Comentarios: 0</span>';
		echo '    <p>';
		echo '    </p>';
		echo '  </div>';
		echo '</div>';
	}
	fclose($archivo);
?>
