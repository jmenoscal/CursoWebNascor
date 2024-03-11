<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Formularios por POST</title>
</head>
<body>

    <h1>Formulario de Registro</h1>
    <form action="procesar_formulario.php" method="post">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required><br>

        <input type="submit" value="Enviar">
    </form>

</body>
</html>
