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
fwrite($archivo, "<h1>HOLA</h1>");
fclose($archivo);

// Añadir otro archivo CSV
$otroArchivo = fopen("otro_archivo.csv", "x");
fwrite($otroArchivo, "Nombre, Edad, Ciudad\n"); // Encabezados de las columnas
fwrite($otroArchivo, "Juan, 30, Barcelona\n"); // Ejemplo de fila
fwrite($otroArchivo, "María, 25, Madrid\n"); // Ejemplo de fila
// Puedes seguir añadiendo más filas aquí

fclose($otroArchivo);

// Leer y mostrar el contenido de "document.txt"
echo readfile("document.txt");
?>
</body>
</html>