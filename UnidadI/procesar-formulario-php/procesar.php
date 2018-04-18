<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		echo "Este es el archivo que procesara la informacion<br>";
		echo "El usuario que ingreso es: " . $_POST["txt-usuario"]."<br>";
		echo "El password que ingreso es: " . $_POST["txt-contrasena"]."<br>";

		$archivo = fopen("usuarios.csv","a+");
		fwrite($archivo, $_POST["txt-usuario"] . "," . $_POST["txt-contrasena"]."\n");
		fclose($archivo);
	?>
	<a href="lista-usuarios.php">Ver usuarios registrados</a>
</body>
</html>