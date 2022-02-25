<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modul/mod_user/aksi_user.php";

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
		<h1>Manajemen User</h1>
		<ol class="breadcrumb">
            <li><a class="btn btn-warning btn-sm" href="<?php echo $base_url.$mod; ?>-tambah.html"><i class="fa fa-plus"></i>Tambah User</a></li>
        </ol>
	</section>
	<hr>
                <div class="box-body">
                  <table id="datatemplates" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                       <th>No</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
						<th>Nomor Telepon</th>
						<th>Email</th>
						<th>Level</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$query  = "SELECT id,username,nama_lengkap,email,no_telp,level,foto
					FROM users";
					$tampil = mysqli_query($konek, $query);
					$no=1;
					while ($r=mysqli_fetch_array($tampil)){  
						echo  "<tr><td>$no</td>
							<td>$r[username]</td>
							<td>$r[nama_lengkap] </td>
							<td>$r[no_telp] </td>
							<td>$r[email] </td>
							<td>$r[level] </td>
							<td><img src='dist/img/".$r['foto']."' width='50'></td>
                			
                  		
							<td align=\"center\"><a href=\"".$base_url.$mod."-edit-$r[id].html\" title=\"Edit Data\"><i class=\"fa fa-pencil\"></i></a> &nbsp; 
                			<a href=\"$aksi?module=user&act=hapus&id=$r[id]\" onclick=\"return confirm('APAKAH ANDA YAKIN AKAN MENGHAPUS DATA INI ?')\" title=\"Hapus Data\"><i class=\"fa fa-trash text-red\"></i></a> &nbsp; 
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
                  <h3 class="box-title">Tambah User</h3>
                </div><!-- /.box-header -->
                <form method="POST" enctype="multipart/form-data" action="<?php echo $aksi; ?>?module=user&act=input" class="form-horizontal" onsubmit="return validasi_input(this)">
					<div class="box-body">
					
						<div class="form-group">
							<label for="album" class="col-sm-3 control-label">Username</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nip" name="nip">
									<option value="0" selected>- Pilih NIP -</option>
									<?php
									$query  = "SELECT * FROM pegawai";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[nip]\">$r[nip] - $r[nama]</option>";
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="col-sm-3 control-label">Password</label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="password" name="password" />
							</div>
						</div>

						<div class="form-group">
							<label for="pembuat" class="col-sm-3 control-label">Nama</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label">Email</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="email" name="email" />
							</div>
						</div>
						
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label">No. Telepon</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="no_telp" name="no_telp" />
							</div>
						</div>

						<div class="form-group">
							<label for="album" class="col-sm-3 control-label">Level</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="level" name="level">
								<option value="0" selected>- Pilih Level -</option>
									<?php
									$query  = "SELECT * FROM tingkat ORDER BY id";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[nama_tingkat]\">$r[nama_tingkat]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="pembuat" class="col-sm-3 control-label">Foto</label>
						
							<div class="col-sm-6">
								<input type="file" class="form-control" id="pasfoto" name="pasfoto"/>
							</div>
						</div>
						
					</div><!-- /.box-body -->
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button> <button type="button" onclick="self.history.back()" class="btn">Batal</button>
					</div><!-- /.box-footer -->
				</form>
				</div>
              </div><!-- /.box -->
<?php
		break;
		
case "edit":
			$query = "SELECT * FROM users WHERE id='$_GET[id]'";
			$hasil = mysqli_query($konek, $query);
			$res     = mysqli_fetch_array($hasil);
?>
			<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit User</h3>
                </div><!-- /.box-header -->
                <form method="POST" enctype="multipart/form-data" action="<?php echo $aksi; ?>?module=user&act=update" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
					<input type="hidden" name="pasfotolama" value="<?php echo $res['foto']; ?>">
					<div class="box-body">
					
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Username</label>
							<div class="col-sm-6">
								<select class="form-control select2" id="nip" name="nip" disabled>
									
									<?php
									$query  = "SELECT * FROM pegawai ORDER BY nip";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['username']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[nip]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[nip]</option>";
									}
									?>
								</select>
							</div>
						</div>


						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Password </label>
							<div class="col-sm-6">
								<input type="password" class="form-control" id="password" name="password"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $res['nama_lengkap']; ?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="email" name="email" value="<?php echo $res['email']; ?>"/>
							</div>
						</div>
						
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label">No. Telepon</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="no_telp" name="no_telp" value="<?php echo $res['no_telp']; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label for="album" class="col-sm-2 control-label">Level</label>
							<div class="col-sm-6">
							<select class="form-control select2" id="level" name="level">
									<?php
									$query  = "SELECT * FROM tingkat ORDER BY id";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['level']==$r['nama_tingkat'])
										    echo "<option value=\"$r[nama_tingkat]\" selected>$r[nama_tingkat]</option>";
									    else
											echo "<option value=\"$r[nama_tingkat]\">$r[nama_tingkat]</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Foto</label>
						
							<div class="col-sm-6">
								<input type="file" class="form-control" id="pasfoto" name="pasfoto" />
								<img src="dist/img/<?=$res['foto'];?>" width="300"/>
							</div>
						</div>
					
				
							
						</div>
					</div><!-- /.box-body -->
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