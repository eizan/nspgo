<?php 	

$host = "localhost";
$user = "root";
$pass = "";
$db = "nspgo";

$mysqli = new mysqli($host, $user, $pass, $db);

$sql = "SELECT * FROM tbl_mhs 
		WHERE mhs_nama LIKE '%".$_GET['q']."%'
		LIMIT 10"; 
$result = $mysqli->query($sql);

$json = [];
while($row = $result->fetch_assoc()){
	$data = $row['mhs_nim'];
	$data .= "-";
	$data .= $row['mhs_nama'];
    $json[] = ['id'=>$row['mhs_nim'], 'text'=>$data];
}

echo json_encode($json);
?>