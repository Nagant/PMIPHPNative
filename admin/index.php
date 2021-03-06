<?php
	session_start();
	if(!isset($_SESSION['sesi']) || $_SESSION['sesi'] != 'admin'){
		header("location:../login");
	} else {
		include("../fungsi.php");
		define('username',$_SESSION['username']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PMI Denpasar | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/skin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/dashboard.css">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/datepicker.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/sweetalert2.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>dist/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@2.4.0/dist/leaflet-search.min.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>
  <script src="https://cdn.jsdelivr.net/npm/leaflet-search@2.4.0/dist/leaflet-search.min.js"></script>

  <!-- Load Esri Leaflet from CDN -->
  <script src="https://unpkg.com/esri-leaflet@2.2.3/dist/esri-leaflet.js" integrity="sha512-YZ6b5bXRVwipfqul5krehD9qlbJzc6KOGXYsDjU9HHXW2gK57xmWl2gU6nAegiErAqFXhygKIsWPKbjLPXVb2g==" crossorigin=""></script>


  <!-- Load Esri Leaflet Geocoder from CDN -->
  <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.2.13/dist/esri-leaflet-geocoder.css" integrity="sha512-v5YmWLm8KqAAmg5808pETiccEohtt8rPVMGQ1jA6jqkWVydV5Cuz3nJ9fQ7ittSxvuqsvI9RSGfVoKPaAJZ/AQ==" crossorigin="">
  <script src="https://unpkg.com/esri-leaflet-geocoder@2.2.13/dist/esri-leaflet-geocoder.js" integrity="sha512-zdT4Pc2tIrc6uoYly2Wp8jh6EPEWaveqqD3sT0lf5yei19BC1WulGuh5CesB0ldBKZieKGD7Qyf/G0jdSe016A==" crossorigin=""></script>
  <script src="<?php echo $url; ?>dist/js/jquery.min.js"></script>
  <script src="<?php echo $url; ?>dist/js/bootstrap.min.js"></script>
  <script src="<?php echo $url; ?>dist/js/adminlte.min.js"></script>
  <script src="<?php echo $url; ?>dist/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo $url; ?>dist/js/dataTables.bootstrap.js"></script>
  <script src="<?php echo $url; ?>dist/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo $url; ?>dist/js/form.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  <script src="<?php echo $url; ?>dist/js/sweetalert2.min.js"></script>
  <script src="<?php echo $url; ?>dist/js/dataTables.responsive.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>
        $(document).ready(function() {
          datatable();
        })
 </script>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-red fixed sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PMI</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PMI</b> Denpasar</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo $url; ?>img/<?php echo dapatkaninfo(username)[2]; ?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo dapatkaninfo(username)[0]; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $url; ?>img/<?php echo dapatkaninfo(username)[2]; ?>" class="img-circle" alt="User Image">

                <p>
                 <?php echo dapatkaninfo(username)[0]; ?>
                  <small>Administrator</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo $url; ?>admin/profile" class="btn btn-default btn-flat">Pengaturan Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo $url; ?>logout" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $url; ?>img/<?php echo dapatkaninfo(username)[2]; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo dapatkaninfo(username)[0]; ?></p>
          <!-- Status -->
          <a href="#">Administrator</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
		<li class="header">Dashboard</li>
		<li><a href="<?php echo $url; ?>admin/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
		<li class="header">Statistik</li>
		<li><a href="<?php echo $url; ?>admin/statistikdata"><i class="fa fa-pie-chart"></i> <span>Statistik Data</span></a></li>
        <li class="header">Umum</li>
        <li><a href="<?php echo $url; ?>admin/pendonor"><i class="fa fa-users"></i> <span>Pendonor</span>
		<span class="pull-right-container">
              <span class="label label-danger pull-right"><?php echo dapatkantotal('pendonor'); ?></span>
            </span></a></li>
			<li><a href="<?php echo $url; ?>admin/unitdarah"><i class="fa fa-tint"></i> <span>Unit Darah</span>
		<span class="pull-right-container">
              <span class="label label-danger pull-right"><?php echo dapatkantotal('unit_darah'); ?></span>
            </span></a></li>
		<li><a href="<?php echo $url; ?>admin/jadwal"><i class="fa fa-clock-o"></i> <span>Jadwal</span>
		<span class="pull-right-container">
              <span class="label label-danger pull-right"><?php echo dapatkantotal('jadwal'); ?></span>
            </span></a></li>
		<li><a href="<?php echo $url; ?>admin/petugas"><i class="fa fa-user"></i> <span>Petugas</span><span class="pull-right-container">
              <span class="label label-danger pull-right"><?php echo dapatkantotal('petugas'); ?></span>
            </span></a></li>
		<li><a href="<?php echo $url; ?>admin/transaksi"><i class="fa fa-send"></i> <span>Transaksi</span><span class="pull-right-container">
              <span class="label label-danger pull-right"><?php echo dapatkantotal('transaksi'); ?></span>
            </span></a></li>
					<li><a href="<?php echo $url; ?>admin/jadwallokasi"><i class="fa fa-calendar"></i> <span>Jadwal Dan Lokasi</span><span class="pull-right-container">
              <span class="label label-danger pull-right"><?php echo dapatkantotal('jadwaldanlokasi'); ?></span>
            </span></a></li>
            <li class="header">Laporan</li>
		<li><a href="<?php echo $url; ?>admin/laptransaksi"><i class="fa fa-file"></i> <span>Transaksi</span></a></li>
		<li class="header">Profile</li>
		<li><a href="<?php echo $url; ?>admin/profile"><i class="fa fa-gears"></i> <span>Pengaturan Profile</span></a></li>
    <li class="header">Log Aktivitas</li>
		<li><a href="<?php echo $url; ?>admin/logaktivitas"><i class="fa fa-history"></i> <span>Log</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

	<?php
	if(isset($_GET["halaman"])){
		if($_GET["halaman"] == "pendonor"){
			include('../kontent/pendonor.php');
		}else if($_GET["halaman"] == "transaksi"){
			include('../kontent/transaksi.php');
		}else if($_GET["halaman"] == "profile"){
			include('../kontent/pengaturan_profile.php');
		}else if($_GET["halaman"] == "jadwal"){
			include('../kontent/jadwal.php');
		}else if($_GET["halaman"] == "unitdarah"){
			include('../kontent/unitdarah.php');
		}else if($_GET["halaman"] == "petugas"){
			include('../kontent/petugas.php');
		}else if($_GET["halaman"] == "jadwallokasi"){
			include('../kontent/jadwallokasi.php');
		}else if($_GET["halaman"] == "statistikdata"){
			include('../kontent/statistikdata.php');
		}else if($_GET["halaman"] == "laptransaksi"){
			include('../kontent/report_transaksi.php');
		}else if($_GET["halaman"] == "logaktivitas"){
			include('../kontent/logaktivitas.php');
		}else{
			include('../kontent/404.php');
		}
	}elseif(isset($_GET[!"halaman"])){
			include('../kontent/404.php');
	}else{
			include('../kontent/statistikdashboard.php');
	}
	?>
</section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Made with <p class="fa fa-heart"></p> & <p class="fa fa-coffee"></p> from Kelompok 5
    </div>
    <strong>Copyright &copy; 2019 PMI Denpasar.</strong>
  </footer>

<script src="<?php echo $url; ?>dist/js/jquery.slimscroll.min.js"></script>
<script>
  function datatable() {
    $.fn.dataTable.ext.errMode = 'none';
    $('#tabel_data').on( 'error.dt', function ( e, settings, techNote, message ) {
    console.log( 'An error has been reported by DataTables: ', message );
    } ) ;
    $('#datatble').DataTable( {
      responsive: true,
      columnDefs: [
        { responsivePriority: 1, targets: 0 }
      ]
	});
  }
</script>
</body>
</html>
	<?php } ?>