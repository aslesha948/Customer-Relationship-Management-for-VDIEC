<?php
//must appear BEFORE the <html> tag
session_start();
include_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CRM for VDIEC</title>
 <?php include("include/header.inc") ?>
</head>
<body onLoad="run_first()">
<?php include("include/banner.inc") ?>

<div class="container">
<div class="mt-3 px-2">
        <h1>Welcome</h1>
      
        <?php
        // check session variable
        if (isset($_SESSION['valid_user']))
        {
            //make the database connection
            $conn  = db_connect();

            $user_check = $_SESSION['valid_user'];
           

            //make a query to check if a valid user
            $ses_sql = "select name from student where email='$user_check'";

            $result = $conn -> query($ses_sql);

            echo "<p> The name is $user_check </p>";

            $res = mysqli_query($conn,"select comments from leads where EmailID = '$user_check'");


            if ($result -> num_rows == 1) {
                $row = $result -> fetch_assoc();
                $name = $row['name'];
                //header("location: cart.php");  
                echo "<p>Welcome <b>$name!</b></p>";
            

            
                if ($res -> num_rows > 0){
                    $rowStatus = $res ->fetch_assoc();
                    $comments = $rowStatus['comments'];

                    echo "<p> Your status : $comments </p>";
                }

                ?>

               

              <?php  echo "<p><a href=\"logout_std.php\">Logout</a></p>";



            }
            else {
                echo "<p>Something is wrong.</p>";
                echo "<p><a href=\"std_login.php\">Login</a></p>";
            }
            
        }
        else
        {
            echo "<p>You are not logged in.</p>";
            echo "<p><a href=\"std_login.php\" >Login</a></p>";
        }
        ?>

      
    </div>
  </div>

<?php include("include/footer.inc") ?>
</body>
</html>




