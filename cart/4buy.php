<html>
<h2> buy </h2>
</html>

<?php
$strProductID = null;
require 'connect.php';
if (isset($_GET["productId"])){
    $strProductID=$_GET["productId"];
}

echo  $strProductID;
$sql ="select * from product left join product_type on product.t_id = product_type.type_id 
left join artist on product.a_id= artist.artist_id 
where product_id = '$strProductID' ";


$query=mysqli_query($conn, $sql);
$reslt=mysqli_fetch_array($query);

$productID = $reslt["product_id"];
$name = $reslt["product_name"];
$ast = $reslt["artist_name"];
$price = $reslt["price"];
echo"<p>$name</p><p>$ast </p><p>$price</p><br>";
/*<form action='insert.php'><input type= 'submit' value = 'Add to cart'></form>*/
?>



<a href ='insertbuy.php?productId=<?php echo $reslt['product_id'];?>'>Add to cart</a>
<?php

?>