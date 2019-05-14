<?php
//must appear BEFORE the <html> tag
//session_start();
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Mukta+Malar" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/member.css">
   <script src="js/nav.js"></script>
    <script src="js/read_more.js"></script>
    <script src="js/member.js"></script>
</head>
<body onLoad="run_first()">
<?php include("include/banner.inc") ?>
<?php include("include/nav.inc") ?>


<div class="container">

  
<form action="member_process.php" method="post">
         <div class="bg-light mt-3 px-2 member_frm" style="border-radius: 5px; border: solid maroon">
          <h1>SIGN UP</h1>
            <h2>Please enter your profile</h2>
           
            <div class="row">
              <div class="col">
                  <label for="name">* Name:</label>
                    <input type="text" id="name" name="name" size="30" maxlength="50" required />
                </div>
            </div>
            <div class="row">
              <div class="col">
                  <label for="email">* Email:</label>
                  <input type="email" id="email" name="email" size="30" maxlength="50" required />
                </div>
            </div>
            <div class="row">
              <div class="col">
                  <label for="password">* Password:</label>
                    <input type="password" id="password" name="password" size="20" maxlength="20" required />
                    <span id="pwd_msg" class="error_msg"></span>
                </div>
            </div>
            <div class="row">
              <div class="col">
                  <label for="rePassword">* Retype Password:</label>
                    <input type="password" id="rePassword" size="20" maxlength="20"
                               onChange="checkRePassword(document)" />
                </div>
            </div>
            <div class="row">
              <div class="col">
                  <label for="number">* Mobile Number:</label>
                    <input type="text" id="number" name="number" size="10" maxlength="10" placeholder="10 digits"
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
  <?php include("include/footer.inc") ?>
</body>
</html>


