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

  $sql = '
	SELECT *
  FROM cart
  WHERE customer_id = 6;
	';

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  ?>
  <table border="1">
    <tr>
      <th width="50">
        <div align="center">No</div>
      </th>
      <th width="100">
        <div align="center">customer_id</div>
      </th>
      <th width="100">
        <div align="center">pid</div>
      </th>
      <th width="100">
        <div align="center">cquantity</div>
      </th> 
    </tr>
    <?php
    $i = 1;
    while ($objResult = mysqli_fetch_array($objQuery)) {
    ?>
      <tr>
        <td>
          <div align="center"><?php echo $i; ?></div>
        </td>
        <td><?php echo $objResult["customer_id"]; ?></td>
        <td><?php echo $objResult["pid"]; ?></td>
        <td><?php echo $objResult["cquantity"]; ?></td>
        <td align="center"><a href="removecart.php?pid=<?php echo $objResult["pid"]; ?>">Delete</a></td>
      </tr>
         
    <?php

      $i++;
    }
    ?>
    <?php echo $a["customer_id"];?>
  </table>
  <td align="center"><a href='removecartAll.php?customer_id=<?php echo $a["customer_id"];?>'>Delete all</a></td>
  <a href ='order_buy.php'>buy</a>

  </body>

</html>