<?php
include "config.php";
$con = db_connect();

   // $leadid = $_POST['lead_id'];
    $name = $_POST['name'];
    $source = $_POST['source'];
    $contact = $_POST['number'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    //create an insert query 
   // $sql = "INSERT into leads (ID, Name, Contact, EmailID) 
    //VALUES ('$leadid', '$name', '$contact', '$email')";
    $sql = "INSERT into leads (Name, Source, Contact, EmailID, Status) 
    VALUES ('$name', '$source', '$contact', '$email', '$status')";
    //execute the query
    echo $sql."<br>";
            if(mysqli_query($con,$sql))
            { 
               header("Location:lead.php?suc=true");
              
                       }
            else
            {
                header("Location:lead.php?err=true");
            }
            ?>
