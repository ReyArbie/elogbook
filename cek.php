<html>
<head></head>
<body>
<form>
<table border="1">
<?php
include "config/koneksi.php";
$query  = "SELECT a.nama_pegawai,b.uraian,a.waktu,a.waktu_selesai,a.id,a.foto,a.dokumen,a.status, c.nama_level
						FROM kinerja a, kegiatan b, level c
						WHERE a.uraian_kegiatan=b.id and c.nama_level like 'Kepala%'
						order by a.id";
	$koneksi=mysqli_connect("localhost","root","","db_ekinerja");
	$result=mysqli_query($koneksi,$query);
$no=1;
while($sql=mysqli_fetch_array($result,MYSQLI_ASSOC)){
$id=$sql['id'];
echo"
<tr>
<td>".$no++."</td>
<td>".$sql['nama_pegawai']."</td>
<td>".$sql['uraian']."</td>
<td>".$sql['waktu']."</td>
<td>".$sql['waktu_selesai']."</td>
<td>".$sql['id']."</td>
<td>".$sql['foto']."</td>
<td>".$sql['dokumen']."</td>
<td>".$sql['status']."</td>
<td>".$sql['nama_level']."</td>
</tr>";
}
?>
</table>
</form>
</body>
</head>
</html>