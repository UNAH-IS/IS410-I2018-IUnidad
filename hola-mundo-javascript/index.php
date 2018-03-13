
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- Contenido de la pagina web -->

	<div id="contenido"></div>
	<?php
		echo "Hola mundo desde PHP<br>";
		echo "<script>alert('Este es un mensaje de un codigo javascript que fue generado desde un codigo en PHP... QUE LOCO...');</script>";
	?>
	<script>
		//Comentario de una linea
		/*
			Comentarios de multiples lineas
		*/

		var nombre ="Juan";

		//Incluir un mensaje en el html
		document.write("Hola "+nombre+" desde Javascript");
		//Utilizando un cuadro de dialogo
		alert("Hola "+nombre);
		//Utilizando la consola del navegador
		console.log("Hola "+nombre+" desde la consola de Javascript");
		//Asignar contenido a una etiqueta especifica
		document.getElementById("contenido").innerHTML  = "Hola "+nombre+" (Contenido dinamico ubicado Utilizando JS) <br>";
	</script>
	<script src="js/prueba.js"></script>
</body>
</html>