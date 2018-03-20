function comentar(temp){
	alert(temp);
}
function guardarRegistro(){
	
}

$(document).ready(function(){
	//Esta funcion se ejecutar cuando todo el DOM se haya cargado
	$.ajax({
		url:"ajax/obtener-usuarios.php",
		success:function(respuesta){
			$("#div-usuarios").html(respuesta);
		}
	});
});
