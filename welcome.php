<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="netapp.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

    <center><table><tr>
        <td >
        <div class="card" style="width: 18rem;">
        
  <img class="card-img-top" src="upload/<?php $sql = 'SELECT imagename FROM users WHERE username="'.$_SESSION["username"].'"'; $result = $mysqli->query($sql); while($row = $result->fetch_assoc()) { echo $row["imagename"]; } ?>" >
  <div class="card-body">
  <center>
    <h5 class="card-title">Hi</h5>
    <form action="uploadcover.php" method="POST">
    <input type="hidden" name="uploadguy" value="<?php $_SESSION["username"] ?>">
    <button class="btn btn-primary">Upload</button>
    </form>
    </center>
  </div>
</div>
</td>
</tr>
</table>
  <br>
  <br>
  <center>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
</center>
</body>
</html>