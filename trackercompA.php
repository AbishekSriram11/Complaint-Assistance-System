<?php require "sessionHCM.php";
require "HCM_db.php";
if(!isset($_SESSION["login_user"])){
    header("Location : login.php");
}
$comp_query="SELECT id,reg_no,block,room_no,type,detail,img_location,DOS,DOR,status FROM complaint WHERE status=0 ORDER BY DOS";
$result=$conn->query($comp_query);
if($result->num_rows>0){
    echo "<h1>Manage Complaint</h1>";
    echo "<table class='table'>";
    echo "<thead>
    <tr>
      <th scope='col'>Sr</th>
      <th scope='col'>Registration Number</th>
      <th scope='col'>Block</th>
      <th scope='col'>Room Number</th>
      <th scope='col'>Type</th>
      <th scope='col'>Details</th>
      <th scope='col'>Date of Registration</th>
      <th scope='col'>Complaint Image</th>
      <th scope='col'>Assign </th>
    </tr>
  </thead>
  <tbody>";
  $count=1;
    while($row=$result->fetch_assoc()){
        $emp_query="SELECT fname,uid FROM account WHERE super_user=0 and type='".$row["type"]."'";
        $emp_res=$conn->query($emp_query);
        echo "<tr>";
        echo "<th scope='row'>$count</th>";
        echo "<td>".$row["reg_no"]."</td>";
        echo "<td>".$row["block"]."</td>";
        echo "<td>".$row["room_no"]."</td>";
        echo "<td>".$row["type"]."</td>";
        echo "<td>".$row["detail"]."</td>";
        echo "<td>".$row["DOS"]."</td>";
        if(!empty($row["img_location"])){
          $src=$row["img_location"];
          echo "<td>";
          echo "<img src='$src' class='cmp_img' alt='complaint image' width='200' height='200'/>";
          echo "</td>";
        }
        else{
          echo "<td><p>No image Provided</p></td>";
        }
        echo "<td><select class='custom-select' id=".$row['id'].">";
        while($row1=$emp_res->fetch_assoc()){
            echo "<option value=".$row1['uid'].">".$row1["fname"]."  ".$row1["uid"]."</option>";
        }
        echo"</select>";
        echo "<button type='button ' class='btn btn-success mt-4' onclick='javascript: empAssign(".$row["id"].")'>Assign</button>";
        echo "</td>";
        echo "</tr>";
        $count++;
    }
    echo "</tbody>";
}
else{
    echo "<p>No Pending Complaints</p>";
}
$conn->close();
?>