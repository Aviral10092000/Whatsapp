<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
require_once "config.php";
if(isset($_POST["submit"])){
    {
        $name = $_FILES['image']['name'];
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ){
            
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
            $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

            // Insert record
            $sql = "UPDATE users SET image = '$image',imagename = '$name' WHERE username='".$_SESSION['username']."'";
            $stmt = $mysqli->prepare($sql);
            $stmt->execute();
            $stmt->store_result();            
            move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$name);
            $mysqli->close();
            header("Location: welcome.php");
            exit();


        }
    
    }
    
}
}
?>