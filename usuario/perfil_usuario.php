
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil usuario </title>
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

    <a href="mis_libros.php">ir a mi lista de libros</a>

    <div class="contenedor">
        <h1 class="titulo"></h1>
        <h2>Busque sus libros favoritos</h2>
        <input type="text" id="searchInput" placeholder="Ingresa un término de búsqueda">
        <button id="buscador" >Buscar</button>
        <div id="results"></div>
    </div>

    
    <script src="libro.js"></script>

</body>



    
