<?php
    session_start();
    $id=session_id();
    
  // Check for cart items
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  if ($_POST['quantity']) {
    $_SESSION['cart'][] = ['product_id'=>$subjectId, 'name'=>$row['name'], 'price'=>$row['price'], 'quantity'=>$_POST['quantity']] ;
  }

  print_r($_SESSION['cart']);
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
              <a href="location.php">LOCATION</a>
            </span>
            <span class="nav-icon">
            <a href="shoppingBag.html"
                ><img id="shoppingBag" src="assets/shoppingBag/shoppingBag.png"/>
                <div class="cart_items"><?php echo count($_SESSION['cart']) ?></div>
              </a>
            </span>
          </div>
        </b>
      </nav>
    <main>
        <h2>LOCATION</h2>
        <table class="locationTable">
            <tr>
               <th colspan="2"> ORCHARD CENTRAL </th>
            </tr>
            <tr>
               <td><img id="shopfront" src="assets/mapLocation/orchardCentralStore.jpg"></td>
               <td><img id="map" src="assets/mapLocation/orchardCentralMap.png"></td>
            </tr>
            <tr>
               <td style="font-size:16px;">181 Orchard Rd<br>
               #03-01 Orchard Central<br>Singapore 238896<br><br><br></td>
               <td></td>
            </tr>
            <tr>
                <th colspan="2"> SUNTEC CITY </th>
            </tr>
            <tr>
               <td><img id="shopfront" src="assets/mapLocation/suntecCityStore.jpg"></td>
               <td><img id="map" src="assets/mapLocation/suntecCityMap.png"></td>
            </tr>
            <tr>
               <td style="font-size:16px;">3 Temasek Boulevard<br>
                #01-01 Suntec City<br>Singapore 038983<br></td>
               <td></td>
            </tr>
        </table>
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