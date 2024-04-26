<?php
session_start();
$aviso = "Si quieres subir tus posts haz <a class='button' href='login.html'>login</a>";
if (isset($_GET['logout'])){
    session_destroy();
    header("location: index.php");
}
function user($email, $password)
{
    $mail = 'unUsuario@pass.es';
    $pass = 'unPassword';
    ///Lógica seguridad/usuarios///
// A la consulta añadir la comparación y obtener el id, 
// **!! que es lo que va a quedar en session user
    if ($email == $mail && $password == $pass) {
        $_SESSION['user'] = $email;
     //   $_SESSION['email'] = $email;
        return true;
    } else {
        return false;
    }
    //FIN Lógica seguridad/usuarios ///
}