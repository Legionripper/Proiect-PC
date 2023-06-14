<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style1.css">
    <title>Profilul meu</title>
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
            <a href="stergere_cont.php">Sterge cont</a>
          </div>
        </div>
        
    </nav>

        <!--==============================Sfarsit navbar============================-->
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
   
} 
    $sql = "SELECT * FROM postare WHERE id_user=$userid ORDER BY Id desc";
    $result = $conn->query($sql);
    $sql1 = "SELECT * FROM user WHERE id=$userid";
    $user=$conn->query($sql1);
    $user1=$user->fetch_assoc();
    
    echo "
    <div class=\"container\">

    <div class=\"main-content\">
    

    <div class=\"left-sidebar\">
        <div class=\"sidebar-profile-box\">
             <img src=\"".$user1["backimg"]."\" height: 50px>                   
              <div class=\"sidebar-profile-info\">
              <img src=\"".$user1["imgpfp"]."\">                          

                 <h1> ".$user1["Nume"].' '.$user1["Prenume"]."</h1>                                       
                                       
                 <ul>
                    <li>".$user1["Descriere_cont"]."</li>
                    
                </ul>
                <br>
             </div>
        </div>

    </div>
    <br>

    ";
    while($row = $result->fetch_assoc()) {
      $postid=$row["Id"];
        $id_user=$row["id_user"];
        $u = "SELECT Nume, Prenume FROM user WHERE Id=$userid";
        $imagine= "SELECT imgpfp FROM user WHERE Id=$userid";
        $img=$conn->query($imagine);

        $imglink=$img->fetch_assoc();
        $username=$conn->query($u);
        $username1 = $username->fetch_assoc();
        $nrcom="SELECT * from comentarii where id_postare=$postid";
        $nrcomresult=$conn->query($nrcom);
        $nrcomfinal=mysqli_num_rows($nrcomresult);
       
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
        <input type='hidden' id='post_id' name='post_id' value=$postid>
        <div class=\"post-activity\">
            <div class=\"post-activity-answer\">
            <i class=\"far fa-comment\"></i>
            <span onclick=\"submitForm($postid)\">$nrcomfinal Raspunsuri</span>
            </form>
        </div>
        <form id=\"myFormEdit\" method='POST' action='editpost.php'>
        <input type='hidden' id='post_idedit' name='post_idedit' value=$postid>
        <div class=\"post-activity-edit\">
       
            <i class=\"fa-solid fa-pen-to-square\"></i>
            <span onclick=\"submitFormEdit($postid)\">Editeaza</span>
           </form>
        </div>
        <form id=\"myFormDel\" method='POST' action='confirmare_stergere.php'>
        <input type='hidden' id='post_iddel' name='post_iddel' value=$postid>
        <div class=\"post-activity-delete\">
            <i class=\"fa-solid fa-trash-arrow-up\"></i>
            <span onclick=\"submitFormDel($postid)\">Sterge</span>
            </form>
        </div>
    
        
       
      </div>
      </form>
      </div>
        ";
        
    }
        
        
        ?>

<script>
        function submitForm(postId) {
            document.getElementById("post_id").value = postId;
            document.getElementById("myForm").submit();
        }
        function submitFormDel(postId) {
            document.getElementById("post_iddel").value = postId;
            document.getElementById("myFormDel").submit();
        }
        function submitFormEdit(postId) {
            document.getElementById("post_idedit").value = postId;
            document.getElementById("myFormEdit").submit();
        }
    </script>
<script>
    // Add your JavaScript code here
    function toggleCommentSection(button) {
      const commentSection = button.nextElementSibling;
      commentSection.style.display = commentSection.style.display === 'none' ? 'block' : 'none';
    }
  </script>

</body>
</html>