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
session_start()
?>	    
			
			<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Profil</h3>
                </div><!-- /.box-header -->
                <form method="POST" action="<?php echo $aksi; ?>?module=profil&act=update" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
					<div class="box-body">
					
					<div class="form-group"><center>
                    <label for="pembuat" class="col-sm-2 control-label" disabled></label>
							<div class="col-sm-6">
							<img src="dist/img/<?=$_SESSION['foto'];?>" width="150"/>
							</div>
						</div>

						<div class="form-group">
                        <label for="pembuat" class="col-sm-2 control-label" disabled></label>
							<div class="col-sm-6">
                                <label for="pembuat" class="col-sm-2 control-label">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $_SESSION['namalengkap'];?>" disabled/>
							</div>
						</div>
                        <div class="form-group">
                        <label for="pembuat" class="col-sm-2 control-label" disabled></label>
							<div class="col-sm-6">
                                <label for="pembuat" class="col-sm-2 control-label">Email</label>
								<input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email'];?>"disabled/>
							</div>
						</div>
						<div class="form-group">
                        <label for="pembuat" class="col-sm-2 control-label" disabled></label>
                            <div class="col-sm-6">
                                <label for="pembuat" class="col-sm-2 control-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $_SESSION['jabatan'];?>" disabled/>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="pembuat" class="col-sm-2 control-label" disabled></label>
							<div class="col-sm-6">
                                <label for="pembuat" class="col-sm-2 control-label">No Telp</label>
								<input type="text" class="form-control" id="telp" name="telp" value="<?php echo $_SESSION['telp'];?>" disabled/>
							</div>
						</div>
                        <div class="form-group">
                        <label for="pembuat" class="col-sm-2 control-label" disabled></label>
							<div class="col-sm-6">
                                <label for="pembuat" class="col-sm-2 control-label">Atasan</label>
								<input type="text" class="form-control" id="atasan" name="atasan" value="<?php echo $_SESSION['atasan'];?>" disabled/>
							</div>
						</div>
                        <div class="form-group">
                        <label for="pembuat" class="col-sm-2 control-label" disabled></label>
                        </div>
					</div><!-- /.box-body -->
					
				</form>
              </div><!-- /.box -->
                
              
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
