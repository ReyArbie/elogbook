<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = 'index.php'</script>"; 
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>e-Kinerja</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="icon" href="dist/img/jabar.png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="media.php?module=beranda" class="logo">
          <span class="logo-mini"><b>e</b>Kinerja</span>
          <span class="logo-lg"><image src="dist/img/rskklogo.png" width="210px"></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
		  
		  <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
               
              </li>
			  
              <li class="dropdown user user-menu">
              <a href="<?php echo $base_url;?>profil">
					<i class=""><img src="dist/img/<?=$_SESSION['foto'];?>" width="20" style="border-radius:50px"></i>
                  <span class="hidden-xs"><?php echo $_SESSION['namalengkap']; ?></span>
                </a>
              </li>
			  
               <!-- <a href="#" data-toggle="control-sidebar" title="Option"><i class="fa fa-gears"></i></a> -->
              </li>
            </ul>
          </div>
        </nav>
      </header>
<?php
}
?>


<!-- chart highchart -->
	<script src="plugins/highcharts/code/highcharts.js"></script>
   <script src="plugins/highcharts/code/highcharts-3d.js"></script>
   <script src="plugins/highcharts/code/modules/exporting.js"></script>
   