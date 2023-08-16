<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Penjaga Lapas Sikantap</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_umum.css">


</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url('penjaga'); ?>" class="nav-link">Home</a>
        </li>

      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url(); ?>assets/adminlte/index3.html" class="brand-link">
        <img src="<?php echo base_url().'assets/foto/'.$this->session->userdata('foto')?>" alt="Foto" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $this->session->userdata('nama_pgw'); ?></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php
            $menu_master1 = array('pengunjung', 'pengunjung_detil');
            $menu_master2 = array('barang', 'barang_detil');
            ?>
            <li class="nav-item  
              <?php
              if (in_array($page, $menu_master1) || in_array($page, $menu_master2))
                echo "menu-open";
              ?>
            ">
              <a href="#" class="nav-link 
                <?php
                if (in_array($page, $menu_master1) || in_array($page, $menu_master2))
                  echo "active";
                ?>
              ">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Data Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>

              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="<?php echo base_url('penjaga/pengunjung'); ?>" class="nav-link
                    <?php
                    if (in_array($page, $menu_master1))
                      echo "active";
                    ?>                  
                  ">
                    <i class="nav-icon fas fa-sharp fa-solid fa-users"></i>
                    <p>Data Pengunjung</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('penjaga/barang'); ?>" class="nav-link
                    <?php
                    if (in_array($page, $menu_master2))
                      echo "active";
                    ?>                  
                  ">
                    <i class="nav-icon fas fa-solid fa-gift"></i>
                    <p>Data Barang</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url("penjaga/kunjungan"); ?>" class="nav-link">
                <i class="nav-icon fas fa-person-booth"></i>
                <p>
                  Kunjungan
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url("penjaga/sesi"); ?>" class="nav-link">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Sesi
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url("penjaga/antrian"); ?>" class="nav-link">
                <i class="nav-icon fas fa-list-ol"></i>
                <p>
                  Antrian
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url("login/logout"); ?>" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>