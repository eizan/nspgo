<?php
include  '../include/database.php';
include  '../include/auth.php';
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// // Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=".date("Y-m-d")."-nspgo-mhs-export.xls");
?>
<table border="1" align="center">
	<tr>
		<th rowspan="2">NO.</th>
		<th rowspan="2">NIM</th>
		<th rowspan="2">NO NSPGO</th>
		<th rowspan="2">NAMA LENGKAP</th>
		<th rowspan="2">JURUSAN</th>
		<th rowspan="2">SEMESTER</th>
		<th rowspan="2">STATUS</th>
		<th rowspan="2">KETERANGAN</th>		
		<th colspan="7">POIN</th>
	</tr>
	<tr>
			<th>NO</th>
			<th>NIM</th>
			<th>NAMA</th>
			<th>JURUSAN</th>
			<th>ASAL SEKOLAH</th>
			<th>STATUS</th>
			<th>KETERANGAN</th>
	</tr>
	<?php
	$sql = "SELECT * FROM tbl_mhs ORDER BY mhs_id ASC";
	$hasil = mysqli_query($conn,$sql);
	$no = 1;
	
	while($data = mysqli_fetch_assoc($hasil)){
		$mhs_nim = $data['mhs_nim'];
		$sql_poin = "SELECT * FROM tbl_poin WHERE mhs_nim IN (SELECT mhs_nim FROM tbl_mhs WHERE mhs_nim = '$mhs_nim')";
		$hasil_poin_query = mysqli_query($conn,$sql_poin);
		$poin_jumlah = mysqli_num_rows($hasil_poin_query);
		?>
		<tr>
			<td rowspan="<?php echo	$poin_jumlah; ?>"><?php echo $no?></td>
			<td rowspan="<?php echo	$poin_jumlah; ?>"><?php echo $data['mhs_nim']; ?></td>
			<td rowspan="<?php echo	$poin_jumlah; ?>"><?php echo $data['mhs_no_nspgo']; ?></td>
			<td rowspan="<?php echo	$poin_jumlah; ?>"><?php echo $data['mhs_nama']; ?></td>
			<td rowspan="<?php echo	$poin_jumlah; ?>"><?php echo $data['mhs_jurusan']; ?></td>
			<td rowspan="<?php echo	$poin_jumlah; ?>"><?php echo $data['mhs_semester']; ?></td>
			<td rowspan="<?php echo	$poin_jumlah; ?>"><?php echo $data['mhs_status']; ?></td>
			<td rowspan="<?php echo	$poin_jumlah; ?>"><?php echo $data['mhs_keterangan']; ?></td>
			<?php $no_poin = 1; ?>
			<?php foreach ($hasil_poin_query as $poin) { ?>
				<td><?php echo $no_poin; ?></td>
				<td><?php echo $poin['poin_nim']; ?></td>
				<td><?php echo $poin['poin_nama']; ?></td>
				<td><?php echo $poin['poin_jurusan']; ?></td>
				<td><?php echo $poin['poin_asal_sekolah']; ?></td>
				<td><?php echo $poin['poin_status']; ?></td>
				<td><?php echo $poin['poin_keterangan']; ?></td>
			</tr>
			<?php $no_poin++; } ?>
		<?php $no++; } ?>
</table>