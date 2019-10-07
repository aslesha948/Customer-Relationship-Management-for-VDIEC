<?php
//must appear BEFORE the <html> tag
session_start();
include_once('config.php');

if (isset($_SESSION['valid_user'])) {
   header("location: std_only.php");
}
//make the database connection
$conn  = db_connect();

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $email = $conn -> real_escape_string($_POST['email']);
    $password = $conn -> real_escape_string($_POST['password']);

    //make a query to check if user login successfully
    $sql = "select * from student where email='$email' and password='$password'";
    $result = $conn -> query($sql);
    $numOfRows = $result -> num_rows;
    $row = $result -> fetch_assoc();
    if ($numOfRows == 1) {
        $_SESSION['valid_user'] = $email;
        header("location: std_only.php");
    }else {
        $error = 'Your Login Name or Password is invalid';
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRM for VDIEC</title>
  <?php include("include/header.inc") ?>

  
</head>
<body onLoad="run_first()">
<?php include("include/banner.inc") ?>


<div class="container" style="background-image: url('images/backindex2.png');
/*position: center;*/
    min-width: 900px;
    min-height: 500px;
    width:100%;
    height:100%;
    z-index: 0; background-repeat: no-repeat;">

    <p> <a href = "index.php"><i class="fa fa-user fa-2x" aria-hidden="true"></i> Employee Login</a></p>
<form action="std_login.php" method="post">

        <div class="row">
         <div class="col-md-10">
    
          <h1>SIGN-IN</h1>
            <p>Please enter student email and password</p>
            <div class="row">
               <div class="col-md-2" >
                  <label for="email">Email:</label></div>
                   <div class="col-md-8">
                  <input type="email" id="email" name="email" size="35" maxlength="50" class="form-control" required />
                </div>
            </div>
            <div class="row">
              <div class="col-md-2" >
                  <label for="password">Password:</label></div>
                   <div class="col-md-8">
                    <input type="password" id="password" name="password"
                           size="35" maxlength="35" class="form-control" required />
                </div>
            </div>
      <div class="row">
              <div class="col">
                  <label>&nbsp;</label>
                    <input type="submit" id="submit" value="Submit" class="button-green" />
                    <input type="reset" id="reset" value="Clear" />
                    <?php
                    if(isset($error)) {
                        echo "<p style=\"color: red;\">$error</p>";
                        unset($error);
                    }
                    ?>
                </div>
            </div>            
    </div>
  </div>
        </form>

  
</div>





<?php include("include/footer.inc") ?>


</body>
</html>


