<?php
	/*if (!isset($_POST["codigo-meme"])
		exit;*/

	$archivo = fopen("../data/comentarios/comentarios-meme-". $_POST["codigo-meme"].".csv","a+");
	fwrite($archivo, $_POST["usuario"].",".$_POST["comentario"]."\n");
	fclose($archivo);
	echo '<div><strong>'.$_POST["usuario"].'</strong><p class="commentario">'.$_POST["comentario"].'</p></div>';
?>