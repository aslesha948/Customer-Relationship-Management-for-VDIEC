<?php
//must appear BEFORE the <html> tag
session_start();
unset($_SESSION['valid_user']);
header("location: index.php");
?>
</html>


