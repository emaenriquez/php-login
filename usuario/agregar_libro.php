<?php
// Incluir el archivo de configuración de la base de datos
include 'config.php';

session_start(); // Asegúrate de iniciar la sesión si aún no lo has hecho

// Verificar que el usuario esté autenticado antes de permitir agregar libros
if (!isset($_SESSION["user_id"])) {
    // Responder con un mensaje de error si el usuario no está autenticado
    $response = ["success" => false, "message" => "Usuario no autenticado"];
    echo json_encode($response);
    exit;
}

// Verificar que la solicitud sea POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener el ID del libro que el usuario quiere agregar
    $idLibro = $_POST["id_libro"];

    // Obtener el ID del usuario actual
    $usuario_id = $_SESSION["user_id"];

    // Realizar la inserción del libro en la tabla "mis_libros"
    $stmt = $conn->prepare("INSERT INTO mis_libros (id_libro, usuario_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $idLibro, $usuario_id);  // "ii" indica que son valores enteros

    if ($stmt->execute()) {
        // La inserción se realizó con éxito
        $response = ["success" => true, "message" => "Libro agregado con éxito"];
    } else {
        // Hubo un error en la inserción
        $response = ["success" => false, "message" => "Error al agregar el libro: " . $stmt->error];
    }

    // Cerrar la conexión y responder con el resultado
    $stmt->close();
    $conn->close();

    echo json_encode($response);
} else {
    // Responder con un mensaje de error si la solicitud no es POST
    $response = ["success" => false, "message" => "Solicitud no válida"];
    echo json_encode($response);
}
?>