<?php
//must appear BEFORE the <html> tag
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Front Desk Management</title>
  <?php include("include/header.inc") ?>
</head>
<body onLoad="run_first()">
<?php include("include/banner.inc") ?>
<?php include("include/nav.inc") ?>

<!--To check whether the user is logged in -->
<?php 
if(isset($_SESSION['valid_user']))
{
  $email=$_SESSION['valid_user'];
?>


<div class="container">

	
<form action="uploaddb.php" method="post"  enctype="multipart/form-data">
        <!--  <div class="bg-light mt-3 px-2 member_frm" style="border-radius: 5px; border: solid maroon"> -->
        <div class="row">
         <div class="col-md-10">
        	<h1>Upload Leads</h1>

          <!--  <div class="row">
                <div class="col-md-2" >
                    <label for="lead_id">* ID: </label></div>
                    <div class="col-md-8">
                    <input type="number" id="lead_id" name="lead_id" size="30" maxlength="50" class="form-control" required />
                </div>
            </div> -->
         
            <div class="row">
                 <div class="col-md-2" >
                    <label for="number">* Upload File:</label></div>
                     <div class="col-md-8">
                    <input type="file" name="file"  />
                    <span class="error_msg" id="num_msg"></span>
                </div>
            </div>


            <div class="row">
            	<div class="col">
                	<label>&nbsp;</label>
                    <input type="submit" id="submit" name="submit" value="Submit" onClick="return validateInfo(document)" s />
                    
                </div>
            </div>
        </div>
        </form>
       


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


