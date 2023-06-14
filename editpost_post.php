<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body class="container-login100">
<div class="confirmation">
        <p>Postare editata cu succes!</p>
        <br> 
        <a href="/pc/profil.php"><button class="btn">OK</button></a>
        </div>

<?php 
$postid=$_POST['post_id'];
//echo"$postid";
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
  $postid=$_POST['post_id'];
  $newtitlu=$_POST["titlu_postare"];
  
  $newdesc=$_POST["descriere_pb"];
  
  $newtag=$_POST["hashtag"];
  $newtitlu = mysqli_real_escape_string($conn, $newtitlu);
  $newdesc = mysqli_real_escape_string($conn, $newdesc);
  $newtag = mysqli_real_escape_string($conn, $newtag);
  
  //$sql = "UPDATE postare SET Titlu = '$newtitlu', SET Descriere='$newdesc', SET Tags='$newtag' WHERE Id = $postid";\
  $sqltitlu = "UPDATE postare SET Titlu = '$newtitlu' WHERE Id=$postid";
  $sqldesc = "UPDATE postare SET Descriere = '$newdesc' WHERE Id=$postid";
  $sqltags= "UPDATE postare SET Tags = '$newtag' WHERE Id=$postid";
//  $sql = "INSERT INTO postare (Titlu, Descriere, Tags, id_user)".
//  "VALUES ('".$_POST["titlu_postare"]."','".$_POST["descriere_pb"]."','".$_POST["hashtag"]."',$userid);";

$result = $conn->query($sqltitlu);
$result = $conn->query($sqldesc);
$result = $conn->query($sqltags);
?>
</body>
</html>