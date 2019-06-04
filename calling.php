<?php
//must appear BEFORE the <html> tag
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calling Management</title>
  <?php include("include/header.inc") ?>
</head>

<body onLoad="run_first()">
<?php include("include/banner.inc") ?>
<?php include("include/nav.inc") ?>

<div class="container">

  
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
if(isset($_GET['lead_id']))
{
  $lead = $_GET['lead_id'];

  $sql = "select * from leads where lead_id = '$lead'";

  $res = mysqli_query($conn,$sql);

  while ($row = mysqli_fetch_array($res)) {

    $id = $row['lead_id'];
    $leadname = $row['Name'];
    $leadsource = $row['Source'];
    $leadcontact = $row['Contact'];
    $leademail = $row['EmailID'];
    $leadstatus = $row['Status'];

    $query = "INSERT into calling(student_Name, source, contact, email,status,lead_id,user_email) VALUES('$leadname','$leadsource','$leadcontact','$leademail','$leadstatus','$id','$email')";
    $call = mysqli_query($conn,$query);
    if($call == 1)
    {
      header("Location:calling.php");
    }
    else
    {
      echo "fail".mysqli_error($conn);
    }
    # code...
  }
}

else
{
  $qry = "SELECT * from calling where user_email='$email'";
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
          <th>Action </th>
          </tr>";
    while ($cleads=mysqli_fetch_array($res)) 
    {
      $cid = $cleads['Id'];
      $lead_id = $cleads['lead_id'];

      echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $lead_id . "</td>";
            echo "<td>" . $cleads['student_Name'] . "</td>";
            echo "<td>" . $cleads['source'] . "</td>";
            echo "<td>" . $cleads['contact'] . "</td>";
            echo "<td>" . $cleads['email'] . "</td>";
            echo "<td>" . $cleads['status'] . "</td>";
      
            echo "<td><button type=\"button\" class=\"btn btn-warning\" style=\"float:right\" ><a href=\"update.php?cid=".$cid."\">Edit</a></button></td>";


           echo "</tr>";

            $i++;

      # code...
    }
    IF(isset($_GET['cid']))
{
  $c_id =  $_GET['cid'];
  $sel = mysqli_query($con,"select * from calling where id='$c_id'");
}
    echo "</table>";

}


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
