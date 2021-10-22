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
    <meta charset="utf-8" />
    <link rel="stylesheet" href="styles.css" />
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
        <!-- Slideshow container -->
        <div class="slideshow-container">
          <!-- Full-width images with number and caption text -->
          <div class="mySlides fade">
            <div class="numbertext"></div>
            <a href="productPage.php?id='8'">
              <img
                src="assets/frontpageSlideshow/CONVERSE_JOHN_ELLIOTT_1800x.jpg"
                style="width: 100%"
              />
            </a>
            <div class="text"></div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext"></div>
            <a href="productPage.php?id='2'">
              <img
                src="assets/frontpageSlideshow/ADIDAS_x_JAMES_BOND_1800x.jpg"
                style="width: 100%"
              />
            </a>
            <div class="text"></div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext"></div>
            <a href="productPage.php?id='7'">
            <img
              src="assets/frontpageSlideshow/NEW_BALANCE_XC-72_1800x.jpg"
              style="width: 100%"
            />
            </a>
            <div class="text"></div>
          </div>

          <!-- Next and previous buttons -->
          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>

          <!-- The dots/circles -->
          <div class="slider-control-bottomcenter" style="text-align: center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
          </div>
        </div>
        <h2>LATEST</h2>
        <div class="cardLayout">
        <?php
          include 'shoeCard.php';
        ?>
        </div>
      </main>
    </div>
  </body>
  <script type="text/javascript" src="frontPageSlideshow.js"></script>
  <footer>
    <div class="flex-row-container">
      <div class="flex-row-item1">
        <h3>About Us</h3>
        <br />
        Here at DAMES., we realize that style and prosperity begin with the
        correct shoes. We likewise understand that effectively finding the size
        and style to meet your requirements is vital to your web based shopping
        knowledge. Since beginning our web based business website in 2009, we’ve
        been endeavoring to present to you that perfect shopping experience.
      </div>
      <div class="flex-row-item2">
        <h3>Customer Service</h3>
        <br />
        Tel: +65 6888 8888<br /><br />
        Email: <a href="mailto:cakeshop4717@f34.com">Dames.4717@gmail.com</a
        ><br /><br />
        <u>Track Your Order</u>
      </div>
      <div class="flex-row-item3">
        <h3></h3>
        <br />
        <img
          id="paymentImage"
          src="assets/footer/Six accepted payment icons.png"
        /><br />
        Copyright &copy; 2021 DAMES.
      </div>
    </div>
  </footer>
</html>
