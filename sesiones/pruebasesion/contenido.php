<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario'])) {
    // Si no está logueado, redirigir al formulario de inicio de sesión o a otra página
    header("Location: index.php"); // Cambia a "index.php" 
    exit; // Detiene la ejecución del script
}

// Si llegamos aquí, el usuario está logueado y puede acceder al contenido protegido
// Se puede mostrar el contenido específico para usuarios logueados aquí

// Por ejemplo:
echo "¡Bienvenido, " . $_SESSION['usuario'] . "! Este es el contenido protegido.<br>";

// Creo un enlace para cerrar sesión
echo '<a href="cerrar_sesion.php">Cerrar sesión</a>'; // Cambia a "cerrar_sesion.php"
?>
