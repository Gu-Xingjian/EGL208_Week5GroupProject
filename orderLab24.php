<html lang="en">

<?php
session_start();
ini_set("display_errors", 1);
require_once "dbinfo.php";
$mysqli = new mysqli($hostname, $dbUser, $dbPassword, $db);

/* if (isset($_SESSION['name']))
{}
else{
  header("Location: login.php");
} */


if ($mysqli->connect_errno) {
    echo "Failed to connect to MYSQL: " . $mysqli->connect_error;
    exit();
}

$sqlstatement =
    "select  menu.itemID,menu.picFileName ,menu.unitPrice, categories.catTitle,menu.title from menu left join categories on menu.categoryFK = categories.catID order by menu.categoryFK,menu.itemID";

$result = $mysqli->query($sqlstatement);
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Food</title>
    <link rel="stylesheet" href="css/css_reset.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/order.css">
</head>

<body>
<?php include_once("header.php");?>
  <section id="main">
    <form action="submitorder.php" method="post">
      <h1>Hi <?php echo $_SESSION['name']?> please order from the items below:</h1>
      <div class="grid-container">
        <?php for ($i = 0; $i < $result->num_rows; $i++) {
            $maxpurchasable = 5;
            $record = $result->fetch_assoc();
            $picFile = "images/".$record['picFileName'];
            $price = $record['unitPrice'];
            $catTitle = $record['catTitle'];
            $catTitleLower = strtolower($catTitle);
            $title = $record['title'];
            $itemID = $record['itemID'];
            ?>
                <div class="col <?=strtolower($catTitle) ?>">
                    <h1><?=$catTitle?></h1>
                    <div class="fooditem">
                        <table>
                            <tr>
                                <td><img src="<?=$picFile?>" alt="<?=$title?> Photo"></td>
                                <td>
                                    <span class="itemname"><?=$title?></span><br>
                                    $<span class="price"><?=$price?></span>
                                </td>
                                <td><span class="qty">Qty</span><br>
                                    <select name="<?=$itemID?>" class="selectitem">
                                        <option value="0" selected>None</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
          <?php
        }
        ?>
        <div class="col totalinfo">
          <h1>Total Order Information</h1>
          <div id="itemised"></div>
          <div id="weather"></div>
          <input id="submit_button" class="button" type="submit" value="Submit Order">
        </div>
      </div>
    </form>
  </section>
  <footer>
    <hr> &copy; Makando Bistro Pte Ltd. All rights reserved.
  </footer>
  <script src="js/jquery.js"></script>
  <script src="js/order.js"></script>
  <script src="js/weather.js"></script>
  <?php
  $mysqli->close();
  ?>
</body>


</html>