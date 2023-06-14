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
        <br><br><br><br><br><br><br><br>
    <div class="confirmation">
        <p>Comentariu Incarcat</p>
        <br> 
    <a href="/pc/acasa.php"><button class="btn">OK</button></a>
    </div>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
$postid=$_POST['post_id'];
$ceva=$_POST['textcom'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  session_start();
  if(isset($_SESSION['user_id'])){
      $userid = $_SESSION['user_id'];
     
  } 
  $sql = "INSERT INTO comentarii (Textcom, Id_postare, Id_user)".
  "VALUES ('".$_POST['textcom']."','".$_POST['post_id']."',$userid);";
 
 $result = $conn->query($sql);
?>
</body>
</html>