<?php


require('connect.php');
$customer_id = $_GET["customer_id"];
echo $customer_id;
$sql = "
    DELETE FROM cart where customer_id = $customer_id ;
    ";

$objQuery = mysqli_query($conn, $sql);



if ($objQuery) {
    echo "Record  was Deleted.";
} else {
    echo "Error : Delete";
}


?>
