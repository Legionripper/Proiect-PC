<!DOCTYPE HTML>
<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OverflowUVT</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body class="container-login100">
        <br><br><br><br><br><br><br><br>
    <div class="confirmation">
        <p>postare stersa cu succes!</p>
        <br> 
    <a href="/pc/profil.php"><button class="btn">OK</button></a>
    </div>
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
      $postid=$_POST['post_iddel'];
      $sql = "DELETE FROM postare WHERE Id = $postid";
      $conn->query($sql)
    ?>
</body>
</html>