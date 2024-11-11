<!DOCTYPE html>
<html lang="en">
<?php 
    ini_set('display_errors',1);
    ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php include_once("header.php");?>

    <section id="main">

    <form action="login_process.php" method="post"></td>

    <label for="userid">UserID:</label>
    <input type="text" name="userid" >


    <label for="passwd">Password:</label>
    <input type="password" name="passwd" >

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
        &copy; Makando Bistro Pte Ltd. All rights reserved.
    </footer>
</body>
<?php
?>
</html>
