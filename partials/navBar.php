      <?php
        require_once('controladores/funciones.php');
        require_once('helpers/dd.php');
      ?>
      <!--Barra de navegación-->
      <!--Aqui coloque la clase fixed-top para lograr dejar fijo el encabezado. Es como si realizamos un display: fixed-->
      <nav class="navbar navbar-expand-lg  navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="index.php">Daniel Fuentes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
              <a class="nav-link " href="index.php">Inicio </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="nosotros.php">Nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="productos.php">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto.php">Contacto</a>
            </li>
            <?php if(isset($_SESSION['perfil'])): ?>
              <?php if($_SESSION['perfil']==9) : ?>
                <li class="nav-item">
                  <a class="nav-link" href="administrar.php">Administrar</a>
                </li>
              <?php endif;?>  
            <?php endif;?>

          </ul>
          <ul class="my-2 my-lg-0 navbar-nav">
            <?php if(empty($_SESSION['nombre'])):?>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="registro.php">Registro</a>
              </li>  
            <?php else :?>
              <li class="nav-item">
                <a class="nav-link" href="perfil.php">Perfil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Salir</a>
              </li>
              <li>
              <img src="imagenes/<?= $_SESSION['avatar'];?>" alt="Avatar" width='30' style="border-radius: 50%;">
              </li>
            <?php endif;?> 
            
          </ul>
        </div>
      </nav>  
