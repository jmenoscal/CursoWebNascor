<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h1>Formulario de Registro</h1>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <br>
        <label for="cursos">Cursos:</label>
        <input type="checkbox" id="curso1" name="cursos[]" value="Curso 1">
        <label for="curso1">Curso 1</label>
        <input type="checkbox" id="curso2" name="cursos[]" value="Curso 2">
        <label for="curso2">Curso 2</label>
        <!-- Agrega más cursos aquí si es necesario -->
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $cursos = $_POST["cursos"] ?? array();

        if (empty($nombre)) {
            echo "<p><strong>El campo nombre está vacío.</strong> Debes completarlo.</p>";
        } elseif (!preg_match("/^[A-Za-z\s]+$/", $nombre)) {
            echo "<p><strong>El campo nombre debe contener solo letras y espacios.</strong></p>";
        }

        if (empty($email)) {
            echo "<p><strong>El campo email está vacío.</strong> Debes completarlo.</p>";
        }

        if (empty($cursos)) {
            echo "<p><strong>No se seleccionó ningún curso.</strong></p>";
        } else {
            echo "<p>Has seleccionado los siguientes cursos: ";
            foreach ($cursos as $curso) {
                echo $curso . ", ";
            }
            echo "</p>";
        }
    }
    ?>
</body>
</html>
