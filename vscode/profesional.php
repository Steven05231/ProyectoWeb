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
    <link rel="stylesheet" href="../css/estiloactividades.css">

    <title>Portal autoevaluacion</title>
</head>
<body>
    <header class="contenido-header">
        <div>
            <a href="../vscode/index.php"><img src="../img/index/logo.png" alt="Logo Universidad Autonoma" class="imagen-logo"></a>
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
    <div class="nav-bar">
    <span><i class="fas fa-bars" id="btnMenu">Menu</i></span>
    <a href="logout.php" class="btn btn-danger ml-3">Cierre de sesion</a>
    </div>
        <div style="display: flex">
            <nav class="main-nav">
                <ul class="menu" id="menu">
                <li class="menu__item"><a href="../vscode/index.php" class="menu__link">INICIO</a></li>
                <li class="menu__item"><a href="#" class="menu__link">REPORTE</a></li>
                <li class="menu__item"><a href="../vscode/academica.php" class="menu__link">ACADEMICO</a></li>
                <li class="menu__item"><a href="../vscode/gestion.php" class="menu__link">GESTION</a></li>
                <li class="menu__item"><a href="../vscode/profesional.php" class="menu__link">PROFESIONAL</a></li>
                <li class="menu__item"><a href="#" class="menu__link">NOSOTROS</a></li>
                </ul>
            </nav>
        <script src="../js/menu.js"></script>

        <main class="contenedoracademico sombra">
        <div class="contenido__medio">

            <div class="caja">
                <p>PROFESIONAL</p>
            </div>

            <div class="contenido__central">
                <section class="caja">
                    <div class="contenidoregistros">
                        <div class="cajacademico">
                            <p>Premios o reconocimientos.</p>
                        </div>
                        <div class="boton">
                            <input type="button" class="btn-main" value="INGRESAR">
                            </div>
                    </div>

                    <div class="contenidoregistros">
                        <div class="cajacademico">
                            <p>Certificación.</p>
                        </div>
                        <div class="boton">
                            <input type="button" class="btn-main" value="INGRESAR">
                        </div>
                    </div>
                </section>

                <section class="caja">
                <div class="contenidoregistros">
                        <div class="cajacademico">
                            <p>Patentes.</p>
                        </div>
                        <div class="boton">
                            <input type="button" class="btn-main" value="INGRESAR">
                            </div>
                    </div>

                    <div class="contenidoregistros">
                        <div class="cajacademico">
                            <p>Registro de software.</p>
                        </div>
                        <div class="boton">
                            <input type="button" class="btn-main" value="INGRESAR">
                            </div>
                    </div>
                </section>
            </div>
        </div>
        </main>

    </div>
</body>
</html>