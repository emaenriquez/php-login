<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Leer los datos enviados desde JavaScript
    $json = file_get_contents('php://input');
    $libroData = json_decode($json, true);

    // Realiza las operaciones que desees con los datos, como guardarlos en una base de datos.

    // Ejemplo: Mostrar los datos en una tabla de libros guardados
    echo "<table>";
    echo "<tr><td>Título:</td><td>{$libroData['titulo']}</td></tr>";
    echo "<tr><td>ISBN:</td><td>{$libroData['isbn']}</td></tr>";
    echo "<tr><td>Autor:</td><td>{$libroData['autor']}</td></tr>";
    echo "<tr><td>Portada:</td><td><img src='{$libroData['portada']}' alt='Portada del libro'></td></tr>";
    echo "</table>";
} else {
    // Si no es una solicitud POST, puedes mostrar una página inicial aquí
    // o redirigir a otra página, según tus necesidades.
}
?>