<?php
@ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
    if(mysqli_connect_errno()){
        echo 'Error: Could not connect to database.  Please try again later.';
	exit;
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
        // $row['revenue']=$row['quantity']*$row['price'];
        array_push($arr,$row);//push row array into bigger array
        // // for ($i=$i-1; $i>0;$i--){
        //     if ($arr[$i-1]['order_id']===$arr[$i-2]['order_id']){
        //         array_push($latest_arr,$row);
        //     }
        }    
    // print_r($arr);
    

    $query="SELECT order_items.order_id, 
    shoes_table.product_id, shoes_table.name 
    FROM shoes_table INNER JOIN order_items
    ON order_items.product_id = shoes_table.product_id
    WHERE order_items.order_id = (SELECT MAX(order_items.order_id) FROM order_items)
    ";
    $result = $db -> query($query); //query submission
    $num_results = $result->num_rows; //retrieve num of rows in result set    
    $items_arr = array();    
    $item_names = array();    
    for ($j=0; $j <$num_results; $j++){
        $row = $result->fetch_assoc();
        array_push($item_names,$row['name']);
        // $row['revenue']=$row['quantity']*$row['price'];
        // array_push($items_arr,$row);//push row array into bigger array        
    }
    // print_r($items_arr);
    print_r($item_names);
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
                <div class="cart_items">6</div>
              </a>
            </span>
          </div>
        </b>
      </nav>
      <main>
        <h2>Order Confirmation</h2>
        <span>Order ID: <?php echo $arr[$i-1]['order_id']?><br></span>
        <span>Customer Name: <?php echo $arr[$i-1]['customer_name']?><br></span>
        <span>Email: <?php echo $arr[$i-1]['email']?><br></span>
        <span>Contact: <?php echo $arr[$i-1]['phone']?><br></span>        
        <span>Address: <?php echo $arr[$i-1]['address']?><br></span>        
        <span>Items ordered: <?php foreach($item_names as $key => $val)
        echo "{$val}<br>";
     ?></span>        
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