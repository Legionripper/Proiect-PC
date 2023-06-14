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
    
    $sql = "INSERT INTO comentarii (Text, Id_user)".
 "VALUES ('".$_POST["comentariu"]."','$postId);";
 $result = $conn->query($sql);
?> 