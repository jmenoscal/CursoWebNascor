<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Estilos CSS para las secciones */
        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .column {
            flex: 1;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="column">
            <!-- Formulario para ingresar los nombres de los concursantes -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" required><br>
                <input type="submit" value="Agregar concursante">
            </form>
        </div>
        <div class="column">
            <!-- Formulario para ingresar los premios -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="premio">Premio (en euros):</label>
                <input type="number" id="premio" name="premio" required><br>
                <label for="cantidad">Cantidad de premios:</label>
                <input type="number" id="cantidad" name="cantidad" required><br>
                <input type="submit" value="Asignar premios">
            </form>
        </div>
        <div class="column">
            <!-- Aquí se mostrarán los ganadores y sus premios -->
            <?php
            $listadoCompleto = array(); // Array para almacenar los concursantes

            // Agregar 6 concursantes de ejemplo
            $concursantesEjemplo = array(
                'Ana', 'Carlos', 'David', 'Elena', 'Fernando', 'Gloria'
            );
            foreach ($concursantesEjemplo as $nombre) {
                $concursante = array('nombre' => $nombre);
                $listadoCompleto[] = $concursante;
            }

            if (isset($_POST['premio']) && isset($_POST['cantidad'])) {
                $premio = $_POST['premio'];
                $cantidad = $_POST['cantidad'];

                // Verificar que haya suficientes concursantes para asignar premios
                if (count($listadoCompleto) < $cantidad) {
                    echo "No hay suficientes concursantes para asignar $cantidad premios.";
                } else {
                    // Generar números aleatorios únicos para los ganadores
                    $ganadores = generarArrayAleatorio($cantidad, count($listadoCompleto) - 1);

                    // Asignar premios a los ganadores
                    $ganadoresConPremio = array();
                    foreach ($ganadores as $indice) {
                        $ganadoresConPremio[] = array(
                            'nombre' => $listadoCompleto[$indice]['nombre'],
                            'premio' => $premio
                        );
                    }

                    // Mostrar los ganadores y sus premios
                    foreach ($ganadoresConPremio as $ganador) {
                        echo "{$ganador['nombre']}: {$ganador['premio']} euros<br>";
                    }
                }
            }

            function generarArrayAleatorio($cantidad, $maximo)
            {
                $premiados = array();
                while (count($premiados) < $cantidad) {
                    $numero = rand(0, $maximo);
                    if (!in_array($numero, $premiados)) {
                        $premiados[] = $numero;
                    }
                }
                return $premiados;
            }
            ?>
        </div>
    </div>
</body>
</html>
