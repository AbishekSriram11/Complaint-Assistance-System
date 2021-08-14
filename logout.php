<?php 
require "sessionHCM.php";
if(!isset($_SESSION["login_user"])){
    header("Location: login.php");
}
else{
    session_unset();
    session_destroy();
    header("Location: login.php");
} 
?>