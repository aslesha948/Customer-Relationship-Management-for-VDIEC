<?php
//must appear BEFORE the <html> tag
session_start();
include_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lead Process Finished</title>
    <?php include("include/header.inc") ?>
</head>
<body onLoad="run_first()">
<?php include("include/banner.inc") ?>
<?php include("include/nav.inc") ?>

<?php
if(isset($_POST['lead_id'], $_POST['name'], $_POST['source'], $_POST['number'], $_POST['email'], $_POST['status'])) {
    //make the database connection
    $conn  = db_connect();
    $leadid = $conn -> real_escape_string($_POST['lead_id']);
    $name = $conn -> real_escape_string($_POST['name']);
    $source = $conn -> real_escape_string($_POST['source']);
    $contact = $conn -> real_escape_string($_POST['number']);
    $email = $conn -> real_escape_string($_POST['email']);
    $status = $conn -> real_escape_string($_POST['status']);
    //create an insert query 
   // $sql = "INSERT into leads (ID, Name, Contact, EmailID) 
    //VALUES ('$leadid', '$name', '$contact', '$email')";
    $sql = "INSERT into leads (lead_id, Name, Source, Contact, EmailID, Status) 
    VALUES ('$leadid', '$name', '$source', '$contact', '$email', '$status')";
    //execute the query
    if($conn -> query($sql))
    {
        echo "<div class=\"container\">";    
        echo "<p>Lead Inserted<p>";
        echo "<p><a href=\"lead.php\">Add a new lead</a></p>";
        echo "</div>";
      
    }

    else{
        echo "Wrong Inputs";
    }
    $conn -> close();
}
else {
    die("Input error");
}
?>

<?php include("include/footer.inc") ?>
</body>
</html>
