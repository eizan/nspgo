 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.php"><img class="img-fluid" style="width:200px" src="../img/logo.png"></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item <?php if(isset($page)){ echo ($page == 'dashboard') ? "active" : "";}; ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="index.php">
          <i class="fa fa-fw fa-dashboard"></i>
          <span class="nav-link-text">Dashboard</span>
        </a>
      </li>
      <li class="nav-item <?php if(isset($page)){ echo ($page == 'mahasiswa') ? "active" : "";}; ?>" data-toggle="tooltip" data-placement="right" title="Mahasiswa">
        <a class="nav-link" href="table_mhs.php">
          <i class="fa fa-fw fa-user"></i>
          <span class="nav-link-text">Mahasiswa</span>
        </a>
      </li>           
      <li class="nav-item <?php if(isset($page)){ echo ($page == 'poin') ? "active" : "";}; ?>" data-toggle="tooltip" data-placement="right" title="poin">
        <a class="nav-link" href="table_poin.php">
          <i class="fa fa-fw fa-users"></i>
          <span class="nav-link-text">Poin</span>
        </a>
      </li>      
      <li class="nav-item <?php if(isset($page)){ echo ($page == 'negara') ? "active" : "";}; ?>" data-toggle="tooltip" data-placement="right" title="negara">
        <a class="nav-link" href="table_negara.php">
          <i class="fa fa-fw fa-flag"></i>
          <span class="nav-link-text">Negara</span>
        </a>
      </li>
      <?php if($_SESSION['akses_level'] == 'Admin'){ ?>
      <li class="nav-item <?php if(isset($page)){ echo ($page == 'admin') ? "active" : "";}; ?>" data-toggle="tooltip" data-placement="right" title="Admin">
        <a class="nav-link" href="table_admin.php">
          <i class="fa fa-fw fa-gears"></i>
          <span class="nav-link-text">Admin</span>
        </a>
      </li>
      <?php } ?>      
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
        <a class="nav-link" href="../">
          <i class="fa fa-fw fa-search"></i>
          <span class="nav-link-text">Check Page</span>
        </a>
      </li>

    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="#" class="nav-link"><i class="fa fa-user"> <?php echo $_SESSION['nama']; ?> (<?php echo $_SESSION['akses_level']; ?>)</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>
          Logout
        </a>
      </li>
    </ul>
  </div>
</nav>
<div class="content-wrapper">
  <div class="container-fluid">