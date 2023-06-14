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
        <p>Cont sters cu succes!</p>
        <br> 
    <a href="/pc/inregistrare.php"><button class="btn">OK</button></a>
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
      
      $sql = "DELETE FROM user WHERE Id = $userid";
      $sql2 = "DELETE FROM postare WHERE id_user = $userid";
      $sql3 = "DELETE FROM comentarii WHERE id_user = $userid";
      $sql4 = "DELETE FROM favorite WHERE id_user=$userid";
      $conn->query($sql);
      $conn->query($sql2);
      $conn->query($sql3);
      $conn->query($sql4);
    ?>
</body>
</html>