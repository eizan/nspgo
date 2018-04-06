<?php
define('TITLE', 'Edit Poin - NSPGO');
include '../include/header.php';
include '../include/nav.php';
require '../include/database.php';


?>
<?php
	$poin_id = $_GET['poin_id'];
	$table = 'tbl_poin';
	$poin_asal_sekolah = isset($_POST['poin_asal_sekolah']) ? mysqli_real_escape_string($conn, $_POST['poin_asal_sekolah']) : '';
	$mhs_nim = isset($_POST['mhs_nama']) ? mysqli_real_escape_string($conn, $_POST['mhs_nama']) : '';
	$poin_nama = isset($_POST['poin_nama']) ? mysqli_real_escape_string($conn, $_POST['poin_nama']) : '';
	$poin_jurusan = isset($_POST['poin_jurusan']) ? mysqli_real_escape_string($conn, $_POST['poin_jurusan']) : '';
	$poin_status = isset($_POST['poin_status']) ? mysqli_real_escape_string($conn, $_POST['poin_status']) : '';
	if(isset($_POST['update'])) {
		if (empty($mhs_nim)) {
			$query_update = "UPDATE $table SET poin_asal_sekolah='$poin_asal_sekolah', poin_nama='$poin_nama', poin_jurusan='$poin_jurusan', poin_status='$poin_status' WHERE poin_id=$poin_id";
		}else{
			$query_update = "UPDATE $table SET mhs_nim='$mhs_nim',poin_asal_sekolah='$poin_asal_sekolah', poin_nama='$poin_nama', poin_jurusan='$poin_jurusan', poin_status='$poin_status' WHERE poin_id=$poin_id";
		}
		
		$result_update = mysqli_query($conn, $query_update);
		$query = "SELECT * FROM $table WHERE poin_id=$poin_id";
		$result = mysqli_query($conn, $query);
		header('Location: table_poin.php?update');
	} else {
		$query = "SELECT * FROM $table WHERE poin_id=$poin_id";
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
		<a href="table_mhs.php">Poin</a>
	</li>
	<li class="breadcrumb-item active">Edit Poin</li>
</ol>

<div class="card mb-1">
	<div class="card-header">
		<i class="fa fa-table"></i> Edit Poin</div>
		<div class="card-body">
			
			<form class="form-horizontal" method="post" action="edit_poin.php?poin_id=<?php echo $poin_id; ?>">
				<!-- Text input-->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="mhs_nim">Mahasiswa yg membawa</label>
					<div class="col-md-4">
						<select class="mhs_nama form-control" name="mhs_nama"></select>
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="poin_nim">NIM</label>
					<div class="col-md-4">
						<input id="poin_nim" name="poin_nim" type="text" placeholder="NIM" class="form-control input-md" value="<?php echo $row['poin_nim']; ?>">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="poin_asal_sekolah">Asal Sekolah</label>
					<div class="col-md-4">
						<input id="poin_asal_sekolah" name="poin_asal_sekolah" type="text" placeholder="Asal Sekolah" class="form-control input-md" required="" value="<?php echo $row['poin_asal_sekolah']; ?>">
					</div>
				</div>
				<!-- Text input-->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="poin_nama">Nama Lengkap</label>
					<div class="col-md-6">
						<input id="poin_nama" name="poin_nama" type="text" placeholder="Nama Lengkap" class="form-control input-md" required="" value="<?php echo $row['poin_nama']; ?>">
					</div>
				</div>
				<!-- Select Basic -->
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
				<!-- Select Basic -->
				<div class="form-group row">
					<label class="col-md-4 control-label" for="poin_status">Status</label>
					<div class="col-md-2">
						<select id="poin_status" name="poin_status" class="form-control">
							<option value="<?php echo $row['poin_status']; ?>"><?php echo $row['poin_status']; ?></option>
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