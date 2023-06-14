<link href="../css/inregistrare.css" rel="stylesheet" />
<link href="../css/navbar.css" rel="stylesheet" />
<link href="../css/login.css" rel="stylesheet" />
<link rel="stylesheet" href="style1.css">
<html>
    
<body class="container-login100">
<?php
?> 
<div id="container_inregistrare">
    <div id="card_inregistrare">
        <div class="inner_card_inregistrare">
            <?php 
            session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pc";
           
            $conn = new mysqli($servername, $username, $password,$dbname);
           
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $email = $_POST['email'];
            $parola = $_POST['parola'];
            $sql = "SELECT * FROM `user` where Email = '".$email."' and Parola = '".$parola."'";
            $id = "SELECT Id FROM `user` where Email = '".$email."' and Parola = '".$parola."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                $row= $result->fetch_assoc();
                $_SESSION['user_id'] = $row["Id"];
                echo 'Bun venit, '.$row["Nume"].' '.$row["Prenume"]. '<br><a href="/pc/acasa.php"><button class=\"btn\">Home</button></a>';
                    

                //'.<br/>Parola ta este '.$row["Parola"];
            }
            else{
               echo "nu am gasit contul";
               echo " <a href=\"/pc/inregistrare.php\"><button class=\"btn\">Back to login</button></a>";
            }

            ?>
           
        </div>
        </div>
    </div>
<?php

?> 
</body>
</html>