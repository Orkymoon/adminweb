<?php
session_start();
include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";
include "../../config/library.php";

$module=$_GET['module'];
$act=isset($_GET['act']) ? $_GET['act']:'';

// Hapus 
if ($module=='masyarakat' AND $act=='hapus'){
  mysqli_query($conn,"DELETE FROM masyarakat WHERE id_masyarakat='$_GET[id]'");
  header('location:../../index.php?module='.$module);
}

// Input 
elseif ($module=='masyarakat' AND $act=='input'){
  $password = htmlspecialchars(md5($_POST['password']));
  mysqli_query($conn,"INSERT INTO masyarakat(nik,
                                  nama, 
                                  username,
                                  password,
                                  telp) 
					                VALUES('$_POST[nik]',
					                       '$_POST[nama]', 
                                 '$_POST[username]',
                                 '$password',
                                 '$_POST[telp]')");
  header('location:../../index.php?module='.$module);
}

// Update 
elseif ($module=='masyarakat' AND $act=='update'){
  mysqli_query($conn,"UPDATE masyarakat SET nama = '$_POST[nama]', username = '$_POST[username]', telp = '$_POST[telp]' WHERE nik = '$_POST[nik]'");
  header('location:../../index.php?module='.$module);
}
?>
