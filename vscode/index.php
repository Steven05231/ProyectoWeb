<?php
    //inicializar la sesion
    session_start();

    //Compruebe si el usuario ha iniciado sesión, si no, rediríjalo a la página de inicio de sesión
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Portal autoevaluacion</title>
</head>
<body>
    <header class="contenido-header">
        <div>
            <img src="../img/index/logo.png" alt="Logo Universidad Autonoma" class="imagen-logo">
        </div>

        <div class="contenido-usuario">
            <div>
                <b><?php echo htmlspecialchars($_SESSION["name"]); ?>
                <b><?php echo htmlspecialchars($_SESSION["surname"]); ?></b>
            </b>
            </div>
            
            <div>
                <img src="../img/index/usuario.jpg" alt="" class="imagen-usuario">
            </div>
        </div>
    </header>

    <nav class="contenido-navegacion">
        <div>
            <span class="nav-bar"><i class="fas fa-bars"></i>Menu</span>
        </div>

        <div>
            <a href="logout.php" class="btn btn-danger ml-3">Cierre de sesion</a>
        </div>
    </nav>
</body>
</html>