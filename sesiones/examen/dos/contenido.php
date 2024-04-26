<!-- contenido.php -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<div class="card">
<h2>Datos del formulario</h2>

<?php
require_once 'ini.php';
?>
<?php 
if(isset($_SESSION["usuario"])) { ?>
    <h1>BIENVENIDO 
        <?php echo $_SESSION['usuario']; ?>!!
    </h1>
    <img src="https://cdn.pixabay.com/photo/2023/08/11/04/51/fireworks-8182800_1280.jpg" width=50%><br>
    <a href="login.php?logout=true">Cerrar sesión</a>
<?php  } ?>

</div>

</body>
</html>


