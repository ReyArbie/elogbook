<?php
session_start();
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = '../../index.php'</script>";
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else{
  include "../../config/koneksi.php";

  $module = $_GET['module'];
  $act    = $_GET['act'];

  // Hapus templates
  if ($module=='kegiatan' AND $act=='hapus'){
    $hapus = "DELETE FROM kegiatan WHERE id='$_GET[id]'";
    mysqli_query($konek, $hapus);
    
    header("location:".$base_url.$module);
  }

  // Input templates
  if ($module=='kegiatan' AND $act=='input'){
      $uraian        = $_POST['uraian'];
      $jabatan          = $_POST['jabatan'];
  
	

	
	
    $input = "INSERT INTO kegiatan(uraian,jabatan) VALUES('$uraian','$jabatan')";
   mysqli_query($konek, $input);
	
	
	
	
    
    header("location:".$base_url.$module);
  }

  // Update templates
  elseif ($module=='kegiatan' AND $act=='update'){
    $id             = $_POST['id'];
    $uraian		= $_POST['uraian'];
   $jabatan       =$_POST['jabatan'];
    
    $update = "UPDATE kegiatan SET  uraian='$uraian',jabatan='$jabatan' WHERE id='$id'";
    mysqli_query($konek, $update);

     header("location:".$base_url.$module);
  }

  // Aktifkan templates
  elseif ($module=='templates' AND $act=='aktifkan'){
    $query1 = mysqli_query($konek, "UPDATE templates SET aktif='Y' WHERE id_templates='$_GET[id]'");
    $query2 = mysqli_query($konek, "UPDATE templates SET aktif='N' WHERE id_templates!='$_GET[id]'");

   header("location:".$base_url.$module);
  }
}
?>
