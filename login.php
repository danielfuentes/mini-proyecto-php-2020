<?php
require_once('controladores/funciones.php');
require_once('helpers/dd.php');
$email = "";
$password = "";
$errores = [];

if($_POST){
    //dd($_POST);
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Validar los datos del formulario
    $errores = validarLogin($_POST);
    //Verificar que si no hay errores - Condición
    if(count($errores)==0){
        //Conectar a la base de datos
        $bd = conexion('localhost','curso-php-lun-jue','root','');
        //Buscar a ver si ese usuario está o no en nuestra tabla de usuarios
        $usuario = buscarPorEmail($bd, 'usuarios', $email);
        //Si el usuario no existe en la tabla de usuarios
        if($usuario== false){
            //Enviar un mensaje de error - Usuario o contraseña no registrados
            $errores['email'] = "Usuario ó contraseña no registrados";
        //De lo contrario
        }else{
            //Verificar si el password colocado se contrasta con el que se tiene hash en la tabla de usuarios  - Condición (password_verify)
            if(password_verify($password,$usuario['password'])== false){
                //Si las claves no coinciden 
                //Se le envia al usuario mensaje de error: Usuario o contraseña inválidos
                $errores['password'] = "Usuario inválido";
            }else{
                // Si todo está en orden: Guardar en nuestra memoria del servidor: Debemos guardar quien es el usuario que está ingresando:
                //$_SESSION['nombre'] = $usuario['nombre'];
                //$_SESSION['perfil'] = $usuario['perfil'];
                //$_SESSION['avatar'] = $usuario['avatar'];
                seteoUsuario($usuario,$_POST);

                //Redireccionar al usuario a algún lugar de la aplicación
                //header(location: perfil.php)
                //Esto lo cree para validar el acceso al usuario
                //sobre todo si está o no ya logueado
                if(ingresoUsuario()){
                    header('location: perfil.php');
                    exit;
                }else {
                    header('location:login.php');
                    exit;
                }
                
            }
        }
        
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
          <article class="col-12" >
                    <h2 class="card-title card-title text-white bg-info text-center display-4 pt-5">Iniciar Sesión</h2>
                    <h4 class="text-center " >Introduzca su correo y contraseña.</h4>
          </article>
      </section>

      <section class="bg-home pt-15">
            <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto bg-light pt-2 ">
                        <div class="signup-form">
                            <?php if(!empty($errores)): ?>
                                
                                <ul class="alert alert-danger">
                                    <?php  foreach ($errores as $error) : ?>
                                        <li><?= $error;?></li>
                                    <?php endforeach ;?>
                                </ul>
                            <?php endif ;?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" >
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Contraseña" >
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="recordarme"><label class="checkbox-inline">Recordarme</label>
                                </div>
                                <div class="form-group ">
                                    <button type="submit" class="btn btn btn-info">Ingresar</button>
                                </div>
                                
                            </form>
                            <div class="text-center mb-3"><a href="registro.php">Aun no poseo una cuenta</a></div>
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