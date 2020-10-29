<?php
    require_once('helpers/dd.php');
    require_once('controladores/funciones.php');
    $bd = conexion('localhost','curso-php-lun-jue','root','');
    $usuarios = listarUsuarios($bd, 'usuarios');    
    //Esto lo incorporé, ya que por medio de ello logro hacer que si un usuario no está logueado en mi sistema y quiere entrar colocando la URL en el browser yo no se lo permito, hago que necesariamente se deba iniciar sesion
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
    <title>Mini Proyecto Angel Daniel Fuentes</title>
  </head>
  <body>
    <main class="container-fluid">
    <?php require_once('partials/navBar.php') ;?>

    <!--Listado de nuestros usuarios-->
      <section class="row">
        <article class="col-12">
          <h2 class="display-4 text-white bg-info text-center pt-5">Administrar usuarios</h2>
        </article>
        <article class="col-12">
            
            <h4 ><a class="pl-3" href="incluirUsuario.php"><ion-icon name="person-add-outline"></ion-icon></a></h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Ver</th>
                        <th>Editar</th>
                        <th>Eliminar</th>    
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $id => $usuario) :?>
                        <tr>
                            <td><?= $usuario['id'] ?></td>
                            <td><?= $usuario['first_name']?></td>
                            <td><?= $usuario['last_name']?></td>
                            <!-- Envío de ID por Query String -->
                            <td><a href="detalleUsuario.php?id=<?= $usuario['id'];?>"><ion-icon name="eye-outline"></ion-icon></a></td>
                            <!-- Envío de ID por Query String -->
                            <td><a href="modificarUsuario.php?id=<?= $usuario['id'];?>"><ion-icon name="build-outline"></ion-icon></a></td>
                            <!-- Envío de ID por Query String -->
                            <td><a href="eliminarUsuario.php?id=<?= $usuario['id'];?>"><ion-icon name="trash-outline"></ion-icon></a></td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
        </article>
      </section>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
  </body>
</html>