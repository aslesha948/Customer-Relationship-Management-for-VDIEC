<?php
//must appear BEFORE the <html> tag
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Visa Management</title>
  <?php include("include/header.inc") ?>
</head>

<body onLoad="run_first()">
<?php include("include/banner.inc") ?>
<?php include("include/nav.inc") ?>

<div class="container">

<h1>Visa Management</h1>  
<?php 
if(isset($_SESSION['valid_user']))
{
  $email=$_SESSION['valid_user'];


  $conn  = db_connect();

  // //make a query to check if a valid user
  $role_sql = "select role from users where email='$email'";

  $result_role = $conn -> query($role_sql);


  if ($result_role -> num_rows == 1) {
           $row = $result_role -> fetch_assoc();
           $role = $row['role'];

          if($role == "admissions" || $role == "manager"){
?>
<div class="row" style="margin-top:5%;">
<div class="col-md-1"></div>

<?php if(isset($_GET['suc']))
{?>
  <div class="alert alert-success">
  <strong>Success!</strong> Comments updated succesfully
</div>
<?php } 

 if(isset($_GET['err']))
{?>
  <div class="alert alert-warning">
  <strong>Error!</strong> Please try again
</div>
<?php } 
  ?>
<?php 
$conn = db_connect();

  $qry = "SELECT * FROM `leads` WHERE `Status` IN ('Applied Financial Assessment','Awaiting Financial Docs', 'Applied for COE', 'Declined COE', 'Received COE','Applied for VISA', 'Awaiting VISA Docs','VISA Granted', 'VISA Declined')";
  $res = mysqli_query($conn,$qry);

  $i=1;

   echo "<table border='2'style='width:100%'>
          <tr>
          <th> S.No</th>
          <th>Lead ID </th>
          <th>Name</th>
          <th>Source</th>
          <th>Contact Number</th>
          <th>Email ID </th>
          <th>Status</th>
          <th>Walk In Number</th>
          <th>Destination</th>
          <th>University Name</th>
          <th>Comments</th>
          <th>Action </th>
          </tr>";
    while ($cleads = mysqli_fetch_array($res)) 
    {
      
      $lead_id = $cleads['lead_id'];
	  $contact = $cleads['Contact'];

      echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $lead_id . "</td>";
            echo "<td>" . $cleads['Name'] . "</td>";//
            echo "<td>" . $cleads['Source'] . "</td>";
            echo "<td>" . $cleads['Contact'] . "</td>";
            echo "<td>" . $cleads['EmailID'] . "</td>";
            echo "<td>" . $cleads['Status'] . "</td>";
            echo "<td>" . $cleads['Walkin Number'] . "</td>";
            echo "<td>" . $cleads['Destination'] . "</td>";
            echo "<td>" . $cleads['University'] . "</td>";
            echo "<td>" . $cleads['comments'] . "</td>";
             
      
            echo "<td><a href=\"visaUpdate.php?cid=".$contact."\"><button type=\"button\" class=\"btn btn-warning\" style=\"float:right\" >Edit</button></a></td>";


           echo "</tr>";

            $i++;

      # code...
    }
    IF(isset($_GET['cid']))
{
  $c_id =  $_GET['cid'];
  $sel = mysqli_query($con,"select * from leads where Contact = '$c_id'");
}
    echo "</table>";


// $qy = "SELECT count('Status') as 'total' from 'leads' WHERE (SELECT * FROM `leads` WHERE `Status` IN ('VISA Granted'))";
//   $result = mysqli_query($conn,$qy);

//   $data = mysql_fetch_assoc($resut);
//   echo "The number of visa grants are " $data['total'];


?>

</div>

</div>
<!--  dont login -->
<?php 
 
}
else{
  echo "You do not have access to this page";
}
}
} 
else
{
  header("location:index.php");
}
?>


      
<?php include("include/footer.inc") ?>
</body>
</html>
