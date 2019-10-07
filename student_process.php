<?php
include "config.php";
$con = db_connect();
$name = $_POST['name'];
echo $name;
$email = $_POST['email'];
echo $email;
$password = $_POST['password'];
echo $password;
$number = $_POST['number'];
echo $number;

$sql= "insert into student(name, email, number, password) 
		values ('$name', '$email', '$number', '$password')";
echo $sql."<br>";
            if(mysqli_query($con,$sql))
            { 
               header("Location:admin.php?suc=true");
              
                       }
            else
            {
                header("Location:admin.php?err=true");
            }
            ?>