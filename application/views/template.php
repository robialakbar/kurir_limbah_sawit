
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Area | Kurir App</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/') ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets/') ?>dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="<?=base_url() ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>APP</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Kurir</b>APP</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('assets/users.png') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$this->session->userdata('name') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('assets/users.png') ?>" class="img-circle" alt="User Image">

                <p>
                  <?=$this->session->userdata('name') ?>
                  <small>
                    <?php 
                    switch ($this->session->userdata('level') ) {
                      case 1:
                        echo "Super Admin";
                        break;
                      case 2:
                        echo "Admin";
                        break;
                      case 3:
                        echo "Kurir";
                        break;
                    }
                    ?>
                      
                    </small>
                </p>
              </li>
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-primary btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url('home/logout') ?>" class="btn btn-danger btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/users.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$this->session->userdata('name') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?=actives($menu,"home") ?>">
          <a href="<?=base_url('home') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php if ($this->session->userdata("level") == 1) { ?>
        <li class="treeview <?=actives($menu,"master") ?>">
          <a href="#">
            <i class="fa fa-folder-open"></i> <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=actives($submenu,"master-perusahaan") ?>"><a href="<?=base_url('home/perusahaan') ?>"><i class="fa fa-circle-o"></i> Perusahaan</a></li>
            <li class="<?=actives($submenu,"master-kurir") ?>"><a href="<?=base_url('home/kurir') ?>"><i class="fa fa-circle-o"></i> Kurir</a></li>
             <li class="<?=actives($submenu,"master-owner") ?>"><a href="<?=base_url('home/owner') ?>"><i class="fa fa-circle-o"></i> Owner</a></li>
            <li class="<?=actives($submenu,"master-outlite") ?>"><a href="<?=base_url('home/outlite') ?>"><i class="fa fa-circle-o"></i> Outlite</a></li>
          </ul>
        </li>
        <li class="<?=actives($menu,"permintaan") ?>">
          <a href="<?=base_url('home/permintaan') ?>">
            <i class="fa fa-shopping-cart"></i> <span>Permintan</span>
          </a>
        </li>
        <li class="<?=actives($menu,"pengambilan") ?>">
          <a href="<?=base_url('home/pengambilan') ?>">
            <i class="fa fa-motorcycle"></i> <span>Pengambilan</span>
          </a>
        </li>
        <li class="treeview <?=actives($menu,"laporan") ?>">
          <a href="#">
            <i class="fa fa-desktop"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=actives($submenu,"laporan-permintaan") ?>"><a href="<?=base_url('home/laporan_permintaan') ?>"><i class="fa fa-circle-o"></i> Permintaan</a></li>
            <li class="<?=actives($submenu,"laporan-pengambilan") ?>"><a href="<?=base_url('home/laporan_pengambilan') ?>"><i class="fa fa-circle-o"></i> Pengambilan</a></li>
          </ul>
        </li>
      <?php }elseif ($this->session->userdata("level") == 3) { ?>
        <li class="<?=actives($menu,"pengambilan") ?>">
          <a href="<?=base_url('home/pengambilan') ?>">
            <i class="fa fa-motorcycle"></i> <span>Pengambilan</span>
          </a>
        </li>
        <?php }elseif ($this->session->userdata("level") == 2) { ?>
          <li class="treeview <?=actives($menu,"laporan") ?>">
          <a href="#">
            <i class="fa fa-desktop"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?=actives($submenu,"laporan-permintaan") ?>"><a href="<?=base_url('home/laporan_permintaan') ?>"><i class="fa fa-circle-o"></i> Permintaan</a></li>
            
          </ul>
        </li>
      <?php } ?>
          <li class="<?=actives($menu,"cetak") ?>">
          <a href="<?=base_url('home/cetak') ?>">
            <i class="fa fa-print"></i> <span>Cetak</span>
          </a>
        </li>
         <li class="<?=actives($menu,"keluar") ?>">
          <a href="<?=base_url('home/logout') ?>">
            <i class="fa fa-power-off"></i> <span>Keluar</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=$header ?>
        <small><?=$subheader ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?=$subheader ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?=$contents ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2021 <a href="">Kurir App</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url('assets/') ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url('assets/') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url('assets/') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url('assets/') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/') ?>dist/js/demo.js"></script>
<script>
  $(function () {
      $('#alert').delay(3000).fadeOut('slow');
      $('.data').DataTable()
  });
  function hitung() {
    var liter = $("#liter").val();
    var harga = $("#harga").val();
    var total = liter*harga;
    $("#total").val(total);
  }
  $("#jml").change(function(){
    liters();
  });

  function liters() {
    var jml = $("#jml").val();
    var kemasan = $("#kemasan").val();
    var total = jml*kemasan;
    $("#liter").val(total);
  }
</script>
</body>
</html>
