<?php
    /*En este punto se define las credenciales */
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'usuario');

    /*Se crea la conexion con la base de datos */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    //Se chequea que este bien conectado
    if ($link === false) {
        die("ERROR: Could not Connect. " . mysqli_connect_error());
    }

?>