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
$university = $_POST['university'];
$status= $_POST['status'];
$cid= $_POST['cid'];
$upd = "Update leads set comments = '$comment' ,destination='$destination',status='$status',University='$university' where Contact ='$contact'";
if(mysqli_query($con,$upd))
{
  header("Location:visa.php?suc=true");
}
else
{
  
  header("Location:visa.php?err=true");
}
?>