<html lang="en">
<?php 
    ini_set('display_errors',1);
    ?>

<head>
    <h1>Adding Products here</h1>
</head>

<body>
    <?php include_once("header.php");?>

    <section id="main">

    <form action="Adding_process.php" method="post"></td>

    <label for="Name">Product Name:</label>
    <input type="text" name="ProductName" >

    <label for="Price">Price:</label>
    <input type="price" name="Price" >

    <label for="quantity">Price:</label>
    <input type="quantity" name="Quantity" >

    <input class="button" type="submit" value="Login">

</form>
 <?php
if (isset($_GET['error']))
{
    if ($_GET['error'] == 'invalid')
    {
    echo '<p class ="errorlogin"> Invalid Login. Try Again </p>';
    }
}?>

    </section>
    <footer>
        <hr>
        &copy; Holy crab ! \('o')/. All rights reserved.
    </footer>
</body>
<?php
?>
</html>
