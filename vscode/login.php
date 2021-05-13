<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/b6764a4d50.js"></script>
    <link rel="stylesheet" href="../css/Estilos-Registro-Login.css"/>

    <title>Proyecto Uao prueba</title>
  </head>
  <body>
    <section class="form-registrar">
      <form class="Formulario" action="login.php" method="post">
        <div class="Formulario">
         
         
            <div class="Titulo-Registro">
                <h2 class="Registro ">
                    <img   src="../img/sesion/LoginAcademico.jpg"> 
                </h2>
            </div>

          <!-- cuadro completo de registro-->
          <div class="Contenedor-Input">

            <!-- casilla usuario-->
            <div class="Input-Contenedor">
              <i class="far fa-user-circle"></i>
              <input
                type="text"
                name="usuario"
                id="usuario"
                placeholder="Usuario"
                required
              />
            </div>

            <!-- casilla Comtraseña-->
            <div class="Input-Contenedor">
              <i class="fas fa-key"></i>
              <input type="password" placeholder="Contraseña" name="password" required/>
            </div>

          </div>

            <!-- Boton registrarse y Rediccioramiento login-->
            <div>
              <input class="Buttom" type="submit" value="Iniciar Sesion" />
              <p>
                
                <a class="Link" href="OlvidoClave.html"> ¿Olvido su nombre de usuario o contraseña? </a>
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
