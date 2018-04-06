<?php
include '../include/database.php';
include '../include/auth.php';
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=".date("Y-m-d")."-nspgo-poin-export.xls");
?>
<table border="1">
	<tr>
		<th>NO.</th>
		<th>NAMA LENGKAP</th>
		<th>JURUSAN</th>
		<th>ASAL SEKOLAH</th>
		<th>STATUS</th>
	</tr>
	<?php
	$sql = "SELECT * FROM tbl_poin ORDER BY poin_id ASC";
	$hasil = mysqli_query($conn,$sql);
	$no = 1;
	while($data = mysqli_fetch_assoc($hasil)){
		echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$data['poin_nama'].'</td>
			<td>'.$data['poin_jurusan'].'</td>
			<td>'.$data['poin_asal_sekolah'].'</td>
			<td>'.$data['poin_status'].'</td>
		</tr>
		';
		$no++;
	}
	?>
</table>