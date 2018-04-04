<?php 

	if (isset($_GET['navegar'])) {
		$respuesta = new stdClass();
		$respuesta->infoCarpetas = [];

		$direccionNueva = $_GET['direccionNueva'];
		$file=fopen("data/".$direccionNueva.".csv", "r");
		while(! feof($file))
  		{
  			$respuesta->infoCarpetas[] = fgetcsv($file);
  		}
		fclose($file);
		echo json_encode($respuesta);
	}

	if (isset($_GET['detalleRegistro'])) {
		$respuesta = new stdClass();

		$direccionActual = $_GET['direccionActual'];
		$file=fopen("data/".$direccionActual.".csv", "r");
		while(! feof($file))
  		{	
  			$csv = fgetcsv($file);
  			if($csv[0]==$_GET['nombreArchivo']){
  				$respuesta->detalleArchivo = $csv;
  				break;
  			}
  		}
		fclose($file);
		echo json_encode($respuesta);
	}
	
	if (isset($_GET['crearArchivo'])) {
		$respuesta = new stdClass();

		$direccionActual = $_GET['direccionActual'];
		$csv = $_GET['nombreArchivo'] . "," . "file" . "," .$_GET['fechaModificacion'] . "," .$_GET['fechaCreacion'] . "," .$_GET['usuario'] . "," .$_GET['tamanio'] . PHP_EOL;
		$file=fopen("data/".$direccionActual.".csv", "a");
		fwrite($file, $csv);
		fclose($file);
		$respuesta->success = true;
		echo json_encode($respuesta);
	}

	if (isset($_GET['crearCarpeta'])) {
		$respuesta = new stdClass();

		$direccionActual = $_GET['direccionActual'];
		$csv = $_GET['nombreArchivo'] . "," . "folder" . "," .$_GET['fechaModificacion'] . "," .$_GET['fechaCreacion'] . "," .$_GET['usuario'] . "," .$_GET['tamanio'] . PHP_EOL;
		$file=fopen("data/".$direccionActual.".csv", "a");
		fwrite($file, $csv);
		fclose($file);
		mkdir("data/".$direccionActual."/".$_GET['nombreArchivo']);
		$file=fopen("data/".$direccionActual . "/" . $_GET['nombreArchivo'] . ".csv", "w");
		fclose($file);
		$respuesta->success = true;
		echo json_encode($respuesta);
	}


 ?>