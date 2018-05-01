<?php 
    session_start();
    echo "Usuario: ".$_SESSION["usuario"]."<br>";
    echo "Password: ".$_SESSION["password"]."<br>";
?>