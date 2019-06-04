<?php
//must appear BEFORE the <html> tag
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin - Update </title>
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
if(isset($_GET['user']))
{
  $user = $_GET['user']; 
  
  $sql="SELECT * FROM users where id='$user' ";


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
          <form  action="update_db_user.php" method="Post">
      <div class="row">
      <div class="col-md-10">
      <?php 
      
    while ($row=mysqli_fetch_array($records)) 
    {?>
    
            
    <div class="row">
      <div class="col-md-2" ><label>User:</label></div>
      <div class="col-md-8">
        <input type="Text" class="form-control" value="<?php echo $row['name'];?>" name="name"readonly>
      </div>
    </div>
      
    <div class="row">
      <div class="col-md-2" ><label>Email:</label></div>
      <div class="col-md-8">
        <input type="Text" class="form-control" value="<?php echo $row['email'];?>" name="email"readonly>
      </div>
    </div>
  
    
   <div class="row">
      <div class="col-md-2" ><label>Number:</label></div>
      <div class="col-md-8">
         <input type="Text" class="form-control" value="<?php echo $row['number'];?>" name="number" readonly>
      </div>
    </div>
<div class="row">
      <div class="col-md-2" ><label>Address:</label></div>
      <div class="col-md-8">
            <textarea class="form-control" name="address" rows="5" ><?php echo $row['Address'];?></textarea>
      </div>
    </div>

  <input type="hidden" name="user" value="<?php echo $row['id'];?>">
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
