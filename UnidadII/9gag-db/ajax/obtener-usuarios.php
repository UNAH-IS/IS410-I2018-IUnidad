<?php
	include("../class/class-conexion.php");

	$conexion = new Conexion();
	//echo "Conexion establecida<br>";

	$sql = 	"SELECT codigo_usuario, nombre, fecha_nacimiento, ".
			"genero, fotografia ".
			"FROM tbl_usuarios";
	
	$resultado = $conexion->ejecutarConsulta($sql);

	$resultadoUsuarios = array();
	while($fila = $conexion->obtenerFila($resultado)){
		$resultadoUsuarios[] = $fila;
	}

	echo json_encode($resultadoUsuarios);
	
	$conexion->cerrarConexion();

	//echo '<label>'.$partes[0].'<input type="radio" value="'.$partes[0].'" name="rbt-usuario"><img src="'.$partes[1].'" class="img-responsive img-circle"></label>';
	
?>