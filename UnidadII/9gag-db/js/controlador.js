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
		dataType:'json',
		success:function(respuesta){
			console.log(respuesta);
			for (var i=0; i<respuesta.length; i++){
				$("#div-usuarios").append('<label>'+respuesta[i].nombre+'<input type="radio" value="'+respuesta[i].codigo_usuario+'" name="rbt-usuario"><img src="'+respuesta[i].fotografia+'" class="img-responsive img-circle"></label>');	
			}
			//$("#div-usuarios").html(respuesta);
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

function editarMeme(codigoMeme){
	$.ajax({
		url:"ajax/editar-meme.php",
		data:"codigo-meme="+codigoMeme,
		method: "POST",
		dataType:"json",
		success:function(respuesta){
			$("#txt-codigo").val(respuesta.codigoMeme);
			$("#txt-descripcion").val(respuesta.descripcion);
			$("#txt-calificacion").val(respuesta.calificacion);
			$("#slc-imagen").val(respuesta.urlImagen);
			$("input[name=rbt-usuario][value=" + respuesta.usuario + "]").attr('checked', 'checked');

			$("#btn-actualizar").show();
			$("#btn-cancelar").show();
			$("#btn-guardar").hide();
			console.log(respuesta);
		},
		error:function(error){
			console.log(error);
		}
	});

}