<?php
require '../include/database.php';
$poin_id = $_GET['poin_id'];
$table = 'tbl_poin';
$query = "DELETE FROM $table WHERE poin_id=$poin_id";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
header('location: table_poin.php?delete');
?>