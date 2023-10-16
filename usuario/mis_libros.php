<?php
// Incluir el archivo de configuración de la base de datos
include 'config.php';

session_start();  // Asegúrate de iniciar la sesión si aún no lo has hecho

// Verificar que el usuario esté autenticado antes de mostrar la página
if (!isset($_SESSION["user_id"])) {
    // Redirigir al usuario a la página de inicio de sesión o mostrar un mensaje de error
    header("Location: ../login/iniciar_sesion.php");  // Reemplaza con la URL de tu página de inicio de sesión
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mis Libros</title>
</head>
<body>
    <h1>Mis Libros</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Autor</th>
            <th>Portada</th>
        </tr>

        <?php
        // Obtener el ID del usuario actual (ya has iniciado la sesión en el archivo de configuración)
        $usuario_id = $_SESSION["user_id"];

        // Consulta SQL para obtener los libros del usuario
        $stmt = $conn->prepare("SELECT libros.nombre, libros.autor, libros.imagen FROM mis_libros
                               INNER JOIN libros ON mis_libros.id_libro = libros.id_libro
                               WHERE mis_libros.usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);  // "i" indica que es un valor entero
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            // Mostrar los datos de los libros en la tabla
            echo "<tr>";
            echo "<td>{$row['nombre']}</td>";
            echo "<td>{$row['autor']}</td>";
            echo "<td><img src='{$row['imagen']}' alt='Portada del libro' class='libros_portadas'></td>";
            echo "</tr>";
        }

        // Cierra la conexión a la base de datos
        $stmt->close();
        $conn->close();
        ?>

    </table>
</body>
</html>
