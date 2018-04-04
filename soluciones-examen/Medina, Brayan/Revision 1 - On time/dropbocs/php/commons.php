<?php
	//Brayan: Funcion que se encarga de obtener la clase css del icono que hace referencia a una extension en particular
	function obtenerIconoArchivo($extension)
	{
	    $nombreIconoArchivo = null;
	    switch ($extension) {
	        case 'aspx':
	          $nombreIconoArchivo = 'far fa-file';
	          break;
	        case 'png':
	          $nombreIconoArchivo = 'far fa-image';
	          break;
	        case 'jpg':
	          $nombreIconoArchivo = 'far fa-image';
	          break;
	        case 'pdf':
	          $nombreIconoArchivo = 'far fa-file-pdf';
	          break;
	        case 'docx':
	          $nombreIconoArchivo = 'far fa-file-word';
	          break;

	        default:
	          $nombreIconoArchivo = 'far fa-file';
	          break;
	    }
	    return $nombreIconoArchivo;
	}
?>