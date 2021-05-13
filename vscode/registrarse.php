<?php
    require 'database.php';
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
              <select type="text" name="rol" id="rol" required>
                <option value="0">...</option>
                <option value="1">Docente</option>
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
                name="nombres"
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
                name="apellidos"
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
                name="usuario"
                id="usuario"
                placeholder="Usuario"
                required
              />
            </div>

            <!-- casilla Comtraseña-->
            <div class="Input-Contenedor">
              <i class="fas fa-key"></i>
              <input type="password" placeholder="Contraseña" name="password"required/>
            </div>

            <div class="Input-Contenedor">
              <i class="fas fa-key"></i>
              <input type="password" placeholder="Confirmar Contraseña" name="confirmar-password"required/>
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
