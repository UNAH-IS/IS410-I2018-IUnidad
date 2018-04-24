<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<body>
    <form action="procesar.php" method="GET">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido" placeholder="Apellido">
        <input type="text" name="edad" placeholder="Edad">
        <button type="submit">Guardar</button>
    </form>
    <?php 
        $enlace = mysqli_connect("localhost", "root", "", "db_alumnos");
        if (!$enlace) {
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
            exit;
        }
        echo "Se establecio la conexion<br>";

        $sql = "SELECT codigo_alumno, codigo_centro, codigo_carrera, ".
                "codigo_genero, cuenta, nombre, apellido, edad, indice ".
                "FROM tbl_alumnos";

        $resultado = mysqli_query($enlace, $sql);
        echo "<table border='1'>";
        while($fila = mysqli_fetch_array($resultado))
            echo    "<tr><td>".$fila["nombre"].
                    "</td><td>".$fila["apellido"].
                    "</td><td>".$fila["edad"].
                    "</td></tr>";

        echo "</table>";   
    ?>
</body>
</html>