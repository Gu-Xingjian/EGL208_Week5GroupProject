<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
<?php include_once("header.php");?>

    <section id="main">
        <h1>Contact Us</h1>
        <p>Do drop us a note here on what you like about our food, and how we can make your culinary experience even better at Makando!</p>
        <br>
        <!-- You could also use HTML form validation to validate this form, but we will use JavaScript for practice -->
        <form name="contactform" id="contactform" action="submitcontact.php" method="post">
            <fieldset>                
                <br>
                <label for="name">Name</label><br>
                <input type="text" name="fname" id="name" size="20" placeholder="Enter your name"><br>
                <div id="name_err"></div>
                <br>                
                <label for="mobile">Mobile Number</label><br>
                <input type="text" name="fmobile" id="mobile" size="20" placeholder="Enter your mobile number"><br>
                <div id="mobile_err"></div>
                <br>
                <label for="email">Email</label><br>
                <input type="text" name="femail" id="email" size="20" placeholder="Enter your email address"><br>
                <div id="email_err"></div>
                <br>
                <label for="comments">Your feedback</label><br>
                <textarea id="comments" name="fcomments" rows="7" cols="25" placeholder="Enter your comments here"></textarea>
                <br>
                <div id="comments_err"></div>                         
                <input type="submit" id="submitbutton" class="button" value="Submit Form">
                <div id="submission_err"></div>
            </fieldset>
        </form>
    </section>

    <footer>
        <hr>
        &copy; Makando Bistro Pte Ltd. All rights reserved.
    </footer>
    <script src="js/contact.js"></script>
    <?php
    if (isset($_GET['error']))
{
    if ($_GET['error'] && $_GET["error"] == "12001")
    {
    echo '<script> showError(document.getElementById("submission_err"),"Sorry we do not allow multiple feedback by the same mobile");</script>';
    }
}?>
</body>

</html>
