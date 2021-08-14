<?php require "HCM_db.php";
require "sessionHCM.php";
if(isset($_SESSION["login_user"])){
if(!empty($_POST)){
    $id=$_POST["id"];
    $uid=$_POST["uid"];
    $update_query="UPDATE complaint SET status=2,uid=".$_POST["uid"]." WHERE id=".$_POST["id"];
    $result=$conn->query($update_query);
    if($result===TRUE){
        echo "0";
    }
    else{
        echo "-1";
    }
}
else{
    header("Location: login.php");
}
}
else{
    header("Location: login.php");
}