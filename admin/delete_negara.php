<?php
include('../include/mysqli_class.php');
$negara_id = $_GET['negara_id'];
$db = new Database();
$db->connect();
$db->delete('tbl_negara','negara_id='.$negara_id.'');  // Table name, WHERE conditions
$res = $db->getResult();  
header('location: table_negara.php?delete');
