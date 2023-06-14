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
   $postid=$_POST['post_idfav'];
  // echo $postid;
    $verify="SELECT id from favorite where (id_user=$userid and id_post=$postid)";
    $resultverify = $conn->query($verify);
    if(mysqli_num_rows($resultverify) > 0) {echo"<div class=\"confirmation\">
        <p>Postare stearsa de la favorite cu succes!</p>
        <br> 
        <a href=\"/pc/acasa.php\"><button class=\"btn\">OK</button></a>
        </div>";
    $sqldel="DELETE from favorite where id_user=$userid and id_post=$postid";
    $sqldelresult=$conn->query($sqldel);
    }
    else {
 $sql = "INSERT INTO favorite (id_user, id_post)".
 "VALUES ($userid,$postid);";
echo" <div class=\"confirmation\">
<p>Postare adaugata la favorite cu succes!</p>
<br> 
<a href=\"/pc/acasa.php\"><button class=\"btn\">OK</button></a>
</div>";
$result = $conn->query($sql);}
    ?>
  
</body>
</html>