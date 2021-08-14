<?php 
require 'HCM_db.php';
$rengno=$_GET["regno"];
$comp_query="SELECT type,detail,img_location,DOS,DOR,status,uid,report FROM complaint WHERE reg_no ='$rengno' ORDER BY DOS";
$result=$conn->query($comp_query);
if($result->num_rows>0){
    echo "<table class='table'>";
    echo "<thead>
    <tr>
      <th scope='col'>Sr</th>
      <th scope='col'>Type</th>
      <th scope='col'>Details</th>
      <th scope='col'>Date of Registration</th>
      <th scope='col'>Date of Resolution</th>
      <th scope='col'>Status</th>
      <th scope='col'>Employee Assigned</th>
      <th scope='col'>Complaint Image</th>
      <th scope='col'>Remark</th>
    </tr>
  </thead>
  <tbody>";
  $count=1;
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<th scope='row'>$count</th>";
        echo "<td>".$row["type"]."</td>";
        echo "<td>".$row["detail"]."</td>";
        echo "<td>".$row["DOS"]."</td>";
        echo "<td>".$row["DOR"]."</td>";
        if($row["status"]==0){
        echo "<td>pending</td>";
        }
        else if($row["status"]==2){
          echo "<td>Employee Assigned</td>";
        }
        else if($row["status"]==3){
          echo "<td>Verification by Warden</td>";
        }
        else{
        $status=$row["status"];
        echo "<td>Resolved </td>";
        }
        if(empty($row["uid"])){
          echo "<td>Data Unavailable</td>";
        }
        else{
          echo "<td>".$row["uid"]."</td>";
        }
        if(!empty($row["img_location"])){
          $src=$row["img_location"];
          echo "<td>";
          echo "<img src='$src' class='cmp_img' alt='complaint image' width='200' height='200'/>";
          echo "</td>";
        }
        else{
          echo "<td><p>No image Provided</p></td>";
        }
        if(empty($row["report"])){
          echo "<td>Data Unavailable</td>";
        }
        else{
          echo "<td>".$row["report"]."</td>";
        }
        echo "</tr>";
        $count++;
    }
    echo "</tbody";
}
else{
    echo "<p>No matching complaints for the given Registration Number</p>";
}
$conn->close();
?>