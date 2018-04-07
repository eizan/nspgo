
<?php
require('include/database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>NSPGO Cek Poin Online | Nusa Putra Go Abroad</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="vendor/bootstrap/v3/css/bootstrap.min.css">
  <link href="css/custom.css" rel="stylesheet" type="text/css">
  <link rel="icon" href="favicon.ico" type="image/ico" sizes="16x16">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/v3/js/bootstrap.min.js"></script>
  <link href="css/flag-icon.min.css" rel="stylesheet">
      <!-- Include Date Range Picker -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

  <style>
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }  
  .jumbotron {
    background-color: #a90063;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #a90063;
    font-size: 50px;
  }
  .logo {
    color: #a90063;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #a90063;
  }
  .carousel-indicators li {
    border-color: #a90063;
  }
  .carousel-indicators li.active {
    background-color: #a90063;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
  .panel {
    border: 1px solid #a90063; 
    border-radius:0 !important;
    transition: box-shadow 0.5s;
  }
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid #a90063;
    background-color: #fff !important;
    color: #a90063;
  }
  .panel-heading {
    color: #fff !important;
    background-color: #a90063 !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  .panel-footer {
    background-color: white !important;
  }
  .panel-footer h3 {
    font-size: 32px;
  }
  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }
  .panel-footer .btn {
    margin: 15px 0;
    background-color: #a90063;
    color: #fff;
  }
  .navbar {
    margin-bottom: 0;
    background-color: #a90063;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #a90063 !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #a90063;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }

.modal-dialog {
    margin: 10vh auto 0px auto
}

</style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">NSPGO ONLINE</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#cekpoin">CEK POIN</a></li>
          <li><a href="#about">TENTANG</a></li>
          <li><a href="#negara">NEGARA</a></li>
          <li><a href="#gallery">GALLERY</a></li>
          <li><a href="#contact">KONTAK</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="cekpoin" class="jumbotron text-center">
    <h1>NSPGO ONLINE</h1> 
    <p>Masukan NIM kamu di kolom pencarian dan klik cek poin untuk melihat poin kamu!!</p> 
    <form class="form-inline justify-content-center" method="post">
      <div class="input-group">
        <input class="form-control" type="number" name="mhs_nim" placeholder="Masukan NIM" required>
        <div class="input-group-btn">
          <button type="submit" class="btn btn-danger" name="cek"><span class="glyphicon glyphicon-search"></span>&nbsp;Cek Poin</button>
        </div>
      </div>
    </form>
    <?php
    if (isset($_POST["cek"]))
    {
      $mhs_nim = mysqli_real_escape_string($conn,$_POST['mhs_nim']);

      $query = "SELECT * FROM tbl_mhs WHERE mhs_nim = '". mysqli_real_escape_string($conn,$mhs_nim) ."'" ;
      $result = mysqli_query($conn,$query);
      if (mysqli_num_rows($result)) 
      {
        $row = $result->fetch_assoc();
        $mhs_nim = $row["mhs_nim"];
        $poin_query = "select * from tbl_poin where mhs_nim in (select mhs_nim from tbl_mhs WHERE mhs_nim = '$mhs_nim' and poin_status = 'Aktif')";
        $result_poin = mysqli_query($conn,$poin_query);
        $jumlah_poin = mysqli_num_rows($result_poin);

        ?>
        <br>
        <div class="alert alert-info">
        <p><b><?php echo $row["mhs_nama"]; ?></b><br><?php echo '<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample">Poin&nbsp;<span class="badge">'.$jumlah_poin.'</span></button>' ; ?>
        </p>
          <div class="collapse" id="collapseExample">
            <div class="card card-block">
              <br>
              <?php
              $poin_query = "select * from tbl_poin where mhs_nim in (select mhs_nim from tbl_mhs WHERE mhs_nim = '$mhs_nim')";
              $result_poin = mysqli_query($conn,$poin_query);
              $no = 1;
              while($row_poin = $result_poin->fetch_assoc()){
                $warnastatus = $row_poin["poin_status"];
                if ($warnastatus == "Aktif") {
                  $warnastatus = '<span class="label label-success">Aktif</span>';                
                }elseif ($warnastatus == "Tidak Aktif") {
                  $warnastatus = '<span class="label label-danger">Tidak Aktif</span>';
                }
                echo '
                '.$no.'.&nbsp;'.$row_poin["poin_nama"].'&nbsp'.$warnastatus.'<br>
                ';
                $no++;
              }

              $poin_singapur = 5 - $jumlah_poin;
              if($jumlah_poin >= 5){
                echo '<p>Kamu sudah bisa pergi ke Singapura !!! <span class="flag-icon flag-icon-sg"></span><br><button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">Gunakan Poin</button>
                </p>';
                include 'include/custom_modal.php';
              }else{
                echo '<p>Tinggal <strong>'.$poin_singapur.'</strong> Poin lagi untuk bisa ke Singapura <span class="flag-icon flag-icon-sg"></span>
                </p>';
              }

              ?>
            </div>
            </div>
          </div>
          <?php
        } 
        else 
        {
        echo '
              <br>
              <div class="alert alert-success alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>NIM</strong> salah atau Kamu belum memiliki poin. Silahkan coba kembali.
              </div>
            '; //Fail
      }
    }
    ?>
  </div>
  <!-- Tentang -->
  <div id="about" class="container-fluid">
    <div class="row">
      <div class="col-sm-8">
        <h2>Apa itu NSPGO ?</h2>        
        <h4>Nusa Putra Go Abroad atau di singakat NSP GO adalah salah satu program IRO Nusa Putra untuk mahasiswa Nusa Putra baik itu mahasiswa aktif ataupun alumni untuk punya kesempatan jalan-jalan keluar negeri secara gratis! dengan mengajak teman, sodara atau kenalan untuk kuliah di Nusa Putra.</h4>
        <hr> 
        <a href="#data1" data-toggle="collapse">PEROLEHAN POIN</a>
        <div div id="data1" class="collapse"> 
            <ol>
              <li>Poin diperoleh dari  mahasiswa baru yang direkomendasi oleh member NSP GO dengan nilai satu mahasiswa 1 (satu) poin, kecuali mahasiswa beasiswa tidak mendapatkan poin</li>
              <li>Untuk dapat memperoleh Poin, Anggota NSP GO terlebih dahulu memberikan informasi Nama, NIM dan nomor Anggota NSP GO kepada calon mahasiswa baru yang direkomendasikan dan mencatat dalam formulir pendaftaran mahasiswa yang direkomendasikan sebelum mahasiswa bersangkutan mendaftarkan diri di STT NUSA PUTRA. Bila tidak, tidak akan dicatat dan Anggota NSP GO tidak memperoleh Poin dari mahasiswa yang di rekomendasikan.</li>
              <li>Poin tidak dapat di pindah tangankan atau diperjual belikan sesama anggota atau yang lainnya</li>
              <li>Penghitungan Poin dianggap sah apabila mahasiswa yang di rekomendasikan di terima di STT NUSA PUTRA dan telah menyelesaikan minimal 1 (satu) semester pembelajaran di STT NUSA PUTRA</li>
            </ol>
        </div>
        <hr>
        <a href="#data2" data-toggle="collapse">MASA BERLAKU POIN (POINTS DURATION)</a>
        <div div id="data2" class="collapse"> 
            <ul>
              <li><b>Mahasiswa</b>, Poin berlaku apabila member NSP GO masih tercatat sebagai mahasiswa STT NUSA PUTRA dan dikonversi menjadi Alumni apabila telah menyelesaikan pendidikan</li>
              <li><b>Alumni</b>, Poin tetap berlaku kecuali adanya pelanggaran dan dicabut haknya oleh STT NUSA PUTRA karena pelanggaran tersebut</li>
            </ul>
        </div>
        <hr>
        <a href="#data3" data-toggle="collapse">PENGGUNAAN POIN (USE OF POINTS)</a>
        <div div id="data3" class="collapse"> 
            <ul>
              <li>Penukaran atau penggunaan Poin harus dilakukan oleh Anggota NSP GO yang namanya tercantum pada Kartu NSP GO dan hanya untuk keperluan pemegang kartu</li>
              <li>Mahasiswa, Poin yang di peroleh mahasiswa di gunakan untuk kunjungan ke luar negeri sebagai bagian dari study seperti: Seminar, Study Tour, Internship dan lain sebagainya terkait dengan kegiatan meningkatkan kemampuan wawasan akademik</li>
              <li>Mahasiswa yang melakukan kegiata ke luar negeri harus melaporkan kegiatan tersebut dengan format yang ada di IRO (International Relation Office)</li>
              <li>Alumni, Poin Alumni di gunakan secara bebas terutama untuk kunjungan, mencari pekerjaan dan pengayaan dalam meningkatkan kapasitas pribadi alumni, termasuk untuk ibadah seperti Umroh ke Saudi Arabia bagi muslim dan kunjungan wisata religi ke Vatikan, Tajmahal dan lain-lain</li>
              <li>Lama kegiatan di luar negeri yang di tanggung oleh STT NUSA PUTRA meliputi : Tiket pesawat, transportasi di Negara tujuan, tempat tinggal, makan dan minum yang di tentukan oleh IRO dengan lama kegiatan maksimal 7 hari, kecuali untuk Negara Asia Tenggara maksimal empat hari</li>
              <li>Jumlah Poin di tukarkan sesuai dengan nilai poin (terlampir) masing-masing negara yang akan di kunjungi dengan terlebih dahulu menyampaikan keinginanya kepada IRO (international Relation Office) 4 bulan sebelumnya. </li>
            </ul>
        </div>
        <hr> 
        <a href="#data4" data-toggle="collapse">PEMBATALAN POIN</a>
        <div div id="data4" class="collapse"> 
            <ul>
              <li>Bagi Mahasiswa Poin tidak berlaku apabila pemegang member NSP GO mengundurkan diri sebagai mahasiswa STT NUSA PUTRA atau diberhentikan karena melanggar peraturan yang di tentukan oleh STT NUSA PUTRA</li>
              <li>Bagi Alumni poin tidak berlaku apabila, alumni terjerat melakukan kegiatan melanggar hukum yang telah memiliki kekuatan tetap dan melanggar kode tik Alumni Nusa Putra</li>
            </ul>
        </div>
        <hr>
      </div>
      <div class="col-sm-4 slideanim">
       <img src="img/flags.jpg" alt="Nusa Putra Go Abroad" style="width:100%">
     </div>
   </div>
 </div>

 <!-- Negara -->
 <div id="negara" class="container-fluid">
  <div class="row">
    <h2 align="center">List Poin Negara</h2>
    <p  align="center">Gunakan <kbd>ctrl + f</kbd> untuk mencari negara yang kamu inginkan!</p>
    <br>
    <div class="col-sm-12">
      <div style="overflow-x:auto;">
        <table class="table text-nowrap">
          <?php 
          $query_negara = "SELECT * FROM tbl_negara ORDER BY negara_poin";
          $hasil_negara = mysqli_query($conn,$query_negara);

          if (mysqli_num_rows($hasil_negara) > 0) {
           $i = 1;
           echo "<tr>";
           while($row = mysqli_fetch_assoc($hasil_negara)) {
            echo "<td><span class='flag-icon flag-icon-". $row["negara_kode"]."'></span> " . $row["negara_nama"]. " : " . $row["negara_poin"]."</td>";
            if ($i % 5 == 0) echo "</tr><tr>";
            $i++;
          }
          echo "</tr>";
        } else {
          echo "0 results";
        }
        mysqli_close($conn);
        ?>
      </table>
    </div>
  </div>
</div>
</div>

<!-- Container (About Section) -->
<div id="gallery" class="container-fluid">
  <div class="row">
    <h2 align="center">Gallery</h2>

    <!-- img 1 -->
    <div class="col-sm-12">
      <div class="col-md-4 slideanim">
        <div class="thumbnail">
          <img src="img/nspgo1.jpg" alt="Nusa Putra Go Abroad 2016" style="width:100%">
        </div>
      </div>

      <!-- img 2 -->
      <div class="col-md-4 slideanim">
        <div class="thumbnail">
          <img src="img/nspgo2.jpg" alt="Nusa Putra Go Abroad 2016" style="width:100%">
        </div>
      </div>

      <!-- img 3 -->
      <div class="col-md-4 slideanim">
        <div class="thumbnail">
          <img src="img/nspgo3.jpg" alt="Nusa Putra Go Abroad 2016" style="width:100%">
        </div>
      </div>


    </div>
  </div>
</div>



<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">KONTAK</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Silahkan kontak kami jika ada keluhan dan pertanyaaan seputar NSPGO</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>&nbsp;Kampus STT Nusa Putra Lat.5</p>
      <p><span class="glyphicon glyphicon-phone"></span>&nbsp;+62 857 2406 9088</p>
      <p><span class="glyphicon glyphicon-envelope">&nbsp;</span><a href="mailto:iro@nusaputra@ac.id">iro@nusaputra@ac.id</a></p>
    </div>
    <div class="col-sm-7 slideanim">
      <form method="POST" action="http://formspree.io/iro@nusaputra.ac.id">
        <div class="row">
          <div class="col-sm-6 form-group">
            <input class="form-control" id="nama" name="nama" placeholder="Nama" type="text" required>
          </div>
          <div class="col-sm-6 form-group">
            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
          </div>
        </div>
        <textarea class="form-control" id="pesan" name="pesan" placeholder="Pesan" rows="5" maxlength="1000"></textarea><br>
        <input type="hidden" name="_format" value="plain" />
        <div class="row">
          <div class="col-sm-12 form-group">
            <button class="btn btn-primary pull-right" type="submit" >Kirim</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Copyright@ <a href="https://www.iro.nusaputra.ac.id" title="IRO Nusa Putra">iro.nusaputra.ac.id</a> Develop By <a href="https://instagram.com/ikhsan.thohir" title="Eizan">Eizan</a></p>
</footer>

<script>
  $(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
      if (pos < winTop + 600) {
        $(this).addClass("slide");
      }
    });
  });
})
</script>

<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>

</body>
</html>