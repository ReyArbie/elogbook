<?php
session_start();

// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";
  include "../../config/config.php";
  include "../../config/upload.php";

  $module = $_GET['module'];
  $act    = $_GET['act'];

  // Hapus templates
  if ($module=='kinerja' AND $act=='hapus'){
    $hapus = "DELETE FROM kinerja WHERE id='$_GET[id]'";
    mysqli_query($konek, $hapus);
    
    header("location:".$base_url.$module);
  }
  
  

// Input templates
  if ($module=='kinerja' AND $act=='input'){
  $nama_pegawai		= $_POST['nama'];
	$uraian_kegiatan	= $_POST['uraian'];
  $datetime         = $_POST['waktu'];
  $datetime_selesai = $_POST['waktu_selesai'];
  $foto             = uploadfoto();
  $dokumen          = uploaddokumen();


//echo $datetime;
    $input = "INSERT INTO kinerja(nama_pegawai, uraian_kegiatan, waktu, waktu_selesai,foto,dokumen) VALUES('$nama_pegawai', '$uraian_kegiatan','$datetime','$datetime_selesai','$foto','$dokumen')";
    mysqli_query($konek, $input);
    
//    echo $base_url.$module;    

    header("location:".$base_url.$module);
  }

  // Update templates
  elseif ($module=='kinerja' AND $act=='update'){
    $id            			 = $_POST['id'];
    $nama_pegawai			= $_POST['nama'];
    $uraian_kegiatan        = $_POST['uraian'];
	$waktu        			= $_POST['waktu'];
	$waktu_selesai        	= $_POST['waktu_selesai'];
  $gambar_lama        = $_POST['gambarlama'];
  $dokumen_lama        = $_POST['dokumenlama'];

  //cek dokumen baru
  if($_FILES['dokumen']['error'] == 4){
    $dokumen   =   $dokumen_lama;
  } else {
    $dokumen        			= uploaddokumen();
  }

  //cek gambar baru
  if($_FILES['foto']['error'] == 4){
    $foto   =   $gambar_lama;
  } else {
      $foto        			= uploadfoto();
  }
  

	
    
    $update = "UPDATE kinerja SET nama_pegawai='$nama_pegawai', uraian_kegiatan='$uraian_kegiatan', waktu='$waktu', waktu_selesai='$waktu_selesai', foto='$foto', dokumen='$dokumen' WHERE id='$id'";
    mysqli_query($konek, $update);

    header("location:".$base_url.$module);
  }
  
   // Approv templates

 
   

  // Aktifkan templates
  elseif ($module=='templates' AND $act=='aktifkan'){
    $query1 = mysqli_query($konek, "UPDATE templates SET aktif='Y' WHERE id_templates='$_GET[id]'");
    $query2 = mysqli_query($konek, "UPDATE templates SET aktif='N' WHERE id_templates!='$_GET[id]'");

    header("location:../../media.php?module=".$module);
  }
}
?>
