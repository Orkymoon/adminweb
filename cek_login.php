<?php
include "config/koneksi.php";
function antiinjection($data){
  global $conn;
  $filter_sql = mysqli_real_escape_string($conn,$data);
  $filter_sql = stripslashes(strip_tags(htmlspecialchars($filter_sql,ENT_QUOTES)));
  return $filter_sql;
}

$username = antiinjection($_POST['username']);
$pass     = antiinjection(md5($_POST['password']));

$login=mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION['namauser']     = $r['username'];
  $_SESSION['namalengkap']  = $r['nama_lengkap'];
  $_SESSION['passuser']     = $r['password'];
  $_SESSION['leveluser']    = $r['level'];
  
  echo "<center>LOGIN BERHASIL <br>"; 

  header('location:media.php?module=home');
}
else{
  echo "<link href=../config/adminstyle.css rel=stylesheet type=text/css>";
  echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau accountedang d Anda siblokir.<br>";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
?>
