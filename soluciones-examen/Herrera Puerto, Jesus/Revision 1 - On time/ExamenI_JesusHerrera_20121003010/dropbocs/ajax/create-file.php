<?php 
if($_POST["carpeta"]=="home"){
$archivo = fopen("../data/home.csv", "a+");
fwrite($archivo, $_POST["archivo-nuevo"].",file,".
				$_POST["fecha-creacion"].",".
				$_POST["fecha-modificacion"].",".
				$_POST["usuario"].",".
				$_POST["tamanio"]."\n");
echo "success";	
}
else{
$archivo = fopen("../data/home/".$_POST["carpeta"]."/".$_POST["carpeta"].".csv", "a+");
fwrite($archivo, $_POST["archivo-nuevo"].",file,".
				$_POST["fecha-creacion"].",".
				$_POST["fecha-modificacion"].",".
				$_POST["usuario"].",".
				$_POST["tamanio"]."\n");
echo "success";	
}
fclose($archivo);
?>