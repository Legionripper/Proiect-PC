<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
postare incarcata
<a href="acasa.php"><button class="btn">ok</button></a>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  session_start();
  if(isset($_SESSION['user_id'])){
      $userid = $_SESSION['user_id'];
     
  } 
 $sql = "INSERT INTO postare (Titlu, Descriere, Tags, id_user)".
 "VALUES ('".$_POST["titlu_postare"]."','".$_POST["descriere_pb"]."','".$_POST["hashtag"]."',$userid);";

$result = $conn->query($sql);
?>
</body>
</html>