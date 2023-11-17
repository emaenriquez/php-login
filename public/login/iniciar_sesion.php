<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
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
            $password = $_POST["password"];

            // Buscar al usuario en la base de datos
            $sql = "SELECT * FROM usuarios WHERE username = '$username'";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row["password"])) {
                    // Inicio de sesión exitoso, redirigir a perfil.html
                    session_start();
                    $_SESSION["username"] = $row["username"];
                    header("Location: ../usuario/perfil_usuario.php");
                    exit();
                } else {
                    echo "Contraseña incorrecta.";
                }
            } else {
                echo "Usuario no encontrado.";
            }
        }
        ?>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="../index.php">
                <img src="../imgs/stack-of-books.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Volver al inicio
              </a>
            </div>
        </nav>
        <h1 class="text-center mt-2">Iniciar Sesión</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary mt-2" value="Iniciar Sesión">
            </div>
        </form>
    </div>
    <!-- Agrega el enlace al archivo JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>