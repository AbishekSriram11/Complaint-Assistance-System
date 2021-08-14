<?php
require "sessionHCM.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="sidenav">
        <div class="login-main-text">
           <h2>HCM<br> Login Page</h2>
           <p>Login from here to access.</p>
           <p>Please contact Admin for Log in details</p>
        </div>
     </div>
     <div class="main">
        <div class="col-md-6 col-sm-12">
           
           <div class="login-form">
              <form action="actionLogin.php" method="POST"> 
                 <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="uname" placeholder="User Name">
                 </div>
                 <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" password="paswd" placeholder="Password">
                 </div>
                 <input type="submit" class="btn btn-info mb-3" name="submit" value="Login">
              </form>
              <?php
            if(isset($_SESSION["messageu"])){
                $messageu=$_SESSION["messageu"];
                echo "<div class='alert alert-danger' role='alert'>
                '$messageu'
              </div>";
              unset($_SESSION["messageu"]);
            }
            if(isset($_SESSION["messagep"])){
                $messagep=$_SESSION["messagep"];
                echo "<div class='alert alert-danger' role='alert'>
                '$messagep'</div>";
                unset($_SESSION["messagep"]);
            }
            ?>
           </div>
        </div>
     </div>
</body>
</html>
