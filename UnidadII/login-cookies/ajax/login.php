<?php
    
    include("../class/class-conexion.php");
    $conexion = new Conexion();
    $sql = sprintf( 
        "SELECT codigo_usuario, codigo_tipo_usuario, ". 
            "correo, nombre, contrasena FROM tbl_usuarios ".
        "WHERE correo = '%s' and contrasena = sha1('%s')",
        $_POST["usuario"],
        $_POST["password"]
    );
    //echo $sql;
    //exit;
    $resultado = $conexion->ejecutarConsulta($sql);
    $respuesta = array();
    if ($conexion->cantidadRegistros($resultado)>0){
        $respuesta = $conexion->obtenerFila($resultado);
        $respuesta["codigoResultado"] = 0;
        $respuesta["mensajeResultado"] = "El usuario si existe";
        setcookie("usr",$respuesta["correo"],time() + (86400 * 30),"/");
        setcookie("psw",$respuesta["contrasena"],time() + (86400 * 30),"/");
    }else {
        $respuesta["codigoResultado"] = 1;
        $respuesta["mensajeResultado"] = "El usuario no existe";
        setcookie("usr","");
        setcookie("psw","");
    }
    echo json_encode($respuesta);

?>