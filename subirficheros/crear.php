<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$archivo = fopen("document.txt", "x");
fwrite($archivo,"<h1>HOLA</h1>");
echo readfile("document.txt");
fclose($archivo);

?>
</body>
</html>