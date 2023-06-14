<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style1.css">

<?php
    $servername="localhost";
    $username="root";
    $password="";
    $db_name="pc";
    session_start();

    $conn=new mysqli($servername, $username, $password, $db_name);
    if($conn->connect_error){
        die("connection failed".$conn->connect_error);
    }
    if(isset($_SESSION['user_id'])){
        $userid = $_SESSION['user_id'];
       
    } 
    $sql = "SELECT * FROM postare";
    $result = $conn->query($sql);
   
    while($row = $result->fetch_assoc()) {
        $id_user=$row["id_user"];
        $u = "SELECT Nume FROM user WHERE Id=$id_user";
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
        <h1> ".$username1["Nume"]."</h1>
        </div>
        </div>
          <p>
          <h2>" .$row["Titlu"]."</h2>
        </p>
        <p>
        " .$row["Descriere"]."
        </p>
        <p><h6 style=\"color:blue;\">" .$row["Tags"]."</h6></p>
        <div class=\"post-activity\">
            <div class=\"post-activity-answer\">
            <i class=\"far fa-comment\"></i>
            <span>answers</span>
        </div>
        <div class=\"post-activity-favorite\">
        <i class=\"fa-regular fa-heart\"></i>
        <span>Favorite</span> 
    </div>
    <div class=\"post-activity-reply\">
                    <i class=\"fa-solid fa-reply\"></i> 
                <a href=\"answtest.php\">     <span>Reply</span></a>
                </div>
    
        
       
      </div>
      </div>
      
        ";
        
      }
    
?>
<!-- <div class="post">
        <div class="post-author">
            <img src="images/jennaortega.png">               
             <div>
                <h1>Jenna Ortega</h1>
                <small>Asked <span>5 days</span> ago | Viewed <span>20</span> times</small> 
             </div>
        </div>
        <p>Unde se gasesc listele cu teme propuse de licenta?</p>    
        <div class="post-activity">
                <div class="post-activity-answer">
                    <i class="far fa-comment"></i>
                    <span>Answers</span>
                </div>
                <div class="post-activity-favorite">
                    <i class="fa-regular fa-heart"></i>
                    <span>Favorite</span> 
                </div>
                <div class="post-activity-reply">
                    <i class="fa-solid fa-reply"></i> 
                    <span>Reply</span>
                </div>
             
        </div>
     </div>  -->
</body>
<!-- <li>
        <div>
          <div><h3>" .$row["Titlu"]."</h3></div>
        </div>
        <p>
        " .$row["Descriere"]."
        </p>
        
      
    
        
       
      </li>
        "; -->
</html>
