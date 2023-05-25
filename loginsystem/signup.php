<?php 
$showAlert = false;
$showErr = false; 
if($_SERVER["REQUEST_METHOD"]== "POST"){

include 'partials/_dbconnect.php';

$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];

$existSql = "SELECT * FROM `users` WHERE  username = '$username'";
$result = mysqli_query($conn, $existSql);
$numExistRows = mysqli_num_rows($result);

if($numExistRows > 0){
  $showErr = "Username already exist try different username";
}
else{

    if(($password == $cpassword)){
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO `users` ( `username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp());";
      $result = mysqli_query($conn , $sql);
        if($result){
        $showAlert = true;
        }
    }
    else{
    $showErr = "Passwords do not match";
    }
  }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUp</title>
  <style>
    body {
      background-image: url("./partials/bg4.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }

    .container {
      /* background-color: aliceblue; */
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      backdrop-filter: blur(20px) !important;
      border-radius: 30px;
      /* border: 1px solid white; */
      /* background-color: white !important; */
    }
  </style>
</head>

<body>

  <?php 
require 'partials/_nav.php';
?>

  <?php 
  
  if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account has been created and you can login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    
  }

  if($showErr){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong>'. $showErr.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }

?>

  <!-- Button trigger modal -->
  <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

  <div class="container col-md-4 my-4">
<div class="gap">&nbsp;</div>


    <h2 class="text-center text-white fw-bold my-4">Sign-Up</h2>

    <form action="signup.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label text-light">Username</label>
        <input type="text" maxlength="11" class="form-control rounded-pill" id="username" required name="username"
          aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label text-light">Password</label>
        <input type="password" maxlength="23" class="form-control rounded-pill" required id="password" name="password">
      </div>
      <div class="mb-3">
        <label for="cpassword" class="form-label text-light">Confirm Password</label>
        <input type="password" maxlength="23" class="form-control rounded-pill" required id="cpassword" name="cpassword">
        <div id="emailHelp" class="form-text text-light ">Please enter same password for confirmation.</div>
      </div>

      <div class="mb-3 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary my-2 ">Sign-Up</button>
      </div>
<div class="gap">&nbsp;</div>

    </form>


  </div>


</body>

</html>