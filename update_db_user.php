<?php
include "config.php";
$con=db_connect(); 
$name = $_POST['name'];
$number = $_POST['number'];
$email = $_POST['email'];
$address = $_POST['address'];
$user= $_POST['user'];
$upd = "Update users set Address = '$address' where id ='$user'";
if(mysqli_query($con,$upd))
{
	header("Location:admin.php?suc=true");
}
else
{
	header("Location:admin.php?err=true");
}
?>