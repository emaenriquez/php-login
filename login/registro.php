<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
       

        <?php
        include('config.php'); // Incluir la configuración de la base de datos

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            // Insertar los datos en la base de datos
            $sql = "INSERT INTO usuarios (username, email, password) VALUES ('$username', '$email', '$password')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Registro exitoso. <a href='iniciar_sesion.php'>Iniciar Sesión</a>";
            } else {
                echo "Error al registrar: " . $conn->error;
            }
        }
        ?>
        <nav class="navbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="../index.php">
                <img src="../imgs/stack-of-books.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Volver al inicio
              </a>
            </div>
        </nav>

        <h1 class="text-center mt-2">Registro de Usuario</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary mt-2" value="Registrarse">
            </div>
        </form>
    </div>
    <!-- Agrega el enlace al archivo JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>