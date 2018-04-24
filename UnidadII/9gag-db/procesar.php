<?php

	include("class/class-conexion.php");

	$conexion = new Conexion();
	echo "Conexion establecida<br>";

	$sql = 	"SELECT codigo_usuario, nombre, fecha_nacimiento, ".
			"genero, fotografia ".
			"FROM tbl_usuarios";
	
	$resultado = $conexion->ejecutarConsulta($sql);

	while($fila = $conexion->obtenerFila($resultado)){
		var_dump($fila);
		echo "<br>";
	}

	$conexion->cerrarConexion();

?>