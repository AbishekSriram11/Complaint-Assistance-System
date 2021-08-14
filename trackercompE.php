<?php require "sessionHCM.php";
require "HCM_db.php";
if(!isset($_SESSION["login_user"])){
    header("Location :login.php");
}

$comp_query="SELECT id,block,room_no,detail,img_location FROM complaint WHERE status=2 and uid=".$_SESSION["uid"]." ORDER BY DOS";
$result=$conn->query($comp_query);
echo "<h1>Report Complaint</h1>";
if($result && $result->num_rows>0){
    echo "<table class='table'>";
    echo "<tread>
    <tr>
         <th scope='col'>Sr</th>
         <th scope='col'>Block</th>
         <th scope='col'>Room Number</th>
         <th scope='col'>Details</th>
         <th scope='col'>Complaint image</th>
         <th scope='col'>Report</th>
         </tr>
    </tread>";
    echo "<tbody>";
    $count=1;
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<th scope='row'>$count</th>";
        echo "<td>".$row['block']."</th>";
        echo "<td>".$row['room_no']."</th>";
        echo "<td>".$row['detail']."</th>";
        if(!empty($row["img_location"])){
            $src=$row["img_location"];
            echo "<td>";
            echo "<img src='$src' class='cmp_img' alt='complaint image' width='200' height='200'/>";
            echo "</td>";
          }
          else{
            echo "<td><p>No image Provided</p></td>";
        }
        echo "<td><textarea id=".$row["id"]." name=".$row["id"]." rows='5' cols='40'></textarea required><br>";
        echo "<button type='button ' class='btn btn-success mt-4' onclick='javascript: reptGen(".$row["id"].")'>Report</button></td>";
        echo "</tr>";
        $count++;
        echo "</tbody>";
    }     

}
else{
    echo "<p>No assigned Complaints</p>";
}
$conn->close();
?>