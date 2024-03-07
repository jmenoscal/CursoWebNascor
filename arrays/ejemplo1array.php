<!DOCTYPE html>
<html>
<body>

<?php
$cars = array("Volvo", "BMW", "Toyota");
echo count($cars) . "<br>";
//accedo a un elemneto
$accede=$cars[1];
echo "$accede<br>";
//modifico un elemento 
$cars[2] = "Fiat";
$modifica = $cars[2];
echo "$modifica <br>";
//añadimos un elemento
array_push($cars, "Audi");
echo "$cars[3]<br>";
// Muestra todo el array después de añadir "Audi"
foreach ($cars as $car) {
    echo "$car, ";
}
//eliminar elementos
unset($cars[2]);
echo "<br>";
foreach ($cars as $car) {
    echo "$car ";
}

?>

</body>
</html>
