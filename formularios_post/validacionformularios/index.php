<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VALIDACION DE FORMULARIOS</title>
</head>
<body>
<form method="post" action="validar.php">
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>

    <!-- 
    <label for="cursos">Cursos:</label><br>
    <input type="checkbox" id="css" name="cursos[]" value="CSS">
    <label for="css">CSS</label><br>
    <input type="checkbox" id="html" name="cursos[]" value="HTML">
    <label for="html">HTML</label><br>
    <input type="checkbox" id="javascript" name="cursos[]" value="JavaScript">
    <label for="javascript">JavaScript</label><br> -->


    <label for="cursos">Cursos:</label><br>
        <select id="cursos" name="cursos[]" multiple>
            <option value="curso1">Curso 1</option>
            <option value="curso2">Curso 2</option>
            <option value="curso3">Curso 3</option>
        </select>
        <br>




    <input type="submit" value="Enviar">





</form>

</body>
</html>