<?php
session_start();
require '../include/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login | NSPGO</title>
  <!-- Favicon -->
  <link rel="icon" href="../favicon.ico" type="image/ico" sizes="16x16">
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
   <!-- Custom styles -->
 <link href="../css/custom.css" rel="stylesheet">
    <!-- Custom flag -->
   <link href="../css/flag-icon.min.css" rel="stylesheet">
<!-- Select2 -->
  <link href="../css/select2.min.css" rel="stylesheet" />
  <link href="../css/select2-bootstrap.css" rel="stylesheet" />

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<div class="container">
  <div class="text-center">
    <img src="../img/logo.png" style="width:300px">
  </div>
  <div class="card card-login mx-auto mt-5">
    <div class="card-header">
      Login NSPGO
    </div>
    <div class="card-body">
      <form method="post">
        <div class="form-group">
          <label for="exampleInputUsername">Username</label>
          <input class="form-control" id="exampleInputUsername" type="username" name="user" placeholder="Enter Username" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input class="form-control" id="exampleInputPassword1" type="password" name="pass" placeholder="Password" required>
        </div>
        <button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
      </form>
    </div>

  </div>
  <?php
if(isset($_POST['submit'])){
  $user = mysqli_real_escape_string($conn,$_POST["user"]);
  $pass = mysqli_real_escape_string($conn,md5(sha1($_POST['pass'])));
  $sql = "SELECT * FROM tbl_admin WHERE admin_username = '$user' AND admin_password = '$pass' ";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    session_start();
    $_SESSION['username'] = $user;
    $_SESSION['akses_level'] = $row['admin_akses_level'];
    $_SESSION['nama'] = $row['admin_nama'];
// Redirect user to index.php
    header("Location: index.php");
  }else{
    echo '
    <span class="alert alert-danger card card-login mx-auto mt-5" role="alert">Username atau Password Salah</span>
    ';
    mysqli_close($conn);
  }
}
?>
</div>
<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/popper/popper.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>