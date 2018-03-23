function comentar(codigoMeme){
	/*alert("Se comentara para el meme con codigo: " + codigoMeme+
		", El comentario es: "+ $("#txt-comentario-meme-"+codigoMeme).val());
	*/
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
			$("#div-comentarios-"+codigoMeme).append(respuesta);
		}
	});
}

function guardarRegistro(){
	var parametros= "codigo="+$("#txt-codigo").val()+"&"+
					"descripcion="+$("#txt-descripcion").val()+"&"+
					"usuario="+$("input[name='rbt-usuario']:checked").val()+"&"+
					"calificacion="+$("#txt-calificacion").val()+"&"+
					"imagen="+$("#slc-imagen").val();
	console.log(parametros);
	$.ajax({
		url:"ajax/guardar-registro.php",
		method:"POST",
		data:parametros,
		success:function(respuesta){
			$("#div-memes").append(respuesta);
		}
	});
}

$(document).ready(function(){
	//Esta funcion se ejecutar cuando todo el DOM se haya cargado
	$.ajax({
		url:"ajax/obtener-usuarios.php",
		success:function(respuesta){
			$("#div-usuarios").html(respuesta);
		}
	});

	cargarMemes();	
});


function cargarMemes(){
	$.ajax({
		url:"ajax/obtener-memes.php",
		success:function(respuesta){
			$("#div-memes").html(respuesta);
		}
	});
}