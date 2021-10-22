<?php
session_start();
  if (isset($_GET['id'])){
    $subjectId  = $_GET['id'];
    
  // Establish connection with DB
  @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
  if (mysqli_connect_errno()) {
    echo 'Error: Could not connect to database.  Please try again later.';
    exit;
  }
  // Fetch row of shoe data using id
  $query = "SELECT * FROM shoes_table WHERE product_id = $subjectId";
  $result = $db->query($query);
  $row = $result->fetch_assoc();

  // Check for cart items
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  if (isset($_GET['buy'])) {
    $_SESSION['cart'][] = $_GET['buy'];
    header('location: ' .$_SERVER['PHP_SELF'] . '?' . SID);
    exit();
  }

    echo "size: " .$_POST['size'];
    echo "qty: " .$_POST['quantity'];

}else{
  echo "provide Id";
}


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
              <a href="location.html">LOCATION</a>
            </span>
            <span class="nav-icon">
              <a href="shoppingBag.html"
                ><img id="shoppingBag" src="assets/shoppingBag/shoppingBag.png"/>
                <div class="cart_items">6</div>
              </a>
            </span>
          </div>
        </b>
      </nav>
      <main>
        <h2>PRODUCT PAGE</h2>
        <div class="productpage-row">
          <div class="productpage-column-left">
            <!-- Container for the image gallery -->
            <div class="productPage-slidegallery-container">
              <!-- Full-width images with number text -->
              <div class="mySlides">
                <div class="numbertext">1 / 5</div>
                <img
                  src="assets/productPage/<?php echo $row['img_diagonal'] ?>"
                  style="width: 100%"
                />
              </div>

              <div class="mySlides">
                <div class="numbertext">2 / 5</div>
                <img
                  src="assets/productPage/<?php echo $row['img_side'] ?>"
                  style="width: 100%" 
                />
              </div>

              <div class="mySlides">
                <div class="numbertext">3 / 5</div>
                <img
                  src="assets/productPage/<?php echo $row['img_back'] ?>"
                  style="width: 100%"
                />
              </div>

              <div class="mySlides">
                <div class="numbertext">4 / 5</div>
                <img
                  src="assets/productPage/<?php echo $row['img_frontside'] ?>"
                  style="width: 100%"
                />
              </div>

              <div class="mySlides">
                <div class="numbertext">5 / 5</div>
                <img
                  src="assets/productPage/<?php echo $row['img_top'] ?>"
                  style="width: 100%"
                />
              </div>

              <!-- Next and previous buttons -->
              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>

              <!-- Thumbnail images -->
              <div class="row">
                <div class="column">
                  <img
                    class="demo cursor"
                    src="assets/productPage/<?php echo $row['img_diagonal'] ?>"
                    style="width: 100%"
                    onclick="currentSlide(1)"
                  />
                </div>
                <div class="column">
                  <img
                    class="demo cursor"
                    src="assets/productPage/<?php echo $row['img_side'] ?>"
                    style="width: 100%"
                    onclick="currentSlide(2)"
                  />
                </div>
                <div class="column">
                  <img
                    class="demo cursor"
                    src="assets/productPage/<?php echo $row['img_back'] ?>"
                    style="width: 100%"
                    onclick="currentSlide(3)"
                  />
                </div>
                <div class="column">
                  <img
                    class="demo cursor"
                    src="assets/productPage/<?php echo $row['img_frontside'] ?>"
                    style="width: 100%"
                    onclick="currentSlide(4)"
                  />
                </div>
                <div class="column">
                  <img
                    class="demo cursor"
                    src="assets/productPage/<?php echo $row['img_top'] ?>"
                    style="width: 100%"
                    onclick="currentSlide(5)"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="productpage-column-right">
            <h4 class="product-title"><?php echo $row['name'] ?></h4>
            <p class="product-description"><?php echo $row['description'] ?></p>
            <span class="product-color"><?php echo $row['color'] ?></span><br /><br />
            <span class="product-price">$<?php echo $row['price'] ?></span><br /><br />
            <span class="product-color">Size</span><br /><br />
            <form action="productPage.php?id=<?php echo $subjectId ?>" method="POST">
                <div class="buttongroup">  
                  <?php
                    $sizes = explode(",", $row['size']);
                    for ($i=0; $i <count($sizes); $i++) {
                      echo "<input id='$sizes[$i]' type='radio' value='$sizes[$i]' name='size' checked/>
                            <label for='$sizes[$i]'>$sizes[$i]</label>";
                    }
                  ?>
                </div>
              <br /><br />
              <span class="product-color">Quantity</span><br />
              <div class="quantity buttons_added">
                <input type="number" name="quantity" step="1" min="0" value="1" title="Qty" size="3"/>
              </div>
              <br /><br />
              <!-- Trigger/Open The Modal -->
              <button id="myBtn">Add to Cart</button>
              <!-- The Modal -->
              <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                  <span class="close">&times;</span>
                  <p>Item has been added to Cart.</p>
                </div>
              </div>
              <script type="text/javascript" src="modal cart.js"></script>
              <input type="submit" value="Submit">
            </form>
          </div>
        </div>
      </main>
    </div>
  </body>
  <script type="text/javascript" src="productPageSlideGallery.js"></script>
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
