<?php
    session_start();
    $id=session_id();

  // Check for cart items
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  print_r($_SESSION['cart']);

//create short variables
$customer_name=$_POST['customer_name'];
$customer_email=$_POST['email'];
$customer_contact=$_POST['phone'];
$customer_address=$_POST['address'];

if (!$customer_name || !$customer_email || !$customer_contact || !$customer_address) {
  echo "You have not entered all the required details.<br />"
       ."Please go back and try again.";
  exit;
}
@ $db = new mysqli('localhost','f32ee','f32ee','f32ee');
    if(mysqli_connect_errno()){
        echo 'Error: Could not connect to database.  Please try again later.';
	  exit;
    }
    $query = "INSERT INTO customers_table values
            (null,'".$customer_name."', '".$customer_email."', '".$customer_contact."', '".$customer_address."')";
    $result = $db->query($query); //query submission
    //insert query results
    if ($result) {
      echo  $db->affected_rows." book inserted into database.";
          
      // Get the last index in the log to be assigned the order_id, push order into orders-details
      $queryLastIndex = "SELECT MAX( customer_id ) FROM `customers_table`;";
      echo $queryLastIndex;
      $lastIndex = $db->query($queryLastIndex);
      $row = $lastIndex->fetch_assoc();
      $lastIndex = $row['MAX( customer_id )'];
      echo ( $lastIndex);
      
    } else {
      echo "An error has occurred.  The item was not added.";
    }

    // Assigns KV pair for items in cart
    foreach ($_SESSION['cart'] as $key=>$value) {
      $product_id = $value['product_id'];
      $size = $value['size'];
      $quantity = $value['quantity'];

      $query = "INSERT INTO order_items values
            ($lastIndex,'".$product_id."', '".$size."', '".$quantity."')";
      $result = $db->query($query); //query submission
      echo  $db->affected_rows." book inserted into database.";

    }

    // Combine 2 tables to one with customer_id=order_id
    $query="SELECT order_items.*, customers_table.*, shoes_table.product_id, shoes_table.name 
    FROM shoes_table INNER JOIN order_items
    ON order_items.product_id = shoes_table.product_id INNER JOIN customers_table 
    ON order_items.order_id = customers_table.customer_id 
    -- WHERE order_id IN (SELECT order_id FROM  
    ";
    $result = $db -> query($query); //query submission
    $num_results = $result->num_rows; //retrieve num of rows in result set
    $arr = array();    
    for ($i=0; $i <$num_results; $i++){
        $row = $result->fetch_assoc();        
        array_push($arr,$row);//push row array into bigger array
        }    
    // print_r($arr);
    

    $query="SELECT order_items.*, 
    shoes_table.product_id, shoes_table.name
    FROM shoes_table INNER JOIN order_items
    ON order_items.product_id = shoes_table.product_id
    WHERE order_items.order_id = (SELECT MAX(order_items.order_id) FROM order_items)
    ";
    $result = $db -> query($query); //query submission
    $num_results = $result->num_rows; //retrieve num of rows in result set    
    $item_names = array();
    $item_size = array();
    $item_quantity = array();  
    for ($j=0; $j <$num_results; $j++){
        $row = $result->fetch_assoc();        
        array_push($item_names,$row['name']);        
        array_push($item_size,$row['size']);        
        array_push($item_quantity,$row['quantity']);            
    }
    $to      = 'f32ee@localhost';
    $subject = 'Order Confirmed!';
    $message = 'Greetings from DAMES. Your order has been placed and confirmed!';
    $headers = 'From: f32ee@localhost' . "\r\n" .
        'Reply-To: f32ee@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers,'-ff32ee@localhost');
    echo ("mail sent to : ".$to);
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>DAMES.</title>
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
              <a href="shoppingBag.php"
                ><img id="shoppingBag" src="assets/shoppingBag/shoppingBag.png"/>
                <div class="cart_items"><?php echo count($_SESSION['cart']) ?></div>
              </a>
            </span>
          </div>
        </b>
      </nav>
      <main>
        <h2>ORDER CONFIRMATION</h2>
        <table class="orderconfirmTable">
          <tr>
            <th>Order ID: </th>
            <td><?php echo $arr[$i-1]['order_id']?></td>
          </tr>
          <tr>
            <th>Customer Name: </th>
            <td><?php echo $arr[$i-1]['customer_name']?></td>
          </tr>
          <tr>
            <th>Email: </th>
            <td><?php echo $arr[$i-1]['email']?></td>
          </tr>
          <tr>
            <th>Contact: </th>
            <td><?php echo $arr[$i-1]['phone']?></td>
          </tr>
          <tr>
            <th>Address: </th>
            <td><?php echo $arr[$i-1]['address']?></td>
          </tr>
        </table>
        <table class='itemsorderedTable'>
          <tr>
            <th style='font-size:x-large' colspan='4'>Items Ordered</th>
          </tr>          
          <tr>
            <th colspan='2'>Items Name</th>                  
          <th>Size</th>         
          <th>Quantity</th>
          </tr>                      
          <tr>
            <td colspan='2'><?php foreach($item_names as $key=>$val)
            echo "{$val}<br><br>"?>
            </td>
            <td><?php foreach($item_size as $key=>$val)
            echo "{$val}<br><br>"?>
            </td>
            <td><?php foreach($item_quantity as $key=>$val)
            echo "{$val}<br><br>"?>
            </td>
          </tr>         
        </table>
        <a href="index.php"><button id="backBtn">BACK TO SHOPPING</button></a>            
      </main>
    </div>
  </body>
  <!-- <script type="text/javascript" src="productPageSlideGallery.js"></script> -->
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