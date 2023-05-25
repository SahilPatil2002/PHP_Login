<?php 
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $_SESSION['username']?></title>
    <style>
        body{
            background-image: url("./partials/bg4.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        
    </style>
</head>

<body>

<?php require 'partials/_nav.php'?>

<div class="container my-2">

<div class="alert alert-success" role="alert">
  <h3 class="alert-heading">Welcome <?php echo $_SESSION['username']?></h3>
  <p>You have successfully logged in this website and now you can explore this website.</p>
  <hr>
  <p class="mb-0">Thank you for using this website and you can <a href="logout.php">logout</a> by clicking this link.</p>
</div>

</div>


</body>
</html>