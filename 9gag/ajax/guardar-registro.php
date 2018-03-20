<?php
	
	
	$archivo = fopen("../data/memes.csv", "a+");
	fwrite($archivo, 
		$_POST["txt-descripcion"].",".
		$_POST["rbt-foto"].",".
		$_POST["txt-puntuacion"].",".
		$_POST["slc-imagen"].",".
		$_POST["txt-usuario1"]."|".
		$_POST["txt-comentario1"].":".
		$_POST["txt-usuario2"]."|".
		$_POST["txt-comentario2"].":".
		$_POST["txt-usuario3"]."|".
		$_POST["txt-comentario3"].":".
		$_POST["txt-usuario4"]."|".
		$_POST["txt-comentario4"].":".
		$_POST["txt-usuario5"]."|".
		$_POST["txt-comentario5"]."\n"
	);
	fclose($archivo);

	echo ' <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">';
	echo '  <div class="well">';
	echo '    <strong>'.$_POST["rbt-foto"].'</strong>';
	echo '    <p>'.$_POST["txt-descripcion"].'</p>';
	echo '    <img src="'.$_POST["slc-imagen"].'" class="img-responsive">';
	echo '    <span class="badge">Puntos: '.$_POST["txt-puntuacion"].'</span>';
	echo '    <span class="badge">Comentarios: 6666</span>';
	echo '    <p>';
	echo '      <hr>';
	echo '      <h4>Comentarios:</h4>';
	echo '      <div>';
	echo '        <b>'.$_POST["txt-usuario1"].'</b>';
	echo '        <p class="commentario">'.$_POST["txt-comentario1"].'</p>  ';
	echo '      </div>';
	echo '      <div>';
	echo '        <b>'.$_POST["txt-usuario2"].'</b>';
	echo '        <p class="commentario">'.$_POST["txt-comentario2"].'</p>  ';
	echo '      </div>';
	echo '      <div>';
	echo '        <b>'.$_POST["txt-usuario3"].'</b>';
	echo '        <p class="commentario">'.$_POST["txt-comentario3"].'</p>  ';
	echo '      </div>';
	echo '      <div>';
	echo '        <b>'.$_POST["txt-usuario4"].'</b>';
	echo '        <p class="commentario">'.$_POST["txt-comentario4"].'</p>  ';
	echo '      </div>';
	echo '      <div>';
	echo '        <b>'.$_POST["txt-usuario5"].'</b>';
	echo '        <p class="commentario">'.$_POST["txt-comentario5"].'</p>  ';
	echo '      </div>';
	echo '    </p>';
	echo '  </div>';
	echo '</div>';
?>