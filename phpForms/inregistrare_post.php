<link rel="stylesheet" href="style1.css">
<link href="../css/inregistrare.css" rel="stylesheet" />
<link href="../css/navbar.css" rel="stylesheet" />
<link href="../css/inregistrare.css" rel="stylesheet" />

<html>
<body>
    <?php
   
    ?> 
<div id="container_inregistrare">
    <div id="card_inregistrare">
        <div class="inner_card_inregistrare!">
        <h3> Multumim ca v-ati inregistrat</h3>
        <p> Contul Dumneavoastra a fost creat</p>
        <a href="/pc/inregistrare.php" ><button class="btn" >Login</button></a>
    </div>
    </div>
</div>
<?php

?> 
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

$filepath="network.png";
$sql = "INSERT INTO user (Nume, Prenume, Email, Adresa, Varsta, Parola)".
"VALUES ('".$_POST["Nume"]."','".$_POST["prenume"]."','".$_POST["Email"]."','"
.$_POST["adresa"]."',".$_POST["varsta"].",'".$_POST["Parola"]."');";
$result = $conn->query($sql);
?>

</body>
</html>