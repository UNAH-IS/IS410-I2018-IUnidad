$(document).ready(function(){
	//Cargamos los registros a mostrar
	$.ajax({
		url:'php/obtener-archivos-de-directorio.php',
		method:'GET',
		data: 'nombreRuta=' + $("#txt-carpeta-actual").val(),
		success:function(respuesta){
			$('#ficheros').html(respuesta);
		}
	});
});

//Brayan: Funcion que limpia todos los input de un formulario en especifico
function limpiarFormulario(tipoFichero, idModal){
	$('#txt-'+tipoFichero+'-nombre').val('');
	$('#txt-'+tipoFichero+'-fecha-modificacion').val('');
	$('#txt-'+tipoFichero+'-fecha-creacion').val('');
	$('#txt-'+tipoFichero+'-usuario-creador').val('');
	$('#txt-'+tipoFichero+'-tamanio').val('');
	$('#'+idModal+'').modal('toggle');
}

//Brayan: Funcion que abre una modal y agina a una tabla, la informacion del archivo seleccionado
function detalleRegistro(nombreArchivo, icono, fechaCreacion, fechaModificacion, usuarioCreador){
	$("#detalle-archivo-icono").addClass(icono);
	$("#modal-detalle").modal("show");
	$('#detalle-archivo-nombre').text(nombreArchivo);
	$('#detalle-archivo-usuario').text(usuarioCreador);
	$('#detalle-archivo-fecha-creacion').text(fechaCreacion);
	$('#detalle-archivo-fecha-modificacion').text(fechaModificacion);
}

//Brayan: Funcion que se encarga de validad un formulario en especifico
function esFormularioValido(tipoFichero){
	var formularioValido = $('#txt-'+tipoFichero+'-nombre').val() != '' && 
						   $('#txt-'+tipoFichero+'-fecha-modificacion').val() != '' && 
						   $('#txt-'+tipoFichero+'-fecha-creacion').val() != '' && 
						   $('#txt-'+tipoFichero+'-usuario-creador').val() != '' && 
						   $('#txt-'+tipoFichero+'-tamanio').val() != '' && 
						   $('#txt-'+tipoFichero+'-actual').val() != '';
	return formularioValido;
}

//Brayan: Funcion que se encarga de hacer una peticion para registrar una carpeta
function guardarCarpeta(){
	if(esFormularioValido('carpeta')){
		var carpeta = 'nombreCarpeta=' + $('#txt-carpeta-nombre').val()+
					  '&tipoFichero=folder'+
					  '&fechaModificacion=' + $('#txt-carpeta-fecha-modificacion').val()+
					  '&fechaCreacion=' + $('#txt-carpeta-fecha-creacion').val()+
					  '&usuarioCreador=' + $('#txt-carpeta-usuario-creador').val()+
					  '&tamanio=' + $('#txt-carpeta-tamanio').val()+
					  '&nombreRuta='+$("#txt-carpeta-actual").val();
		$.ajax({
			url:'php/crear-carpeta.php',
			method:'POST',
			data: carpeta,
			success:function(respuesta){
				limpiarFormulario('carpeta', 'modal-carpeta');
				$('#ficheros').append(respuesta);
			}
		});
	}
	else
		alert('Todos los campos son requeridos!');
}

//Brayan: Funcion que se encarga de hacer una peticion para registrar un archivo
function guardarArchivo(){
	if(esFormularioValido('archivo')){
		var archivo = 'nombreArchivo=' + $('#txt-archivo-nombre').val()+
					  '&tipoFichero=file'+
					  '&fechaModificacion=' + $('#txt-archivo-fecha-modificacion').val()+
					  '&fechaCreacion=' + $('#txt-archivo-fecha-creacion').val()+
					  '&usuarioCreador=' + $('#txt-archivo-usuario-creador').val()+
					  '&tamanio=' + $('#txt-archivo-tamanio').val()+
					  '&nombreRuta='+$("#txt-carpeta-actual").val();
		$.ajax({
			url:'php/crear-archivo.php',
			method:'POST',
			data: archivo,
			success:function(respuesta){
				limpiarFormulario('archivo', 'modal-archivo');
				$('#ficheros').append(respuesta);
			}
		});
	}
	else
		alert('Todos los campos son requeridos!');
}