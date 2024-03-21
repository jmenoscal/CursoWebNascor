<?php
// Crear el archivo CSV
$archivo = fopen("otro_archivo.csv", "x");

// Escribir los encabezados de las columnas
$encabezados = ["Nombre", "Edad", "Ciudad"];
fputcsv($archivo, $encabezados);

// Ejemplo de filas de datos
$datos1 = ["Juan", 30, "Barcelona"];
$datos2 = ["María", 25, "Madrid"];

// Escribir las filas en el archivo
fputcsv($archivo, $datos1);
fputcsv($archivo, $datos2);

// Cerrar el archivo
fclose($archivo);

// Leer y mostrar el contenido del archivo
echo "Contenido del archivo CSV:<br>";
if (($handle = fopen("otro_archivo.csv", "r")) !== false) {
    while (($fila = fgetcsv($handle)) !== false) {
        echo "Nombre: " . $fila[0] . ", Edad: " . $fila[1] . ", Ciudad: " . $fila[2] . "<br>";
    }
    fclose($handle);
}
?>
