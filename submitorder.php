<?php session_start();?>
<!DOCTYPE html>
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
       <h1>Order Submitted</h1>
       <?php
       
       require_once("dbinfo.php");
       $mysqli = new mysqli($hostname,$dbUser,$dbPassword,$db);
       //check connection
      
       if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }
    $date = date('Y-m-d');
    $userid = $_SESSION['userID'];
    $sqlstatement = "INSERT INTO `orders`(`userFK`, `orderDate`) VALUES ('".$userid."','".$date."');";
      $mysqli->query($sqlstatement);
      $orderFK = $mysqli->insert_id;
  
foreach($_POST as $itemFK => $qty) {
    if ($qty > 0)   {
      
       $sqlstatement = "INSERT INTO orderitems ( orderFK, menuItemFK, itemQty) VALUES ('" .$orderFK."','" . $itemFK."' ,'" .$qty."')";
       $mysqli->query($sqlstatement);
        echo "<p>ItemID $itemFK with quantity $qty</p>";
    }
}
$mysqli->close();
?>

   


       <!-- <p>Thank you, your order is submitted!</p>
       <p>This is a temporary order submitted page until it gets more intelligence!</p>
    </section>
    <footer>
        <hr>
        &copy; Makando Bistro Pte Ltd. All rights reserved.
    </footer> -->
</body>
</html>
