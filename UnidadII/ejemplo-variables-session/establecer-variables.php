<?php
    session_start();
    $_SESSION["usuario"] = "jperez";
    $_SESSION["password"] = "asd.456";

    echo "Se establecieron las variables de session";

?>