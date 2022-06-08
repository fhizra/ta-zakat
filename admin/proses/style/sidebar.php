<?php  
$idp = $_GET['idp'];
  session_start();
    include ('../../config/koneksi.php');
    if($_SESSION['username']==""){
      echo "<script language=javascript>
          window.location='../../login.php';
          </script>";
    }
?>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?idp=<?php echo $idp; ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['username']; ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?idp=<?php echo $idp; ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Data
        </div>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
          <a class="nav-link" href="data_alternatif.php?idp=<?php echo $idp; ?>">
            <i class="fas fa-fw fa-database"></i>
            <span>Alternatif</span>
          </a>
              
          <a class="nav-link" href="data_penilaian.php?idp=<?php echo $idp; ?>">
            <i class="fas fa-fw fa-database"></i>
            <span>Penilaian</span>
          </a>
                
          <a class="nav-link" href="proses.php?idp=<?php echo $idp; ?>">
            <i class="fas fa-fw fa-database"></i>
            <span>Proses Perhitungan</span>
          </a>
                  
          <a class="nav-link" href="hasil_keputusan.php?idp=<?php echo $idp; ?>">
            <i class="fas fa-fw fa-database"></i>
            <span>Hasil Keputusan</span>
          </a>
        </li>

            <div class="sidebar-heading">
              Laporan
            </div>

            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-report"></i>
                <span>Laporan</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
                <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="cetak_alt.php?idp=<?php echo $idp; ?>" target="_BLANK">Alternatif</a>
                  <a class="collapse-item" href="cetak_nilai.php?idp=<?php echo $idp; ?>" target="_BLANK">Penilaian</a>
                  <a class="collapse-item" href="cetak_hasil.php?idp=<?php echo $idp; ?>" target="_BLANK">Hasil Keputusan</a>
                </div>
              </div>
            </li>                          
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                  <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

              </ul>
              <!-- End of Sidebar -->

              <!-- Content Wrapper -->
              <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                  <!-- Topbar -->
                  <nav class="navbar navbar-expand bg-blue topbar mb-4 static-top shadow">
                  Jl. Pemuda 26B Kota Padang
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - Tables -->
                        <li class="nav-item">
                          <a class="nav-link" href="../history.php">
                            <i class="fas fa-chevron-circle-left"></i>
                            <span>Home</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="index.php?idp=<?php echo $idp; ?>">
                            <i class="fas fa-chevron-circle-left"></i>
                            <span>Kembali</span></a>
                        </li>

                    </ul>
                  </nav>
        <!-- End of Topbar -->