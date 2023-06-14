<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body class="class="container-login100">

<div class="confirmation">
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pc";
session_start();
  if(isset($_SESSION['user_id'])){
      $userid = $_SESSION['user_id'];
     
  } 
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if($_POST["email"]!==''){
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the new email from the form
    $newEmail = $_POST["email"];

    // Sanitize the email to prevent SQL injection
    $newEmail = mysqli_real_escape_string($conn, $newEmail);

    // Update the email in the database
    $sql = "UPDATE user SET Email = '$newEmail' WHERE Id = $userid";  // Assuming 'id' is the primary key of the user table
    if ($conn->query($sql) === TRUE) {
        echo nl2br("Email-ul a fost actualizat.\n");
        
        
    } else {
        echo "Error updating email: " . $conn->error;
    }
}
}
if($_POST["password"]!==''){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the new email from the form
        $newpw = $_POST["password"];
    
        // Sanitize the email to prevent SQL injection
        $newpw = mysqli_real_escape_string($conn, $newpw);
    
        // Update the email in the database
        $sql = "UPDATE user SET Parola = '$newpw' WHERE Id = $userid";  // Assuming 'id' is the primary key of the user table
        if ($conn->query($sql) === TRUE) {
            echo nl2br("Parola a fost actualizata.\n");
            
        } else {
            echo "Error updating Password: " . $conn->error;
        }
    }
    }
    if($_POST["description"]!==''){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the new email from the form
            $newdesc = $_POST["description"];
        
            // Sanitize the email to prevent SQL injection
            $newdesc = mysqli_real_escape_string($conn, $newdesc);
        
            // Update the email in the database
            $sql = "UPDATE user SET Descriere_cont = '$newdesc' WHERE Id = $userid";  // Assuming 'id' is the primary key of the user table
            if ($conn->query($sql) === TRUE) {
                echo nl2br("Descriere a fost actualizata.\n");
            
            } else {
                echo "Error updating Description: " . $conn->error;
            }
        }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $targetDir = "uploads/"; // Folder to save the images
    $targetFile = $targetDir . basename($_FILES["image"]["name"]); // Path of the uploaded image

    // Check if the file is an actual image
    if (!empty($_FILES["image"]['name'])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            //echo "Image uploaded successfully.";
           // echo "Path: " . $targetFile;
            $sql = "UPDATE user SET imgpfp = '$targetFile' WHERE Id = $userid";  // Assuming 'id' is the primary key of the user table
            if ($conn->query($sql) === TRUE) {
                echo nl2br("Poza de profil a fost actualizata.\n");
            
            } else {
                echo "Error updating pfp: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Fisierul nu este imagine.";
    }}
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["back-picture"])) {
    $targetDir = "uploadback/"; // Folder to save the images
    $targetFile = $targetDir . basename($_FILES["back-picture"]["name"]); // Path of the uploaded image

    // Check if the file is an actual image
    if (!empty($_FILES["back-picture"]['name'])){
    $check = getimagesize($_FILES["back-picture"]["tmp_name"]);
    if ($check !== false) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["back-picture"]["tmp_name"], $targetFile)) {
           // echo "Image uploaded successfully.";
           // echo "Path: " . $targetFile;
            $sql = "UPDATE user SET backimg = '$targetFile' WHERE Id = $userid";  // Assuming 'id' is the primary key of the user table
            if ($conn->query($sql) === TRUE) {
                echo nl2br("Poza de coperta a fost actualizata.\n");
            
            } else {
                echo "Error updating pfp: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }}
}


// Close the database connection
$conn->close();
?><a href="/pc/acasa.php">
<button class="btn">ok</button></a>
</div>
</body>
</html>