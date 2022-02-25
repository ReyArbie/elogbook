<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modul/mod_agenda/aksi_agenda.php";

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : '';  
?>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
<?php

  switch($act){
    // Tampil Agenda
    default:
  
 // echo "tingkat session  = ".$_SESSION['tingkat'];
?>
              
<?php
$tahun=date("Y");
?>	    
			
			
			<div class="row">
			<div class="col-md-12" style="height: 400px; margin:20 auto">
          <!-- general form elements -->
          <div class="box box-primary">
		  <div id="belanja" style="width: 97%; height: 200px; margin: 5 auto">
          <center><h2>Rumah Sakit Kesehatan Kerja Provinsi Jawa Barat</h2>
            <h5>RSKK JABAR <?php echo $tahun;?></h5>
            
        </div> 
		  </div>
		  </div>
		  
		  <!--
		  <div class="col-md-6" style="height: 400px; margin: 5 auto">
         
          <div class="box box-primary">
		  <div id="kas_bank" style="min-width: 100%; height: 400px; margin: 5 auto"></div>
		  </div>
		  </div>
			-->
			</div>
                
              
<?php
	break;
	
  }
?>
            </div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.section -->
<?php
}
?>

<script type="text/javascript">


		</script>
