<?php
//must appear BEFORE the <html> tag
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Calling- Update </title>
  <?php include("include/header.inc")?>
</head>
<body onLoad="run_first()">
<?php include("include/banner.inc") ?>
<?php include("include/nav.inc") ?>
<div class="container">

  
<!--To check whether the user is logged in -->
<?php 
if(isset($_SESSION['valid_user']))
{
  $email=$_SESSION['valid_user'];
?>

<div class="container">


<div class="row">
  <div class="col">


<?php
$con=db_connect();
if(isset($_GET['cid']))
{
  $c_id = $_GET['cid']; 
  
  $sql="SELECT * FROM calling where user_email='$email' and id='$c_id' ";


$records = mysqli_query($con,$sql);

 /*  echo "<table border='2'style='width:100%'>
   //       <tr>
     //     <th>Lead ID </th>
          <th>Name</th>
          <th>Contact Number</th>
          <th>Status</th>
          <th>Comments</th>
          
          </tr>";*/
      ?>
      <br>
          <form  action="update_db.php" method="Post">
      <div class="row">
      <div class="col-md-10">
      <?php 
      
    while ($row=mysqli_fetch_array($records)) 
    {?>
    
            
    <div class="row">
      <div class="col-md-2" ><label>Name:</label></div>
      <div class="col-md-8">
        <input type="Text" class="form-control" value="<?php echo $row['student_Name'];?>" name="name"readonly>
      </div>
    </div>
      
    <div class="row">
      <div class="col-md-2" ><label>Source:</label></div>
      <div class="col-md-8">
        <input type="Text" class="form-control" value="<?php echo $row['source'];?>" name="source"readonly>
      </div>
    </div>
    
  <div class="row">
      <div class="col-md-2" ><label>Contact:</label></div>
      <div class="col-md-8">
          <input type="Text" class="form-control" value="<?php echo $row['contact'];?>" name="contact" readonly>
      </div>
    </div>
    
   <div class="row">
      <div class="col-md-2" ><label>Email:</label></div>
      <div class="col-md-8">
         <input type="Text" class="form-control" value="<?php echo $row['email'];?>" name="email" readonly>
      </div>
    </div>
<div class="row">
      <div class="col-md-2" ><label>Comments:</label></div>
      <div class="col-md-8">
            <textarea class="form-control" name="comment" rows="5" ><?php echo $row['comments'];?></textarea>
      </div>
    </div>
 <div class="row">
      <div class="col-md-2" ><label>Status:</label></div>
      <div class="col-md-8">
           <input type="Text" class="form-control" value="<?php echo $row['status'];?>" name="status">
      </div>
    </div>
  <input type="hidden" name="cid" value="<?php echo $row['Id'];?>">
  <div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
  <button type="submit" class="btn btn-warning" >Submit</button>
  </div>
</div> 
  <?php
  }?>
  </div>
  </div>
  </form>
  <?php
   
}
else{
  echo "please Select atleast one record";
} echo "</table>";

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
