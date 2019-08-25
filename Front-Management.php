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

	<?php
	if(isset($_GET['cnt']))
	{
		$cntct = $_GET['cnt'];
	?>
  <h1>Front Desk Management</h1>
<form action="frontmanagementdb.php" method="post">
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
                	<label for="name">* Name :</label></div>
                   <div class="col-md-8">
                    <input type="text" id="name" name="name" size="30" maxlength="50" class="form-control" required />
                </div>
            </div>

      <!--     <div class="row">
                <div class="col">
                    <label for="source">* Source of the Lead:</label>
                    <input type="text" id="source" name="source" size="30" maxlength="50" required />
                </div>
            </div> -->

         <div class="row">
                 <div class="col-md-2" >
                   <label for="source">* Source:</label></div>
                    <div class="col-md-8">
                   <select name="source" id="source" class="form-control" required>
                      <option value = " ">Select One</option>
                      <option value = "Facebook">Facebook</option>
                      <option value = "Education Fair">Education Fair</option>
                      <option value = "College Data">College Data</option>
                    </select>
                </div>
            </div> 

            <div class="row">
                 <div class="col-md-2" >
                    <label for="number">* Contact Number:</label></div>
                     <div class="col-md-8">
                    <input type="text" readonly id="number" name="number" size="10" value="<?php echo $cntct;?>" maxlength="10" placeholder="10 digits" class="form-control"
                               onChange="checkphoneNumber(document)" required />
                    <span class="error_msg" id="num_msg"></span>
                </div>
            </div>

            <div class="row">
            	 <div class="col-md-2" >
                	<label for="email">* Email ID:</label></div>
                   <div class="col-md-8">
                	<input type="email" id="email" name="email" size="30" maxlength="50" class="form-control" required />
                </div>
            </div>

      <!--   <div class="row">
                <div class="col">
                    <label for="status">* Status</label>
                    <input type="text" id="status" name="status" size="30" maxlength="50" required />
                </div>
            </div> -->
           
        <!--  <div class="row">
                 <div class="col-md-2" >
                   <label for="status">* Status:</label></div>
                    <div class="col-md-8">
                   <select name="status" id="status" class="form-control" required>
                    <option value = " ">Select One</option>
                    <option value = "Hot">Hot</option>
                    <option value = "Warm">Warm</option>
                    <option value = "Cold">Cold</option>
                    </select>
                </div>
            </div>   -->
    <div class="row">
            	 <div class="col-md-2" >
                	<label for="email">* Walk In Number:</label></div>
                   <div class="col-md-8">
                	<input type="text" id="walknum" name="walknum" size="30" maxlength="50" placeholder="Walk in Number" class="form-control" required />
                </div>
            </div>

    <div class="row">
            	 <div class="col-md-2" >
                	<label for="email">* Counsellor Name:</label></div>
                   <div class="col-md-8">
                	<input type="text" id="counsellorname" name="counsellorname" size="30" maxlength="50" class="form-control" placeholder="Counsellor Name" required />
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

}
else
{
  header("location:index.php");
}
?>

	<?php include("include/footer.inc") ?>
</body>
</html>


