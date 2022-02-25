<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  $aksi = "modul/mod_jabatan/aksi_jabatan.php";

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
		<h1>Manajemen Data Jabatan</h1>
		<ol class="breadcrumb">
            <li><a class="btn btn-warning btn-sm" href="<?php echo $base_url.$mod; ?>-tambah.html"><i class="fa fa-plus"></i>Tambah Jabatan</a></li>
        </ol>
	</section>
	<hr>
                <div class="box-body">
                  <table id="datatemplates" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
						<th>Level</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$query  = "SELECT a.id, a.nama_jabatan, b.nama_level as level
					FROM jabatan a, level b WHERE a.level=b.id
					order by a.id ASC";
					$tampil = mysqli_query($konek, $query);
					$no=1;
					while ($r=mysqli_fetch_array($tampil)){  
						echo "<tr><td>$no</td>
							<td>$r[level]</td>
							<td>$r[nama_jabatan]</td>
                			
                  		
							<td align=\"center\"><a href=\"".$base_url.$mod."-edit-$r[id].html\" title=\"Edit Data\"><i class=\"fa fa-pencil\"></i></a> &nbsp; 
                			<a href=\"$aksi?module=jabatan&act=hapus&id=$r[id]\" onclick=\"return confirm('APAKAH ANDA YAKIN AKAN MENGHAPUS DATA INI ?')\" title=\"Hapus Data\"><i class=\"fa fa-trash text-red\"></i></a> &nbsp; 
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
                  <h3 class="box-title">Tambah Data Jabatan</h3>
                </div><!-- /.box-header -->
                <form method="POST" action="<?php echo $aksi; ?>?module=jabatan&act=input" class="form-horizontal">
					<div class="box-body">
						<div class="form-group">
			
						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Level</label>
							<div class="col-sm-6">
							<select class="form-control select2" id="level" name="level">
									<option value="0" selected>- Pilih Level -</option>
									<?php
									$query  = "SELECT * FROM level ORDER BY id";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										
										echo "<option value=\"$r[id]\">$r[id] - $r[nama_level]</option>";
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Jabatan</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"/>
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
			$query = "SELECT * FROM jabatan WHERE id='$_GET[id]'";
			$hasil = mysqli_query($konek, $query);
			$res     = mysqli_fetch_array($hasil);
?>
			<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Data Jabatan</h3>
                </div><!-- /.box-header -->
                <form method="POST" action="<?php echo $aksi; ?>?module=jabatan&act=update" class="form-horizontal">
					<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
					<div class="box-body">
					
					<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Level</label>
							<div class="col-sm-6">
							<select class="form-control select2" id="level" name="level">
									<?php
									$query  = "SELECT * FROM level ORDER BY id";
									$tampil = mysqli_query($konek, $query);
									while($r=mysqli_fetch_array($tampil)){
										if($res['level']==$r['id'])
										    echo "<option value=\"$r[id]\" selected>$r[id] - $r[nama_level]</option>";
									    else
											echo "<option value=\"$r[id]\">$r[id] - $r[nama_level]</option>";
									}
									?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="pembuat" class="col-sm-2 control-label">Jabatan</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan" value="<?php echo $res['nama_jabatan'];?>"/>
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