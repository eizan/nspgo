<?php
define('TITLE', 'Edit Mahasiswa - NSPGO');
include '../include/header.php';
include '../include/nav.php';
require '../include/database.php';
?>
<?php
$nim 		= $_GET['nim'];
$table 		= 'tbl_mhs';
$no_nspgo 	= isset($_POST['no_nspgo']) ? mysqli_real_escape_string($conn, $_POST['no_nspgo']) : '';
$nama 		= isset($_POST['nama']) ? mysqli_real_escape_string($conn, $_POST['nama']) : '';
$jurusan 	= isset($_POST['jurusan']) ? mysqli_real_escape_string($conn, $_POST['jurusan']) : '';
$semester 	= isset($_POST['semester']) ? mysqli_real_escape_string($conn, $_POST['semester']) : '';
$status 	= isset($_POST['status']) ? mysqli_real_escape_string($conn, $_POST['status']) : '';
$keterangan = isset($_POST['keterangan']) ? mysqli_real_escape_string($conn, $_POST['keterangan']) : '';
if(isset($_POST['update'])) {
	$query_update = "UPDATE $table SET mhs_no_nspgo='$no_nspgo', mhs_nama='$nama', mhs_jurusan='$jurusan', mhs_status='$status' , mhs_semester='$semester' , mhs_keterangan='$keterangan' WHERE mhs_nim=$nim";
	$result_update = mysqli_query($conn, $query_update);
	$query = "SELECT * FROM $table WHERE mhs_nim=$nim";
	$result = mysqli_query($conn, $query);
	header('Location: table_mhs.php?update');
} else {
	$query = "SELECT * FROM $table WHERE mhs_nim=$nim";
	$result = mysqli_query($conn, $query);
}
$row = mysqli_fetch_array($result);

?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item">
		<a href="table_mhs.php">Mahasiswa</a>
	</li>
	<li class="breadcrumb-item active"><?php echo $row['mhs_nama']; ?></li>
</ol>
<!-- End of Breadcrumbs-->

<div class="card mb-1">
	<div class="card-header">
		<i class="fa fa-table"></i> Edit Mahasiswa : <strong><?php echo $row['mhs_nama']; ?></strong></div>
		<div class="card-body">

			<form class="form-horizontal" method="post">
				<fieldset>
					<!-- Text input-->
					<div class="form-group row">
						<label class="col-md-4 control-label" for="nim">NIM</label>
						<div class="col-md-4">
							<input id="nim" name="nim" type="text" placeholder="NIM" class="form-control input-md" required="" value="<?php echo $row['mhs_nim']; ?>" disabled>
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group row">
						<label class="col-md-4 control-label" for="no_nspgo">No NSPGO</label>
						<div class="col-md-4">
							<input id="no_nspgo" name="no_nspgo" type="text" placeholder="No NSPGO" class="form-control input-md" required="" value="<?php echo $row['mhs_no_nspgo']; ?>">
						</div>
					</div>
					<!-- Text input-->
					<div class="form-group row">
						<label class="col-md-4 control-label" for="nama">Nama Lengkap</label>
						<div class="col-md-6">
							<input id="nama" name="nama" type="text" placeholder="Nama Lengkap" class="form-control input-md" required="" value="<?php echo $row['mhs_nama']; ?>">
						</div>
					</div>
					<!-- Select Basic -->
					<div class="form-group row">
						<label class="col-md-4 control-label" for="jurusan">Jurusan</label>
						<div class="col-md-4">
							<select id="jurusan" name="jurusan" class="form-control">
								<option value="<?php echo $row['mhs_jurusan']; ?>"><?php echo $row['mhs_jurusan']; ?></option>
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
						<label class="col-md-4 col-form-label" for="semester">Semester</label>
						<div class="col-md-4">
							<input id="semester" name="semester" type="text" placeholder="Semester" class="form-control" value="<?php echo $row['mhs_semester']; ?>">
						</div>
					</div>	
					<!-- Select Basic -->
					<div class="form-group row">
						<label class="col-md-4 control-label" for="status">Status</label>
						<div class="col-md-2">
							<select id="status" name="status" class="form-control">
								<option value="<?php echo $row['mhs_status']; ?>"><?php echo $row['mhs_status']; ?></option>
								<option value="Aktif">Aktif</option>
								<option value="Tidak Aktif">Tidak Aktif</option>
							</select>
						</div>
					</div>
					<!-- Keterangan input-->
					<div class="form-group row">
						<label class="col-md-4 col-form-label" for="keterangan">Keterangan</label>
						<div class="col-md-6">
							<textarea id="keterangan" name="keterangan" type="text" class="form-control"><?php echo $row['mhs_keterangan']; ?></textarea>
						</div>
					</div>	
				</div>
				<div class="card-footer">
					<!-- Button -->
					<div class="form-group row">
						<label class="col-md-4 control-label" for="submit"></label>
						<div class="col-md-4">
							<button id="submit" name="update" class="btn btn-primary">Update</button>
							<a href="table_mhs.php" class="btn btn-info">Kembali</a>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
<?php
include '../include/modal.php';
include '../include/footer.php';
?>