<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css">
    <title>Acasa</title>
</head>
<body class="container-login100">
  

    <!--==============================Inceput navbar============================-->


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
        <!--==============================Sfarsit navbar============================-->

<div class="container">
    
   
     <!-------------------------------------------------------main-content----------->
    <div class="main-content">
    
       
        
        <p class="feed_titlu">Postari Favorite</p> <br>

        <!------------------pana aici e continut left-sidebar(care e de fat partea de sus---------------->
        
        <?php
    $servername="localhost";
    $username="root";
    $password="";
    $db_name="pc";
    $conn=new mysqli($servername, $username, $password, $db_name);
    if($conn->connect_error){
        die("connection failed".$conn->connect_error);
    }
    session_start();
    if(isset($_SESSION['user_id'])){
      $userid = $_SESSION['user_id'];
     
  } else echo "nu";

    $sql = "SELECT * FROM favorite where id_user=$userid ORDER BY Id desc";
    $result = $conn->query($sql);
    if(mysqli_num_rows($result) > 0){
    while($row1 = $result->fetch_assoc()) {
        
        $postid=$row1["id_post"];
        $iduser=$row1["id_user"];
        $postaresql="SELECT * FROM postare WHERE Id=$postid";
        
        $result1=$conn->query($postaresql);
        $row=$result1->fetch_assoc();
        $id_user=$row["id_user"];
        
        $u = "SELECT Nume, Prenume FROM user WHERE Id=$id_user";
        $imagine= "SELECT imgpfp FROM user WHERE Id=$id_user";
        $img=$conn->query($imagine);
        $nrfav="SELECT * from favorite where id_post=$postid";
        $nrfavresult=$conn->query($nrfav);
        $nrfavfinal=mysqli_num_rows($nrfavresult);
        $nrcom="SELECT * from comentarii where id_postare=$postid";
        $nrcomresult=$conn->query($nrcom);
        $nrcomfinal=mysqli_num_rows($nrcomresult);
        $imglink=$img->fetch_assoc();
        $username=$conn->query($u);
        $username1 = $username->fetch_assoc();
        echo "
        <div class=\"post\">
        <div class=\"post-author\">
        <img src=\"".$imglink["imgpfp"]."\">
        <div>
        <form id=\"myFormid\" method='POST' action='other_profile.php'>
        <input type='hidden' id='iduser' name='iduser' value=$iduser>
        <h1><span onclick=\"submitFormuser($iduser)\"> ".$username1["Nume"].' '.$username1["Prenume"]."</span></h1>
        </form>
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
        <input type='hidden' id='post_id' name='post_id' value=$postid>
        <div class=\"post-activity\">
            <div class=\"post-activity-answer\">
            <i class=\"far fa-comment\"></i>
            <span onclick=\"submitForm($postid)\"> $nrcomfinal Raspunsuri</span>
            </form>
        </div>
        <form id=\"myFormfav\" method='POST' action='makefav.php'>
        <input type='hidden' id='post_idfav' name='post_idfav' value=$postid>
        <div class=\"post-activity-favorite\">
        <i class=\"fa-regular fa-heart\"></i>
        <span onclick=\"submitFormfav($postid)\">$nrfavfinal Favorite</span> 
        </form>
    </div>
    
    
        
       
      </div>
      
      </div>
      
        ";}}
        else 
        echo"=====================================Nu exista postari favorite inca======================================= ";
        
      
    
?>
   <script>
        function submitForm(postId) {
            document.getElementById("post_id").value = postId;
            document.getElementById("myForm").submit();
        }
        function submitFormfav(postId) {
            document.getElementById("post_idfav").value = postId;
            document.getElementById("myFormfav").submit();
        }
        // function submitFormuser(iduser) {
        //     document.getElementById("iduser").value = iduser;
        //     document.getElementById("myFormid").submit();
        // }
    </script>
  
<script>
    // Add your JavaScript code here
    function toggleCommentSection(button) {
      const commentSection = button.nextElementSibling;
      commentSection.style.display = commentSection.style.display === 'none' ? 'block' : 'none';
    }
  </script>
<!-- <input type='submit' value='Add Comment'> -->
</body>
</html>