<?php
require '../include/database.php';
$admin_id = $_GET['admin_id'];
$table = 'tbl_admin';
$query = "DELETE FROM $table WHERE admin_id=$admin_id";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
header('location:'.$_SERVER['HTTP_REFERER']);
?>