<?php
require "sessionHCM.php";
require "HCM_db.php";
if(!isset($_SESSION["login_user"])){
    header("Location: login.php");
}
else{
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $uname=$_POST["uname"];
    $find_query="SELECT uid from account where uname='$uname'";
    $uid="";
    $result=$conn->query($find_query);
    if($result && $result->num_rows>0){
        $row=$result->fetch_assoc();
        $uid=$row["uid"];
        $neutral_query="UPDATE complaint SET uid=NULL,status=0 WHERE uid=".$uid." and status=2";
        $u_query="UPDATE complaint SET uid=NULL WHERE uid=".$uid." and status=1";
        $nresult=$conn->query($neutral_query);
        $uresult=$conn->query($u_query);
        $del_query="DELETE FROM account WHERE uid=".$uid;
        $conn->query($del_query);
        echo $del_query;
        $_SESSION["msgrs"]="Deletion successfull";
    }
    else{
        $_SESSION["msgrf"]="User Not Available";
    }
    header("Location: remove_Emp.php");
}
}
?>