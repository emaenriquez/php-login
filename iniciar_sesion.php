<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>

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
                header("Location: perfil_usuario.php");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }
    }
    ?>

    <form method="post" action="">
        <label>Nombre de Usuario:</label>
        <input type="text" name="username" required><br><br>
        
        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
