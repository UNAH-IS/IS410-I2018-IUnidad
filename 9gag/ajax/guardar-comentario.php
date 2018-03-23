<?php
	/*if (!isset($_POST["codigo-meme"])
		exit;*/

	$archivo = fopen("../data/comentarios/comentarios-meme-". $_POST["codigo-meme"].".csv","a+");
	fwrite($archivo, $_POST["usuario"].",".$_POST["comentario"]."\n");
	fclose($archivo);
	echo "Comentario guardado con éxito";
?>