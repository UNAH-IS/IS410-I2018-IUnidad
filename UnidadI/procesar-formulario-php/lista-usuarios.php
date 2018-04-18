<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Lista usuarios</title>
</head>
<body>
	<table border="1" cellspacing="0">
		<tr>
			<th>Nombre</th>
			<th>Contraseña</th>
		</tr>
	<?php
		$archivo = fopen("usuarios.csv","r");
		while(($linea = fgets($archivo))){
			$partes = explode(",", $linea);
			echo  "<tr><td>" . $partes[0] . "</td><td>".$partes[1]."</td></tr>";
		}
	?>
	</table>
</body>
</html>