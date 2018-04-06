<?php
define('TITLE', 'Tambah Negara - NSPGO ONLINE');
include '../include/header.php';
include '../include/nav.php';
include '../include/mysqli_class.php';
?>
<?php
if (isset($_POST['submit'])) {
	// deskripsi variable
// database insert
	$db = new Database;
	$db->connect();
	$negara_nama = $db->escapeString($_POST['negara_nama']);
	$negara_kode = $db->escapeString($_POST['negara_kode']);
	$negara_poin = $db->escapeString($_POST['negara_poin']);
	$db->insert('tbl_negara',array('negara_nama'=>$negara_nama,'negara_kode'=>$negara_kode,'negara_poin'=>$negara_poin));
	$res = $db->getResult();
	header('Location: table_negara.php?add');
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
	<li class="breadcrumb-item active">Tambah Negara</li>
</ol>
<div class="col-lg-8">
	<div class="card">
		<div class="card-header">
			<i class="fa fa-table"></i>
			Tambah Negara <span class="fa fa-fw fa-flag"></span>
		</div>
		<!-- form tambah -->
		<form method="post">
			<div class="card-body">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Nama Negara</label>
					<div class="col-sm-7">
						<input class="form-control" type="text" name="negara_nama" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Code Negara</label>
					<div class="col-sm-2">
						<input class="form-control" type="text" name="negara_kode" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Poin Negara</label>
					<div class="col-sm-2">
						<input class="form-control" type="number" name="negara_poin" required>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary" name="submit"><span class="fa fa-plus"></span> Tambah</button>
					<a href="table_negara.php" class="btn btn-danger"><span class="fa fa-arrow-left"></span> Kembali</a>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
include '../include/footer.php';
?>