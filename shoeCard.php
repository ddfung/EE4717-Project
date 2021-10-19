<?php
    // Establish connection with DB
    @ $db = new mysqli('localhost', 'f32ee', 'f32ee', 'f32ee');
    if (mysqli_connect_errno()) {
      echo 'Error: Could not connect to database.  Please try again later.';
      exit;
    }
    // Switch case to fetch shoes from their respective categories
    switch ($category) {
      case "men":
        $fetchData = mysqli_query($db , "SELECT * FROM shoes_table WHERE category='men'");
        break;
      case "women":
        $fetchData = mysqli_query($db , "SELECT * FROM shoes_table WHERE category='women'");
        break;
      default:
        $fetchData = mysqli_query($db , "SELECT * FROM shoes_table");
    }
    // Append to array to render product card
    $num_results = $fetchData->num_rows;  
    $arr = array();
    for ($i=0; $i <$num_results; $i++) {
      $row = $fetchData->fetch_assoc();
      array_push($arr, $row);
      echo "<div class='card'>
                <a href='productPage.php?id={$arr[$i]['product_id']}'>
                  <img src='assets/productPage/{$arr[$i]['img_diagonal']}' width='285px'>
                </a>
                <div class='container'>
                    <p class='card-shoe-price'>\${$arr[$i]['price']}</p> 
                    <p class='card-shoe-name'>{$arr[$i]['name']}</p> 
                </div>
            </div>";
    }
