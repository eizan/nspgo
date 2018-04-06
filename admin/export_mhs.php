<?php
include  '../include/database.php';
include  '../include/auth.php';
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=".date("Y-m-d")."-nspgo-mhs-export.xls");
?>
<table border="1">
	<tr>
		<th>NO.</th>
		<th>NIM</th>
		<th>NO NSPGO</th>
		<th>NAMA LENGKAP</th>
		<th>JURUSAN</th>
		<th>SEMESTER</th>
		<th>STATUS</th>
		<th>KETERANGAN</th>		
		<th colspan="6">POIN</th>
	</tr>
	<?php
	$sql = "SELECT * FROM tbl_mhs ORDER BY mhs_id ASC";
	$hasil = mysqli_query($conn,$sql);
	$no = 1;
	$no_poin = 1;
	while($data = mysqli_fetch_assoc($hasil)){
		$mhs_nim = $data['mhs_nim'];
		$sql_poin = "SELECT * FROM tbl_poin WHERE mhs_nim IN (SELECT mhs_nim FROM tbl_mhs WHERE mhs_nim = '$mhs_nim')";
		$hasil_poin_query = mysqli_query($conn,$sql_poin);
		$poin_jumlah = mysqli_num_rows($hasil_poin_query) + 1 ;
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
			<th>NO</th>
			<th>NIM</th>
			<th>NAMA</th>
			<th>JURUSAN</th>
			<th>ASAL SEKOLAH</th>
			<th>STATUS</th>
			</tr>
			<?php foreach ($hasil_poin_query as $poin) { ?>
			<tr>
				<td><?php echo $no_poin; ?></td>
				<td><?php echo $poin['poin_nim']; ?></td>
				<td><?php echo $poin['poin_nama']; ?></td>
				<td><?php echo $poin['poin_jurusan']; ?></td>
				<td><?php echo $poin['poin_asal_sekolah']; ?></td>
				<td><?php echo $poin['poin_status']; ?></td>
			</tr>
			<?php $no_poin++; } ?>
		<?php $no++; } ?>
</table>