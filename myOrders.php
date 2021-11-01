<?php
    session_start();
    $id=session_id();
    
  // Check for cart items
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  // print_r($_SESSION['cart']);

  @ $db = new mysqli('localhost','f32ee','f32ee','f32ee');
    if(mysqli_connect_errno()){
        echo 'Error: Could not connect to database.  Please try again later.';
	  exit;
    }

  $order_id = $_POST['order_id'];

  $query="SELECT order_items.*, 
  shoes_table.product_id, shoes_table.name
  FROM shoes_table INNER JOIN order_items
  ON order_items.product_id = shoes_table.product_id
  WHERE order_items.order_id = $order_id
  ";
  $result = $db -> query($query); //query submission
  // print_r($result);
  // echo "{$result}";
  $num_results = $result->num_rows; //retrieve num of rows in result set    
  $item_names = array();
  $item_size = array();
  $item_quantity = array();
  $order_date= array();  
  for ($j=0; $j <$num_results; $j++){
      $row = $result->fetch_assoc();        
      array_push($item_names,$row['name']);        
      array_push($item_size,$row['size']);        
      array_push($item_quantity,$row['quantity']);
      
  }
  date_default_timezone_set("Asia/Singapore");
  $todaysDate = date("Y-m-d");
  $deliveryDate = date('Y-m-d', strtotime($Date. ' + 3 days'));

  // $order_date = date('Y/m/d', $row['order_date']);
  // print_r($order_date);
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
                ><img id="shoppingBag" src="assets/shoppingBag/shoppingBag.png"/>
                <div class="cart_items"><?php echo count($_SESSION['cart']) ?></div>
              </a>
            </span>
          </div>
        </b>
      </nav>
    <main>
        <h2>MY ORDERS</h2>
        <form action="myOrders.php" method="POST">
            <div align='center'id="order_tag"><label></i> Order ID  </label>
            <input type="number" id="order_id" name="order_id" placeholder="Enter Order_id"></div><br><br>
            <div class='submitinfoBtn' align='center'><input type="submit" id="submitinfoBtn" name="submit" value="Submit" /></div>
        </form><br><br><br>
        <?php 
          if ($order_id) {
            echo "<table class='itemsorderedTable'>
              <tr>
                <th style='font-size:x-large;background-color:#e8e8e8' colspan='4'>Items Ordered</th>
              </tr>          
              <tr>
                <th colspan='2'>Items Name</th>                  
              <th>Size</th>         
              <th>Quantity</th>
              </tr>";                   
              echo "<tr>
                <td colspan='2'>"; 
                  foreach($item_names as $key=>$val)
                echo "{$val}<br><br>";
                echo "</td>";
                echo "<td>"; 
                  foreach($item_size as $key=>$val)
                echo "{$val}<br><br>";
                echo "</td>";
                echo "<td>"; 
                  foreach($item_quantity as $key=>$val)
                echo "{$val}<br><br>";
                echo "</td>
              </tr>
              <tr>
              <td colspan='4'style='font-size: 18px'><b>Order Date:</b> {$row['order_date']}.</td>
              </tr>
              <tr>
                <td colspan='2'style='font-size: 18px'><b>Order Status:</b> Reached local sorting facility.</td>
                <td colspan='2'style='font-size: 18px'><b>Estimated delivery:</b> {$deliveryDate}</td>
                </tr>        
            </table>";
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
            <u><a href="myOrders.php">Track Your Order</a></u>
        </div>
        <div class="flex-row-item3">
            <h3></h3><br>
            <img id="paymentImage" src="assets/footer/Six accepted payment icons.png"><br>
            Copyright &copy; 2021 DAMES.
        </div>
     </div>
</footer>
</html>
