<?php
define('TITLE', 'Dashboard - NSPGO ONLINE');
$page = "dashboard";
include '../include/header.php';
include '../include/nav.php';
include '../include/database.php';
?>
<!-- Page level plugin JavaScript-->
    <script src="../vendor/chart.js/Chart.min.js"></script>
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
// sql status aktif
$sql_aktif = "SELECT * FROM tbl_poin WHERE poin_status = 'Aktif'";
$jumlah_aktif = mysqli_num_rows(mysqli_query($conn,$sql_aktif));
// sql status tidak
$sql_tidak = "SELECT * FROM tbl_poin WHERE poin_status = 'Tidak Aktif'";
$jumlah_tidak = mysqli_num_rows(mysqli_query($conn,$sql_tidak));
// sql status Dipakai
$sql_dipakai = "SELECT * FROM tbl_poin WHERE poin_status = 'Dipakai'";
$jumlah_dipakai = mysqli_num_rows(mysqli_query($conn,$sql_dipakai));
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
  <?php if($_SESSION['akses_level'] == 'Admin'){ ?>
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
  <?php   } ?>
</div>

<div  class="row">
<div class="col-md-4">
  <div class="card">
    <div class="card-header">
      Poin Status
    </div>
    <div class="card-body">
      <canvas id="myPieChart"></canvas>
    </div>
  </div>
</div>

<!-- <div class="col-md-8">
  <div class="card">
    <div class="card-header">
      dasdasd
    </div>
    <div class="card-body">
      <canvas id="myBarChart"></canvas>
    </div>
  </div>
</div> -->


</div>

<script>
// -- aktif / tidak
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Aktif", "Tidak", "Dipakai"],
    datasets: [{
      data: [<?php echo $jumlah_aktif ?>, <?php echo $jumlah_tidak ?>, <?php echo $jumlah_dipakai ?>],
      backgroundColor: ['#007bff', '#dc3545', '#28a745'],
    }],
  },
});  

// -- bar perkembangan
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [4215, 5312, 6251, 7841, 9821, 14984],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15000,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
</script>
<?php
include '../include/modal.php';
include '../include/footer.php';
?>