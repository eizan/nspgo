<?php
define('TITLE', 'Edit Poin - NSPGO');
include '../include/header.php';
include '../include/nav.php';
include '../include/database.php';


?>
<?php
	//set variable dari value
$poin_id 			= $_GET['poin_id'];
$table 				= 'tbl_poin';
$poin_asal_sekolah 	= isset($_POST['poin_asal_sekolah']) ? mysqli_real_escape_string($conn, $_POST['poin_asal_sekolah']) : '';
$mhs_nim			= isset($_POST['mhs_nama']) ? mysqli_real_escape_string($conn, $_POST['mhs_nama']) : '';
$poin_nama 			= isset($_POST['poin_nama']) ? mysqli_real_escape_string($conn, $_POST['poin_nama']) : '';
$poin_jurusan 		= isset($_POST['poin_jurusan']) ? mysqli_real_escape_string($conn, $_POST['poin_jurusan']) : '';
$poin_status 		= isset($_POST['poin_status']) ? mysqli_real_escape_string($conn, $_POST['poin_status']) : '';
$poin_keterangan 	= isset($_POST['poin_keterangan']) ? mysqli_real_escape_string($conn, $_POST['poin_keterangan']) : '';

	// mengecek ketika tombol update di tekan
if(isset($_POST['update'])) {

	// jika nim mahasiswa di isi maka lakukan penyimpanan dengan nim mahasiswa yang di ganti
	if (empty($mhs_nim)) {
		$query_update = "UPDATE $table SET poin_asal_sekolah='$poin_asal_sekolah', poin_nama='$poin_nama', poin_jurusan='$poin_jurusan', poin_status='$poin_status', poin_keterangan='$poin_keterangan', poin_kelas='$poin_kelas', poin_semester='$poin_semester' WHERE poin_id=$poin_id";
	}
	// jika tidak ada nim mahasiswa di isi maka lakuakan simpan tanpa mengganti nim mhs 
	else{
		$query_update = "UPDATE $table SET mhs_nim='$mhs_nim',poin_asal_sekolah='$poin_asal_sekolah', poin_nama='$poin_nama', poin_jurusan='$poin_jurusan', poin_status='$poin_status', poin_keterangan='$poin_keterangan', poin_kelas='$poin_kelas', poin_semester='$poin_semester' WHERE poin_id=$poin_id";
	}
		// simpan ke database berdasarkan query if diatas
	$result_update = mysqli_query($conn, $query_update);
	header('Location: poin.php?mhs_nim='.$mhs_nim);
} 

// melakukan query untuk melihat value yang akan di edit
$query = "SELECT * FROM $table WHERE poin_id=$poin_id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php">Dashboard</a>
	</li>
	<li class="breadcrumb-item">
		<a href="table_mhs.php">Poin</a>
	</li>
	<li class="breadcrumb-item active">Edit Poin</li>
</ol>

<div class="card mb-1">
	<div class="card-header">
		<i class="fa fa-table"></i> Edit Poin</div>
		<div class="card-body">

			<form class="form-horizontal" method="post" action="edit_poin.php?poin_id=<?php echo $poin_id; ?>">
				<!-- Mahasiswa yang membawa -->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="mhs_nim">Mahasiswa yg membawa</label>
					<div class="col-md-4">
						<select class="mhs_nama form-control" name="mhs_nama"></select>
					</div>
				</div>
				<!-- NIM poin-->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="poin_nim">NIM <small class="text-danger">* isi jika ada</small></label>
					<div class="col-md-4">
						<input id="poin_nim" name="poin_nim" type="text" placeholder="NIM" class="form-control input-md" value="<?php echo $row['poin_nim']; ?>">
					</div>
				</div>
				<!-- Nama lengkap -->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="poin_nama">Nama Lengkap</label>
					<div class="col-md-6">
						<input id="poin_nama" name="poin_nama" type="text" placeholder="Nama Lengkap" class="form-control input-md" required="" value="<?php echo $row['poin_nama']; ?>">
					</div>
				</div>
				<!-- Asal Sekolah -->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="poin_asal_sekolah">Asal Sekolah</label>
					<div class="col-md-4">
						<input id="poin_asal_sekolah" name="poin_asal_sekolah" type="text" placeholder="Asal Sekolah" class="form-control input-md" required="" value="<?php echo $row['poin_asal_sekolah']; ?>">
					</div>
				</div>
				
				<!-- Jurusan -->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="poin_jurusan">Jurusan</label>
					<div class="col-md-4">
						<select id="poin_jurusan" name="poin_jurusan" class="form-control">
							<option value="<?php echo $row['poin_jurusan']; ?>"><?php echo $row['poin_jurusan']; ?></option>
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
					<label class="col-md-4 control-label" for="poin_kelas">Kelas</label>
					<div class="col-md-4">
						<select id="poin_kelas" name="poin_kelas" class="form-control">
							<option value="<?php echo $row['poin_kelas']; ?>"><?php echo $row['poin_kelas']; ?></option>
							<option value="Reguler">Reguler</option>
							<option value="Karyawan Sabtu">Karyawan (Sabtu)</option>
							<option value="Karyawan Minggu">Karyawan (Minggu)</option>
						</select>
					</div>
				</div>
				<!-- Status -->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="poin_status">Status</label>
					<div class="col-md-2">
						<select id="poin_status" name="poin_status" class="form-control">
							<option value="<?php echo $row['poin_status']; ?>"><?php echo $row['poin_status']; ?></option>
							<option value="Aktif">Aktif</option>
							<option value="Tidak Aktif">Tidak Aktif</option>
							<option value="Dipakai">Dipakai</option>
						</select>
					</div>
				</div>
				<!-- Keterangan -->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="status">Keterangan</label>
					<div class="col-md-6">
						<textarea class="form-control" name="poin_keterangan"><?php echo $row['poin_keterangan']; ?></textarea>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<!-- Button -->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="submit"></label>
					<div class="col-md-4">
						<button id="submit" name="update" class="btn btn-primary">Update</button>
						<button onclick="window.history.go(-1); return false;" class="btn btn-info">Kembali</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
include '../include/footer.php';
?>