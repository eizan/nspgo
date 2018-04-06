<?php
define('TITLE', 'Edit Negara - NSPGO');
include '../include/header.php';
include '../include/nav.php';
require '../include/database.php';
?>
<?php
$negara_id = $_GET['negara_id'];
$sql = "SELECT * FROM tbl_negara WHERE negara_id=$negara_id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
if (isset($_POST['update'])) {
	$negara_nama = mysqli_real_escape_string($conn,$_POST['negara_nama']);
	$negara_kode = mysqli_real_escape_string($conn,$_POST['negara_kode']);
	$negara_poin = mysqli_real_escape_string($conn,$_POST['negara_poin']);
	$sql_update = "UPDATE tbl_negara SET negara_nama='$negara_nama', negara_kode='$negara_kode', negara_poin='$negara_poin' WHERE negara_id='$negara_id'";
	$result_update = mysqli_query($conn,$sql_update);
	$result_update;
	header('Location: table_negara.php?update');
}
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item">
		<a href="table_negara.php">Negara</a>
	</li>
	<li class="breadcrumb-item active">Edit Negara</li>
</ol>

<div class="card">
	<form method="post">
		<div class="card-header">Edit Negara</div>
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Negara</label>
				<div class="col-sm-7">
					<input class="form-control" type="tex" name="negara_nama" placeholder="Masuskan Nama Negara" value="<?php echo $row['negara_nama']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Negara Kode</label>
				<div class="col-sm-5">
					<input class="form-control" type="tex" name="negara_kode" placeholder="Masuskan Negara Kode" value="<?php echo $row['negara_kode']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Negara Poin</label>
				<div class="col-sm-5">
					<input class="form-control" type="text" name="negara_poin" placeholder="Masuskan Negara Poin" value="<?php echo $row['negara_poin']; ?>" required>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-info" name="update"><span class="fa fa-pencil"></span> Ubah</button>
			<a href="table_negara.php" class="btn btn-danger"><span class="fa fa-arrow-left"></span> Kembali</a>
		</div>
	</form>
</div>
<?php
include '../include/modal.php';
include '../include/footer.php';
?>