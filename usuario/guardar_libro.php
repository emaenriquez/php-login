<?php
// Conecta a la base de datos (reemplaza los valores con los tuyos).
$db = new PDO('mysql:host=localhost;dbname=registro_usuarios', 'ema', 'nbdLXJXLtnMnt2Ph');

// Obtiene los datos del libro desde la solicitud POST.
$data = json_decode(file_get_contents('php://input'), true);

// Asegúrate de que los campos requeridos estén presentes y no estén vacíos.
if (isset($data['title']) && !empty($data['title']) &&
    isset($data['isbn']) && !empty($data['isbn'])) {

    // Inserta los datos en la tabla "libros" con el ID de usuario (si tienes una sesión de usuario activa).
    session_start();
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        $title = $data['title'];
        $author = isset($data['authors']) ? $data['authors'][0] : ''; // Tomando el primer autor si está presente.
        $thumbnail = isset($data['thumbnail']) ? $data['thumbnail'] : '';
        $isbn = $data['isbn'];

        $sql = "INSERT INTO libros (nombre, autor, imagen, usuario_id) VALUES (:nombre, :autor, :imagen, :usuario_id)";
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nombre' => $title,
            ':autor' => $author,
            ':imagen' => $thumbnail,
            ':usuario_id' => $userId
        ]);

        // Devuelve una respuesta de éxito.
        echo json_encode(['message' => 'Libro guardado con éxito']);
    } else {
        http_response_code(401); // No se ha iniciado sesión.
        echo json_encode(['error' => 'Usuario no autenticado']);
    }
} else {
    http_response_code(400); // Datos incompletos o inválidos.
    echo json_encode(['error' => 'Datos incompletos o inválidos']);
}
?>
