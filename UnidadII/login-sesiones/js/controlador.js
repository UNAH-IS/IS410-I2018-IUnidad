$("#btn-login").click(function(){
    var parametros = "usuario="+$("#usuario").val()+"&password="+$("#password").val();

    $.ajax({
        url:"ajax/login.php",
        method:"POST",
        data: parametros,
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            if (respuesta.codigoResultado==0)
                window.location.href = "pagina-restringida.php";//console.log("Usuario autorizado");
        }
    });
});