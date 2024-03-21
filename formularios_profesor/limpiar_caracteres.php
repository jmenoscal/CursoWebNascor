<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<h2>Validación formulario</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Website: <input type="text" name="website">
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <br>
  <input type="checkbox" name="formDoor[]" value="A" <?php if (isset($_POST['formDoor'][0]) && $_POST['formDoor'][0] == "A")
        echo "checked"; ?>/>Acorn Building<br />
  <input type="checkbox" name="formDoor[]" value="B" />Brown Hall<br />
  <input type="checkbox" name="formDoor[]" value="C" />Carnegie Complex<br />
  <input type="checkbox" name="formDoor[]" value="D" />Drake Commons<br />
  <input type="checkbox" name="formDoor[]" value="E" />Elliot House
 
  <br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
  echo "<h2>Tus datos:</h2>";
  echo $name;
  echo "<br>";
  echo $email;
  echo "<br>";
  echo $website;
  echo "<br>";
  echo $comment;
  echo "<br>";
  echo $gender;
  echo "Cursos elegidos: <br>";
  foreach ($_POST['formDoor'] as $curso){
    echo $curso."<br>";
  }
?>

</body>
</html>