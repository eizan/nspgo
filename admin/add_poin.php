<?php
define('TITLE', 'Tambah Poin - NSPGO ONLINE');
include '../include/header.php';
include '../include/nav.php';
require '../include/database.php';
?>
<?php
$table 			= 'tbl_poin';
$nim 			= isset($_POST['nim']) ? mysqli_real_escape_string($conn, $_POST['nim']) : '';
$mhs_nim 		= isset($_POST['mhs_nama']) ? mysqli_real_escape_string($conn, $_POST['mhs_nama']) : '';
$nama 			= isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
$jurusan 		= isset($_POST['jurusan']) ? mysqli_real_escape_string($conn, $_POST['jurusan']) : '';
$kelas 			= isset($_POST['kelas']) ? mysqli_real_escape_string($conn, $_POST['kelas']) : '';
$semester 		= isset($_POST['semester']) ? mysqli_real_escape_string($conn, $_POST['semester']) : '';
$status 		= isset($_POST['status']) ? mysqli_real_escape_string($conn, $_POST['status']) : '';
$keterangan 	= isset($_POST['keterangan']) ? mysqli_real_escape_string($conn, $_POST['keterangan']) : '';
$asal_sekolah 	= isset($_POST['asal_sekolah']) ? mysqli_real_escape_string($conn, $_POST['asal_sekolah']) : '';
if (isset($_POST['save'])) {
	$query = "INSERT INTO $table (mhs_nim, poin_nim, poin_asal_sekolah, poin_nama, poin_jurusan, poin_status, poin_keterangan, poin_kelas, poin_semester) VALUES ('$mhs_nim', '$nim','$asal_sekolah', '$nama', '$jurusan', '$status','$keterangan','$kelas','$semester')";
	$result = mysqli_query($conn, $query);
	header('Location: table_poin.php?add');
}

?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item">
		<a href="table_poin.php">Poin</a>
	</li>
	<li class="breadcrumb-item active">Tambah Poin</li>
</ol>
<div class="card mb-1">
	<div class="card-header">
		<i class="fa fa-table"></i> Tambah Poin
	</div>
	<div class="card-body">
		
		<form method="post">
			<!-- Text input-->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="mhs_nim">Mahasiswa yang Membawa</label>
				<div class="col-md-4">
					<select class="mhs_nama form-control" name="mhs_nama" required></select>
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="nim">NIM <small class="text-danger">* isi jika ada</small></label>
				<div class="col-md-4">
					<input id="nim" name="nim" type="number" placeholder="NIM" class="form-control input-md">
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="asal_sekolah">Asal Sekolah</label>
				<div class="col-md-4">
					<input id="asal_sekolah" name="asal_sekolah" type="text" placeholder="Asal Sekolah" class="form-control input-md" required="">
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="nama">Nama Lengkap</label>
				<div class="col-md-6">
					<input id="nama" name="nama" type="text" placeholder="Nama Lengkap" class="form-control input-md" required="">
				</div>
			</div>
			<!-- Select Basic -->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="jurusan">Jurusan</label>
				<div class="col-md-4">
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
			<!-- Kelas -->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="kelas">Kelas</label>
				<div class="col-md-4">
					<select id="kelas" name="kelas" class="form-control">
						<option value="Reguler">Reguler</option>
						<option value="Karyawan Sabtu">Karyawan (Sabtu)</option>
						<option value="Karyawan Minggu">Karyawan (Minggu)</option>
					</select>
				</div>
			</div>
			<!-- Semester-->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="semester">Semester</label>
				<div class="col-md-6">
					<input id="semester" name="semester" type="text" placeholder="Semester" class="form-control input-md">
				</div>
			</div>
			<!-- Select Basic -->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="status">Status</label>
				<div class="col-md-2">
					<select id="status" name="status" class="form-control">
						<option value="Aktif">Aktif</option>
						<option value="Tidak Aktif">Tidak Aktif</option>
						<option value="Dipakai">Dipakai</option>
					</select>
				</div>
			</div>
			<!-- Select Basic -->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="status">Keterangan</label>
				<div class="col-md-6">
					<textarea class="form-control" name="keterangan"></textarea>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<!-- Button -->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="submit"></label>
				<div class="col-md-4">
					<button id="submit" name="save" class="btn btn-primary">Tambah</button>
					<a href="table_poin.php" class="btn btn-info">Kembali</a>
				</div>
			</div>
		</div>
	</form>
</div>

<?php
include '../include/footer.php';
?>