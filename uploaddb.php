<?php

/*Script:    Import Excel to MySQL using PHP and Bootstrap
File:      import.php
*/
include 'config.php';
$con = db_connect();
require_once 'dbcon.php';
$errors = true;

if (isset($_POST["submit"])) {
    $file = $_FILES["file"]["tmp_name"];
    ini_set('auto_detect_line_endings',"1");
    $file_open = fopen($file, "r");
    $count = 0;

    while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
        $count++;
        if ($count == 1) {
            continue;
        }
        $name = $csv[0];
		$source = $csv[1];
		$contact = $csv[2];
		$emailid = $csv[3];
		$status = $csv[4];

        $stmt = $DBcon->prepare("INSERT INTO `leads` VALUES ('',:name,:source,:contact,:emailid,:status,'','','','')");

        $stmt->bindparam(':name', $name);
        $stmt->bindparam(':source', $source);
        $stmt->bindparam(':contact', $contact);
        $stmt->bindparam(':emailid', $emailid);
        $stmt->bindparam(':status', $status);
		echo $name;
		$sql = "select * from leads where Contact='$contact'";
        $res = mysqli_query($con, $sql);
        $nor = mysqli_num_rows($res);
        if ($nor > 0) {
            $linecount = count(file($file));

            if ($count == $linecount) {
                $errors = true;
            }
            continue;
        }
        $result = $stmt->execute();
}

header("location:lead.php");
}
?>
