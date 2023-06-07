<?php
session_start();
include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";
include "../../config/library.php";

$module = $_GET['module'];
$act = isset($_GET['act']) ? $_GET['act'] : '';

// Hapus 
if ($module == 'petugas' and $act == 'hapus') {
    mysqli_query($conn, "DELETE FROM petugas WHERE id_petugas='$_GET[id]'");
    header('location:../../index.php?module=' . $module);
}

// Input 
elseif ($module == 'petugas' and $act == 'input') {
    mysqli_query($conn, "INSERT INTO petugas (nama_petugas, username, password, telp, level) VALUES ('$_POST[nama_petugas]', '$_POST[username]', '$_POST[password]', '$_POST[telp]', '$_POST[level]')");
    header('location:../../index.php?module=' . $module);
}

// Update 
elseif ($module == 'petugas' and $act == 'update') {
    mysqli_query($conn, "UPDATE petugas SET nama_petugas = '$_POST[nama_petugas]', username = '$_POST[username]', telp = '$_POST[telp]', level = '$_POST[level]' WHERE id_petugas = '$_POST[id]'");
    header('location:../../index.php?module=' . $module);
}
