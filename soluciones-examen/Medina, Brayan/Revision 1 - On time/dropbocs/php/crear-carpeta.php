<?php
    //Creamos la carpeta que hace referencia a la ruta
    mkdir('../data/'.$_POST["nombreRuta"].'/'.$_POST["nombreCarpeta"]);

    //Creamos el archivo csv que hace referencia a la carpeta
    $archivo = fopen('../data/'.$_POST["nombreRuta"].'.csv', 'a+');
    fclose($archivo);

    //Agregamos el registro al archivo padre
    $partesRuta = explode('/', $_POST["nombreRuta"]);
    $archivo = fopen('../data/'.$_POST["nombreRuta"].'.csv', 'a+');
    fwrite($archivo, $_POST["nombreCarpeta"] . ", ".$_POST["tipoFichero"] . ',' . $_POST["fechaModificacion"] . ", ". $_POST["fechaCreacion"]. ", " . $_POST["usuarioCreador"] . ", " . $_POST["tamanio"] . "\n");
    fclose($archivo);

    //Imprimimos el fichero agregado
    echo '<tr>
      	 	<td><a href="index.php?carpeta='.$_POST["nombreRuta"].'/'.$_POST["nombreCarpeta"].'"><i class="fas fa-folder-open"></i> '.$_POST["nombreCarpeta"].'</a></td>
      	 	<td>'.$_POST["fechaModificacion"].'</td>
      	 	<td>'.$_POST["usuarioCreador"].'</td>
      	 	<td>'.$_POST["tamanio"].'</td>
    	 </tr>';
?>