<?php
// Initialize the session
session_start();
clearstatcache();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache, must-revalidate");
 
require_once("config.php");

 $_POST["suggestion"];

 $sql = "SELECT username from users WHERE username LIKE '".$_POST["suggestion"]."%' ORDER BY username DESC LIMIT 10";
 
// SELECT username from users WHERE username LIKE '%a' ORDER BY username DESC LIMIT 10

$result = $mysqli->query($sql);
$array = array();
while($row = $result->fetch_assoc())
{
	array_push($array,$row['username']);
}

echo json_encode($array);

?>