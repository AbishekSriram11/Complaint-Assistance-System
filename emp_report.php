<?php require "HCM_db.php";
require "sessionHCM.php";
if(isset($_SESSION["login_user"])){
if(!empty($_POST)){
    $id=$_POST["id"];
    $report=$_POST["report"];
    $update_query="UPDATE complaint SET status=3,report='".$report."' WHERE id=".$id;
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