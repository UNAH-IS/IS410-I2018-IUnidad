function validar(){
	validarCampoVacio("txt-nombre");	
	validarCampoVacio("txt-apellido");	
	validarCampoVacio("txt-correo");	
}


var validarCampoVacio = function(id){
	
	if (document.getElementById(id).value == ""){
		document.getElementById(id).classList.remove('is-valid');
		document.getElementById(id).classList.add('is-invalid');
	}
	else{
		document.getElementById(id).classList.remove('is-invalid');
		document.getElementById(id).classList.add('is-valid');
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

