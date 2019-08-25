<?php
include "config.php";
$con = db_connect();

    $contact = $_POST['number'];
    $sql = "select * from leads where Contact='$contact'";
    //execute the query
    echo $sql."<br>";
	$result = mysqli_query($con,$sql);
	$count = mysqli_num_rows($result);
            if($count==1)
            { 
               header("Location:addcounsellor.php?cnt=".$contact."");
              
                       }
            else
            {
			    header("Location:Front-Management.php?cnt=".$contact."");
			}
            ?>