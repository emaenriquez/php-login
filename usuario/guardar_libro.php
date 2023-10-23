<?php
// ... (código existente)

if (isUserAuthenticated()) {
    // Obtiene los datos del libro desde la solicitud POST.
    $data = json_decode(file_get_contents('php://input'), true);

    // Asegúrate de que los campos requeridos estén presentes y no estén vacíos.
    if (isset($data['title']) && !empty($data['title']) &&
        isset($data['isbn']) && !empty($data['isbn'])) {
        // Inserta los datos en la tabla "libros" con el ID de usuario.
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

        // Devuelve una respuesta JSON de éxito.
        $response = ['message' => 'Libro guardado con éxito'];
        echo json_encode($response);
    } else {
        http_response_code(400); // Datos incompletos o inválidos.
        $response = ['error' => 'Datos incompletos o inválidos'];
        echo json_encode($response);
    }
} else {
    http_response_code(401); // No se ha iniciado sesión.
    $response = ['error' => 'Usuario no autenticado'];
    echo json_encode($response);
}

// Función para verificar la autenticación del usuario (debes implementar tu propia lógica de autenticación).
function isUserAuthenticated() {
    // Aquí debes verificar si el usuario está autenticado. Esto puede implicar el uso de tokens de sesión, cookies, o cualquier otro método de autenticación que utilices en tu aplicación.
    // Retorna true si el usuario está autenticado, de lo contrario, retorna false.
    return true; // Cambia esto según tu implementación real de autenticación.
}