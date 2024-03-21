<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificadores</title>
</head>
<body>
<?php

/*
Las propiedades y los métodos pueden tener modificadores de acceso que controlan dónde se puede acceder a ellos.

Hay tres modificadores de acceso:

Public- Se puede acceder a la propiedad o método desde cualquier lugar. Esto es predeterminado
Protected- se puede acceder a la propiedad o método dentro de la clase y por clases derivadas de esa clase
Private- SÓLO se puede acceder a la propiedad o método dentro de la clase

En el siguiente ejemplo, hemos agregado tres modificadores de acceso diferentes a tres propiedades (nombre, color y peso). 
Aquí, si intenta establecer la propiedad del nombre, funcionará bien (porque la propiedad del nombre es pública y se puede acceder a ella desde cualquier lugar). 
Sin embargo, si intenta establecer la propiedad de color o peso, se producirá un error fatal (porque las propiedades de color y peso están protegidas y son privadas):
*/

class Fruit {
  public $name;
  protected $color;
  private $weight;
}

$mango = new Fruit();
$mango->name = 'Mango'; // OK
$mango->color = 'Yellow'; // ERROR
$mango->weight = '300'; // ERROR
?>

</body>
</html>