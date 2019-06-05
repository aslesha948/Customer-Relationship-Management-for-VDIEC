<?php
//must appear BEFORE the <html> tag
session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Management-Add a Lead</title>
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

  
<form action="member_process.php" method="post">
       <!--  <div class="bg-light mt-3 px-2 member_frm" style="border-radius: 5px; border: solid maroon"> -->
        <div class="row">
         <div class="col-md-10">
          <h1>SIGN UP</h1>
            <h2>Please enter Employee profile</h2>

            <div class="row">
              <div class="col-md-2" >
                  <label for="user_id">*Employee ID:</label> </div>
                  <div class="col-md-8">
                    <input type="number" id="user_id" name="user_id" size="10" maxlength="10" placeholder="YYYYXXX" class="form-control" required />
                </div>
            </div>

            <div class="row">
              <div class="col-md-2">
                  <label for="name">* Name:</label></div>
                  <div class="col-md-8">
                    <input type="text" id="name" name="name" size="30" maxlength="50" class="form-control"  required />
                </div>
            </div>
            <div class="row">
               <div class="col-md-2">
                  <label for="email">* Email:</label></div>
                   <div class="col-md-8">
                  <input type="email" id="email" name="email" size="30" maxlength="50" class="form-control" required />
                </div>
            </div>
            <div class="row">
               <div class="col-md-2">
                  <label for="password">* Password:</label></div>
                   <div class="col-md-8">
                    <input type="password" id="password" name="password" size="30" maxlength="50" class="form-control" required />
                    <span id="pwd_msg" class="error_msg"></span>
                </div>
            </div>
            <div class="row">
               <div class="col-md-2">
                  <label for="rePassword">* Retype Password:</label></div>
                   <div class="col-md-8">
                    <input type="password" id="rePassword" size="30" maxlength="50" class="form-control"
                               onChange="checkRePassword(document)" />
                </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                  <label for="number">* Mobile Number:</label></div>
                   <div class="col-md-8">
                    <input type="text" id="number" name="number" size="10" maxlength="10" placeholder="10 digits" class="form-control"
                               onChange="checkphoneNumber(document)" required />
                    <span class="error_msg" id="num_msg"></span>
                </div>
            </div>

            <div class="row">
               <div class="col-md-2">
                  <label for="address">* Address:</label></div>
                   <div class="col-md-8">
                  <input type="text" id="address" name="address" size="30" maxlength="50" class="form-control" />
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


