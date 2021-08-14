<?php
require "sessionHCM.php";
require "HCM_db.php";
if(!isset($_SESSION["login_user"])){
    header("Location: login.php");
}
else{
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $uname=$_POST["uname"];
    $fname=$_POST["fname"];
    $paswd=$_POST["paswd"];
    $dept=$_POST["dept"];
    $query="INSERT INTO account(uname,password,fname,super_user,type) VALUES('$uname','$paswd','$fname',0,'$dept')";
    $result=$conn->query($query);
    if($result){
        $_SESSION["msgs"]="Registration Successfull";
    }
    else{
        $_SESSION["msgf"]="Username Taken";
    }
    header("Location: add_Emp.php");
}
}
?>