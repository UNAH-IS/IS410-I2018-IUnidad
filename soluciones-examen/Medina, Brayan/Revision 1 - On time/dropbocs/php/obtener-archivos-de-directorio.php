<?php
	require_once('commons.php');
	
	if(file_exists('../data/'.$_GET["nombreRuta"].'.csv')){
	    //Cargamos los registros del archivo
	    $archivo = fopen('../data/'.$_GET["nombreRuta"].'.csv', 'r');
	    while(($linea = fgets($archivo))){
	        $partesFichero = explode(',',$linea);
	        $nombreIconoArchivo = null;
	        $parteInicialEtiqueta = null;
	        $parteFinalEtiqueta = null;
        	$partesArchivo = explode('.', $partesFichero[0]);
	        
	        //Verificamos la extension de cada archivo
	        if($partesFichero[1] == 'file'){
	        	//Validamos que se haya agregado la extension
	        	if(count($partesArchivo) == 2)
	        		$nombreIconoArchivo = obtenerIconoArchivo($partesArchivo[1]);
	        	else
	        		$nombreIconoArchivo = 'far fa-file';
	        	
	        	$parteInicialEtiqueta = 'button class="btn btn-link" onclick="detalleRegistro(\''.$partesFichero[0].'\',\''.$nombreIconoArchivo.'\',\''.$partesFichero[3].'\',\''.$partesFichero[2].'\',\''.$partesFichero[4].'\');"';
	        	$parteFinalEtiqueta = 'button';
	        }
	        else{
	        	$parteInicialEtiqueta = 'a href="index.php?carpeta='.$_GET["nombreRuta"].'/'.$partesArchivo[0].'"';
	        	$parteFinalEtiqueta = 'a';
	        	$nombreIconoArchivo = 'fas fa-folder-open';
	        }

	        //Imprimimos cada fichero
	        echo '<tr>
	                 <td><'.$parteInicialEtiqueta.'><i class="'.$nombreIconoArchivo.'"></i> '.$partesFichero[0].'</'.$parteFinalEtiqueta.'></td>
	                 <td>'.$partesFichero[2].'</td>
	                 <td>'.$partesFichero[4].'</td>
	                 <td>'.$partesFichero[5].'</td>
	               </tr>';
	    }
	    fclose($archivo);
	}
?>