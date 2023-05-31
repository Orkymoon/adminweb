<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=isset($_GET['act']) ? $_GET['act']:'';

// Hapus user
if ($module=='user' AND $act=='hapus'){
  mysqli_query($conn,"DELETE FROM users WHERE username='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input user
elseif ($module=='user' AND $act=='input'){
  // $pass=md5($_POST(password));
  $password = md5($_POST['password']);
  mysqli_query($conn,"INSERT INTO users(username,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp) 
	                       VALUES('$_POST[username]',
                                '$password',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]')");
  header('location:../../media.php?module='.$module);
}

// Update user
elseif ($module=='user' AND $act=='update'){
  if (empty($_POST[password])) {
    mysqli_query($conn,"UPDATE users SET username       = '$_POST[username]',
                                  nama_lengkap   = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]'  
                           WHERE  username       = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysqli_query($conn,"UPDATE users SET username    = '$_POST[username]',
                                 password        = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
                                 email           = '$_POST[email]',  
                                 blokir          = '$_POST[blokir]',  
                                 no_telp         = '$_POST[no_telp]'  
                           WHERE username        = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
?>
