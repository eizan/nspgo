<?php
include '../include/database.php';
include '../include/auth.php';
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=".date("Y-m-d")."-nspgo-negara-export.xls");
?>
<table border="1">
	<tr>
		<th>NO.</th>
		<th>KODE NEGARA</th>
		<th>NEGARA</th>
		<th>JUMLAH POIN</th>
	</tr>
	<?php
	$sql = "SELECT * FROM tbl_negara ORDER BY negara_id ASC";
	$hasil = mysqli_query($conn,$sql);
	$no = 1;
	while($data = mysqli_fetch_assoc($hasil)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['negara_kode'].'</td>
			<td>'.$data['negara_nama'].'</td>
			<td>'.$data['negara_poin'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>