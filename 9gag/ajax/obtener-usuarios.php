<?php
	$archivo = fopen("../data/usuarios.csv","r");
	while(($linea=fgets($archivo))){
		$partes = explode(",", $linea);
		echo '<label>'.$partes[0].'<input type="radio" value="'.$partes[0].'" name="rbt-foto"><img src="'.$partes[1].'" class="img-responsive img-circle"></label>';
	}
	fclose($archivo);
?>