<html>

<head></head>

<body>
  <?php
  require('connect.php');
  // ORDER QUERY DATA

  $sql = "
	SELECT *
    FROM customer
    WHERE username LIKE 'nu';
	";
  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  $a = mysqli_fetch_array($objQuery);
  echo $a["customer_id"];
  $sql = "
  INSERT INTO order_buy(cname, delivery_status, payment_status, send_address,cphone,cid) 
  VALUE('$a[username]','0', '0','$a[address]','$a[phone]','$a[customer_id]');
  ";
  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");

  $sql = "
  SELECT *
  FROM order_buy
  WHERE order_id = (SELECT MAX(order_id)
                    FROM order_buy);
  ";
  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  $last_order_id = mysqli_fetch_assoc($objQuery);
  echo $last_order_id["order_id"];

  $sql = "
	SELECT *
    FROM cart,product
    WHERE customer_id = $a[customer_id] AND pid = product_id;
	";
  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  while($obj = mysqli_fetch_assoc($objQuery)){
    echo $obj["pid"];
    
    echo $obj["product_name"];
    
    echo $obj["price"];
    
    echo $obj["cquantity"];
    $sql = "
    INSERT INTO order_detail(order_id,pid, pname, price, qty) 
    VALUE('$last_order_id[order_id]','$obj[pid]','$obj[product_name]','$obj[price]','$obj[cquantity]');
    ";
    mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  }
  


  ?>
    <a href ='removecartAll.php?customer_id=<?php echo $a["customer_id"];?>'>reset cart</a>
  </body>

</html>