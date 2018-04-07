<?php
define('TITLE', 'Poin - NSPGO ONLINE');
include '../include/header.php';
include '../include/nav.php';
require '../include/database.php';
?>
<?php
// unutk melihat list poin
$mhs_nim = $_GET["mhs_nim"];
$sql_poin = "select * from tbl_poin where mhs_nim in (select mhs_nim from tbl_mhs where mhs_nim=$mhs_nim)";
$hasil_sql_poin = mysqli_query($conn,$sql_poin);

// untuk melihat data mahasiswa
$sql_mhs = "SELECT mhs_nama FROM tbl_mhs WHERE mhs_nim = '$mhs_nim'";
$hasil_mhs = mysqli_fetch_assoc(mysqli_query($conn,$sql_mhs));

$no = 0;
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item">
		<a href="table_mhs.php">Mahasiswa</a>
	</li>
	<li class="breadcrumb-item active">NIM : <?php echo $mhs_nim; ?></li>
</ol>
<a class="btn btn-primary" href="add_mhs_poin.php?mhs_nim=<?php echo $mhs_nim; ?>"><span class="fa fa-fw fa-plus"></span>&nbsp;Tambah Poin</a>&nbsp;
<a href="table_mhs.php" class="btn btn-danger"><span class="fa fa-fw fa-arrow-left"></span>&nbsp;Kembali</a>
<hr>
<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i>
		Poin yang didapat oleh&nbsp;<strong><?php echo $hasil_mhs['mhs_nama']; ?></strong>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<?php
			if (mysqli_num_rows($hasil_sql_poin)) {
			?>
			<table class="table table-bordered table-sm text-nowrap" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Jurusan</th>
						<th>Status</th>
						<th>Poin</th>
						<th>Option</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($hasil_sql_poin as $row) {
						$no++
					?>
					<tr class="odd gradeX">
						<td><?php echo $no; ?></td>
						<td><?php echo $row["poin_nim"]; ?></td>
						<td><?php echo $row["poin_nama"]; ?></td>
						<td><?php echo $row["poin_jurusan"]; ?></td>
						<td><?php echo $row["poin_asal_sekolah"]; ?></td>
						<td class="center">
							<?php
							$status = $row["poin_status"];
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
						<td>
							<a class="btn btn-success" href="edit_mhs_poin.php?poin_id=<?php echo $row['poin_id']; ?>"><span class="fa fa-fw fa-edit"></span></a>
							<a class="btn btn-danger" data-toggle="modal" data-target="#deletePoinModal<?php echo $row['poin_id']; ?>" href=""><span class="fa fa-fw fa-remove"></span></a>

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
							
						</td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<?php
			}else{
			echo "<h3>Tidak ada Poin</h3>";
			}
			?>
		</div>
	</div>
</div>
<?php
include '../include/modal.php';
include '../include/footer.php';
?>