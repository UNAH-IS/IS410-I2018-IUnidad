<?php

	echo "<h2>Informacion enviada desde el formulario:	 </h2>";
	echo $_GET["txt-descripcion"]."<br>";
	echo $_GET["rbt-foto"]."<br>";
	echo $_GET["txt-puntuacion"]."<br>";
	echo $_GET["slc-imagen"]."<br>";
	echo $_GET["txt-usuario1"]."<br>";
	echo $_GET["txt-comentario1"]."<br>";
	echo $_GET["txt-usuario2"]."<br>";
	echo $_GET["txt-comentario2"]."<br>";
	echo $_GET["txt-usuario3"]."<br>";
	echo $_GET["txt-comentario3"]."<br>";
	echo $_GET["txt-usuario4"]."<br>";
	echo $_GET["txt-comentario4"]."<br>";
	echo $_GET["txt-usuario5"]."<br>";
	echo $_GET["txt-comentario5"]."<br>";
	echo $_GET["btn-registrar"]."<br>";

	$archivo = fopen("memes.csv", "a+");
	fwrite($archivo, 
		$_GET["txt-descripcion"].",".
		$_GET["rbt-foto"].",".
		$_GET["txt-puntuacion"].",".
		$_GET["slc-imagen"].",".
		$_GET["txt-usuario1"].",".
		$_GET["txt-comentario1"].",".
		$_GET["txt-usuario2"].",".
		$_GET["txt-comentario2"].",".
		$_GET["txt-usuario3"].",".
		$_GET["txt-comentario3"].",".
		$_GET["txt-usuario4"].",".
		$_GET["txt-comentario4"].",".
		$_GET["txt-usuario5"].",".
		$_GET["txt-comentario5"]."\n"
	);
	fclose($archivo);

?>