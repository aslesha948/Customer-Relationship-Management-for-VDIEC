<?php
include "config.php";
$con = db_connect();
$user_id = $_POST['user_id'];
echo $user_id;
$name = $_POST['name'];
echo $name;
$email = $_POST['email'];
echo $email;
$password = $_POST['password'];

echo $password;
$number = $_POST['number'];
echo $number;
$sql= "insert into users (user_id, name, email, password, number) values ('$user_id', '$name', '$email', '$password', '$number')";
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
