<?php
//must appear BEFORE the <html> tag
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Counsellor Management</title>
  <?php include("include/header.inc") ?>
</head>

<body onLoad="run_first()">
<?php include("include/banner.inc") ?>
<?php include("include/nav.inc") ?>

<div class="container">

<h1>Counsellor Management</h1>  
<?php 
if(isset($_SESSION['valid_user']))
{
  $email=$_SESSION['valid_user'];
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

  $qry = "SELECT * FROM `leads` WHERE `Walkin Number`!='' and `counsellorname` !=''";
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
            echo "<td>" . $cleads['comments'] . "</td>";
             
      
            echo "<td><a href=\"conupdate.php?cid=".$contact."\"><button type=\"button\" class=\"btn btn-warning\" style=\"float:right\" >Edit</button></a></td>";


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




?>

</div>

</div>
<!--  dont login -->
<?php } 
else
{
  header("location:index.php");
}
?>


      
<?php include("include/footer.inc") ?>
</body>
</html>
