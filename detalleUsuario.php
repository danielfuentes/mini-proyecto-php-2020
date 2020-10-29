<?php
    require_once('controladores/funciones.php');
    require_once('helpers/dd.php');
    $bd = conexion('localhost','curso-php-lun-jue','root','');
    $id=$_GET['id'];
    
    //Armado de la sentencia
    $sql = "select * from usuarios where id=$id";
    //Ejecución de la sentencia
    $query = $bd->prepare($sql);
    $query->execute();
    //Lectura de los datos obtenidos en la sentencia como Array Asociativo
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    //dd($usuario);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
    <title>Detalle Usuario</title>
</head>
<body>
    <div class="container-fluid">
        <?php require_once('partials/navBar.php');?>
        <h1 class= "display-4 text-white bg-info text-center pt-5">Detalle del Usuario</h1>
        <section class="row">
            
                <article class="col-4 offset-2 pt-4">
                    <h4>ID: <?= $usuario['id'];?> </h4> 
                    <br>           
                    <h4>Nombre: <?= $usuario['first_name'];?></h4>    
                    <br>        
                    <h4>Apellido: <?= $usuario['last_name'];?></h4>
                    <br>            
                    <h4>Email: <?= $usuario['email'];?></h4>
                    <br>
                    <a href="administrar.php" class="btn btn-primary">Volver</a>
                </article>
                <article class="col-6">
                    <img  class="w-100 p-4 " src="imagenes/<?= $usuario['avatar'];?>" alt="Avatar"  >
                </article>                     
                
                
        </section>
        
             
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>
</html>    
   