<?php
define('TITLE', "Poin - NSPGO");
$page = "poin";
include '../include/header.php';
include '../include/nav.php';
include '../include/mysqli_class.php';
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Poin</li>
</ol>
<a class="btn btn-primary" href="add_poin.php"><span class="fa fa-fw fa-plus"></span> Tambah</a>
<a class="btn btn-info" href="export_poin.php"><span class="fa fa-fw fa-print"></span> Export</a>
<hr>
<div class="card mb-3">
	<div class="card-header">
		<i class="fa fa-table"></i> Data Poin NSPGO
	</div>
	<div class="card-body">
		<?php
		// menampilkan pesan yang sukses atau gagal di tambah 
		if (isset($_GET['add'])) {
			echo 	'
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			 			<i class="fa fa-check"> Data Berhasil di tambah</i>
					</div>
					';
		}
		if (isset($_GET['update'])) {
			echo 	'
					<div class="alert alert-info">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			 			<i class="fa fa-check"> Data Berhasil di Update</i>
					</div>
					';
		}
		if (isset($_GET['delete'])) {
			echo 	'
					<div class="alert alert-primary">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			 			<i class="fa fa-check"> Data Berhasil di Delete</i>
					</div>
					';
		}
		?>
		<div class="table-responsive">
			<?php
			$db = new Database();
			$db->connect();
			$db->sql('SELECT * FROM tbl_poin ORDER BY poin_id DESC'); // Table name
			$res = $db->getResult();
			$no = 0;
			if ($res) {
				?>
				<table class="table table-bordered table-sm text-nowrap" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Jurusan</th>
							<th>Asal Sekolah</th>
							<th>Status</th>
							<th>Pembawa</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($res as $output) {
							$no++;
							?>
							<tr>
								<td><?php echo $no ?></td>
								<td><a href="detail_poin.php?poin_id=<?php echo $output['poin_id']; ?>"><span class="fa fa-users"></span> <?php echo $output['poin_nama']; ?></a></td>
								<td><?php echo $output['poin_jurusan']; ?></td>
								<td><?php echo $output['poin_asal_sekolah']; ?></td>
								<td>
									<?php
									$status = $output['poin_status'];
									if ($status == "Aktif") {
										echo'<span class="badge badge-primary">'.$status.'</span>';
									} elseif ($status = "Tidak Aktif") {
										echo'<span class="badge badge-danger">'.$status.'</span>';
									} else {
										echo'<span class="badge badge-default">'.$status.'</span>';
									}
									?>
								</td>
								<td>
									<?php
									$mhs_nim_mhs = $output['mhs_nim'];
									if($mhs_nim_mhs){
										$db->sql("select * from tbl_mhs where mhs_nim in (select mhs_nim from tbl_poin where mhs_nim=$mhs_nim_mhs)");
										$res2 = $db->getResult();
										if($res2){
											foreach ($res2 as $output2) {
												echo '<a href="poin.php?mhs_nim='.$mhs_nim_mhs.'"><span class="fa fa-user"></span> '.$output2['mhs_nama'].'</a>';
											}
										}else{
											echo "Tidak ada Pembawa";
										}
										
									}else{
										echo "Tidak ada Pembawa";
									}
									?>
								</td>
								<td>
									<a href="edit_poin.php?poin_id=<?php echo $output['poin_id']; ?>" class="btn btn-info"><span class="fa fa-pencil"></span></a>
									<a class="btn btn-danger" data-toggle="modal" data-target="#deletePoinModal<?php echo $output['poin_id']; ?>" href=""><span class="fa fa-remove"></span></a>
									<!-- Delete Poin Modal-->
									<div class="modal fade" id="deletePoinModal<?php echo $output['poin_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
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
													<a class="btn btn-danger" href="delete_poin.php?poin_id=<?php echo $output['poin_id']; ?>">Delete</a>
												</div>
											</div>
										</div>
									</div>
									<!-- Wnd Of Delete Poin Modal-->
								</td>
							</tr>
							<?php
						}
					}
					else{
						echo "<h3>Tidak ada Data</h3>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
include '../include/modal.php';
include '../include/footer.php';
?>