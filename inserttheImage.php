<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";


$str_value = $_POST["image"];
if(strpos($str_value,"http:")!=false)
{
	$name1 = $str_value;
}
else
{
	$name1 = basename($str_value);
}
$name = basename($str_value);
$image = imagecreatefrompng("upload/".$name);
$name = basename($str_value);
$sql = "INSERT INTO messagelist(senderId,reciverId,message,type,status,deleted) VALUES('".$_SESSION["username"]."','".$_POST["chatingGuy"]."','".$name."','image','unread',1)";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->store_result();            
move_uploaded_file($name1,'upload/'.$name);

$mysqli->close();







?>