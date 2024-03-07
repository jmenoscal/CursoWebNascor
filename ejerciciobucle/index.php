<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<h1>My first PHP page </h1>
<?php
echo "Hello World! Bienvenido <br>";
?> 

<?php
   // Declaración de variables
   $nombre = "Juan García";
   $edad = 30;
   $soltero = true;
   $esSoltero = "Si";
    if (!$soltero) 
    $esSoltero = "NO";

//como funciona la condicion
// La condición verifica si $soltero es falso (es decir, no está soltero). Si $soltero es verdadero, el bloque de código dentro del if no se ejecuta.
//Dentro del bloque del if, se actualiza el valor de $esSoltero a "No" , SI $soltero cumple condicion sobreescribe variable con valor nuevo.

// Impresión de variables
function imprime(){
global $nombre,$edad,$esSoltero;
   echo "Nombre: " . $nombre . "<br>";
   echo "Edad: " . $edad . "<br>";
   echo "¿Soltero?: " . $esSoltero . "<br>";
}
imprime()


   ?>



</body>
</html>