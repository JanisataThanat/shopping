<?php

$delete_ID  = $_REQUEST['pid'];

require('connect.php');

$sql = '
    DELETE FROM cart
    WHERE pid = ' . $delete_ID . ';
    ';

$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
    echo "Record " . $delete_ID . " was Deleted.";
} else {
    echo "Error : Delete";
}


?>
