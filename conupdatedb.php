<?php
include "config.php";
$con=db_connect(); 
$name = $_POST['name'];
$source = $_POST['source'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$walknum = $_POST['walknum'];
$comment = $_POST['comment'];
$destination = $_POST['destination'];
$status= $_POST['status'];
$cid= $_POST['cid'];
$upd = "Update leads set comments = '$comment' ,destination='$destination' ,status='$status' where Contact ='$contact'";
if(mysqli_query($con,$upd))
{
	header("Location:counsellor.php?suc=true");
}
else
{
	header("Location:counsellor.php?err=true");
}
?>