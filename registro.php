<?php
require_once('helpers/dd.php');
require_once('controladores/funciones.php');
$first_name = "";
$last_name = "";
$email= "";
$errores = [];

if($_POST){
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email= $_POST['email'];
   
    //dd($_POST);
    //Patron de Diseño MVC - Módelo - Vista - Controlador
    $errores = validarUsuario($_POST,$_FILES);
    if(($errores)==""){
        //Conectar con la base de datos
        $bd = conexion('localhost','curso-php-lun-jue','root','');
        
        //Armando el usuario que luego debo guardar
        //$usuario = armarUsuario($_POST);
        //Armar nuestro avatar
        $avatar = armarAvatar($_FILES);
        //Guardar al usuario
        guardarUsuario($bd, 'usuarios', $_POST,$avatar);
        enviarCorreo($_POST);
        header('location: login.php');
    }
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

    <title>Página muy sencilla creada con Bootstrap</title>
  </head>
  <body>
    <div class="container-fluid">
    <?php require_once('partials/navBar.php') ;?>
    <!-- Cuerpo principal -->
        <section class="row">
        <article class="col-12">
          <h2 class="display-4 text-white bg-info text-center pt-5">Registrate</h2>
          <h4 class="text-center" >Crea tu cuenta, sólo te tomara unos minutos.</h4>
        </article>
      </section>

        <section class="bg-home pt-4">
            <div class="container">
                <div class="row" >
                    <div class="col-8 mx-auto bg-light ">

                        <?php if(!empty($errores)): ?>
                            
                            <ul class="alert alert-danger">
                                <?php  foreach ($errores as $error) : ?>
                                    <li><?= $error;?></li>
                                <?php endforeach ;?>
                            </ul>
                        <?php endif ;?>

                        <div class="signup-form">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="first_name" placeholder="Nombre" value="<?= $first_name;?>" >
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="last_name" placeholder="Apellido" value="<?=$last_name;?>"
>
                                </div>	
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" placeholder="Email" value="<?=$email;?>"
>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Contraseña" >
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirma Contraseña" >
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="avatar" placeholder="Subir su avatar" >
                                </div>        
                                <div class="form-group">
                                    <button type="submit" class="btn btn btn-info">Registrarme</button>
                                </div>
                            </form>
                            <div class="text-center my-3">Ya tengo una cuenta? <a href="login.php">Inicia sesión</a></div>
                        </div>
                    </div>                        
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Scripts para Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>