<?php 
$servername="localhost";
$username="root";
$password="";
$db="HCM";
$conn=new mysqli($servername,$username,$password,$db);
if($conn->connect_error){
    die("Connection failure: ".$conn->connect_error);
}
?>