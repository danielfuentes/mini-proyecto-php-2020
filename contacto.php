<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/master.css">
    <title>Mini Proyecto Daniel Fuentes</title>
  </head>
  <body>
    <main class="container-fluid">
    <?php require_once('partials/navBar.php') ;?>

    <section class="row ">
        <article class="col-12">
          <h2 class="display-4 text-white bg-info text-center pt-5">Pronto nos pondremos en contacto contigo...</h2>
        </article>
         <article class="col-12 col-md-6 pl-4 ">
          <h2>Contactanos</h2>
          <form  action="#" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="nombre">Nombre y apellido</label>
              <input type="text" class="form-control" id="nombre">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Observaciones</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar la consulta</button>
          </form> 

        </article>
        <article class="col-12 col-md-6 pr-4">
          <h2>Aquí nos encontramos</h2>
          <div class="embed-responsive embed-responsive-16by9 ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3284.0177124192683!2d-58.38378898501884!3d-34.6037136150044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccacf155c208f%3A0x474e052569661ba3!2sObelisco%2C%20C1043%20CABA!5e0!3m2!1ses!2sar!4v1601200974103!5m2!1ses!2sar" width="100" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

        </article>
        <!--Note que aquí con tan sólo colocar el comportamiento hacia arriba es heredado-->
        <article class="col-12 pt-2">
          <h5 class ="text-white text-center bg-info p-2 ">Todos los derechos reservados: MSc. Ángel Daniel Fuentes </h5>
              
        </article>

      </section>
    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>