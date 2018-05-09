$("#btn-login").click(function(){
    var parametros = "usuario="+$("#usuario").val()+"&password="+$("#password").val();

    $.ajax({
        url:"ajax/login.php",
        method:"POST",
        data: parametros,
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            if (respuesta.codigoResultado==0 && respuesta.codigo_tipo_usuario == 1)
                window.location.href = "pagina-cajero.php";//console.log("Usuario autorizado");
            else if (respuesta.codigoResultado==0 && respuesta.codigo_tipo_usuario == 2)
                window.location.href = "pagina-administrador.php";//console.log("Usuario autorizado");
        }
    });
});