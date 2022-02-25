<?php
include "config/koneksi.php";

// fungsi untuk menghindari injeksi dari user yang jahil
function anti_injection($data){
	$filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
	return $filter;
}

$username = anti_injection($_POST['username']);
$password = anti_injection(md5($_POST['password']));

// menghindari sql injection
$injeksi_username = mysqli_real_escape_string($konek, $username);
$injeksi_password = mysqli_real_escape_string($konek, $password);

// echo 'username = '.$username;
// echo'<br>';
// echo 'pass terenkripsi ='.$password;

// echo'<br>';
// echo 'injeksi username ='.$injeksi_username;
// echo'<br>';
// echo 'injeksi username ='.$injeksi_password;

if (!ctype_alnum($injeksi_username) OR !ctype_alnum($injeksi_password)){
	echo "Tidak bisa login dengan di injeksi.";
}
else {
	$querylogin = 	"SELECT * FROM users WHERE username='$username' AND password='$password' AND blokir='N'";

	$sql_query 	= 	"SELECT  u.id, u.username, u.password, u.level as level_user,P.jabatan as kode_jabatan,p.nip ,p.nama,  j.nama_jabatan , u.foto,
					l.nama_level as jenis_jabatan, s.nama_seksi, i.nama_instalasi, a.nip as nip_atasan, a.nama_atasan, u.email , u.no_telp , u.blokir
					from users u 
					LEFT JOIN pegawai p ON p.nip = u.username 
					left join jabatan j on j.`id` = p.jabatan 
					left join seksi s on s.id = p.seksi 
					left join instalasi i on i.id = p.instalasi 
					left join level l on l.id = j.`level`
					left join atasan a on a.id = p.atasan 
					where u.username='$username'
					and u.password='$password' and u.blokir = 'N'
					ORDER BY u.username";

	$login  = mysqli_query($konek, $querylogin);
	$ketemu = mysqli_num_rows($login);

	// echo 'ketemu ='.$ketemu;

	if($ketemu==1){
		$data  	= mysqli_query($konek, $sql_query);
	}
	$r      = mysqli_fetch_array($data);

	// Apabila username dan password ditemukan (benar)
	if ($ketemu > 0){
		if($r['level']!="admin"){
			session_start();

			$_SESSION['namauser']   	= $r['username'];
			$_SESSION['passuser']    	= $r['password'];
			$_SESSION['namalengkap'] 	= $r['nama'];
			$_SESSION['leveluser']   	= $r['level_user'];
			$_SESSION['id']          	= $r['id'];
			$_SESSION['jabatan'] 	 	= $r['nama_jabatan'];
			$_SESSION['kode_jabatan'] 	= $r['kode_jabatan'];
			$_SESSION['atasan']			= $r['nama_atasan'];
			$_SESSION['email']			= $r['email'];
			$_SESSION['telp']			= $r['no_telp'];
			$_SESSION['foto']          	= $r['foto'];
			//echo"tampil ".$r['nama'];
			// bikin id_session yang unik dan mengupdatenya agar slalu berubah 
			// agar user biasa sulit untuk mengganti password Administrator 
			$sid_lama = session_id();
			session_regenerate_id();
			$sid_baru = session_id();
			mysqli_query($konek, "UPDATE users SET id_session='$sid_baru' WHERE username='$username'");
			
			
			  header("location:".$base_url."beranda");
			}
		}
		else{
			session_start();
			
			// bikin variabel session
			$_SESSION['namauser']    	= $r['username'];
			$_SESSION['passuser']    	= $r['password'];
			$_SESSION['namalengkap'] 	= $r['nama'];
			$_SESSION['leveluser']   	= $r['level_user'];
			$_SESSION['jabatan'] 		= $r['nama_jabatan'];
			$_SESSION['seksi']			= $r['nama_seksi'];
			$_SESSION['instalasi']		= $r['nama_instalasi'];
			$_SESSION['atasan']			= $r['nama_atasan'];
			$_SESSION['id']         	= $r['id'];
			$_SESSION['foto']          	= $r['foto'];
			$_SESSION['email']			= $r['email'];
			$_SESSION['telp']			= $r['no_telp'];
			
			// bikin id_session yang unik dan mengupdatenya agar slalu berubah 
			// agar user biasa sulit untuk mengganti password Administrator 
			$sid_lama = session_id();
			session_regenerate_id();
			$sid_baru = session_id();
			mysqli_query($konek, "UPDATE users SET id_session='$sid_baru' WHERE username='$username'");

			header("location:".$base_url."beranda");

	}


	
}
?>