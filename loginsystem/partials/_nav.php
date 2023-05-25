<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
      .nav-link:hover {
        color: #0d6efd;
        /* font-weight: bold; */
      }
      .nav-link {
        color: white;
        font-weight: bold;
      }
      .navbar-brand{
        color: #0d6efd;
        font-weight: bold;
      }
      .navbar-brand:hover{
        color:white;
        /* font-weight: bold; */
      }
      </style>
</head>
<body>


<?php
if(isset($_SESSION['loggedin']) && $_SESSION == true){
  $loggedin = true;
}else{
  $loggedin = false;
}
echo '
<nav class="navbar navbar-expand-lg bg-body-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" href="/loginsystem">iSecure</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="welcome.php">Home</a>
        </li>';

        if(!$loggedin){
          echo '
          <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="signup.php">Sign-Up</a>
          </li>';
        }

        if($loggedin){
          echo '
          <li class="nav-item">
          <a class="nav-link" href="logout.php">LogOut</a>
          </li>';

        }
      
        
      echo ' </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary rounded-pill" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>'
    

?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
