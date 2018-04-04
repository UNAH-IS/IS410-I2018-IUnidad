<?php 
	
	if($_POST["carpeta"]=="home"){
		$archivo = fopen("../data/home.csv", "r");
	   	while(($linea = fgets($archivo))){
	   		$partes = explode(",", $linea);
	   		if($partes[1]=="folder"){
	   		echo '<tr>
	                 	<td><a href="index.php?carpeta='.$partes[0].'" ><i class="fas fa-'.$partes[1].'-open"></i> '.$partes[0].'</a></td>
	                 	<td id="u-m'.$partes[0].'">'.$partes[3].'</td>
	                 	<td id="u'.$partes[0].'">'.$partes[4].'</td>
	                 	<td id="t'.$partes[0].'">'.$partes[5].'</td>
	               </tr>';
	           }
	          else{
	   			$extension = explode(".", $partes[0]);
	   			if(($extension[1]=="png")||($extension[1]=="jpg")){
	           	echo '<tr>
	                 	<td><button class="btn btn-link" onclick="detalleRegistro(this.id);" id="'.$partes[0].'"><i class="fas fa-image"></i> '.$partes[0].'</button></td>
	                 	<td id="u-m'.$partes[0].'">'.$partes[3].'</td>
	<td id="u'.$partes[0].'">'.$partes[4].'</td>
	<td id="t'.$partes[0].'">'.$partes[5].'</td>
	               </tr>';
	           }
	           if($extension[1]=="pdf"){
	           	echo '<tr>
	                 	<td><button class="btn btn-link" onclick="detalleRegistro(this.id); id="'.$partes[0].'""><i class="fas fa-file-pdf" ></i> '.$partes[0].'</button></td>
	                 	<td id="u-m'.$partes[0].'">'.$partes[3].'</td>
	                 		<td id="u'.$partes[0].'">'.$partes[4].'</td>
	                 		<td id="t'.$partes[0].'">'.$partes[5].'</td>
	               </tr>';
	           }
	           if($extension[1]=="docx"){
	           	echo '<tr>
	                 	<td><button class="btn btn-link" onclick="detalleRegistro(this.id);" id="'.$partes[0].'"><i class="fas fa-file-word"></i> '.$partes[0].'</button></td>
	                 	<td id="u-m'.$partes[0].'">'.$partes[3].'</td>
	                 		<td id="u'.$partes[0].'">'.$partes[4].'</td>
	                 		<td id="t'.$partes[0].'">'.$partes[5].'</td>
	               </tr>';
	           }
	           if(($extension[1]=="aspx")||($extension[1]=="pptx")||($extension[1]=="txt")||($extension[1]=="html")||($extension[1]=="css")||($extension[1]=="js")||($extension[1]=="php")){
	           	echo '<tr>
	                 	<td><button class="btn btn-link" onclick="detalleRegistro(this.id);" id="'.$partes[0].'"><i class="fas fa-file" ></i> '.$partes[0].'</button></td>
	                 	<td id="u-m'.$partes[0].'">'.$partes[3].'</td>
	                 		<td id="u'.$partes[0].'">'.$partes[4].'</td>
	                 		<td id="t'.$partes[0].'">'.$partes[5].'</td>
	               </tr>';
	           }
	           }
	        }
	}
	if(!($_POST["carpeta"]=="home")){

		if(file_exists("../data/home/".$_POST["carpeta"]."/".$_POST["carpeta"].".csv")){
			$archivo = fopen("../data/home/".$_POST["carpeta"]."/".$_POST["carpeta"].".csv", "r");
			   	while(($linea = fgets($archivo))){
			   		$partes = explode(",", $linea);
			   		if($partes[1]=="folder"){
			   		echo '<tr>
			                 	<td><a href="index.php?carpeta='.$partes[0].'"><i class="fas fa-'.$partes[1].'-open"></i> '.$partes[0].'</a></td>
			                 	<td id="u-m'.$partes[0].'">'.$partes[3].'</td>
			                 		<td id="u'.$partes[0].'">'.$partes[4].'</td>
			                 		<td id="t'.$partes[0].'">'.$partes[5].'</td>
			               </tr>';
			           }
			          else{
			   			$extension = explode(".", $partes[0]);
			   			if(($extension[1]=="png")||($extension[1]=="jpg")){
			           	echo '<tr>
			                 	<td><button class="btn btn-link" onclick="detalleRegistro(this.id);" id="'.$partes[0].'"><i class="fas fa-image"></i> '.$partes[0].'</button></td>
			                 	<td id="u-m'.$partes[0].'">'.$partes[3].'</td>
			                 		<td id="u'.$partes[0].'">'.$partes[4].'</td>
			                 		<td id="t'.$partes[0].'">'.$partes[5].'</td>
			               </tr>';
			           }
			           if($extension[1]=="pdf"){
			           	echo '<tr>
			                 	<td><button class="btn btn-link" onclick="detalleRegistro(this.id);" id="'.$partes[0].'"><i class="fas fa-file-pdf"></i> '.$partes[0].'</button></td>
			                 	<td id="u-m'.$partes[0].'">'.$partes[3].'</td>
			                 		<td id="u'.$partes[0].'">'.$partes[4].'</td>
			                 		<td id="t'.$partes[0].'">'.$partes[5].'</td>
			               </tr>';
			           }
			           if($extension[1]=="docx"){
			           	echo '<tr>
			                 	<td><button class="btn btn-link" onclick="detalleRegistro(this.id);" id="'.$partes[0].'"><i class="fas fa-file-word"></i> '.$partes[0].'</button></td>
			                 	<td id="u-m'.$partes[0].'">'.$partes[3].'</td>
			                 		<td id="u'.$partes[0].'">'.$partes[4].'</td>
			                 		<td id="t'.$partes[0].'">'.$partes[5].'</td>
			               </tr>';
			           }
			           if(!(($extension[1]=="png")&&($extension[1]=="jpg"))&&($extension[1]=="pdf")&&($extension[1]=="docx")){
			           	echo '<tr>
			                 	<td><button class="btn btn-link" onclick="detalleRegistro(this.id);" value="'.$partes[0].'"><i class="fas fa-file"></i> '.$partes[0].'</button></td>
			                 	<td id="u-m'.$partes[0].'">'.$partes[3].'</td>
			                 		<td id="u'.$partes[0].'">'.$partes[4].'</td>
			                 		<td id="t'.$partes[0].'">'.$partes[5].'</td>
			               </tr>';
			           }
			           }
			        }
			    }else{
			    		echo '<tr>
			                 	<td><i class="far fa-frown"></i> carpeta vacía </td>
			           
			               </tr>';
			    }
	}
	fclose($archivo);
?>