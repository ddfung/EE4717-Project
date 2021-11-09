<?php
session_start();
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

// stablish connection with DB
@ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
if (mysqli_connect_errno()) {
  echo 'Error: Could not connect to database.  Please try again later.';
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>DAMES.</title>
<meta charset="utf-8">
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
    <header>   
    <a href="index.php" id="header1"><h1>DAMES.</h1></a>
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
              <a href="location.php">LOCATION</a>
            </span>
            <span class="nav-icon">
              <a href="shoppingBag.php"
                ><img id="shoppingBag" src="assets/shoppingBag/shoppingBag.png"
              /><div class="cart_items"><?php echo count($_SESSION['cart']) ?></div></a>
            </span>
          </div>
        </b>
      </nav>
    <main>
        <h2>DELIVERY INFO</h2>
        <form action="orderconfirmation.php" method="POST">
        <table class="orderconfirmTable" align='center'>
          <tr>
            <th><label>Customer Name:</label></th>
            <td><input
              type="text"
              textarea rows='2' cols='50'
              id="customer_name"
              name="customer_name"
              placeholder="Enter your name here"
              onchange="validateName()"
              required
            /></td>
          </tr>
          <tr>
            <th><label>Email:</label></th>
            <td><input
              type="text"
              id="email"
              name="email"
              placeholder="Enter your email address here"
              onchange="validateEmail()"
              required
            /></td>
          </tr>
          <tr>
            <th><label>Contact:</label></th>
            <td><input
              type="text"
              id="phone"
              name="phone"
              placeholder="Enter your contact no. here"
              onchange="validateContact()"              
              required
            /></td>
          </tr>
          <tr>
            <th><label>Address:</label></th>
            <td><input
              type="text"
              id="address"
              name="address"
              placeholder="Enter your delivery address here"              
              required
            /></td>
          </tr>          
        </table><br><br>        
          <div class='submitinfoBtn' align='center'><input type="submit" id="submitDeliveryInfoBtn" name="submit" value="Submit" />
          <input type="reset" id="submitDeliveryInfoBtn" name="clear" value="Clear" /></div>          
        </form>
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
            Email: <a href="mailto:Dames.4717@gmail.com">Dames.4717@gmail.com</a><br><br>
            <u><a href="myOrders.php">Track Your Order</a></u>
        </div>
        <div class="flex-row-item3">
            <h3></h3><br>
            <img id="paymentImage" src="assets/footer/Six accepted payment icons.png"><br>
            Copyright &copy; 2021 DAMES.
        </div>
     </div>
</footer>
<script type="text/javascript" src="validate.js"></script>
</html>
