function comentar(codigoMeme){
	alert("Se comentara para el meme con codigo: " + codigoMeme+
		", El comentario es: "+ $("#txt-comentario-meme-"+codigoMeme).val());
	
	var parametros= "codigo-meme="+codigoMeme+"&"+
					"comentario="+$("#txt-comentario-meme-"+codigoMeme).val()+"&"+
					"usuario="+$('input[name="rbt-usuario"]:checked').val();

	console.log("Información a enviar: " + parametros);
	$.ajax({
		url:"ajax/guardar-comentario.php",
		method:"POST",
		data:parametros,
		success:function(respuesta){
			console.log("Resultado del servidor: "+respuesta);
		}
	});
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

	$.ajax({
		url:"ajax/obtener-memes.php",
		success:function(respuesta){
			$("#div-memes").html(respuesta);
		}
	});
});
