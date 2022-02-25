<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modul/mod_pegawai/aksi_pegawai.php";

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
		<h1>Manajemen Data Pegawai</h1>
		<ol class="breadcrumb">
            <li><a class="btn btn-warning btn-sm" href="<?php echo $base_url.$mod; ?>-tambah.html"><i class="fa fa-plus"></i>Tambah Pegawai</a></li>
        </ol>
	</section>
	<hr>
                <div class="box-body">
                  <table id="datatemplates" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
						<th>Jabatan</th>
						<th>Seksi</th>
						<th>Instalasi</th>
						<th>Nama Atasan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$query  = "SELECT a.nip,a.nama,c.nama_atasan as atasan,d.nama_jabatan as jabatan, b.nama_seksi as seksi, e.nama_instalasi as instalasi, a.id
FROM `pegawai` a, `seksi` b, `atasan` c, `jabatan` d, `instalasi` e
WHERE a.seksi=b.id and a.atasan=c.id and a.jabatan=d.id and a.instalasi=e.id order by a.id";
					$tampil = mysqli_query($konek, $query);
					$no=1;
					while ($r=mysqli_fetch_array($tampil)){  
						echo "<tr><td>$no</td>
							<td>$r[nip]</td>
                			<td>$r[nama]</td>
							<td>$r[jabatan]</td>
							<td>$r[seksi]</td>
							<td>$r[instalasi]</td>
							<td>$r[atasan]</td>
                  		
                  		
                  		
                  			<td align=\"center\"><a href=\"".$base_url.$mod."-edit-$r[id].html\" title=\"Edit Data\"><i class=\"fa fa-pencil\"></i></a> &nbsp; 
                			<a href=\"$aksi?module=pegawai&act=hapus&id=$r[id]\" onclick=\"return confirm('APAKAH ANDA YAKIN AKAN MENGHAPUS DATA INI ?')\" title=\"Hapus Data\"><i class=\"fa fa-trash text-red\"></i></a> &nbsp; 
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
		
		case "tambah":
?>
			<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah Pegawai</h3>
                </div><!-- /.box-header -->
                <form method="POST" action="<?php echo $aksi; ?>?module=pegawai&act=input" class="form-horizontal">
					<div class="box-body">
					<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">NIP</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nip" name="nip" />
							</div>
						</div>
							<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nama" name="nama" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Jabatan</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_jabatan" name="nama_jabatan">
									<option value="0" selected>- Pilih Jabatan -</option>
									<?php
									$query  = "SELECT * FROM jabatan ORDER BY nama_jabatan";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[id]\">$r[nama_jabatan]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Seksi</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_seksi" name="nama_seksi">
									<option value="0" selected>- Pilih Seksi -</option>
									<?php
									$query  = "SELECT * FROM seksi ORDER BY nama_seksi";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[id]\">$r[nama_seksi]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Instalasi/Unit</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_instalasi" name="nama_instalasi">
									<option value="0" selected>- Pilih Seksi -</option>
									<?php
									$query  = "SELECT * FROM instalasi ORDER BY nama_instalasi";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[id]\">$r[nama_instalasi]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Nama Atasan</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_atasan" name="nama_atasan">
									<option value="0" selected>- Pilih Atasan -</option>
									<?php
									$query  = "SELECT * FROM atasan ORDER BY nama_atasan";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[id]\">$r[nama_atasan]</option>";
									}
									?>
								</select>
							</div>
						</div>
						</div>
						
					</div><!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button> <button type="button" onclick="self.history.back()" class="btn">Batal</button>
					</div><!-- /.box-footer -->
				</form>
              </div><!-- /.box -->
<?php
		break;
		
	case "edit":
			$query = "SELECT * FROM pegawai WHERE id='$_GET[id]'";
			$hasil = mysqli_query($konek, $query);
			$res     = mysqli_fetch_array($hasil);
?>
			<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Pegawai</h3>
                </div><!-- /.box-header -->
                <form method="POST" action="<?php echo $aksi; ?>?module=pegawai&act=update" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
					<div class="box-body">
					
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">NIP</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nip" name="nip" value="<?php echo $res['nip'];?>"/>
							</div>
						</div>
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Nama </label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $res['nama'];?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Jabatan</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_jabatan" name="nama_jabatan">
									
									<?php
									$query  = "SELECT * FROM jabatan ORDER BY nama_jabatan";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['jabatan']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[nama_jabatan]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[nama_jabatan]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Seksi</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_seksi" name="nama_seksi">
									
									<?php
									$query  = "SELECT * FROM seksi ORDER BY nama_seksi";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['nama_seksi']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[nama_seksi]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[nama_seksi]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Seksi</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_instalasi" name="nama_instalasi">
									<?php
									$query  = "SELECT * FROM instalasi ORDER BY nama_instalasi";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['nama_instalasi']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[nama_instalasi]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[nama_instalasi]</option>";
									}
									?>
								</select>
							</div>
						</div>
					<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Nama Atasan</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nama_atasan" name="nama_atasan">
									
									<?php
									$query  = "SELECT * FROM atasan ORDER BY nama_atasan";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['atasan']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[nama_atasan]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[nama_atasan]</option>";
									}
									?>
								</select>
							</div>
						</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Update</button> <button type="button" onclick="self.history.back()" class="btn">Batal</button>
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