<?php
    require_once('commons.php');
    
    $partesArchivo = explode('.', $_POST["nombreArchivo"]);
    $nombreIconoArchivo = null;
    $partesRuta = explode('/', $_POST["nombreRuta"]);

    //Verificamos la extension del archivo, para definir el icono
    if(count($partesArchivo) == 2){//Validamos que se haya agregado la extension
      $nombreIconoArchivo = obtenerIconoArchivo($partesArchivo[1]);
    }
    else
      $nombreIconoArchivo = 'far fa-file';

    //Agregamos el registr al archivo padre correspondiente
    $archivo = fopen('../data/'.$_POST["nombreRuta"].'.csv', 'a+');
    fwrite($archivo, $_POST["nombreArchivo"] . ",".$_POST["tipoFichero"] . ',' . $_POST["fechaModificacion"] . ",". $_POST["fechaCreacion"]. "," . $_POST["usuarioCreador"] . "," . $_POST["tamanio"] . "\n");
    fclose($archivo);

    //Establecemos los atributos de la etiqueta btton
    $parteInicialEtiqueta = 'button class="btn btn-link" onclick="detalleRegistro(\''.$_POST["nombreArchivo"].'\',\''.$nombreIconoArchivo.'\',\''.$_POST["fechaCreacion"].'\',\''.$_POST["fechaModificacion"].'\',\''.$_POST["usuarioCreador"].'\');"';

    //Imprimimos el registro del archivo agregado
    echo '<tr>
             <td><'.$parteInicialEtiqueta.'><i class="'.$nombreIconoArchivo.'"></i> '.$_POST["nombreArchivo"].'</button></td>
             <td>'.$_POST["fechaModificacion"].'</td>
             <td>'.$_POST["usuarioCreador"].'</td>
             <td>'.$_POST["tamanio"].'</td>
           </tr>';
?>