<html lang="en">

<?php
ini_set("display_errors", 1);
require_once "dbinfo.php";
$mysqli = new mysqli($hostname, $dbUser, $dbPassword, $db);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MYSQL: " . $mysqli->connect_error;
    exit();
}

$sqlstatement =
    "select  menu.itemID,menu.picFileName ,menu.unitPrice, categories.catTitle,menu.title from menu left join categories on menu.categoryFK = categories.catID order by menu.categoryFK,menu.itemID";

$result = $mysqli->query($sqlstatement);

/*echo "<table> <tr> <th>Category</th><th>Menu Item</th></tr>";

for ($i = 0; $i < $result->num_rows; $i++) {
    echo "<tr>";
    $record = $result->fetch_assoc();
    echo "<td>" . $record["catTitle"] . "</td>";
    echo "<td>" . $record["title"] . "</td>";
    echo "</tr>";
}*/
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
  <header>
    <img id="logo" src="images/makandologo.png" alt="Logo">
    <nav>
      <label for="hamburger">&#9776;</label>
      <input type="checkbox" id="hamburger" />
      <ul id="menu">
        <li>
          <a href="index.html">Home</a>
        </li>
        <li>
          <a href="about.html">About</a>
        </li>
        <li>
          <a href="login.html">Login</a>
        </li>
        <li>
          <a href="order.html">Order Now</a>
        </li>
        <li>
          <a href="history.html">Order History</a>
        </li>
        <li>
          <a href="contact.html">Contact</a>
        </li>
      </ul>
    </nav>
    <hr>
  </header>
  <section id="main">
    <form action="submitorder.php" method="post">
      <h1>Hi Dawson Doh, please order from the items below:</h1>
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
            echo '<div class = "col '.$catTitleLower.'">';
            echo "<h1>".$catTitle."</h1>";
            echo '<div class="fooditem">';
            echo "<table><tr>";
            echo "<td><img src=".$picFile." alt='".$title." Photo"."'></td>";
            echo "<td>";
            echo '<span class= "itemname">'.$title."</span><br>";
            echo '$<span class="price">'.$price.'</span>';
            echo "</td>";
            echo '<td> <span class="qty">Qty</span><br>';
            echo '<select name="'.$itemID.'" class="selectitem">';
            echo '<option value ="0" selected>None</option>';
            for ($purchasable = 1; $purchasable <= $maxpurchasable; $purchasable++){
                echo '<option value = "'.$purchasable.'">'.$purchasable.'</option>';
            }
            echo "</select></td></tr></table></div></div>";
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