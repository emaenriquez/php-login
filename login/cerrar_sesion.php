<?php
// Inicia la sesión
session_start();

// Destruye la sesión
session_destroy();

// Redirige al usuario a la página de inicio 
header("Location: ../index.php");
exit();
?>
