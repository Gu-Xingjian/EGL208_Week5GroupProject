<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php include_once("header.php");?>

    <section id="main">
        <h1>This is the homepage</h1>
        <p>Place your main contents of the page here.</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias qui recusandae tenetur minus error
            quibusdam animi natus ipsa impedit velit id maxime, nesciunt numquam dolore fuga itaque repellendus omnis
            est.</p>
    </section>
    <footer>
        <hr>
        &copy; Makando Bistro Pte Ltd. All rights reserved.
    </footer>
    <div id="contactfloat">
        <button class="contactbutton" onclick="location.href='contact.html'">Contact
        Us</button>
    </div>
    <div id="realtimeclock"></div>
    <script src="js/index.js"></script>

        
</body>


</html>
