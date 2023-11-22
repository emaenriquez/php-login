<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Libreria</title>

    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <link rel="stylesheet" href="style.css">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">

    <link href="assets/css/theme.css" rel="stylesheet" />

  </head>

  <body>
    <main class="main" id="top">

      <nav class="navbar navbar-expand-lg navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.php"><img src="assets/img/logo.svg" height="31" alt="logo" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#planes">Planes</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#acerca-de">Acerca De</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#preguntasFrecuente">Preguntas Frecuentes</a></li>
            </ul>
            <div class="d-flex ms-lg-4">
              <a class="btn btn-secondary-outline" href="login/registro.php">Sign In</a>
              <a class="btn btn-warning ms-3" href="login/iniciar_sesion.php">Sign Up</a></div>
          </div>
        </div>
      </nav>

      <section class="pt-7">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-md-start text-center py-6">
              <h1 class="mb-4 fs-9 fw-bold">Mi Libreria</h1>
              <p class="mb-6 lead text-secondary">Explora un mundo de historias en Mi Librería. Encuentra libros fascinantes que te inspirarán y te sumergirán en nuevas aventuras literarias<br class="d-none d-xl-block" /></p>
            </div>
            <div class="col-md-6 text-end"><img class="pt-7 pt-md-0 img-fluid" src="assets/img/hero/hero-img.png" alt="" /></div>
          </div>
        </div>
      </section>

    <div class="galeria__planes">

      <div class="card m-3 galeria__planes-contenedor-1" style="width: 17rem; background-color: #f5f5f5;" id="planes">
        <img src="assets/img/pexels-energepiccom-110469.jpg" class="card-img-top" alt="...">

        <div class="card-body" style="background-color: #f5f5f5;">
          <h5 class="card-title">Free</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>

        <ul class="list-group list-group-flush">
          <li class="list-group-item" style="background-color: #f5f5f5;">An item</li>
          <li class="list-group-item" style="background-color: #f5f5f5;">A second item</li>
          <li class="list-group-item" style="background-color: #f5f5f5;">A third item</li>
        </ul>

        <div class="card-body" style="background-color: #f5f5f5;">
          <buttom class="btn btn-warning ">Proximamente</buttom>
        </div>
        
      </div>

      <div class="card m-3 galeria__planes-contenedor-2" style="width: 17rem; background-color: #f5f5f5;">
        <img src="assets/img/pexels-energepiccom-110469.jpg" class="card-img-top" alt="...">

        <div class="card-body" style="background-color: #f5f5f5;">
          <h5 class="card-title">Premium</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>

        <ul class="list-group list-group-flush">
          <li class="list-group-item" style="background-color: #f5f5f5;">An item</li>
          <li class="list-group-item" style="background-color: #f5f5f5;">A second item</li>
          <li class="list-group-item" style="background-color: #f5f5f5;">A third item</li>
        </ul>

        <div class="card-body" style="background-color: #f5f5f5;">
          <buttom class="btn btn-warning ">Proximamente</buttom>
        </div>
        
      </div>
    </div>

    <!-- preguntas frecuentes -->

    <div class="accordion" id="preguntasFrecuente">

      <h2>Preguntas Frecuentes</h2>

      <div class="accordion-item">

        <h2 class="accordion-header">

          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Accordion Item #1
          </button>

        </h2>

        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">

          <div class="accordion-body">
            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
          </div>

        </div>

      </div>

      <div class="accordion-item">

          <h2 class="accordion-header">

            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Accordion Item #2
            </button>

          </h2>

          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">

          <div class="accordion-body">
            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
          </div>

      </div>
    </div>
    <div class="accordion-item">

      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Accordion Item #3
        </button>
      </h2>

      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">

        <div class="accordion-body">
          <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
        </div>

      </div>

    </div>

    <!-- Acerca De -->

    <section id="acerca-de">
      
      <h2>Acerca de Nosotros</h2>
      <p>Bienvenido a Mi Librería, tu destino para descubrir y explorar una amplia variedad de libros. Nos dedicamos a ofrecer la mejor selección de libros de diferentes géneros y autores.</p>
      <p>Nuestra misión es fomentar la pasión por la lectura y proporcionar a nuestros clientes una experiencia única al explorar el mundo de la literatura.</p>
      
      <footer>
        <p>&copy; 2023 Mi Librería</p>
      </footer>

    </section>

    

    </main>

    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
  </body>
</html>