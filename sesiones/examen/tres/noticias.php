<?php
// noticias.php
//omprobamos si existe una sesión ya está activa antes de llamar a session_start()
//Verificamos si el usuario está logueado antes de permitirle acceder a la página noticias.php y antes de permitirle insertar una nueva noticia.

require_once 'db_utils.php';
require_once  'ini.php';
require_once  'profiles.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>NOTICIAS</title>
</head>

<body>
    <?php
    $resultado = get_table('noticia');
    $news_count = get_news_count();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        $user = get_user_details($_SESSION['user_id']);
        if ($user) {
            echo "Bienvenido " . $user['nombre'] . " con email " . $user['email'] . "<br>";
            echo "<a href='profiles.php'>Perfil de usuario</a><br>";
        }
    }
    ?>
    </div>
</body>