<?php 
//cleaning,electricity,wifi,washroom,mess,architecture,others
require "HCM_db.php";

function exequery($query_res,$query_reg,$conn){
    $result1=$conn->query($query_reg);
    $result2=$conn->query($query_res);
    $result=array();
    if($result1 and $result2){
        $row1=$result1->fetch_assoc();
        $row2=$result2->fetch_assoc();
        $result["reg"]=$row1["total"];
        $result["res"]=$row2["total"];
    }
    return $result; 
}

//query for total complaints
$query_total_reg="SELECT COUNT(id) as total FROM complaint";
$query_total_res="SELECT COUNT(id) as total FROM complaint WHERE status=1";

//query for total cleaning complaints
$query_total_res_cleaning="SELECT COUNT(id) as total  FROM  complaint WHERE status=1 and type='cleaning'";
$query_total_reg_cleaning="SELECT COUNT(id)  as total FROM  complaint WHERE type='cleaning'";

//query for total electricity
$query_total_res_electricity="SELECT COUNT(id) as total FROM  complaint WHERE status=1 and type='electricity'";
$query_total_reg_electricity="SELECT COUNT(id) as total FROM  complaint WHERE type='electricity'";

//query for total wifi
$query_total_res_wifi="SELECT COUNT(id) as total FROM complaint  WHERE status=1 and type='wifi'";
$query_total_reg_wifi="SELECT COUNT(id) as total FROM complaint  WHERE type='wifi'";

//query for total washroom
$query_total_res_washroom="SELECT COUNT(id) as total FROM complaint  WHERE status=1 and type='washroom'";
$query_total_reg_washroom="SELECT COUNT(id) as total FROM complaint  WHERE type='washroom'";

//query for total mess
$query_total_res_mess="SELECT COUNT(id) as total FROM complaint  WHERE status=1 and type='mess'";
$query_total_reg_mess="SELECT COUNT(id) as total FROM complaint  WHERE type='mess'";

//query for total architecture
$query_total_res_architecture="SELECT COUNT(id) as total FROM complaint  WHERE status=1 and type='architecture'";
$query_total_reg_architecture="SELECT COUNT(id) as total FROM complaint  WHERE type='architecture'";

//query for total other
$query_total_res_others="SELECT COUNT(id) as total FROM complaint  WHERE status=1 and type='others'";
$query_total_reg_others="SELECT COUNT(id) as total FROM complaint  WHERE type='others'";

$stats=array();
$stats["total"]=exequery($query_total_res,$query_total_reg,$conn);
$stats["cleaning"]=exequery($query_total_res_cleaning,$query_total_reg_cleaning,$conn);
$stats["electricity"]=exequery($query_total_res_electricity,$query_total_reg_electricity,$conn);
$stats["wifi"]=exequery($query_total_res_wifi,$query_total_reg_wifi,$conn);
$stats["washroom"]=exequery($query_total_res_washroom,$query_total_reg_washroom,$conn);
$stats["mess"]=exequery($query_total_res_mess,$query_total_reg_mess,$conn);
$stats["architecture"]=exequery($query_total_res_architecture,$query_total_reg_architecture,$conn);
$stats["others"]=exequery($query_total_res_others,$query_total_reg_others,$conn);

echo json_encode($stats);
$conn->close();
?>
