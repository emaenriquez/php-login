<?php
require_once('config.php');

// Verifica si el usuario está autenticado y obtén su ID.
// Debes implementar la autenticación según tus necesidades.

// Consulta la base de datos para recuperar los libros asociados al usuario actual.
$query = "SELECT * FROM libros WHERE usuario_id = :usuario_id";
$stmt = $pdo->prepare($query);
$stmt->execute(array(':usuario_id' => $usuario_id)); // Sustituye esto con el ID del usuario actual

// Incluye tu código HTML para mostrar la lista de libros.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mis Libros</title>
</head>
<body>
    <h1>Mis Libros</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
                echo '<td>' . htmlspecialchars($row['autor']) . '</td>';
                echo '<td><img src="' . htmlspecialchars($row['imagen']) . '" alt="Portada del libro" width="100"></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
