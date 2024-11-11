<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <h1>food added</h1>
</head>
<body>
    <section id="main">
       <?php
       require_once("dbinfo.php");
       $mysqli = new mysqli($Name,$Price,$stock);
       //check connection
      
       if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }

    $Name = $_Post['Name'];
    $Price = $_Post['Price'];
    $stock = $_Post['Quantity'];
    
    $sqlstatement = "INSERT INTO `products`(`Name`, `Price`, `Stock`) VALUES ('$Name','$Price','$stock');";
      $mysqli->query($sqlstatement);
      $orderFK = $mysqli->insert_id;
$mysqli->close();
?>