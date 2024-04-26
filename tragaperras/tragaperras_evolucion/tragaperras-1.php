<?php
/**
 * Minijuegos: Tragaperras (1) - tragaperras-1.php
 *
 * @author Escriba aquí su nombre
 *
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Tragaperras (1).
    Minijuegos.
    Escriba aquí su nombre
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="mclibre-php-ejercicios.css" title="Color">
</head>

<body>


<h1>Tragaperras (1)</h1>

  <?php
  $simbolosNumero = 8;   // Número de frutas
  
  // Se genera una combinación nueva
  $fruta1 = rand(1, $simbolosNumero);
  $fruta2 = rand(1, $simbolosNumero);
  $fruta3 = rand(1, $simbolosNumero);

  // Se genera el formulario
  print "  <table style=\"margin-left: auto; margin-right: auto; border: black 4px solid; border-spacing: 10px;\">\n";
  print "    <tr>\n";
  // Se muestran las tres imágenes de la combinación actual
  print "      <td style=\"border: black 4px solid; padding: 10px\">"
    . "<img src=\"img/frutas/$fruta1.svg\" width=\"160\" alt=\"Imagen\"></td>\n";
  print "      <td style=\"border: black 4px solid; padding: 10px\">"
    . "<img src=\"img/frutas/$fruta2.svg\" width=\"160\" alt=\"Imagen\"></td>\n";
  print "      <td style=\"border: black 4px solid; padding: 10px\">"
    . "<img src=\"img/frutas/$fruta3.svg\" width=\"160\" alt=\"Imagen\"></td>\n";
  print "    </tr>\n";
  print "  </table>\n";
  ?>

  <footer>
    <p class="ultmod">
      Última modificación de esta página:
      <time datetime="2022-11-30">30 de noviembre de 2022</time>
    </p>

    <p class="licencia">
      Este programa forma parte del curso <strong><a href="https://www.mclibre.org/consultar/php/">Programación
          web en PHP</a></strong> de <a href="https://www.mclibre.org/" rel="author">Bartolomé Sintes Marco</a>.<br>
      El programa PHP que genera esta página se distribuye bajo
      <a rel="license" href="http://www.gnu.org/licenses/agpl.txt">licencia AGPL 3 o posterior</a>.
    </p>
  </footer>

</body>
</html>
