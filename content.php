<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script>alert('Untuk mengakses modul, Anda harus login dulu.'); window.location = 'index.php'</script>"; 
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else{
	
	include "config/library.php";
	
	

  // Home (Beranda)
  if ($_GET['module']=='beranda'){               
    
      include "modul/mod_beranda/beranda.php";
      
  }

 // Home (Beranda)
 if ($_GET['module']=='profil'){               
    
  include "modul/mod_profil/profil.php";
  
}

  // Manajemen User
  elseif ($_GET['module']=='user'){
    
      include "modul/mod_user/user.php";
    
  }

   // Manajemen Jabatan
  elseif ($_GET['module']=='jabatan'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_jabatan/jabatan.php";
    }
  }


   // Seksi
  elseif ($_GET['module']=='seksi'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_seksi/seksi.php";
    }
  }

   // Instalasi
   elseif ($_GET['module']=='instalasi'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_instalasi/instalasi.php";
    }
  }
  
     // Atasan
  elseif ($_GET['module']=='atasan'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_atasan/atasan.php";
    }
  }
  
   // Approval
  elseif ($_GET['module']=='approval'){
    
      include "modul/mod_approval/approval.php";
    
  }
  
    // Pegawai
  elseif ($_GET['module']=='pegawai'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_pegawai/pegawai.php";
    }
  }
  
    // Kegiatan
  elseif ($_GET['module']=='kegiatan'){
   
      include "modul/mod_kegiatan/kegiatan.php";
    
  }
  
     // Kinerja
  elseif ($_GET['module']=='kinerja'){
    
      include "modul/mod_kinerja/kinerja.php";
    
  }

// Laporan Harian
  elseif ($_GET['module']=='laporanharian'){
   
      include "modul/mod_laporanharian/laporanharian.php";
    
  }
  // Laporan Bulanan
  elseif ($_GET['module']=='laporanbulanan'){
   
      include "modul/mod_laporanbulanan/laporanbulanan.php";
    
  }

  // Hubungi Kami
  elseif ($_GET['module']=='waktu'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_waktu/waktu.php";
    }
  }

  // Menu Website
  elseif ($_GET['module']=='menu'){
    if ($_SESSION['leveluser']=='admin'){
      include "modul/mod_menu/menu.php";
    }
  }
    // Menu Website user
  elseif ($_GET['module']=='menu'){
    if ($_SESSION['leveluser']=='user'){
      include "modul/mod_menu/menu.php";
    }
  }

}
?>