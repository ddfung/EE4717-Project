<?php
  session_start();
    
  // Check for cart items
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  if ($_POST['quantity']) {
    $_SESSION['cart'][] = ['product_id'=>$subjectId, 'name'=>$row['name'], 'price'=>$row['price'], 'quantity'=>$_POST['quantity']] ;
  }
  print_r($_SESSION['cart']);

  if (isset($_GET['delete'])) {
    $_SESSION['subtotal'] -= $_SESSION['cart'][$_GET['delete']]['price'];
    unset($_SESSION['cart'][$_GET['delete']]);
    header('location: ' . $_SERVER['PHP_SELF']);
    exit();
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
              <a href="shoppingBag.php"
                ><img id="shoppingBag" src="assets/shoppingBag/shoppingBag.png"
              /><div class="cart_items"><?php echo count($_SESSION['cart']) ?></div></a>
            </span>
          </div>
        </b>
      </nav>
    <main>
        <h2>SHOPPING CART</h2>
          <?php
          if ($_SESSION['cart']) {
              echo "<form action='userInfo.php' method='POST'>";
              echo "<div id='cartWrapper'>
                      <table class='cartTable'>
                          <tr>
                            <td></td>
                            <th>ITEM</th>
                            <th>SIZE</th>
                            <th>QTY</th>
                            <th>PRICE</th>
                          </tr>";
                  $subtotal = 0;
                  foreach ($_SESSION['cart'] as $key=>$value) {
                    $total = $value['price'] * $value['quantity'];
                    echo "<tr>
                            <td><img id='shoe' src='assets/productPage/{$value['shoe_img']}' width='300px' ></td>
                            <td>{$value['name']}</td> 
                            <td>{$value['size']}</td>
                            <td><div class='quantity buttons_added'>
                              <input type='number' step='1' min='0' value='{$value['quantity']}' title='Qty' size='3' name='quantity'>
                            </div></td>
                            <td>\$$total</td>
                            <td><a href='{$_SERVER['PHP_SELF']}?delete=$key'><img id='delete' src='assets/shoppingBag/trash.png'></a></td>
                          </tr>";
                    $subtotal = $subtotal + ($value['price'] * $value['quantity']);
                  } 
              echo "</table>";
              echo "</div>";
              echo "<hr class='solid'><br>";
              echo "<span class='cartTotal'>SUBTOTAL: \$$subtotal </span><br><br><br><br>";
              echo "</form>";
              echo "<a href='userInfo.php'><button id='checkoutBtn'>CHECKOUT</button></a>";
              echo "<a href='index.php'><button id='backBtn'>BACK TO SHOPPING</button></a>";
          } else {
            echo "Oops! Looks like your cart is empty!";
          }
          ?>
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