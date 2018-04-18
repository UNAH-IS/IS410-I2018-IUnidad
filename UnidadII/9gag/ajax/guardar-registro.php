<?php
	
	include("../class/class-post.php");
	include("../class/class-meme.php");
	
	$m = new Meme(
		$_POST["codigo"],
		$_POST["descripcion"],
		date("d/m/Y"),
		$_POST["usuario"],
		$_POST["calificacion"],
		$_POST["imagen"],
		null
	);

	$m->guardarPost();

	$m->imprimirMeme();
?>