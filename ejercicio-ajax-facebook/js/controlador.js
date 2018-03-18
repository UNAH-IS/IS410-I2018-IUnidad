function validar(){
	var resultado = true;
	validarCampoVacio("txt-nombre");
	validarCampoVacio("txt-apellido");
	validarCampoVacio("txt-correo");
	/*if (
		!validarCampoVacio("txt-nombre") || 
		!validarCampoVacio("txt-apellido") || 
		!validarCampoVacio("txt-correo")
	)  
		resultado = false;*/

}


var validarCampoVacio = function(id){
	
	if ($("#"+id).val() == ""){
		$("#"+id).removeClass('is-valid');
		$("#"+id).addClass('is-invalid');
		return false;
	}
	else{
		$("#"+id).removeClass('is-invalid');
		$("#"+id).addClass('is-valid');
		return true;
	}
};

function validarContrasena(etiqueta){
	if (etiqueta.value.length<6) {
		etiqueta.classList.remove("is-valid");
		etiqueta.classList.add("is-invalid");
	}
	else{
		etiqueta.classList.remove("is-invalid");
		etiqueta.classList.add("is-valid");
	}
}

function validarEmail(email) {
    var patron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (patron.test(String(email.value).toLowerCase())){
    	email.classList.remove("is-invalid");
    	email.classList.add("is-valid");
    }
    else{
    	email.classList.remove("is-valid");
    	email.classList.add("is-invalid");
    }
}

$("#btn-login").click(function(){
	/*if (validar())
		console.log("Todo esta bien");
	else 
		console.log("Hay al menos un error");*/
	validar();
	$("#btn-login").attr("disabled","disabled");
	$("#respuesta").html('<img src="img/loading.gif"><i class="fas fa-sync fa-spin"></i>');
	var parametros = 
			"nombre="+$("#txt-nombre").val() + 
			"&apellido="+$("#txt-apellido").val() +
			"&correo="+$("#txt-correo").val() +
			"&password="+$("#txt-password").val() +
			"&dia="+$("#slc-dia").val() +
			"&mes="+$("#slc-mes").val() +
			"&anio="+$("#slc-anio").val() +
			"&genero="+$("input[name='rbt-genero']:checked").val();

	console.log(parametros);
	
	$.ajax({
		url:"ajax/procesar-usuarios.php",
		method:"POST",
		data:parametros,
		success: function(respuesta){
			$("#btn-login").prop("disabled",false);
			$("#respuesta").html(respuesta);
			$("#div-form").fadeOut(100,function(){
				$("#div-post-login").fadeIn(100);
			});
			
		}
	});
});