<?php
define('TITLE', 'Edit Admin - NSPGO');
include '../include/header.php';
include '../include/nav.php';
require '../include/database.php';
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item">
		<a href="table_admin.php">Admin</a>
	</li>
	<li class="breadcrumb-item active">Edit Admin</li>
</ol>
<?php
$admin_id = $_GET['admin_id'];
$sql = "SELECT * FROM tbl_admin WHERE admin_id=$admin_id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
if (isset($_POST['update'])) {
	$admin_nama = mysqli_real_escape_string($conn,$_POST['admin_nama']);
	$admin_akses_level = mysqli_real_escape_string($conn,$_POST['admin_akses_level']);
	$admin_keterangan = mysqli_real_escape_string($conn,$_POST['admin_keterangan']);
	$admin_username = mysqli_real_escape_string($conn,$_POST['admin_username']);
	$admin_password = mysqli_real_escape_string($conn,md5(sha1($_POST['admin_password'])));
	$sql_update = "UPDATE tbl_admin SET admin_nama='$admin_nama', admin_username='$admin_username', admin_password='$admin_password', admin_akses_level='$admin_akses_level',admin_keterangan='$admin_keterangan' WHERE admin_id='$admin_id'";
		$result_update = mysqli_query($conn,$sql_update);
	$result_update;
	echo '<div class="alert alert-success" role="alert">Berhasil Mengubah Admin</div>';
	echo '<meta http-equiv="refresh" content="1;url=table_admin.php">';
}
?>
<div class="card">
	<form method="post">
		<div class="card-header">Edit Admin</div>
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-7">
					<input class="form-control" type="tex" name="admin_nama" placeholder="Masuskan Nama" value="<?php echo $row['admin_nama']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-5">
					<input class="form-control" type="tex" name="admin_username" placeholder="Masuskan Username" value="<?php echo $row['admin_username']; ?>" readonly disable>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">New Password</label>
				<div class="col-sm-5">
					<input class="form-control" type="password" name="admin_password" placeholder="Masuskan Password Baru">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Akses Level</label>
				<div class="col-sm-5">
					<select class="form-control" name="admin_akses_level">
					    <option value="Admin">Admin</option>
					    <option value="Operator" <?php if ($row['admin_akses_level'] == 'Operator'){ echo "selected";}?>>Operator</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-5">
					<textarea class="form-control" name="admin_keterangan"><?php echo $row['admin_keterangan']; ?></textarea>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-info" name="update"><span class="fa fa-pencil"></span> Ubah</button>
			<a href="table_admin.php" class="btn btn-danger"><span class="fa fa-arrow-left"></span> Kembali</a>
		</div>
	</form>
</div>
<?php
include '../include/modal.php';
include '../include/footer.php';
?>