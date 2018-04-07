<?php
define('TITLE', "Detail Poin - NSPGO");
include '../include/header.php';
include '../include/nav.php';
include '../include/mysqli_class.php';
?>
<?php
$poin_id = $_GET['poin_id'];
$db = new Database();
$db->connect();
$db->sql("SELECT * FROM tbl_poin WHERE poin_id=$poin_id");
$res = $db->getResult();
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item">
		<a href="table_poin.php">Poin</a>
	</li>
	<li class="breadcrumb-item active">Detail Poin <?php echo $poin_id; ?></li>
	</ol><!-- Breadcrumbs-->
	<div class="card">
		<div class="card-header">
			Detail NIM : <strong><?php echo $poin_id; ?></strong>
		</div>
		<div class="card-body">
			<?php
			foreach ($res as $row) {
			# code...
			?>
			<table class="table table-striped">
				<tr>
					<td>Name</td>
					<td><?php echo $row['poin_nama']; ?></td>
				</tr>
				<tr>
					<td>Asal Sekolah</td>
					<td><?php echo $row['poin_asal_sekolah']; ?></td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td><?php echo $row['poin_jurusan']; ?></td>
				</tr>
				<tr>
					<td>Kelas</td>
					<td><?php echo $row['poin_kelas']; ?></td>
				</tr>
				<tr>
					<td>Semester</td>
					<td><?php echo $row['poin_semester']; ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>
						<?php
						$status = $row['poin_status'];
						if ($status == "Aktif") {
							echo'<span class="badge badge-primary">'.$status.'</span>';
						} elseif ($status == "Tidak Aktif") {
							echo'<span class="badge badge-danger">'.$status.'</span>';
						} elseif ($status == "Dipakai") {
							echo'<span class="badge badge-info">'.$status.'</span>';
						}else {
							echo'<span class="badge badge-default">'.$status.'</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Poin dari</td>
					<td>
						<?php
						if($row['mhs_nim']){
							$mhs_nim_mhs = $row['mhs_nim'];
							$db->sql("SELECT * from tbl_mhs where mhs_nim in (select mhs_nim from tbl_poin where mhs_nim=$mhs_nim_mhs)");
							$res2 = $db->getResult();
							foreach ($res2 as $output2) {
								echo '<a href="poin.php?mhs_nim='.$mhs_nim_mhs.'"><span class="fa fa-user"></span> '.$output2['mhs_nama'].'</a>';
							}
						}else{
							echo "Tidak ada pembawa";
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Keterangan</td>
					<td><?php echo $row['poin_keterangan']; ?></td>
				</tr>
			</table>
			<?php
			}
			?>
		</div>
		<div class="card-footer">
			<button class="btn btn-info" onclick="goBack()"><span class="fa fa-arrow-left"></span> Kembali</button>
			<a href="edit_poin.php?poin_id=<?php echo $row['poin_id']; ?>" class="btn btn-info"><span class="fa fa-pencil"></span> Edit</a>
			<a class="btn btn-danger" data-toggle="modal" data-target="#deletePoinModal<?php echo $row['poin_id']; ?>" href=""><span class="fa fa-remove"></span> Hapus</a>
			<!-- Delete Poin Modal-->
			<div class="modal fade" id="deletePoinModal<?php echo $row['poin_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="deleteModal">Delete the data?</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">Select "Delete" below if you are ready to Delete the data.</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							<a class="btn btn-danger" href="delete_poin.php?poin_id=<?php echo $row['poin_id']; ?>">Delete</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Wnd Of Delete Poin Modal-->
		</div>
	</div>
	<?php
	include '../include/modal.php';
	include '../include/footer.php';
	?>