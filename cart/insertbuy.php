<?php
$strProductID = null;
require 'connect.php';
if (isset($_GET["productId"])){
    $strProductID=$_GET["productId"];
}

$sql = "
SELECT * 
FROM cart
WHERE pid = '$strProductID'and customer_id = 202;";

$obj = mysqli_query($conn, $sql);
$count = 0;
while ($a = mysqli_fetch_array($obj)) {
    if($a["pid"] == $_GET["productId"]){
        $count += 1;
    }
    
}
if($count == 0){
    echo "yesss";
    $strProductID = null;
    require 'connect.php';
    if (isset($_GET["productId"])){
        $strProductID=$_GET["productId"];
    }

    echo($strProductID);

    $sql = " 
        INSERT INTO cart (customer_id, pid, cquantity) 
        VALUES ('6', '$strProductID', '1'); 
        ";
    
    $obj = mysqli_query($conn, $sql);
}else{
    $sql = "
        select *
        from cart 
        where pid = $strProductID ;";
    $obj = mysqli_query($conn, $sql);
    
    $a = mysqli_fetch_assoc($obj);
    $newqty = $a["cquantity"]+1; 
    $sql = "
        UPDATE cart
        SET cquantity =  $newqty
        WHERE pid = '" . $strProductID . "';";
    $obj = mysqli_query($conn, $sql);
    
}
echo   $count;


?>
<a href ='5cart.php'>Add to cart</a>