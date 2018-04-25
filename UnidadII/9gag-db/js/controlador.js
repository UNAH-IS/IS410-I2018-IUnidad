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
		url:"ajax/api.php?accion=guardar-registro",
		method:"POST",
		data:parametros,
		dataType:"json",
		success:function(respuesta){
			console.log(respuesta);
			$("#div-memes").append(respuesta);
		}
	});
}

$(document).ready(function(){
	//Esta funcion se ejecutar cuando todo el DOM se haya cargado
	$.ajax({
		url:"ajax/api.php?accion=obtener-usuarios",
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
		url:"ajax/api.php?accion=obtener-memes",
		dataType: "json",
		success:function(respuesta){
			console.log(respuesta);
			var contenido = "";
			////////////////////////////////////////////
			for (var i = 0; i<respuesta.length; i++){
				contenido += 	' <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">'+
								'  <div class="well">'+
								'    <strong>'+ respuesta[i].nombre +'</strong>'+
								'    <p>'+respuesta[i].descripcion+'</p>'+
								'	<button type="button" onclick="editarMeme('+respuesta[i].codigo_meme+');" class="btn btn-primary">Editar</button>'+
								'    <img src="'+respuesta[i].url_imagen+'" class="img-responsive">'+
								'    <span class="badge">Calificación: ';
				
				for (var j=0; j<respuesta[i].calificacion;j++)
					contenido += '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
		
				contenido += 	'</span><span class="badge">Comentarios: 0</span><p>'+
								'	  <hr><h4>Comentarios:</h4><div id="div-comentarios-'+respuesta[i].codigo_meme+ '">';
		
				
				for(var k=0; k<respuesta[i].comentarios.length; k++ )
					contenido += '<div><strong>'+respuesta[i].comentarios[k].nombre+'</strong><p class="commentario">'+respuesta[i].comentarios[k].descripcion+'</p></div>';

				contenido += 	'</div><textarea class="form-control" placeholder="Comentario" id="txt-comentario-meme-'+respuesta[i].codigo_meme+'"></textarea>'+
								'<button type="button" class="btn btn-default" onclick="comentar('+respuesta[i].codigo_meme+');">Publicar comentario</button>'+
								'</p></div></div>';
			}
			///////////////////////////////////////////////

			$("#div-memes").html(contenido);
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