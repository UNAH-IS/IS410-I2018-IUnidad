<?php
	sleep(3);
	//var_dump($_POST);

	$archivo = fopen("usuarios.csv","a+");
	fwrite(
		$archivo, 
		$_POST["nombre"].",".
		$_POST["apellido"].",".
		$_POST["correo"].",".
		$_POST["password"].",".
		$_POST["dia"].",".
		$_POST["mes"].",".
		$_POST["anio"].",".
		$_POST["genero"]."\n"
	);
	fclose($archivo);


?>