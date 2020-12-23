<?php
require('connect.php');

$update_ID    = $_REQUEST['customer_id'];



$sql = "
	UPDATE cart
	customer_id = " . $customerID. " ; ";

$objQuery = mysqli_query($conn, $sql);


if ($objQuery) {
	echo "Record " . $update_ID . " was Updated.";
} else {
	echo "Error : Update";
}


?>