<?php
    //Include la configuracion de la base de datos
    require_once 'database.php';
  
    //De fine las variables he inicialice con los valores
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";
  
    //procesando desde los datos cuando se suben
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
      //Validar el username
      if (empty(trim($_POST["username"]))) {
        $username_err = "Profavor ingresar el usuario.";
      } else {
        //Prepare una declaración selecta
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            //Vincular variables a la declaración preparada como parámetros
            mysqli_stmt_bind_param($stmt, "s", $param_usermane);

            //Setiar el parametro
            $param_usermane = trim($_POST["username"]);

            //Intente ejecutar la declaración preparada
            if (mysqli_stmt_execute($stmt)) {
              /* Resultado */
              mysqli_stmt_store_result($stmt);

              if (mysqli_stmt_num_rows($stmt) == 1) {
                $username_err = "Este nombre de usuario ya esta en uso. ";
              }else {
                $username = trim($_POST["username"]);
            }

            }else {
            echo "Oops! error porfavor intenta mas tarde. ";
          }

          //Cierre del sistema
          mysqli_stmt_close($stmt);
        }
      }


    //validar el password
    if (empty(trim($_POST["confirm_password"]))) {
      $password_err = "Porfavor ingrese el password.";

    } elseif (strlen(trim($_POST["password"])) < 6) {
      $password_err = "El password tiene que tener minimo 6 caracteres.";

    } else {
      $password = trim($_POST["password"]);
    }

    //Validar la confirmacion del password
    if (empty(trim($_POST["confirm_password"]))) {
      $confirm_password_err = "Porfavor confirme la contraseña.";
    } else {
      $confirm_password = trim($_POST["confirm_password"]);

      if (empty($password_err) && ($password != $confirm_password)) {
        $confirm_password_err = "La contraseña no coincide.";
      }
    } 

    //Verifique los errores de entrada antes de insertar en la base de datos.
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
      
      //Prepare una declaración de inserción
      $sql = "INSERT INTO users (username, password, name, surname, role) VALUES (?,?,?,?,?)";

      if ($stmt = mysqli_prepare($link, $sql)) {

        //Vincular variables a la declaración preparada como parámetros
        mysqli_stmt_bind_param($stmt, "sssss", $param_usermane, $param_password, $name, $surname, $role);

        //Setear los parametros
        $param_usermane = $username;
        $param_password = password_hash($password, PASSWORD_BCRYPT);
        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $role = trim($_POST['role']);

        //Crea un hash de contraseña
        //Intente ejecutar la declaración preparada
        if (mysqli_stmt_execute($stmt)) {

          //Redirigir a la pagina de login
          header("location: login.php");
        } else{
          echo "¡UPS! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
        }

        // Cerrar la declaracion.
        mysqli_cloe($link);
      }

    }
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

    <title>Proyecto Uao prueba</title>
  </head>
  <body>


    <section class="form-registrar">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <form class="Formulario" action="registrarse.php" method="post">
        <div class="Formulario">

          
            <div class="Titulo-Registro">
                <h2 class="Registro ">
                    <img   src="../img/sesion/RegistroAcademico.jpg"> 
                </h2>

            </div>


            <!-- boton seleccionar-->
            <div class="Seleccionar">
              <label> Selecccionar </label>
              <select type="text" name="role" id="rol" required>
                <option value="0">...</option>
                <option value="1 ">Docente</option>
                <option value="2">Directivos</option>
              </select>
            </div>

            <br>
            <br>
            <br>

          <!-- cuadro completo de registro-->
          <div class="Contenedor-Input">

            <!-- casilla nombre-->
            <div class="Input-Contenedor">
              <i class="far fa-user-circle"></i>
              <input
                type="text"
                name="name"
                id="nombres"
                placeholder="Nombre"
                required
              />
            </div>

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
