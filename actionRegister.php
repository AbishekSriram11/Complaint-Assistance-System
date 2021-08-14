<?php
require 'HCM_db.php';
if(isset($_POST["submit"])){
    $name=($_POST["FName"]);
    $email=($_POST["Email"]);
    $regNO=($_POST["Regno"]);
    $roomNo=$_POST["Roomnumber"];
    $block=$_POST["block"];
    $type=$_POST["Type"];
    $detail=($_POST["detail"]);
    $img=$regNO.time();
    $img_local=$_FILES['complaint_image']['tmp_name'];
    $img_folder="img/".$regNO."/";
    $flag_upload=0;
    if(is_uploaded_file($img_local)){
    if(!file_exists($img_folder)){
        mkdir($img_folder,0777,true);
    }
    if(move_uploaded_file($img_local,$img_folder.$img)){
        $flag_upload=1;
    }
}
    if($flag_upload===0){
        $img_location=NULL;
    }
    else{
        $img_location=$img_folder.$img;
    }
    $insert_query="INSERT INTO complaint (name,reg_no,email,room_no,block,type,detail,img_location,DOS,status) VALUES('$name','$regNO','$email','$roomNo','$block','$type','$detail','$img_location',NOW(),0)";
    if($conn->query($insert_query)===TRUE){
        $conn->close();
        header("Location: successr.html");
    }
    else{
        echo $conn->error;
    }
}
else{
    $conn->close();
    header("Location: register.html");
}
?>