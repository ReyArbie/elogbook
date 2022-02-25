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
  if ($module=='approval' AND $act=='hapus'){
    $hapus = "DELETE FROM kinerja WHERE id='$_GET[id]'";
    mysqli_query($konek, $hapus);
    
    header("location:".$base_url.$module);
  }
  
  
  // Update templates
  if ($module=='approval' AND $act=='update'){
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
  

	
    
    $approve = "UPDATE kinerja SET status='1' WHERE id='$id'";
    $tolak = "UPDATE kinerja SET status='2' WHERE id='$id'";
    if(isset($_POST['approve'])){
      mysqli_query($konek, $approve);
    }
    elseif(isset($_POST['tolak'])){
      mysqli_query($konek, $tolak);
    }

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
