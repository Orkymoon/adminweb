<?php
session_start();
include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";
include "../../config/library.php";

$module = $_GET['module'];
$act = isset($_GET['act']) ? $_GET['act'] : '';

// Hapus 
if ($module == 'petugas' and $act == 'hapus') {
    $foto = $_POST['foto'];
    $direktori = "src/report/img/";

    unlink($direktori . $foto);

    mysqli_query($conn, "DELETE FROM pengaduan WHERE id_pengaduan = '$_POST[id_pengaduan]'");
    header('location:../../index.php?module=' . $module);
}

// Input 
elseif ($module == 'petugas' and $act == 'input') {
    $password = htmlspecialchars(md5($_POST['password']));
    mysqli_query($conn, "INSERT INTO petugas (nama_petugas, username, password, telp, level) VALUES ('$_POST[nama_petugas]', '$_POST[username]', '$password', '$_POST[telp]', '$_POST[level]')");
    header('location:../../index.php?module=' . $module);
}

// Update 
elseif ($module == 'petugas' and $act == 'update') {
    mysqli_query($conn, "UPDATE petugas SET nama_petugas = '$_POST[nama_petugas]', username = '$_POST[username]', telp = '$_POST[telp]', level = '$_POST[level]' WHERE id_petugas = '$_POST[id]'");
    header('location:../../index.php?module=' . $module);
}
