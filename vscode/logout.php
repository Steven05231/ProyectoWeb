<?php
    //inicializar la sesion
    session_start();

    //Desarmar todas las variables de sesión
    $_SESSION = array();

    //Destruir la sesion o cerrar
    session_destroy();

    //Redirigirlo a la pagina de login
    header("location: login.php");
    exit;
?>