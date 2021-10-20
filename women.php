<?php
    session_start();
    var_dump($_SESSION);
    $id=session_id();
    
    echo 'Name: ' .$_SESSION['name'].'<br />';
    echo 'Quantity: ' .$_SESSION['qty'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>SHOE SHOP</title>
<meta charset="utf-8">
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
    <header>   
        <h1>DAMES.</h1>
    </header> 
    <nav>
        <b>
          <div class="navbar-center">
            <span class="nav-icon"> </span>
            <span class="nav-list">
              <a href="index.php">LATEST</a>
              <a href="men.php">MEN</a>
              <a href="women.php">WOMEN</a>
              <a href="myOrders.php">MY ORDERS</a>
              <a href="location.html">LOCATION</a>
            </span>
            <span class="nav-icon">
              <a href="shoppingBag.html"
                ><img id="shoppingBag" src="assets/shoppingBag/shoppingBag.png"
              /></a>
            </span>
          </div>
        </b>
      </nav>
    <main>
        <h2>WOMEN</h2>
        <div class="cardLayout">
            <?php
              $category='women';
              include 'shoeCard.php';
            ?>
          </div>
    </main>
</div>
</body>
<footer>
    <div class="flex-row-container">
        <div class="flex-row-item1">
            <h3>About Us</h3><br>
            Here at DAMES., we realize that style and 
            prosperity begin with the correct shoes. We likewise 
            understand that effectively finding the size and style to 
            meet your requirements is vital to your web based shopping 
            knowledge. Since beginning our web based business website in 
            2009, we’ve been endeavoring to present to you that perfect 
            shopping experience.
        </div>
        <div class="flex-row-item2">
            <h3>Customer Service</h3><br>
            Tel: +65 6888 8888<br><br>
            Email: <a href="mailto:cakeshop4717@f34.com">Dames.4717@gmail.com</a><br><br>
            <u>Track Your Order</u>
        </div>
        <div class="flex-row-item3">
            <h3></h3><br>
            <img id="paymentImage" src="assets/footer/Six accepted payment icons.png"><br>
            Copyright &copy; 2021 DAMES.
        </div>
     </div>
</footer>
</html>