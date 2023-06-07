<?php
  session_start();
  session_destroy();
  echo "<center>Anda telah sukses keluar sistem <b>[LOGOUT]<b>";
  header('refresh: 3; URL=login.php');
// Apabila setelah logout langsung menuju halaman utama website, aktifkan baris di bawah ini:

//  header('location:http://www.alamatwebsite.com');
?>
