<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');

//Esto lo incorporé, ya que por medio de ello logro hacer que si un usuario no está logueado en mi sistema y quiere entrar colocando la URL en el browser yo no se lo permito, hago que necesariamente debe iniciar sesión.
ingresoUsuario();
if(!isset($_SESSION["email"])) {
  header("location:login.php");
  exit;
}

?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">

    <title>Perfil del usuario</title>
  </head>
  <body>
    <div class="container-fluid">
    <?php require_once('partials/navBar.php') ;?>
    <!-- Cuerpo principal -->
        <section class="row">
          <article class="col-12  card pt-5" >
                  <div class="card-body">
                    <h2 class="card-title text-white bg-info text-center display-4 ">Perfil del usuario</h2>
                    <h4 class="text-center display-6" >Bienvenido  </h4>
                    
                  </div>
          </article>
      </section>
      <section>
        <h2 class="text-center display-4" ><?= $_SESSION['nombre'].' '. $_SESSION['apellido'];?>  </h2>
        <p class="text-center">
            <img src="imagenes/<?= $_SESSION['avatar'];?>" alt="Avatar" width='200' style="border-radius: 50%;">
        </p>

      </section>

        
        <!-- Scripts para Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>