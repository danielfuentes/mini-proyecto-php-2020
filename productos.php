<!doctype html>
<html lang="en">
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

    <!--Listado de nuestros productos-->
      <section class="row">
        <article class="col-12">
          <h2 class="display-4 text-white bg-info text-center pt-5">Las mejores marcas y diseños</h2>
        </article>
        <article class="col-12 col-md-6 col-lg-3 card p-2">
            <figure >
              <img  src="img/reloj1.jpg" class="card-img-top w-100 d-block" alt="Reloj">
            </figure>
            <img class="descuento" src="img/promo30.png" alt="Descuento 30%">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <h5 class="card-title" >$3500</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Ver detalle</a>
            </div>
        </article>
        <article class="col-12 col-md-6 col-lg-3 card p-2">
          <figure class="w-100">
            <img  src="img/reloj2.jpg" class="card-img-top w-100 d-block" alt="Reloj">
          </figure>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h5 class="card-title" >$3500</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Ver detalle</a>
          </div>
        </article>
        <article class="col-12 col-md-6 col-lg-3 card p-2">
          <figure class="w-100">
            <img  src="img/reloj3.jpg" class="card-img-top w-100 d-block" alt="Reloj">
          </figure>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h5 class="card-title" >$3500</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Ver detalle</a>
          </div>
        </article>
        <article class="col-12 col-md-6 col-lg-3 card p-2">
            <figure class="w-100">
              <img  src="img/reloj4.jpg" class="card-img-top w-100 d-block" alt="Reloj">
            </figure>
            <!--Noten que este código está tal como ya lo habiamos trabajado en la clase 3-->
            <img class="descuento" src="img/promo15.png" alt="Descuento del 15%">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <h5 class="card-title" >$3500</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Ver detalle</a>
            </div>
        </article>
        <article class="col-12 col-md-6 col-lg-3 card p-2">
            <figure class="w-100">
              <img  src="img/reloj5.jpg" class="card-img-top w-100 d-block" alt="Reloj">
            </figure>
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <h5 class="card-title" >$3500</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Ver detalle</a>
            </div>
        </article>
        <article class="col-12 col-md-6 col-lg-3 card p-2">
          <figure class="w-100">
            <img  src="img/reloj6.jpg" class="card-img-top w-100 d-block" alt="Reloj">
          </figure>
          <img class="descuento" src="img/promo15.png" alt="Descuento del 15%">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h5 class="card-title" >$3500</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Ver detalle</a>
          </div>
        </article>
        <article class="col-12 col-md-6 col-lg-3 card p-2">
          <figure class="w-100">
            <img  src="img/reloj7.jpg" class="card-img-top w-100 d-block" alt="Reloj">
          </figure>
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <h5 class="card-title" >$3500</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Ver detalle</a>
          </div>
        </article>
        <article class="col-12 col-md-6 col-lg-3 card p-2">
          <figure class="w-100">
          <img  src="img/reloj8.jpg" class="card-img-top w-100 d-block" alt="Reloj">
          </figure>
          <img class="descuento" src="img/promo30.png" alt="Descuento 30%">
          <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <h5 class="card-title" >$3500</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Ver detalle</a>
          </div>
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