<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css">
</head>
<body class="container-login200">
<nav>
      <a href="/pc/acasa.php"><img src="images/uvtLogo2.png"></a>     <!---de pus link catre acasa-->
        <div class="nav-links" id="navLinks">
          
                <ul>
                    <li><a href="/pc/acasa.php">Acasa</a></li>
                    <li><a href="profil.php">Profil</a></li>
                    <li><a href="fav.php">Favorite</a></li>
                    
                    
                </ul>

        </div>   

         <!------------------------------------------------ DROP DOWN MENU -------->
        <div class="dropdown">
          <button class="dropbtn">Meniu &#9662;</button>
          <div class="dropdown-content">
            <a href="edit-acc.html">Editare cont</a>
            <a href="/pc/inregistrare.php">Iesire din cont</a>
            <a href="confirmare_stergere.html">Sterge cont</a>
          </div>
        </div>
        
    </nav>
    
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
  $sql = "SELECT * FROM postare WHERE Id=$postid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id_user=$row["id_user"];
        $u = "SELECT Nume, Prenume FROM user WHERE Id=$id_user";
        $imagine= "SELECT imgpfp FROM user WHERE Id=$id_user";
        $img=$conn->query($imagine);
        
        $imglink=$img->fetch_assoc();
        $username=$conn->query($u);
        $username1 = $username->fetch_assoc();
        $postid=$row["Id"];
        $nrfav="SELECT * from favorite where id_post=$postid";
        $nrfavresult=$conn->query($nrfav);
        $nrfavfinal=mysqli_num_rows($nrfavresult);
        $sqlcom = "SELECT * FROM comentarii WHERE Id_postare=$postid ORDER BY Id desc";
        $resultcom = $conn->query($sqlcom);
        echo "
        <div class=\"post\">
        <div class=\"post-author\">
        <img src=\"".$imglink["imgpfp"]."\">
        <div>
        <h1> ".$username1["Nume"].' '.$username1["Prenume"]."</h1>
        </div>
        </div>
          <p>
          <h2>" .$row["Titlu"]."</h2>
        </p>
        <p>
        " .$row["Descriere"]."
        </p>
        <p><h6 style=\"color:blue;\">" .$row["Tags"]."</h6></p>
        <form id=\"myForm\" method='POST' action='comment.php'>
        <input type='hidden' name='post_id' value=$postid>
        <div class=\"post-activity-favorite\">
        <i class=\"fa-regular fa-heart\"></i>
        <span>$nrfavfinal Favorite</span> 
    </div>
    
    
        
       
      </div>
      </form>
      </div>
  
        
      
        <form action='commentpost.php' method='POST'>
        
        <input type='hidden' id='post_id' name='post_id' value=".$_POST['post_id'].">
        <br>
           <h1> <p>Comentarii</p></h1>
        <div class = \"upload_comment\">
        <input name='textcom' type='text'id=\"titlu_postare\" placeholder=\"Introduceti comentariu\" >
        </form>
        </div>
        ";
        while($rowcom=$resultcom->fetch_assoc())
        {
            $id_user=$rowcom["Id_user"];
        $u = "SELECT Nume, Prenume FROM user WHERE Id=$id_user";
        $imagine= "SELECT imgpfp FROM user WHERE Id=$id_user";
        $img=$conn->query($imagine);
        
        $imglink=$img->fetch_assoc();
        $username=$conn->query($u);
        $username1 = $username->fetch_assoc();
        echo "
        <div class=\"post\">
        <div class=\"post-author\">
        <img src=\"".$imglink["imgpfp"]."\">
        <div>
        <h1> ".$username1["Nume"].' '.$username1["Prenume"]."</h1>
        </div>
        </div>
          <p>
          <h2>" .$rowcom["Textcom"]."</h2>
        </p>
       </div>
        ";
        }
       
        
        
?>

</body>
</html>