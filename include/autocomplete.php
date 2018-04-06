<?php
	
	define (DB_USER, "root");
	define (DB_PASSWORD, "");
	define (DB_DATABASE, "nspgo");
	define (DB_HOST, "localhost");
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

	$sql = "SELECT * FROM tbl_mhs 
			WHERE mhs_nim and mhs_nama LIKE '%".$_GET['query']."%'
			LIMIT 10"; 
	$result = $mysqli->query($sql);
	
	$json = [];
	while($row = $result->fetch_assoc()){
	     $json[] = $row['mhs_nim'];
	}

	echo json_encode($json);