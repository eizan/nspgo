<?php
define('TITLE', 'Negara - NSPGO ONLINE');
$page = "negara";
include '../include/header.php';
include '../include/nav.php';
include '../include/mysqli_class.php';
?>
<?php
$db = new Database;
$db->connect();
$db->sql('SELECT * from tbl_negara ORDER BY negara_id DESC');
$res = $db->getResult();
$no=0;
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Negara</li>
</ol>
<a class="btn btn-primary" href="add_negara.php"><span class="fa fa-plus"></span> Tambah Negara</a>
<a class="btn btn-info" href="export_negara.php"><span class="fa fa-fw fa-print"></span> Export</a>
<hr>
<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i>
		Data Negara <span class="fa fa-fw fa-flag"></span>
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
		<?php
		if ($res) {
		?>
		<table class="table table-responsive table-sm text-nowrap" id="dataTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Negara</th>
					<th>Poin</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($res as $row) {
					$no++
				?>
				<tr class="odd gradeX">
					<td><?php echo $no; ?></td>
					<td><span class="flag-icon flag-icon-<?php echo $row["negara_kode"]; ?>"></span> <?php echo $row["negara_nama"]; ?></td>
					<td><?php echo $row["negara_poin"]; ?></td>
					<td>
						<a class="btn btn-success" href="edit_negara.php?negara_id=<?php echo $row['negara_id']; ?>"><span class="fa fa-fw fa-edit"></span></a>
						<a class="btn btn-danger" data-toggle="modal" data-target="#deleteNegaraModal<?php echo $row['negara_id']; ?>" href=""><span class="fa fa-fw fa-remove"></span></a>
						<!-- Delete Negara Modal-->
						<div class="modal fade" id="deleteNegaraModal<?php echo $row['negara_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="deleteModal">Delete the Negara?</h5>
										<button class="close" type="button" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">×</span>
										</button>
									</div>
									<div class="modal-body">Select "Delete" below if you are ready to Delete the data.</div>
									<div class="modal-footer">
										<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
										<a class="btn btn-danger" href="delete_negara.php?negara_id=<?php echo $row['negara_id']; ?>">Delete</a>
									</div>
								</div>
							</div>
						</div>
						<!-- End of Delete Negara Modal-->
						
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
<?php
include '../include/modal.php';
include '../include/footer.php';
?>