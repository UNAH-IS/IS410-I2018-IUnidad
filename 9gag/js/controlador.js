function comentar(temp){
	alert(temp);
}
function guardarRegistro(){
	//alert("Se guardara la informacion");
	//alert("Descripcion: " + document.getElementById("txt-descripcion").value);
	
	
	var parametros = 
		"txt-descripcion="+$("#txt-descripcion").val()+"&"+
		"rbt-foto="+$("input[type='radio'][name='rbt-foto']:checked").val()+"&"+
		"txt-puntuacion="+$("#txt-puntuacion").val()+"&"+
		"slc-imagen="+$("#slc-imagen").val()+"&"+
		"txt-usuario1="+$("#txt-usuario1").val()+"&"+
		"txt-comentario1="+$("#txt-comentario1").val()+"&"+
		"txt-usuario2="+$("#txt-usuario2").val()+"&"+
		"txt-comentario2="+$("#txt-comentario2").val()+"&"+
		"txt-usuario3="+$("#txt-usuario3").val()+"&"+
		"txt-comentario3="+$("#txt-comentario3").val()+"&"+
		"txt-usuario4="+$("#txt-usuario4").val()+"&"+
		"txt-comentario4="+$("#txt-comentario4").val()+"&"+
		"txt-usuario5="+$("#txt-usuario5").val()+"&"+
		"txt-comentario5="+$("#txt-comentario5").val();
	//alert("Parametros: " + parametros);
	$.ajax({
		url:"ajax/guardar-registro.php",
		data:parametros,
		method:"POST",
		success:function(respuesta){
			$("#div-memes").html(respuesta  +  $("#div-memes").html());
		},
		error:function(e){
			alert("Error: "+e);
		}
	});
}

$(document).ready(function(){
	//alert("El DOM ha sido cargado, la pagina esta lista");
	$.ajax({
		url:"ajax/obtener-memes.php",
		data:"",
		method:"POST",
		success:function(respuesta){
			$("#div-memes").html(respuesta);
		}
	});
});