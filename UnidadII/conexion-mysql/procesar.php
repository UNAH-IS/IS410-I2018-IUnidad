<?php
    $enlace = mysqli_connect("localhost", "root", "", "db_alumnos");
    if (!$enlace) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    echo "Se establecio la conexion<br>";

    $sql = sprintf("INSERT INTO tbl_alumnos(nombre, apellido, edad) VALUES ('%s','%s',%s);",
            $_GET["nombre"],
            $_GET["apellido"],
            $_GET["edad"]
        );

    $resultado = mysqli_query($enlace, $sql);

    
?>


