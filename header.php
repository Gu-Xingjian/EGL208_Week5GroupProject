
<header>
        <img id="logo" src="images/makandologo.png" alt="Logo">
        <nav>
            <label for="hamburger">&#9776;</label>
            <input type="checkbox" id="hamburger"/>
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <?php
                if (isset($_SESSION['name']))
                {
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
                else{
                    echo '<li><a href="login.php">Login</a></li>';
                }  
                ?>
                <li><a href="orderLab24.php">Order Now</a></li>
                <li><a href="history.php">Order History</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <hr>
    </header>