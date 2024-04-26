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

    <h1>Noticias del momento</h1>

    <?php
    $tiempo = tiempo();
    echo "$tiempo Hay un total de $news_count noticias.";

    ?>

    <div class="contenedor">
        <h1>CONSULTAS EN PHP DESDE MYSQL</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Texto</th>
                <th>Categoría</th>
                <th>Fecha de publicación</th>
                <th>Imagen</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_array($resultado)) {
                $username = get_username($row['user_id']);
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["titulo"] . "</td>";
                $strFinal = substr($row["texto"], 0, 100);
                echo "<td>" . $strFinal;
                if ($strFinal < $row["texto"]) {
                    echo " ... ";
                }
                //echo "<br><a href='noticia_completa.php?id=" . $row['id'] . "'>Ir a la noticia completa -></a>";
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo " <a href='noticia_completa.php?id=" . $row['id'] . "&modificar=true'>Ver noticia completa y modificar-></a>";
            ?>
                    <form action="eliminar.php" method="post" onsubmit="return confirm('¿Estás seguro de que quieres eliminar esta noticia?');">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="submit" value="Eliminar" class="eliminar">
                    </form>
            <?php
                }
                echo "</td>";
                echo "<td>" . $row["categoria"] . "</td>";
                echo "<td>" . $row["fecha"] . "</td>";
                echo "<td><img src='" . $row["imagen"] . "' width='120'></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <div class="formulario">
        <?php

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        ?>
            <h1>Insertar Nueva Noticia</h1>
            <form name="form" action="insert.php" method="post">
                <label for="titulo">Título:</label><br>
                <input type="text" id="titulo" name="titulo"><br>
                <label for="texto">Texto:</label><br>
                <textarea id="texto" name="texto"></textarea><br>
                <label for="categoria">Categoría:</label><br>
                <input type="text" id="categoria" name="categoria"><br>
                <input type="file" name="file">
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>"><br> <!-- Campo de entrada oculto para el id del usuario -->
                <input type="submit" value="Subir Noticia">
            </form>
        <?php
            echo '<a href="logout.php">Cerrar sesión</a>';
        } else {
            echo '<a href="login.php">Iniciar sesión o registrate</a>';
        }
        ?>
    </div>
</body>