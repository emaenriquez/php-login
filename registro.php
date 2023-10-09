<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registro de Usuario</h1>

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

    <form method="post" action="">
        <label>Nombre de Usuario:</label>
        <input type="text" name="username" required><br><br>
        
        <label>Correo Electrónico:</label>
        <input type="email" name="email" required><br><br>
        
        <label>Contraseña:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Registrarse">
    </form>
</body>
</html>
