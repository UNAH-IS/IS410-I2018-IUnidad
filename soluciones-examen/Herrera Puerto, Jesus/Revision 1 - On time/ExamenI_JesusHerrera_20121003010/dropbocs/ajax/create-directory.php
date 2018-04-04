<?php 
mkdir("../data/home/".$_POST["carpeta-nueva"]);
$archivo = fopen("../data/home.csv", "a+");
fwrite($archivo, $_POST["carpeta-nueva"].",folder,".
				$_POST["fecha-creacion"].",".
				$_POST["fecha-modificacion"].",".
				$_POST["usuario"].",".
				$_POST["tamanio"]."\n");
echo "success";	
fclose($archivo);
?>