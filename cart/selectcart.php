<?php  ?>
<html>

<head></head>

<body>
  <?php
  require('connect.php');
  
  $sql = '
  SELECT * 
  FROM cart;
  ';

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  ?>
  <table border="1">
    <tr>
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
      
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>

  </body>

</html>