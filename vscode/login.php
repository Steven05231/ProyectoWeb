<?php
  //Inicializar la sesion
  session_start();

  //Compruebe si el usuario ya ha iniciado sesión, si es así, rediríjalo a pagina de bienvenida
  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
  }

  //incluir la base de datos
  require_once "database.php";

  //Definir variables e inicializar con valores vacíos
  $username = $password = "";
  $username_err = $password_err = $login_err = "";

  //Procesamiento de datos del formulario cuando se envía el formulario
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //Compruebe si el nombre de usuario está vacío
    if (empty(trim($_POST["username"]))) {
      $username_err = "Porfavor ingresar el usuario.";
    } else {
      $username = trim($_POST["username"]);
    }

    //Verificar que el password esta vacio
    if (empty(trim($_POST["password"]))) {
      $password_err = "Porfavor ingresar el usuario.";
    } else {
      $password = trim($_POST["password"]);
    }

      //Validar las credenciales.
    if (empty($username_err) && empty($password_err)) {

      //Prepare una declaración selecta
      $sql = "SELECT id, username, password, name, surname, role FROM users WHERE username = ?";

      if ($stmt = mysqli_prepare($link, $sql)) {

        //Vincular variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        //Setear el parametro
        $param_username = $username;

        //Intente ejecutar la declaración preparada
        if (mysqli_stmt_execute($stmt)) {
          
          //Tienda de resultados
          mysqli_stmt_store_result($stmt);

          //Verifique si existe el nombre de usuario, si es así, verifique la contraseña
          if (mysqli_stmt_num_rows($stmt) == 1) {

            //Vincular variables de resultado
            mysqli_stmt_bind_result($stmt, $id, $usermane, $hashed_password, $name, $surname, $role);

            if (mysqli_stmt_fetch($stmt)) {
              if (password_verify($password, $hashed_password)) {
                
                //Password is correct, so start a new session
                session_start();
                
                //Almacenar datos en variables de sesión
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;
                $_SESSION["name"] = $name;
                $_SESSION["surname"] = $surname;
                $_SESSION["role"] = $role;

                //Redirigir al usuario a la página de bienvenida
                header("location: index.php");
              } else{

                //La contraseña no es válida, muestra un mensaje de error genérico
                $login_err = "Usuario o contraseña invalido.";
              }
            }
          }else {

            //El nombre de usuario no existe, muestra un mensaje de error genérico
            $login_err = "Usuario o contraseña invalido.";
          }
        } else{
          echo "¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
        }
        
        //Declaración de cierre
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
    <link rel="stylesheet" href="../css/Estilos-Registro-Login.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Proyecto Uao prueba</title>
  </head>
  <body>
    <section class="form-registrar">
      <form class="Formulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="Formulario">


            <div class="Titulo-Registro">
                <h2 class="Registro ">
                    <img   src="../img/sesion/LoginAcademico.jpg" class="login"> 
                </h2>
            </div>
            <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

          <!-- cuadro completo de registro-->
          <div class="Contenedor-Input">

            <!-- casilla usuario-->
            <div class="Input-Contenedor">
              <i class="far fa-user-circle"></i>
              <input
                type="text"
                name="username"
                placeholder="Usuario"
                class = "<?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" 
                value="<?php echo $username; ?>"
              />
              <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>

            <!-- casilla Comtraseña-->
            <div class="Input-Contenedor">
              <i class="fas fa-key"></i>
              <input type="password" 
              placeholder="Contraseña" 
              name="password"
              class ="<?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
              required/>
              <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>

          </div>

            <!-- Boton registrarse y Rediccioramiento login-->
            <div>
              <input class="Buttom" type="submit" value="Iniciar Sesion" />
              <p>
                
                <a class="Link" href="OlvidoClave.php"> ¿Olvido su nombre de usuario o contraseña? </a>
              </p>
              <p>
                ¿Estas Registrado?
                <a class="Link" href="registrarse.php"> Registrate </a>
              </p>
            </div>
          </div>
        </div>
      </form>
    </section>
  </body>
</html>
