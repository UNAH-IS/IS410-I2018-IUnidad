<?php
	include("../class/class-conexion.php");
	$conexion = new Conexion();
	//echo "Conexion establecida<br>";

    switch($_GET["accion"]){
        case "obtener-usuarios":
            //Obtener usuarios.
            $sql = 	"SELECT codigo_usuario, nombre, fecha_nacimiento, ".
                    "genero, fotografia ".
                    "FROM tbl_usuarios";
            
            $resultado = $conexion->ejecutarConsulta($sql);
            $resultadoUsuarios = array();
            while($fila = $conexion->obtenerFila($resultado)){
                $resultadoUsuarios[] = $fila;
            }
            echo json_encode($resultadoUsuarios);
        break;
        case "obtener-memes":
            $sql =  "SELECT a.codigo_meme, a.descripcion, a.fecha_publicacion, a.calificacion, a.url_imagen, a.codigo_usuario, b.nombre ".
                    "FROM tb_memes a ".
                    "INNER JOIN tbl_usuarios b ".
                    "ON (a.codigo_usuario = b.codigo_usuario); ";
            
            $resultado = $conexion->ejecutarConsulta($sql);
            $arregloResultadoMemes = array();
            $i = 0;
            while($fila = $conexion->obtenerFila($resultado)){
                $arregloResultadoMemes[$i] = $fila; //datos del meme
                
                $sqlComentarios =   sprintf("SELECT a.codigo_comentario, a.descripcion, a.fecha_publicacion, b.nombre, a.codigo_meme ".
                                    "FROM tbl_comentarios a ".
                                    "INNER JOIN tbl_usuarios b ".
                                    "ON (a.codigo_usuario = b.codigo_usuario) ".
                                    "WHERE codigo_meme = %s", $fila["codigo_meme"]);
                $resultadoComentarios = $conexion->ejecutarConsulta($sqlComentarios);
                $arregloResultadoComentarios = array();
                while ($filaComentario = $conexion->obtenerFila($resultadoComentarios)){
                    $arregloResultadoComentarios[] = $filaComentario;
                }

                $arregloResultadoMemes[$i]["comentarios"] = $arregloResultadoComentarios; //Datos comentarios
                $i++;
            }
            echo json_encode($arregloResultadoMemes);
        break;
        case "guardar-registro":
            include("../class/class-post.php");
            include("../class/class-meme.php");
            
            $m = new Meme(
                $_POST["codigo"],
                $_POST["descripcion"],
                date("d/m/Y"),
                $_POST["usuario"],
                $_POST["calificacion"],
                $_POST["imagen"],
                null
            );
            $m->guardarPost($conexion);
        break;
    }
	
	$conexion->cerrarConexion();

	//echo '<label>'.$partes[0].'<input type="radio" value="'.$partes[0].'" name="rbt-usuario"><img src="'.$partes[1].'" class="img-responsive img-circle"></label>';
	
?>