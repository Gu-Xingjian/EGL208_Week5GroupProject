
<?php
session_start();
    if (!isset($_POST["userid"]) || !isset($_POST["passwd"]))
    {
        echo "This page is not meant to be loaded directly";
        exit(0);
    }

    require_once("dbInfo.php");

    $mysqli = new mysqli($hostname,$dbUser,$dbPassword,$db); 

    // Check connection
    if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
    }

    $sqlstatement = "SELECT COUNT(*) FROM users WHERE userid ='" . 
                     $_POST["userid"] . "' AND password = '" . 
   $_POST["passwd"] . "'";
    echo $sqlstatement . "<br>";
    $result = $mysqli -> query($sqlstatement); 
    
    $record = $result -> fetch_assoc(); //Only 1 row return from Count(*)
						  //So no need to loop
    $result->free_result();
    
    if ($record["COUNT(*)"] == '1')
    {
        $sqlstatement2 ="SELECT fullname,userID from users WHERE userID='".$_POST["userid"]."' AND password = '".$_POST["passwd"]."'";
        $result = $mysqli->query($sqlstatement2);
        $record = $result->fetch_assoc();
        $_SESSION['name'] = $record['fullname'];
        $_SESSION["userID"] = $record['userID'];
        header("Location: orderLab24.php");  // *** Re-direct ***
    }
    else
    {
        header("Location: login.php?error=invalid");		// *** Re-direct ***
    }



    $mysqli->close();

?>
