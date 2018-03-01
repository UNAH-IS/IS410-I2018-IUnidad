<!DOCTYPE html>
<html>
<head>
	<title>Hola mundo en PHP</title>
</head>
<body>
	<!-- -->
	<?php 
		//Comentarios de una linea
		/*
		Comentarios de multiple linea
		*/
		#Comentario de una linea

		// int a = 1; En JAVA
		//$a=1; //Variables en PHP
		$nombre="Pedro";
		$arreglo=array();
		$arreglo[0] = "Primer valor";
		$arreglo["nombre"] = "Pedro";
		$arreglo[1] = 666;
		$arreglo[] = 5555;
		$arreglo[] = 4545;
		$arreglo[] = 455554;
		$arreglo[] = 4444;
		//$arreglo[1]["llave"]="";

		for($i = 0; $i<50; $i++)
			echo "Hola ". $nombre."<br>\n";


	?>
</body>
</html>