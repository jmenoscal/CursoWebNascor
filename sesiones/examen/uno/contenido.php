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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['nombre'];
  $email = $_POST['email'];
echo "<h1>Bienvenido tus datos son:</h1>" . "<br>";
  echo "Nombre de usuario: " . $username . "<br>";
  echo "Email: " . $email . "<br>";
}
?>
<p>Mira que foto más chula:</p>
<img src="https://cdn.pixabay.com/photo/2023/08/11/04/51/fireworks-8182800_1280.jpg" width=50%><br>

<a class="button" href="login.php?logout=true">Salir</a>


</div>

</body>
</html>
