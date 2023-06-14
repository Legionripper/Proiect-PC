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
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $db_name="pc";
    $conn=new mysqli($servername, $username, $password, $db_name);
    if($conn->connect_error){
        die("connection failed".$conn->connect_error);
    }
    $postid=$_POST['post_idedit'];
    $postid1=$postid;
    $sql = "SELECT * FROM postare WHERE Id=$postid ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $desc=$row["Descriere"];
    $titlu=$row["Titlu"];
   // echo "$postid";
    echo "

      
    
    
    <br><br><br><br><br><br><br><br>
    <div class=\"upload_postare\">
        <form action=\"editpost_post.php\" method=\"post\"> <!--aici link php-->
            <input type='hidden' id='post_id' name='post_id' value=$postid1>
            <label for=\"titlu_postare\">Titlu:</label>
            <input type=\"text\" id=\"titlu_postare\" name=\"titlu_postare\" value=$titlu><br><br>
            <p><label for=\"descriere_pb\">Descriere Problema/Intrebare:</label></p>
            <textarea id=\"descriere_pb\" name=\"descriere_pb\" rows=\"4\" cols=\"110\" value>$desc</textarea>
            <br><br><br>
            
            <label for=\"hashtag\">Alege un hashtag:</label>
            <select name=\"hashtag\" id=\"hashtag\">
            
              <option value=\"#Arta\">#Arta</option>
              <option value=\"#Drept\">#Drept</option>
              <option value=\"#Economie\">#Economie</option>
              <option value=\"#Informatica\">#Informatica</option>
              <option value=\"#Litere\">#Litere</option>
              <option value=\"#Filosofie\">#Filosofie</option>
              <option value=\"#Fizica\">#Fizica</option>
              <option value=\"#Sport\">#Sport</option>
              <option value=\"#Biologie Chimie\">#Biologie Chimie</option>
              <option value=\"#Psihologie\">#Psihologie</option>
              <option value=\"#Muzica\">#Muzica</option>
            </select>
            <br><br>
            <button class=\"btn\" type=\"submit\">edit</button>
            
        </form>
    </div>";
    ?>
</body>

</html>