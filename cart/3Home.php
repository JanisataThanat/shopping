<html>
<h2> home </h2>



<?php

require 'connect.php';
$sql ="select * from product left join product_type on product.t_id=product_type.type_id 
left join artist on product.a_id= artist.artist_id ";

$query=mysqli_query($conn, $sql);
while ($reslt=mysqli_fetch_array($query, MYSQLI_ASSOC)){
    $productID = $reslt["product_id"];
    $name = $reslt["product_name"];
    $ast = $reslt["artist_name"];
    $price = $reslt["price"];
    //echo"<p>$product </p><p>$pro </p><p>$ast </p><p>$price</p><br><form action='buy.php'><input type= 'submit' value = 'buy'></form>";
    echo"<p>$productID </p><p>$name </p><p>$ast </p><p>$price</p><br>";

    ?>

 <a href ='4buy.php?productId=<?php echo $reslt['product_id'];?>'>buy</a>
 <?php   
}
?>
</html>