<?php
//must appear BEFORE the <html> tag
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Visa Management</title>
  <?php include("include/header.inc") ?>
</head>

<body onLoad="run_first()">
<?php include("include/banner.inc") ?>
<?php include("include/nav.inc") ?>

<div class="container">

<h1>Summarised Report</h1>  
<?php 
if(isset($_SESSION['valid_user']))
{
  $email=$_SESSION['valid_user'];


  $conn  = db_connect();

  // //make a query to check if a valid user
  $role_sql = "select role from users where email='$email'";

  $result_role = $conn -> query($role_sql);


  if ($result_role -> num_rows == 1) {
           $row = $result_role -> fetch_assoc();
           $role = $row['role'];

          if($role == "admissions" || $role == "manager"){
?>
<div class="row" style="margin-top:5%;">
<div class="col-md-1"></div>

<?php 

  $visagranted = mysqli_query($conn,"SELECT Status FROM leads where Status = 'VISA Granted'");
  
  $visaG = mysqli_num_rows($visagranted);

  $visarejected = mysqli_query($conn,"SELECT Status FROM leads where Status = 'VISA Rejected'");

  $visaR = mysqli_num_rows($visarejected);

  $AppliedOL = mysqli_query($conn,"SELECT Status FROM leads where Status in ('Applied for Conditional OL', 'Applied for Unconditional OL')");

  $Ol = mysqli_num_rows($AppliedOL);

  $ReceivedOL = mysqli_query($conn,"SELECT Status FROM leads where Status = 'Received OL'");

  $RecOL = mysqli_num_rows($ReceivedOL);

  $Appliedcoe = mysqli_query($conn,"SELECT Status FROM leads where Status in ('Applied for COE', 'Applied Financial Assessment', 'Awaiting Financial Docs')");

  $COE = mysqli_num_rows($Appliedcoe);

  $Receivedcoe = mysqli_query($conn,"SELECT Status FROM leads where Status = 'Received COE'");

  $RecCOE = mysqli_num_rows($Receivedcoe);



   echo "<table border='2'style='width:100%'>
          <tr>
          
          <th>Number of Visa's Approved </th>
          <th>Number of Visa Rejections</th>
          <th>Number of Applications Applied</th>
          <th>Number of Offer Letters Received</th>
          <th>Number of Financials Pending </th>
          <th>Number of Received COE</th>
          
          </tr>";

      echo "<tr>";
    
      echo "<td>" . $visaG . "</td>";
      echo "<td>" . $visaR . "</td>";
      echo "<td>" . $Ol . "</td>";
      echo "<td>" . $RecOL . "</td>";
      echo "<td>" . $COE . "</td>";
      echo "<td>" . $RecCOE . "</td>";



           
      echo "</tr>";


    // while ($cleads = mysqli_fetch_array($res)) 
    // {


      
    //   $lead_id = $cleads['lead_id'];
	   //  $contact = $cleads['Contact'];

    //   echo "<tr>";
    //         echo "<td>" . $i . "</td>";
    //         echo "<td>" . $lead_id . "</td>";
    //         echo "<td>" . $cleads['Name'] . "</td>";//
    //         echo "<td>" . $cleads['Source'] . "</td>";
    //         echo "<td>" . $cleads['Contact'] . "</td>";
    //         echo "<td>" . $cleads['EmailID'] . "</td>";
    //         echo "<td>" . $cleads['Status'] . "</td>";
    //         echo "<td>" . $cleads['Walkin Number'] . "</td>";
    //         echo "<td>" . $cleads['Destination'] . "</td>";
    //         echo "<td>" . $cleads['University'] . "</td>";
    //         echo "<td>" . $cleads['comments'] . "</td>";
             
    


    //        echo "</tr>";

    //         $i++;

    //   # code...
    // }
   
    echo "</table>";



// $qy = "SELECT count('Status') as 'total' from 'leads' WHERE (SELECT * FROM `leads` WHERE `Status` IN ('VISA Granted'))";
//   $result = mysqli_query($conn,$qy);

//   $data = mysql_fetch_assoc($resut);
//   echo "The number of visa grants are " $data['total'];


?>

</div>

</div>
<!--  dont login -->
<?php 
 
}
else{
  echo "You do not have access to this page";
}
}
} 
else
{
  header("location:index.php");
}
?>


      
<?php include("include/footer.inc") ?>
</body>
</html>
