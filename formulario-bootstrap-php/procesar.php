<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	Archivo que procesara la información
	<?php

		echo "Nombre: " . $_GET["txt-nombre"]."<br>";
		echo "Apellido" . $_GET["txt-apellido"]."<br>";
		echo "Direccion: " . $_GET["txta-direccion"]."<br>";
		echo "Genero: " . $_GET["rbt-genero"]."<br>";
		echo "Gustos: ";
		for ($i=0;$i<sizeof($_GET["chk-gustos"]);$i++)
			echo $_GET["chk-gustos"][$i]." ";

		echo "<br>";

		echo "Pais: " . $_GET["slc-pais"]."<br>";
		
		echo "Paises visita: <br>";
		var_dump($_GET["slc-paises-visita"]); //Imprime el detalle de un arreglo para fines de depuración
		
		echo "Contrasena: " . $_GET["constrasena"]."<br>";
		echo "Fecha: " . $_GET["txt-fecha-nacimiento"]."<br>";
		echo "Email: " . $_GET["txt-email"]."<br>";
		echo "-----------------VAR_DUMP completo de $ _GET------<br>";
		var_dump($_GET);
	?>
</body>
</html>