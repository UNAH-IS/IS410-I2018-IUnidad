$("#btn-login").click(function(){
    var parametros = "usuario="+$("#usuario").val()+"&password="+$("#password").val();

    $.ajax({
        url:"ajax/login.php",
        method:"POST",
        data: parametros,
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
        }
    });
});