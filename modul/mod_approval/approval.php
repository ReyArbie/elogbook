<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modul/mod_approval/aksi_approval.php";

  // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : '';  
  $mod=$_GET['module'];
?>
	
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
<?php
	switch($act){
		// Tampil Templates
		default:
?>
              
			  <div class="box">
			  <section class="content-header">
		<h1>Approval Kegiatan</h1>
	</section>
	<hr>
                <div class="box-body">
                  <table id="datatemplates" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Uraian Kegiatan</th>
						<th>Waktu Mulai</th>
						<th>Waktu Selesai</th>
						<th>Foto</th>
						<th>Dokumen</th>
						<th>Status</th>
						<th>Aksi</th>
					
                      </tr>
                    </thead>
                    <tbody>
					<?php
					
					if($_SESSION['leveluser']=="admin"){
					$query  = "SELECT a.nama_pegawai,b.uraian,a.waktu,a.waktu_selesai,a.id,a.foto,a.dokumen,a.status
						FROM kinerja a, kegiatan b
						WHERE a.uraian_kegiatan=b.id order by a.id";
					}
					elseif($_SESSION['leveluser']=="direktur"){
						$query  = "SELECT a.nama_pegawai,b.uraian,a.waktu,a.waktu_selesai,a.id,a.foto,a.dokumen,a.status, c.nama_level
						FROM kinerja a, kegiatan b, level c
						WHERE a.uraian_kegiatan=b.id and c.nama_level like 'Kepala%'
						order by a.id";
					}
					else{
						session_start();
						$query  = "SELECT b.nama_pegawai,a.uraian,b.waktu,b.waktu_selesai,b.id,b.foto,b.dokumen,b.status,c.atasan,d.nama_atasan
						FROM kegiatan a, kinerja b,pegawai c, atasan d
						WHERE b.uraian_kegiatan=a.id and d.nama_atasan=c.id and c.atasan='$_SESSION[namalengkap]' order by b.id";
					}




					$tampil = mysqli_query($konek, $query);
					$no=1;
					while ($r=mysqli_fetch_array($tampil)){  
						echo "<tr><td>$no</td>
							<td>$r[nama_pegawai]</td>
                			<td>$r[uraian]</td>
							<td>$r[waktu]</td>
							<td>$r[waktu_selesai]</td>
							<td><a href ='dist/foto/".$r['foto']."'><img src='dist/foto/".$r['foto']."' width='50'></a></td>
							<td>";if (empty($r['dokumen'])){
								echo 'Tidak Ada';
							  }
							  else {
								echo 'Terlampir';
							  }
							  echo "</td>
							<td>";if ($r['status']=="0"){
								echo 'Pending';
							  }
							  elseif ($r['status']=="1"){
								echo 'Diterima';
							  }
							  else {
								echo 'Ditolak';
							  }
							  echo "</td>
							
							
							
                  		
							  
                  			<td align=\"center\"><a class=\"btn btn-warning btn-sm\" href=\"".$base_url.$mod."-tinjau-$r[id].html\" title=\"Tinjau Data\">Tinjau Data</a> &nbsp; 
	                    	</td>
							</tr>";
						$no++;
					}
					?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


			  <?php
		break;
		
	case "tinjau":
			$query = "SELECT * FROM kinerja WHERE id='$_GET[id]'";
			$hasil = mysqli_query($konek, $query);
			$res     = mysqli_fetch_array($hasil);
?>
			<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Tinjau Kinerja</h3>
                </div><!-- /.box-header -->
                <form method="POST" enctype="multipart/form-data" action="<?php echo $aksi; ?>?module=approval&act=update" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
					<input type="hidden" name="gambarlama" value="<?php echo $res['foto']; ?>">
					<input type="hidden" name="dokumenlama" value="<?php echo $res['dokumen']; ?>">
					<div class="box-body">
					
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Nama Pegawai</label>
							<div class="col-sm-6">
								<?php
								if($_SESSION['leveluser']=="admin"){
								?>
								<select class="form-control select2" id="nama" name="nama">
									<?php
									$query  = "SELECT * FROM pegawai ORDER BY nama";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['nama_pegawai']==$r['nip'])
										    echo "<option value=\"$r[nama]\" selected>$r[nip] - $r[nama]</option>";
									    else
											echo "<option value=\"$r[nama]\">$r[nip] - $r[nama]</option>";
									}
									?>
								</select>
								<?php
								}
								else{
								?>
								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $_SESSION['namalengkap']; ?>" disabled/>
								<?php
								}
								?>
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Uraian Kegiatan</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="uraian" name="uraian">
									
									<?php
									$query  = "SELECT * FROM kegiatan ORDER BY uraian";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['uraian_kegiatan']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[uraian]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[uraian]</option>";
									}
									?>
								</select>
							</div>
						</div>
							<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Waktu Mulai </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="tgl_selesaix" name="waktu" value="<?php echo $res['waktu'];?>"/>
							</div>
						</div>
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Waktu Selesai </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="tgl_selesaix" name="waktu_selesai" value="<?php echo $res['waktu_selesai'];?>"/>
							</div>
						</div>
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Foto</label>
							<div class="col-sm-6">
								<img src="dist/foto/<?=$res['foto'];?>" width="300"/>
							</div>
						</div>
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Dokumen</label>
						
							<div class="col-sm-6">
								<label for="pembuat" class="col-sm-2 control-label"><a href ="dist/dokumen/"<?php $r['dokumen']?>><?php echo $res['dokumen'];?></a></label>
							</div>
						</div>
					
					<div class="box-footer">
						<button type="submit" class="btn btn-primary" name="approve">Approve</button><button type="submit" class="btn btn-danger" name="tolak">Tolak</button> <button type="button" onclick="self.history.back()" class="btn">Batal</button>
					</div><!-- /.box-footer -->
				</form>
              </div><!-- /.box -->
<?php
		break;
	}
?>
            </div><!-- /.col -->
		</div>
	</section>
<?php
}
?>


