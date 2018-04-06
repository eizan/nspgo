<?php
define('TITLE', 'Mahasiswa - NSPGO ONLINE');
$page = "mahasiswa";
include '../include/header.php';
include '../include/nav.php';
include '../include/database.php';
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Mahasiswa</li>
</ol>
<a class="btn btn-primary" href="add_mhs.php"><span class="fa fa-fw fa-plus"></span> Tambah</a>
<a class="btn btn-info" href="export_mhs.php"><span class="fa fa-fw fa-print"></span> Export</a>
<hr>
<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Data Mahasiswa NSPGO
	</div>
	<div class="card-body">
		<?php
		// menampilkan pesan yang sukses atau gagal di tambah 
		if (isset($_GET['add'])) {
			echo 	'
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			 			<i class="fa fa-check"></i> Data Berhasil di tambah
					</div>
					';
		}
		if (isset($_GET['update'])) {
			echo 	'
					<div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			 			<i class="fa fa-check"></i> Data Berhasil di Update
					</div>
					';
		}
		if (isset($_GET['delete'])) {
			echo 	'
					<div class="alert alert-primary">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			 			<i class="fa fa-check"></i> Data Berhasil di Delete
					</div>
					';
		}
		?>
		
		<div class="table-responsive">
			<?php
			$sql = "SELECT * FROM tbl_mhs ORDER BY mhs_id DESC";
			$result = mysqli_query($conn,$sql);
			if (mysqli_num_rows($result) > 0) {
				$no = 0;
			?>
			<table class="table table-bordered table-sm text-nowrap" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<!-- <th>No NSPGO</th> -->
						<th>Nama</th>
						<th>Jurusan</th>
						<th>Status</th>
						<th>Poin</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($result as $row) {
						$no++;
					?>
					<tr class="odd gradeX">
						<td><?php echo $no ?></td>
						<td><?php echo $row["mhs_nim"]; ?></td>
						<td><a href="detail_mhs.php?mhs_id=<?php echo $row["mhs_id"]; ?>"><span class="fa fa-user"></span> <?php echo $row["mhs_nama"]; ?></a></td>
						<td class="center"><?php echo $row["mhs_jurusan"]; ?></td>
						<td class="center">
							<?php
							$status = $row["mhs_status"];
							if ($status == "Aktif") {
								echo'<span class="badge badge-primary">'.$status.'</span>';
							} elseif ($status = "Tidak Aktif") {
								echo'<span class="badge badge-danger">'.$status.'</span>';
							} else {
								echo'<span class="badge badge-default">'.$status.'</span>';
							}
							?>
						</td>
						<td class="text-center">
							<?php
							$mhs_nim_poin = $row["mhs_nim"];
							$sql_poin = "select * from tbl_poin where poin_status='Aktif' and mhs_nim in (select mhs_nim from tbl_mhs where mhs_nim=$mhs_nim_poin)";
							$result_poin_query = mysqli_query($conn,$sql_poin);
							$total_poin = mysqli_num_rows($result_poin_query);
							?>
							<a class="btn btn-info" href="poin.php?mhs_nim=<?php echo $row['mhs_nim']; ?>"><span class="fa fa-fw fa-eye"></span> <?php echo $total_poin; ?></a>
							<?php
							// update poin ke database
							// $mhs_nim = $row['mhs_nim'];
							// $sql_update_poin = "UPDATE tbl_mhs set mhs_poin=$total_poin where mhs_nim=$mhs_nim_poin";
							// mysqli_query($conn,$sql_update_poin);
							?>
							<a class="btn btn-primary" href="add_mhs_poin.php?mhs_nim=<?php echo $row['mhs_nim']; ?>"><span class="fa fa-fw fa-plus"></span></a>
						</td>
						<td class="text-center">
							<a class="btn btn-success" href="edit_mhs.php?nim=<?php echo $row['mhs_nim']; ?>"><span class="fa fa-fw fa-edit"></span></a>
							<a class="btn btn-danger" data-toggle="modal" data-target="#deleteMhsModal<?php echo $row['mhs_id']; ?>" href=""><span class="fa fa-fw fa-remove"></span></a>
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
											<a class="btn btn-danger" href="delete_mhs.php?mhs_id=<?php echo $row['mhs_id']; ?>&mhs_nim=<?php echo $row['mhs_nim']; ?>">Delete</a>
										</div>
									</div>
								</div>
							</div>
							<!--End of Delete Modal-->
						</td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<?php
			mysqli_close($conn);
			}
			else {
			echo "<h3>Tidak Ada Data</h3>";
			mysqli_close($conn);
			}
			?>
		</div>
	</div>
</div>
<?php
include '../include/modal.php';
include '../include/footer.php';
?>