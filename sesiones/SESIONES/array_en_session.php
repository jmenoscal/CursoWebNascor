<?php
session_start();

?>
<!DOCTYPE html>
<html>
<body>

<?php
// Si recibimos por POST
if (isset($_POST['Email'])){
    // Si no existe sesión usuarios, la creamos
if (!isset($_SESSION['usuarios'])){
    // la creamos
    $_SESSION["usuarios"] = array();
}
//Metemos los datos enviados por post en la sesión usuarios
/* Count(usuarios) no da el tota, que es uno más que el último
en núero de orden*/ 
$_SESSION["usuarios"][count($_SESSION["usuarios"])] = $_POST;
echo "DATOS DE USUARIO<br>";
// Imprimimos la nueva cantidad de usuarios
echo "<br>Usuarios: " . count($_SESSION["usuarios"])."<hr>";
//imprimimos los datos de los usuarios dentro de session[usuarios]
foreach ($_SESSION['usuarios'] as $usuario){
   
    echo "Nombre: ". $usuario['Nombre']. "<br>";
    echo "Email: ". $usuario['Email']. "<br><hr>";
}
//print_r($_SESSION);
//session_destroy();
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    Nombre: <input type="text" name="Nombre">
    Email: <input type="email" name="Email">
    <input type="submit">
</form>
</body>
</html>
