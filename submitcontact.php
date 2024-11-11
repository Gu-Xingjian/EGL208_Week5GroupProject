<?php
session_start();
if (!isset($_POST["fcomments"]) || !isset($_POST["fname"]) || !isset($_POST["femail"]) || !isset($_POST["fmobile"]))
{
    echo "This page is not meant to be loaded directly";
    exit(0);
}
require_once("dbInfo.php");

$mysqli = new mysqli($hostname,$dbUser,$dbPassword,$db); 
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
$dupeCheck = "SELECT COUNT(*) from contacts WHERE mobile = '".$_POST['fmobile']."'";
$result = $mysqli -> query($dupeCheck);
$record = $result -> fetch_assoc();
$result -> free_result();
if ($record["COUNT(*)"] == '0')
{
    $sqlstatement = "INSERT INTO `contacts`(`name`, `mobile`, `email`, `comments`) VALUES ('".$_POST['fname']."','".$_POST['fmobile']."','".$_POST['femail']."','".$_POST['fcomments']."')";
    $mysqli -> query($sqlstatement);
    $mysqli -> close();
}else{
    header("Location: contact.php?error=12001");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submitted</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
</head>
<body>
<?php include_once("header.php");?>
    <section id="main">
       <h1>Form Submitted</h1>
       <p>Thank you <?=$_POST["fname"]; ?> for your feedback!</p>
       <p>We will contact you via <?=$_POST["femail"]; ?> or on your number <?=$_POST["fmobile"]; ?> if we need more information.</p>
       <br>
       <p>We have also received your comments:</p>
       <p><?=$_POST["fcomments"]; ?></p>
    </section>
    <footer>
        <hr>
        &copy; Makando Bistro Pte Ltd. All rights reserved.
    </footer>
</body>
</html>
