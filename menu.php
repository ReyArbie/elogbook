<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = 'index.php'</script>"; 
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else{
	$module=$_GET['module'];
?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="<?php if($module=="beranda") echo "active"; ?>"><a href="<?php echo $base_url;?>beranda" title="beranda"><i class="fa fa-dashboard"></i> <span>Beranda 
	(<?php echo $_SESSION['leveluser'];?>)
            </span></a></li>
					<?php
					if (($_SESSION['leveluser']=='admin') ){
					
					?>

           <li class="treeview <?php if($module=="pegawai" || $module=="seksi" || $module=="jabatan" || $module=="atasan" || $module=="user" || $module=="kinerja" || $module=="kegiatan") echo "active"; ?>">
				<a href="#">
					<i class="fa fa-gear"></i>
					<span><b>Manajemen Data</b></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li class="<?php if($module=="pegawai") echo "active"; ?>"><a href="<?php echo $base_url;?>pegawai"><i class="fa fa-circle-o"></i> <span>Pegawai</span></a></li>		
					<li class="<?php if($module=="seksi") echo "active"; ?>"><a href="<?php echo $base_url;?>seksi"><i class="fa fa-circle-o"></i> <span>Seksi</span></a></li>
					<li class="<?php if($module=="instalasi") echo "active"; ?>"><a href="<?php echo $base_url;?>instalasi"><i class="fa fa-circle-o"></i> <span>Instalasi</span></a></li>
					<li class="<?php if($module=="jabatan") echo "active"; ?>"><a href="<?php echo $base_url;?>jabatan"><i class="fa fa-circle-o"></i> <span>Jabatan</span></a></li>
					<li class="<?php if($module=="atasan") echo "active"; ?>"><a href="<?php echo $base_url;?>atasan"><i class="fa fa-circle-o"></i> <span>Atasan</span></a></li>
					<li class="<?php if($module=="kegiatan") echo "active"; ?>"><a href="<?php echo $base_url;?>kegiatan"><i class="fa fa-circle-o"></i> <span>Kegiatan</span></a></li>
					<li class="<?php if($module=="user") echo "active"; ?>"><a href="<?php echo $base_url;?>user"><i class="fa fa-circle-o"></i> <span>Manajemen User</span></a></li>
					
				</ul>
			</li>	

		<?php	
					}
					?>
					
					<?php
					if (($_SESSION['leveluser']=='admin') || ($_SESSION['leveluser']=='direktur') || ($_SESSION['leveluser']=='kepala') || ($_SESSION['leveluser']=='pegawai')){
					
					?>

				  <li class="treeview <?php if($module=="kegiatan" || $module=="kinerja") echo "active"; ?>">
				<a href="#">
					<i class="fa fa-gear"></i>
					<span><b>Manajemen Kerja</b></span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					
					<li class="<?php if($module=="kinerja") echo "active"; ?>"><a href="<?php echo $base_url;?>kinerja"><i class="fa fa-circle-o"></i> <span>Kinerja</span></a></li>
					</ul>
			</li>	

					<?php	
					}
					?>
          
		  			<?php
					if (($_SESSION['leveluser']=='admin') || ($_SESSION['leveluser']=='direktur') || ($_SESSION['leveluser']=='kepala')){
					
					?>

						<li class="treeview <?php if($module=="laporanharian" || $module=="laporanbulanan" || $modul=="pegawai" || $modul=="seksi" || $modul=="jabatan" || $modul=="atasan" || $modul=="kegiatan" || $modul=="user" || $modul=="kinerja") echo "active"; ?>">
							<a href="#">
								<i class="fa fa-cloud-download"></i>
								<span><b>Laporan</b></span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">					
								<li class="<?php if($module=="laporanharian") echo "active"; ?>"><a href="<?php echo $base_url;?>laporanharian" title="Laporan Kinerja Harian"><i class="fa fa-circle-o"></i> <span>Laporan Kinerja Harian</span></a></li>
								<li class="<?php if($module=="laporanbulanan") echo "active"; ?>"><a href="<?php echo $base_url;?>laporanbulanan" title="Laporan Kinerja Bulanan"><i class="fa fa-circle-o"></i> <span>Laporan Kinerja Bulanan</span></a></li>
								<li class="<?php if($module=="approval") echo "active"; ?>"><a href="<?php echo $base_url;?>approval"><i class="fa fa-circle-o"></i> <span>Approval</span></a></li>					
							</ul>
						</li>
					
					<?php	
					}else{
					?>

					<li class="treeview <?php if($module=="laporanharian" || $module=="laporanbulanan" || $modul=="pegawai" || $modul=="seksi" || $modul=="jabatan" || $modul=="atasan" || $modul=="kegiatan" || $modul=="user" || $modul=="kinerja") echo "active"; ?>">
							<a href="#">
								<i class="fa fa-cloud-download"></i>
								<span><b>Laporan</b></span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">					
								<li class="<?php if($module=="laporanharian") echo "active"; ?>"><a href="<?php echo $base_url;?>laporanharian" title="Laporan Kinerja Harian"><i class="fa fa-circle-o"></i> <span>Laporan Kinerja Harian</span></a></li>
								<li class="<?php if($module=="laporanbulanan") echo "active"; ?>"><a href="<?php echo $base_url;?>laporanbulanan" title="Laporan Kinerja Bulanan"><i class="fa fa-circle-o"></i> <span>Laporan Kinerja Bulanan</span></a></li>
							</ul>
						</li>
						<?php	
					}
					?>
		  
			<li><a href="logout.php" title="Keluar"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<?php
}
?>