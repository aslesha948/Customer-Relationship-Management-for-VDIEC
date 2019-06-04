<?php
include "config.php";
$con=db_connect(); 
$name = $_POST['name'];
$source = $_POST['source'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$comment = $_POST['comment'];
$status= $_POST['status'];
$cid= $_POST['cid'];
$upd = "Update calling set comments = '$comment' ,status='$status' where id ='$cid'";
if(mysqli_query($con,$upd))
{
	header("Location:calling.php?suc=true");
}
else
{
	header("Location:calling.php?err=true");
}
?>