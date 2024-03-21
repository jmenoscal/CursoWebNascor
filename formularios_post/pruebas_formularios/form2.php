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
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            if (empty($nombre)) {
                echo "<span style='color: red;'> El campo nombre está vacío. Debes completarlo.</span>";
            } elseif (!preg_match("/^[A-Za-z\s]+$/", $nombre)) {
                echo "<span style='color: red;'> El campo nombre debe contener solo letras y espacios.</span>";
            }
        }
        ?>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            if (empty($email)) {
                echo "<span style='color: red;'> El campo email está vacío. Debes completarlo.</span>";
            }
        }
        ?>
        <br>
        <label for="cursos">Cursos:</label>
        <input type="checkbox" id="curso1" name="cursos[]" value="Curso 1">
        <label for="curso1">Curso 1</label>
        <input type="checkbox" id="curso2" name="cursos[]" value="Curso 2">
        <label for="curso2">Curso 2</label>
        <!-- Agrega más cursos aquí si es necesario -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cursos = $_POST["cursos"] ?? array();
            if (empty($cursos)) {
                echo "<span style='color: red;'> No se seleccionó ningún curso.</span>";
            }
        }
        ?>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
