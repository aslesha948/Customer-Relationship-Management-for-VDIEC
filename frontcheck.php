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

	<h1>Front Desk Management</h1>
<form action="frontcheckdb.php" method="post">
        <!--  <div class="bg-light mt-3 px-2 member_frm" style="border-radius: 5px; border: solid maroon"> -->
        <div class="row">
         <div class="col-md-10">
        	<h3>Add a new walkin</h3>

          <!--  <div class="row">
                <div class="col-md-2" >
                    <label for="lead_id">* ID: </label></div>
                    <div class="col-md-8">
                    <input type="number" id="lead_id" name="lead_id" size="30" maxlength="50" class="form-control" required />
                </div>
            </div> -->
         
            <div class="row">
                 <div class="col-md-2" >
                    <label for="number">* Contact Number:</label></div>
                     <div class="col-md-8">
                    <input type="number" id="number" name="number" size="10" maxlength="10" placeholder="10 digits" class="form-control"
                               onChange="checkphoneNumber(document)" required />
                    <span class="error_msg" id="num_msg"></span>
                </div>
            </div>


            <div class="row">
            	<div class="col">
                	<label>&nbsp;</label>
                    <input type="submit" id="submit" value="Submit" onClick="return validateInfo(document)" s />
                    <input type="reset" id="reset" value="Clear Form" onClick="reset_frm(document)" />
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


