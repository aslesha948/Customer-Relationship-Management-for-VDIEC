<?php
//must appear BEFORE the <html> tag
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Management</title>
  <?php include("include/header.inc") ?>
</head>
<body onLoad="run_first()">
<?php include("include/banner.inc") ?>
<?php include("include/nav.inc") ?>

<!--To check whether the user is logged in -->
<?php 
if(isset($_SESSION['valid_user']))
{
  $email=$_SESSION['valid_user'];
?>

<?php if(isset($_GET['suc']))
{?>
  <div class="alert alert-success">
  <strong>Success!</strong> User added succesfully
</div>
<?php } 

 if(isset($_GET['err']))
{?>
  <div class="alert alert-warning">
  <strong>Error!</strong> Please try again
</div>
<?php } 
  ?>
<div class="container">

<div class="row">
  <div class="col">


<p><a href="Add-User.php" class="button-red"> Add a new User </a></p>

</div>
</div>

<div class="row">
  <div class="col">

<p>The existing users are : </p>


<?php
$con=db_connect();
$sql="SELECT * FROM users";

$result = mysqli_query($con,$sql);

echo "<table border='2'style='width:100%'>
<tr>
<th>Employee ID </th>
<th>Name</th>
<th>Email</th>
<th>Password</th>
<th>Number</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
$uid = $row['user_id'];
echo "<tr>";
echo "<td>" . $uid . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['password'] . "</td>";
echo "<td>" . $row['number'] . "</td>";
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


