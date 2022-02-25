<?php
function uploadfoto(){
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size']; 
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];
  $target_dir = "../../dist/foto/";
 

  $target_file = $target_dir.$namaFileBaru;


  //upload harus gambar
  $ekstensiGambarValid = ['jpg','jpeg','png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
    echo "<script>
              alert('Yang Anda Upload Bukan Gambar!');
          </script>";
    return false; 
  }

  // cek ukuran
  if($ukuranFile > 5000000) {
      echo "<script>
              alert('Ukuran Gambar Terlalu Besar!');
            </script>";
  return false; 
  }
  //lolos
  $namaFileBaru = uniqid();
  $namaFileBaru .='.';
  $namaFileBaru .=$ekstensiGambar;
  $target_file = $target_dir.$namaFileBaru;
  copy($tmpName, $target_file);

  return $namaFileBaru;
} 

function uploaddokumen(){
  $total = count($_FILES['dokumen']['name']);

  for($i; $i < $total; $i++){
    $namaFile = $_FILES['dokumen']['name'][$i];
    $tmpName = $_FILES['dokumen']['tmp_name'][$i];
    $target_dir = "../../dist/dokumen/";
    $namaFileBaru = uniqid() . '-' . $namaFile;
    $target_file = $target_dir.$namaFileBaru;
    copy($tmpName, $target_file);
  }

   $namaFile;
}

function uploadprofil(){
  $namaFile = $_FILES['pasfoto']['name'];
  $ukuranFile = $_FILES['pasfoto']['size']; 
  $error = $_FILES['pasfoto']['error'];
  $tmpName = $_FILES['pasfoto']['tmp_name'];
  $target_dir = "../../dist/img/";
 

  $target_file = $target_dir.$namaFileBaru;


  //upload harus gambar
  $ekstensiGambarValid = ['jpg','jpeg','png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
    echo "<script>
              alert('Yang Anda Upload Bukan Gambar!');
          </script>";
    return false; 
  }

  // cek ukuran
  if($ukuranFile > 5000000) {
      echo "<script>
              alert('Ukuran Gambar Terlalu Besar!');
            </script>";
  return false; 
  }
  //lolos
  $namaFileBaru = uniqid();
  $namaFileBaru .='.';
  $namaFileBaru .=$ekstensiGambar;
  $target_file = $target_dir.$namaFileBaru;
  copy($tmpName, $target_file);

  return $namaFileBaru;
} 
?>