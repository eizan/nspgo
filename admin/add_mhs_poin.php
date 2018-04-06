<?php
define('TITLE', 'Tambah Poin Ke Mahasiswa - NSPGO ONLINE');
include '../include/header.php';
include '../include/nav.php';
require '../include/database.php';
$mhs_nim = $_GET['mhs_nim'];
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item">
		<a href="table_poin.php">Poin</a>
	</li>
	<li class="breadcrumb-item">
		<a href="poin.php?mhs_nim=<?php echo $mhs_nim; ?>">NIM <?php echo $mhs_nim; ?></a>
	</li>
	<li class="breadcrumb-item active">Tambah Poin</li>
</ol>
<div class="card mb-1">
	<div class="card-header">
		<i class="fa fa-table"></i> Tambah Poin
	</div>
	<div class="card-body">
		<?php
		
		$table = 'tbl_poin';
		$nim = isset($_POST['nim']) ? mysqli_real_escape_string($conn, $_POST['nim']) : '';
		$nama = isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
		$jurusan = isset($_POST['jurusan']) ? mysqli_real_escape_string($conn, $_POST['jurusan']) : '';
		$status = isset($_POST['status']) ? mysqli_real_escape_string($conn, $_POST['status']) : '';
		$asal_sekolah = isset($_POST['asal_sekolah']) ? mysqli_real_escape_string($conn, $_POST['asal_sekolah']) : '';
		if (isset($_POST['save'])) {
			$query = "INSERT INTO $table (mhs_nim, poin_nim, poin_asal_sekolah, poin_nama, poin_jurusan, poin_status) VALUES ('$mhs_nim', '$nim','$asal_sekolah', '$nama', '$jurusan', '$status')";
			$result = mysqli_query($conn, $query);
			echo '<meta http-equiv="refresh" content="1;url=table_mhs.php">';
		}
		isset($result) ? $message = '<div class="alert alert-success" role="alert">Berhasil Menambah Data</div>' : $message = '';
		?>
		<?php echo $message; ?>
		<form method="post" action="add_mhs_poin.php?mhs_nim=<?php echo $mhs_nim; ?>">
			<!-- Text input-->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="nim">NIM</label>
				<div class="col-md-4">
					<input id="nim" name="nim" type="text" placeholder="NIM" class="form-control input-md">
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
			<!-- Select Basic -->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="status">Status</label>
				<div class="col-md-2">
					<select id="status" name="status" class="form-control">
						<option value="Aktif">Aktif</option>
						<option value="Tidak Aktif">Tidak Aktif</option>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<!-- Button -->
			<div class="form-group row">
				<label class="col-md-4 control-label" for="submit"></label>
				<div class="col-md-4">
					<button id="submit" name="save" class="btn btn-primary">Tambah</button>
					<button onclick="goBack()" class="btn btn-info">Kembali</button>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
include '../include/footer.php';
?>