<?php
define('TITLE', 'Dashboard - NSPGO ONLINE');
$page = "dashboard";
include '../include/header.php';
include '../include/nav.php';
include '../include/database.php';
?>
<?php
// sql mahasuswa
$sql_mhs = "SELECT * FROM tbl_mhs";
$hasil_mhs = mysqli_query($conn,$sql_mhs);
$jumlah_mhs = mysqli_num_rows($hasil_mhs);
// sql Poin
$sql_poin = "SELECT * FROM tbl_poin";
$hasil_poin = mysqli_query($conn,$sql_poin);
$jumlah_poin = mysqli_num_rows($hasil_poin);
// sql Negara
$sql_negara = "SELECT * FROM tbl_negara";
$hasil_negara = mysqli_query($conn,$sql_negara);
$jumlah_negara = mysqli_num_rows($hasil_negara);
// sql admin
$sql_admin = "SELECT * FROM tbl_admin";
$hasil_admin = mysqli_query($conn,$sql_admin);
$jumlah_admin = mysqli_num_rows($hasil_admin);
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Index</li>
</ol>
<!-- Judul -->
<h1>SUMMARY</h1>
<hr>
<!-- End of Judul -->
<!-- Icon Cards-->
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-user"></i>
        </div>
        <div class="mr-5"><strong><?php echo $jumlah_mhs; ?></strong> Mahasiswa</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="table_mhs.php">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-users"></i>
        </div>
        <div class="mr-5"><strong><?php echo $jumlah_poin; ?></strong> Poin</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="table_poin.php">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-flag"></i>
        </div>
        <div class="mr-5"><strong><?php echo $jumlah_negara; ?></strong> Negara</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="table_negara.php">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fa fa-fw fa-gear"></i>
        </div>
        <div class="mr-5"><strong><?php echo $jumlah_admin; ?></strong> Admin</div>
      </div>
      <a class="card-footer text-white clearfix small z-1" href="table_admin.php">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fa fa-angle-right"></i>
        </span>
      </a>
    </div>
  </div>
</div>

<?php
include '../include/modal.php';
include '../include/footer.php';
?>