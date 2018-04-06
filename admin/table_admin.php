<?php
define('TITLE', 'Admin - NSPGO ONLINE');
$page = "admin";
include '../include/header.php';
include '../include/nav.php';
require '../include/database.php';
?>
<?php
$sql = "SELECT * FROM tbl_admin";
$res = mysqli_query($conn,$sql);
$num_res = mysqli_num_rows($res);
$no = 0;
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Admin</li>
</ol>
<a class="btn btn-primary" href="add_admin.php"><span class="fa fa-plus"></span> Tambah Admin</a>
<hr>
<div class="card">
	<div class="card-header">
		<i class="fa fa-table"></i>
		Data Negara <span class="fa fa-fw fa-flag"></span>
	</div>
	<div class="card-body">
		<?php
		if ($res) {
		?>
		<table class="table table-responsive text-nowrap" id="dataTable">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Username (Level)</th>
					<th>Keterangan</th>
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($res as $row) {
					$no++
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $row["admin_nama"]; ?></td>
					<td><?php echo $row["admin_username"]; ?> <strong>(<?php echo $row["admin_akses_level"]; ?>)</strong></td>
					<td><?php echo $row["admin_keterangan"]; ?></td>
					<td>
						<a href="edit_admin.php?admin_id=<?php echo $row['admin_id']; ?>" class="btn btn-info"><span class="fa fa-gear"></span> Reset</a>
						<?php
						if ($num_res > 1) {
						echo '<a href="delete_admin.php?admin_id='.$row["admin_id"].'" class="btn btn-danger"><span class="fa fa-remove"></span></a>';
						}
						
						?>
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