<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALIDACIÓN DE FORMULARIOS</title>
</head>
<body>
    <h1>Formulario de Registro</h1>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required pattern="[A-Za-z\s]+" title="Ingresa solo letras y espacios" />
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="cursos">Cursos:</label>
        <br>
        <input type="checkbox" id="curso1" name="cursos[]" value="Curso 1">
        <label for="curso1">Curso 1</label>
        <br>
        <input type="checkbox" id="curso2" name="cursos[]" value="Curso 2">
        <label for="curso2">Curso 2</label>
        <br>
        <input type="checkbox" id="curso3" name="cursos[]" value="Curso 3">
        <label for="curso3">Curso 3</label>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $cursos = isset($_POST["cursos"]) ? $_POST["cursos"] : array();
    // $cursos = $_POST["cursos"] ?? array();
    //operador de fusión nula (??) para asignar un array vacío a $cursos si no se selecciona ningún curso.
    if (empty($nombre)) {
        echo "El campo nombre está vacío.";
    } elseif (!preg_match("/^[A-Za-z\s]+$/", $nombre)) {
        echo "El campo nombre debe contener solo letras y espacios.";
    }else{
        echo "tu email es: $nombre <br/>";
    
    }
           
    if (empty($email)) {
        echo "El campo email está vacío.";
    }else{
        echo "tu email es: $email <br/>";
    
    }

    if (empty($cursos)) {
        echo "No se seleccionó ningún curso.";
    } else {
        echo "Has seleccionado los siguientes cursos: ";
        foreach ($cursos as $curso) {
            echo $curso . " ";
        }
    }
}
?>
</body>
</html>

