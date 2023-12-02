<!-- <?php
    session_start();
    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        echo "¡Bienvenido, $username! al Perfil de Usuario";
    } else {
        echo "¡Bienvenido, Invitado!";
    }
?> -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil usuario </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script type="text/javascript" src="https://www.google.com/books/jsapi.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <div id="bienvenida">

    </div>
        <!-- Botón para cerrar sesión -->
        <nav class="navbar navbar-light sticky-top" data-navbar-on-scroll="data-navbar-on-scroll">
            <p class="mt-2">Bienvenido a su perfil</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"                 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                <form method="post" action="../login/cerrar_sesion.php">
                    <input type="submit" class="btn btn-danger mt-2" value="Cerrar Sesión">
                </form>
            </div>
        </nav>
        <div class="contenedor">

            <h1 class="titulo text-center">Busque sus libros favoritos</h1>
        
            <div class="container">

                <div class="container_input">
                    <input type="text" id="searchInput" class="form-control input-chico" placeholder="Ingresa un término de búsqueda">
                </div>

                <div class="container_btn">
                    <button id="buscador" class="btn btn-primary">Buscar</button>
                </div>

            </div>

        <div class="contenedor_libros" id="results"></div>
    </div>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;family=Volkhov:wght@700&amp;display=swap" rel="stylesheet">
    <script src="libro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>



    
