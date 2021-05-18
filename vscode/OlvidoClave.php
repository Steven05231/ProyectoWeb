<?php
    //inicializar la sesion
    session_start();

    //Compruebe si el usuario ha iniciado sesión; de lo contrario, redirija a la página de inicio de sesión
    if (isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: login.php");
        exit;
    }

    //incluir la base de datos
    require_once "database.php";

    //definir las variables he inicializar con empty values
    $new_password = $confirm_password = "";
    $new_password_err = $confirm_password_err = "";

    //Procesamiento de datos del formulario cuando se envía el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        //Validar la nueva contrasena
        if (empty(trim($_POST["new_password"]))) {
            $new_password_err = "Porfavor ingresa la nueva contraseña.";
        } elseif(strlen(trim($_POST["new_password"])) < 6){
            $new_password_err = "La contraseña tiene que tener minimo 6 caracteres.";
        } else{
            $new_password = trim($_POST["new_password"]);
        }

        //Validar la confrmacion de la contraseña
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Porfavor confirme la contraseña.";
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($new_password_err) && ($new_password != $confirm_password)) {
                $confirm_password_err = "La contraseña no coincide.";
            }
        }

        //Verifique los errores de entrada antes de actualizar la base de datos.
        if (empty($new_password_err) && empty($confirm_password_err)) {

            //Prepare una declaración de actualización
            $sql = "UPDATE users SET password = ? WHERE id = ?";

            if ($stmt = mysqli_prepare($link,$sql)) {

                //Vincular variables a la declaración preparada como parámetros.
                mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

                //Setiar los parametros
                $param_password = password_hash($new_password, PASSWORD_DEFAULT);
                $param_id = $_SESSION["id"];

                //Intente ejecutar la declaración preparada.
                if (mysqli_stmt_execute($stmt)) {
                    //Contraseña actualizada exitosamente. Destruye la sesión y redirige a la página de inicio de sesión
                    session_destroy();
                    header("location: login.php");
                    exit();
                } else{
                    echo "¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
                }

                //Cerrar la declaracion
                mysqli_stmt_close($stmt);
            }
        }
        //Cerrar la conexion
        mysqli_close($link);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/b6764a4d50.js"></script>
    <link rel="stylesheet" href="../css/Estilos-Registro-Login.css" />

    <title>Reemplazar la contraseña</title>
</head>
<body>


    <section class="form-registrar">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <form class="Formulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="Formulario">

        
            <div class="Titulo-Registro">
                <h2 class="Registro ">
                    <img   src="../img/sesion/RegistroAcademico.jpg"> 
                </h2>

            </div>
            <!-- boton seleccionar-->
            <br>
            <br>
            <br>

        <!-- cuadro completo de registro-->
        <div class="Contenedor-Input">


            <!-- casilla apellido-->
            <div class="Input-Contenedor">
            <i class="far fa-user-circle"></i>
            <input
                type="text"
                name="surname"
                id="apellidos"
                placeholder="Apellido"
                required
            />
            </div>

            <!-- casilla usuario-->
            <div class="Input-Contenedor">
            <i class="far fa-user-circle"></i>
            <input
                type="text"
                name="username"
                id="usuario"
                placeholder="Usuario"
                required
            />
            </div>

            <!-- casilla Comtraseña-->
            <div class="Input-Contenedor">
            <i class="fas fa-key"></i>
            <input type="password"
            placeholder="Contraseña" 
            name="password"
            required/>
            </div>

            <div class="Input-Contenedor">
            <i class="fas fa-key"></i>
            <input type="password" placeholder="Confirmar Contraseña" name="confirm_password"required/>
            </div>

        </div>

            <!-- Boton registrarse y Rediccioramiento login-->
            <div>
            <input class="Buttom" type="submit" value="Registrate" />
            <p>
                Estoy de acuerdo con
                <a href="#"> Terminos y condiciones </a>
            </p>
            <p>
                ¿Ya tienes cuenta?
                <a class="Link" href="login.php"> Inicia Sesion </a>
            </p>
            </div>
        </div>
        </div>
    </form>
    </section>
</body>
</html>