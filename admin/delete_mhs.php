<?php
require '../include/database.php';
$mhs_id = $_GET['mhs_id'];
$table = 'tbl_mhs';
$query = "DELETE FROM $table WHERE mhs_id=$mhs_id";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
header('location: table_mhs.php?delete');
?>