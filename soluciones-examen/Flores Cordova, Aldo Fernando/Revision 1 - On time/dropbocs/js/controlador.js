$(document).ready(function(){
	console.log("El DOM ha sido cargado");
	console.log("Carpeta actual: " + $("#txt-carpeta-actual").val());
	inicio();
});

function detalleRegistro(nombreArchivo){
	alert(nombreArchivo);
	direccionActual = $("#txt-carpeta-actual").val();
	data = {
		detalleRegistro: "true",
		direccionActual: direccionActual,
		nombreArchivo: nombreArchivo
	}
	console.log(data);
	$.ajax({
		type: "GET",
		url: "controlador.php",
		dataType: "json",
		data: data,
		success: function(respuesta){
			crearModal(respuesta.detalleArchivo);
		}
	});
}

function crearModal(detalleArchivo){
	$("#modal-detalle .modal-body").empty();
	texto = "<div class='row'><div class='col-sm-6'>Nombre de Archivo</div><div class='col-sm-6'>"+detalleArchivo[0]+"</div></div>";
	texto = texto + "<div class='row'><div class='col-sm-6'>Fecha de Modificación</div><div class='col-sm-6'>"+detalleArchivo[2]+"</div></div>";
	texto = texto + "<div class='row'><div class='col-sm-6'>Fecha de Creación</div><div class='col-sm-6'>"+detalleArchivo[3]+"</div></div>";
	texto = texto + "<div class='row'><div class='col-sm-6'>Usuario</div><div class='col-sm-6'>"+detalleArchivo[4]+"</div></div>";
	texto = texto + "<div class='row'><div class='col-sm-6'>Tamaño</div><div class='col-sm-6'>"+detalleArchivo[5]+"</div></div>";
	$("#modal-detalle .modal-body").append(texto)
	$("#modal-detalle").modal("show");
}

function inicio(){
	$("#txt-carpeta-actual").val("home");
	data = {
		navegar: "true",
		direccionNueva: "home"
	}
	console.log(data);
	$.ajax({
		type: "GET",
		url: "controlador.php",
		dataType: "json",
		data: data,
		success: function(respuesta){
			destruirEstructura();
			crearEstructura(respuesta.infoCarpetas);
		}
	});
}

function navegar(nombreArchivo){
	direccionActual = $("#txt-carpeta-actual").val();
	if(nombreArchivo == "")
		direccionNueva = direccionActual;
	else
		direccionNueva = direccionActual + "/" + nombreArchivo;
	$("#txt-carpeta-actual").val(direccionNueva);
	data = {
		navegar: "true",
		direccionNueva: direccionNueva
	}
	console.log(data);
	$.ajax({
		type: "GET",
		url: "controlador.php",
		dataType: "json",
		data: data,
		success: function(respuesta){
			destruirEstructura();
			crearEstructura(respuesta.infoCarpetas);
		}
	});
}

function crearEstructura(infoCarpetas){
	for (var i = 0; i < infoCarpetas.length; i++) {
		if(infoCarpetas[i][1] == "folder"){
			texto = "<tr><td><a onclick='navegar(this.text);'><i class='fas fa-folder-open'></i>"+infoCarpetas[i][0]+"</a></td><td>"+infoCarpetas[i][3]+"</td><td>"+infoCarpetas[i][4]+"</td><td>"+infoCarpetas[i][5]+"</td></tr>";
			$("#contenido").append(texto);
		}else if (infoCarpetas[i][1] == "file") {
			texto = "<tr><td><button class='btn btn-link' onclick='detalleRegistro(this.innerText);'><i class='far fa-file'></i>"+infoCarpetas[i][0]+"</button></td><td>"+infoCarpetas[i][3]+"</td><td>"+infoCarpetas[i][4]+"</td><td>"+infoCarpetas[i][5]+"</td></tr>";
			$("#contenido").append(texto);
		}
	}
	
}

function destruirEstructura(){
	$("#contenido").empty();
}

function crearArchivo(){
	console.log("wtf");
	direccionActual = $("#txt-carpeta-actual").val();
	nombreArchivo = $("#txt2NombreArchivo").val();
	fechaCreacion = $("#txt2FechaCreacion").val();
	fechaModificacion = $("#txt2FechaModificacion").val();
	usuario = $("#txt2Usuario").val();
	tamanio = $("#txt2Tamanio").val();

	data = {
		crearArchivo: "true",
		direccionActual: direccionActual,
		nombreArchivo: nombreArchivo,
		fechaModificacion: fechaModificacion,
		fechaCreacion: fechaCreacion,
		usuario: usuario,
		tamanio: tamanio
	}
	console.log(data);
	$.ajax({
		type: "GET",
		url: "controlador.php",
		dataType: "json",
		data: data,
		success: function(respuesta){
			alert("Archivo Creado");
			navegar("");
		}
	});
}

function crearCarpeta(){
	direccionActual = $("#txt-carpeta-actual").val();

	nombreArchivo = $("#txt1NombreArchivo").val();
	fechaCreacion = $("#txt1FechaCreacion").val();
	fechaModificacion = $("#txt1FechaModificacion").val();
	usuario = $("#txt1Usuario").val();
	tamanio = $("#txt1Tamanio").val();

	data = {
		crearCarpeta: "true",
		direccionActual: direccionActual,
		nombreArchivo: nombreArchivo,
		fechaModificacion: fechaModificacion,
		fechaCreacion: fechaCreacion,
		usuario: usuario,
		tamanio: tamanio
	}
	console.log(data);
	$.ajax({
		type: "GET",
		url: "controlador.php",
		dataType: "json",
		data: data,
		success: function(respuesta){
			alert("Carpeta Creada")
			navegar("");
		}
	});
}