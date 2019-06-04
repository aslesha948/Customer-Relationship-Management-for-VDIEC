<?php
//must appear BEFORE the <html> tag
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lead Management</title>
  <?php include("include/header.inc") ?>
</head>
<body onLoad="run_first()">
<?php include("include/banner.inc") ?>
<?php include("include/nav.inc") ?>

<div class="container">

	
<!--To check whether the user is logged in -->
<?php 
if(isset($_SESSION['valid_user']))
{
  $email=$_SESSION['valid_user'];
?>

<div class="container">

<div class="row">
  <div class="col">


<p><a href="Add-Lead.php" class="button-red"> Add a new Lead </a></p>

</div>
</div>

<div class="row">
  <div class="col">

<p>The existing leads are : </p>


<?php
$con=db_connect();

$sql="SELECT * FROM `leads` WHERE lead_id not in(select lead_id from calling group by lead_id)";

$result = mysqli_query($con,$sql);

echo "<table border='2'style='width:100%'>
<tr>
<th>Lead ID </th>
<th>Name</th>
<th>Source</th>
<th>Contact Number</th>
<th>Email ID </th>
<th>Status</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
$leadid = $row['lead_id'];
echo "<tr>";
echo "<td>" . $leadid . "</td>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Source'] . "</td>";
echo "<td>" . $row['Contact'] . "</td>";
echo "<td>" . $row['EmailID'] . "</td>";
echo "<td>" . $row['Status'] . "</td>";

echo "</tr>";

}
 
echo "</table>";

mysqli_close($con);
?>
  
</div>
</div>

</div>
<!--Else it redirects to login page -->
<?php }
else
{
  header("location:index.php");
}
?>

      
  <?php include("include/footer.inc") ?>
</body>
</html>
