<?php

//Hak Akses Admin
if ($_SESSION['level'] != "Admin") {
    echo "<script>
    alert('Anda tidak berhak mengakses modul ini!');
    document.location='?module=home';
    </script>";
}
$id_petugas = $_SESSION['id_petugas'];
$level = $_SESSION['level'];

$aksi = "modul/mod_petugas/aksi_petugas.php";
switch (isset($_GET['act']) ? $_GET['act'] : '') {
        // Tampil Agenda
    default:
        echo "<h2>DATA PETUGAS</h2>
       <input type=button value='Tambah' onclick=location.href='?module=petugas&act=tambah'>
       <table>
       <tr><th>No</th><th>NIK</th><th>Nama</th><th>Petugas</th><th>Tanggal Masuk</th><th>Tanggal Ditanggapi</th><th>Judul</th><th>Status</th><th>Action</th></tr>";
         $no = 1; 
         if ($level == "Petugas") :
             $tampil = mysqli_query($conn, "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE tanggapan.id_petugas = $id_petugas ORDER BY tanggapan.tgl_tanggapan DESC");
         elseif ($level == "Admin") :
             $tampil = mysqli_query($conn, "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan INNER JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas ORDER BY tanggapan.tgl_tanggapan DESC");
         endif; 
        while ($r = mysqli_fetch_array($tampil)) {
            $id = $r['id_tanggapan'];
            $nik             = $r['nik'];
            $nama   = $r['nama'];
            $nama_petugas   = $r['nama_petugas'];
            $tgl_pengaduan       = $r['tgl_pengaduan'];
            $tgl_tanggapan      = $r['tgl_tanggapan'];

            $judul       = $r['judul'];
            $status           = $r['status'];

            echo "  <tr>
                    <td>$no</td>
                    <td>$nik</td>
                    <td>$nama</td>
                    <td>$nama_petugas</td>
                    <td>$tgl_pengaduan</td>
                    <td>$tgl_tanggapan</td>
                    <td>$judul</td>
                    <td>$status</td>
                    <td>
                        <a href=?module=petugas&act=edit&id=$id>Edit</a> 
                        <a href=$aksi?module=petugas&act=hapus&id=$id>Hapus</a>
                    </td>
                    </tr>";
            $no++;
        }
        echo "</table>";
        break;

        //   Tambah
        case "tambah":
            include "add.php";
        break;

        //   Edit 
        case "edit":
            include "edit.php";
        break;
}
