<?php
define('TITLE', 'Tambah Mahasiswa - NSPGO ONLINE');
include '../include/header.php';
include '../include/nav.php';
require '../include/database.php';
?>
<?php
	$table 		= 'tbl_mhs';
	$nim 		= isset($_POST['nim']) ? mysqli_real_escape_string($conn, $_POST['nim']) : '';
	$no_nspgo 	= isset($_POST['no_nspgo']) ? mysqli_real_escape_string($conn, $_POST['no_nspgo']) : '';
	$nama 		= isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
	$jurusan 	= isset($_POST['jurusan']) ? mysqli_real_escape_string($conn, $_POST['jurusan']) : '';
	$semester 	= isset($_POST['semester']) ? mysqli_real_escape_string($conn, $_POST['semester']) : '';
	$status 	= isset($_POST['status']) ? mysqli_real_escape_string($conn, $_POST['status']) : '';
	$keterangan 	= isset($_POST['keterangan']) ? mysqli_real_escape_string($conn, $_POST['keterangan']) : '';
if (isset($_POST['save'])) {
	$query = "INSERT INTO $table (mhs_nim, mhs_no_nspgo, mhs_nama, mhs_jurusan, mhs_status, mhs_semester, mhs_keterangan) VALUES ('$nim','$no_nspgo', '$nama', '$jurusan', '$status', '$semester', '$keterangan')";
	$result = mysqli_query($conn, $query);
	header('Location: table_mhs.php?add');
}

?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item">
		<a href="table_mhs.php">Mahasiswa</a>
	</li>
	<li class="breadcrumb-item active">Tambah Mahasiswa</li>
</ol>
<!-- End of Breadcrumbs-->
<div class="card">
	<div class="card-header">
	<i class="fa fa-table"></i>&nbsp;Tambah Data Mahasiswa</div>
	<form method="post" action="add_mhs.php">
		<div class="card-body">
			<!-- nim input-->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label" for="nim">NIM</label>
				<div class="col-sm-4">
					<input id="nim" name="nim" type="text" placeholder="NIM" class="form-control" required="">
				</div>
			</div>
			<!-- No nspgo input-->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label" for="no_nspgo">No NSPGO</label>
				<div class="col-sm-4">
					<input id="no_nspgo" name="no_nspgo" type="text" placeholder="No NSPGO" class="form-control" required="">
				</div>
			</div>
			<!-- nama input-->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label" for="nama">Nama Lengkap</label>
				<div class="col-sm-8">
					<input id="nama" name="nama" type="text" placeholder="Nama Lengkap" class="form-control" required="">
				</div>
			</div>
			<!-- Jurusan Basic -->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label" for="jurusan">Jurusan</label>
				<div class="col-sm-4">
					<select id="jurusan" name="jurusan" class="form-control">
						<option value="Sistem Informasi">Sistem Informasi</option>
						<option value="Desain Komunuikasi Visual">Desain Komunuikasi Visual</option>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Teknik Elektro">Teknik Elektro</option>
						<option value="Teknik Sipil">Teknik Sipil</option>
						<option value="Teknik Mesin">Teknik Mesin</option>
					</select>
				</div>
			</div>
			<!-- Semester input-->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label" for="semester">Semester</label>
				<div class="col-sm-4">
					<input id="semester" name="semester" type="text" placeholder="Semester" class="form-control">
				</div>
			</div>
			<!-- status Basic -->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label" for="status">Status</label>
				<div class="col-sm-2">
					<select id="status" name="status" class="form-control">
						<option value="Aktif">Aktif</option>
						<option value="Tidak Aktif">Tidak Aktif</option>
					</select>
				</div>
			</div>
			<!-- Keterangan input-->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label" for="semester">Keterangan</label>
				<div class="col-sm-8">
					<textarea id="keterangan" name="keterangan" type="text" placeholder="Keterangan" class="form-control"></textarea>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<!-- Button -->
			<div class="form-group row">
				<label class="col-sm-3 col-form-label" for="submit"></label>
				<div class="col-sm-4">
					<button id="submit" name="save" class="btn btn-primary">Tambah</button>
					<a href="table_mhs.php" class="btn btn-info">Kembali</a>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
include '../include/footer.php';
?>