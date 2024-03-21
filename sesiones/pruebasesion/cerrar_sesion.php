<?php
session_start();

// Destruir la sesión actual
session_destroy();

// Redirigir al formulario de inicio de sesión del formulario
header("Location: index.php"); // Cambia a "index.php"
exit; // Detener la ejecución del script
?>