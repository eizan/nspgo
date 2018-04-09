<?php
define('TITLE', "Detail Mahasiswa - NSPGO");
include '../include/header.php';
include '../include/nav.php';
include '../include/mysqli_class.php';
include '../include/database.php';
?>
<?php
$mhs_id = $_GET['mhs_id'];
$query = "SELECT * FROM tbl_mhs WHERE mhs_id=$mhs_id";
$hasil = mysqli_query($conn,$query);
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item">
		<a href="table_mhs.php">Mahasiswa</a>
	</li>
	<li class="breadcrumb-item active">Detail Mahasiswa <?php echo $mhs_id; ?></li>
	</ol><!-- Breadcrumbs-->
	<div class="card">
		<div class="card-header">
			Detail Mahasiswa NIM : <strong><?php echo $mhs_id; ?></strong>
		</div>
		<div class="card-body">
			<?php
			foreach ($hasil as $row) {
			?>
			<table class="table table-striped">
				<tr>
					<td>NIM</td>
					<td><?php echo $row['mhs_nim']; ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo $row['mhs_nama']; ?></td>
				</tr>
				<tr>
					<td>NO NSPGO</td>
					<td><?php echo $row['mhs_no_nspgo']; ?></td>
				</tr>
				<tr>
					<td>Jurusan</td>
					<td><?php echo $row['mhs_jurusan']; ?></td>
				</tr>
				<tr>
					<td>Kelas</td>
					<td><?php echo $row['mhs_kelas']; ?></td>
				</tr>
				<tr>
					<td>Semester</td>
					<td><?php echo $row['mhs_semester']; ?></td>
				</tr>				
				<tr>
					<td>Status</td>
					<td>
						<?php
						$status = $row['mhs_status'];
						if ($status == "Aktif") {
							echo'<span class="badge badge-primary">'.$status.'</span>';
						} elseif ($status = "Tidak Aktif") {
							echo'<span class="badge badge-danger">'.$status.'</span>';
						} else {
							echo'<span class="badge badge-default">'.$status.'</span>';
						}
						?>
					</td>
				</tr>
				<tr>
					<td>Poin</td>
					<td>
					<?php
					$mhs_nim = $row['mhs_nim'];
					$poin_query = "select * from tbl_poin where mhs_nim in (select mhs_nim from tbl_mhs WHERE mhs_nim = '$mhs_nim')";
					$result_poin = mysqli_query($conn,$poin_query);
					$row_poin = mysqli_num_rows($result_poin);
					?>
						<a class="btn btn-info" href="poin.php?mhs_nim=<?php echo $row['mhs_nim']; ?>"><?php echo $row_poin; ?> <span class="fa fa-fw fa-eye"></span></a>
					</td>
				</tr>
				<tr>
					<td>Keterangan</td>
					<td><?php echo $row['mhs_keterangan']; ?></td>
				</tr>
			</table>
			<?php
			}
			?>
		</div>
		<div class="card-footer">
			<a href="table_mhs.php" class="btn btn-info" ><span class="fa fa-arrow-left"></span> Kembali</a>
			<a class="btn btn-success" href="edit_mhs.php?nim=<?php echo $row['mhs_nim']; ?>"><span class="fa fa-fw fa-edit"></span> Edit</a>
			<a class="btn btn-danger" data-toggle="modal" data-target="#deleteMhsModal<?php echo $row['mhs_id']; ?>" href=""><span class="fa fa-fw fa-remove"></span> Hapus</a>
			<!-- Delete Modal-->
			<div class="modal fade" id="deleteMhsModal<?php echo $row['mhs_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="deleteModal">Delete Mahasiswa?</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">Select "Delete" below if you are ready to Delete the data.</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
							<a class="btn btn-danger" href="delete_mhs.php?mhs_id=<?php echo $row['mhs_id']; ?>">Delete</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	include '../include/modal.php';
	include '../include/footer.php';
	?>