<body>

<?php
class Fruit {
  private $name;
  private $color;

  function __construct($name, $color) {
    $this->name = $name; 
    $this->color = $color; 
  }
  function get_name() {
    return $this->name;
  }
  function get_color() {
    return $this->color;
  }
}

$apple = new Fruit("Apple", "red");
echo $apple->get_name();
echo "<br>";
echo "El color de " . $apple->get_name() . " es " . $apple->get_color();
?>
 
</body>
</html>