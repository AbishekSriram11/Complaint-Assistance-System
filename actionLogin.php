<?php 
require "sessionHCM.php";
require "HCM_db.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
if($_POST["submit"]){
    $uname=filter_var($_POST["uname"],FILTER_SANITIZE_STRING);
    $paswd=filter_var($_POST["paswd"],FILTER_SANITIZE_STRING);
    $loginCheck="SELECT uid,uname,password,fname,super_user FROM account WHERE uname='$uname'";
    $result=$conn->query($loginCheck);
    if($result){
        if($result->num_rows===0){
            //on invalid uname
            $_SESSION["messageu"]="Username not found";
        }
        else{
            $row=$result->fetch_assoc();
            if($paswd===$row["password"]){
                //on login successfull
                $_SESSION['login_user']=$uname;
                if($row["super_user"]==1){
                header("Location: dashboard.php");}
                else{
                    $_SESSION["uid"]=$row["uid"];
                    header("Location: dashboardE.php");
                }
            }
            else{
                //if password doesnt match;
                $_SESSION["messagep"]="Invalid Password";
                header("Location: login.php");
            }    
        }
        
    }
    else{
        //on db error
        echo $conn->error;
        header("Location :login.php");
    }  
}
} ?>