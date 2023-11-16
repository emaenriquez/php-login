
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
        <?php
        session_start();
        if (isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            echo "¡Bienvenido, $username! al Perfil de Usuario";
        } else {
            echo "¡Bienvenido, Invitado!";
        }
            ?>
        </div>

        <!-- Botón para cerrar sesión -->
        <form method="post" action="../login/cerrar_sesion.php">
            <input type="submit" value="Cerrar Sesión">
        </form>

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


        <div id="results"></div>
    </div>

   
    
    <script src="libro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>



    
