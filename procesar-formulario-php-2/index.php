<?php
		if (isset($_POST)){
			if (isset($_POST["btn-login"])){
				echo "Este es el archivo que procesara la informacion<br>";
				echo "El usuario que ingreso es: " . $_POST["txt-usuario"]."<br>";
				echo "El password que ingreso es: " . $_POST["txt-contrasena"]."<br>";

				$archivo = fopen("usuarios.csv","a+");
				fwrite($archivo, $_POST["txt-usuario"] . "," . $_POST["txt-contrasena"]."\n");
				fclose($archivo);
			}
		}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="index.php" method="POST">
		<input type="text" name="txt-usuario" id="txt-usuario" placeholder="Usuario">
		<input type="password" name="txt-contrasena" id="txt-contrasena" placeholder="Contraseña">
		<input type="submit" value="Iniciar Sesion" name="btn-login">
	</form>
	<hr>
	<table border="1" cellspacing="0">
		<tr>
			<th>Nombre</th>
			<th>Contraseña</th>
		</tr>
		<?php
			$archivo = fopen("usuarios.csv","r");
			while(($linea = fgets($archivo))){
				$partes = explode(",", $linea);
				echo  '<tr><td>' . $partes[0] . '</td><td>'.$partes[1].'</td><td><a href="eliminar.php?usuario='.$partes[0] .'">Eliminar</a></td></tr>';
			}
		?>
	</table>
</body>
</html>

