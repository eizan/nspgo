<?php
define('TITLE', 'Tambah Admin - NSPGO ONLINE');
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
	<li class="breadcrumb-item active">Tambah Admin</li>
</ol>
<?php
if (isset($_POST['submit'])) {
	$admin_nama = mysqli_real_escape_string($conn,$_POST['admin_nama']);
	$admin_akses_level = mysqli_real_escape_string($conn,$_POST['admin_akses_level']);
	$admin_keterangan = mysqli_real_escape_string($conn,$_POST['admin_keterangan']);
	$admin_username = mysqli_real_escape_string($conn,$_POST['admin_username']);
	$admin_password = mysqli_real_escape_string($conn,md5(sha1($_POST['admin_password'])));
	$sql = "INSERT INTO tbl_admin (admin_nama,admin_username,admin_password,admin_akses_level,admin_keterangan) VALUES ('$admin_nama','$admin_username','$admin_password','$admin_akses_level','$admin_keterangan')";
	$result = mysqli_query($conn,$sql);
	$result;
	echo '<div class="alert alert-success" role="alert">Berhasil Menambah Admin</div>';
	echo '<meta http-equiv="refresh" content="1;url=table_admin.php">';
}
?>
<div class="card">
	<form method="post">
		<div class="card-header">Add Admin</div>
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-7">
					<input class="form-control" type="tex" name="admin_nama" placeholder="Masuskan Nama" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-5">
					<input class="form-control" type="tex" name="admin_username" placeholder="Masuskan Username" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-5">
					<input class="form-control" type="password" name="admin_password" placeholder="Masuskan Password" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Akses Level</label>
				<div class="col-sm-5">
					<select class="form-control" name="admin_akses_level">
					    <option value="Admin">Admin</option>
					    <option value="Operator">Operator</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-5">
					<textarea class="form-control" name="admin_keterangan"></textarea>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary" name="submit"><span class="fa fa-plus"></span> Tambah</button>
			<a href="table_admin.php" class="btn btn-danger"><span class="fa fa-arrow-left"></span> Kembali</a>
		</div>
	</form>
</div>
<?php
include '../include/modal.php';
include '../include/footer.php';
?>