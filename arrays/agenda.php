<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda con Array Multi dimensional</title>
</head>

<body>
    <?php
    $agenda = array(
        array("Nombre" => "Pedro Giménez", "Email" => "mail@ej.com", "telefono" => "444555666"),
        array("Nombre" => "Laura Gil", "Email" => "mail2@ej.com", "telefono" => "555555666"),
        array("Nombre" => "Ana Hernández", "Email" => "mail3@ej.com", "telefono" => "666555666"),

    );
    foreach ($agenda as $contacto) {
        echo "<b>" . $contacto["Nombre"] . "</b><br>";
        foreach ($contacto as $clave => $dato) {
            echo "$clave : $dato</br>";
        }
    }
    $agenda[] = array("Nombre" => "Pedro Pérez", "Email" => "mail4@ej.com", "teléfono" => "777555666");
    echo "<hr>";
    foreach ($agenda as $contacto) {
        echo "<b>" . $contacto["Nombre"] . "</b><br>";
        foreach ($contacto as $clave => $dato) {
            echo "$clave : $dato</br>";
        }
    }
    $agenda[0]['telefono'] = "111222333";
    echo "<hr>";
    foreach ($agenda as $contacto) {
        echo "<b>" . $contacto["Nombre"] . "</b><br>";
        foreach ($contacto as $clave => $dato) {
            echo "$clave : $dato</br>";
        }
    }
    ?>
</body>

</html>