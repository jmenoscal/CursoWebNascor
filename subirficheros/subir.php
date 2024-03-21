<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir ficheros</title>
</head>
<body>
    
<form action="subir.php" method="post" enctype="multipart/form-data">
   <input type="file" name="archivo" id="archivo">
   <input type="submit" value="Upload Image" name="submit">
</form>

<?php
if (isset($_FILES["archivo"])) {
    $imgName = $_FILES["archivo"]["name"];
    if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $imgName)) {
        echo "<h1>¡Genial!</h1>";
    } else {
        echo "<h1>No has subido el archivo</h1>";
    }
}
?>
</body>
</html>




