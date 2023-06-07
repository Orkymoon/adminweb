<?php

//Hak Akses Admin
if ($_SESSION['level'] != "Admin") {
    echo "<script>
    alert('Anda tidak berhak mengakses modul ini!');
    document.location='?module=home';
    </script>";
}

$aksi = "modul/mod_pengaduan/aksi_pengaduan.php";
switch (isset($_GET['act']) ? $_GET['act'] : '') {
        // Tampil Agenda
    default:
        echo "<h2>DATA PETUGAS</h2>
       <input type=button value='Tambah' onclick=location.href='?module=petugas&act=tambah'>
       <table>
       <tr><th>No</th><th>NIK</th><th>Nama</th><th>Tanggal Masuk</th><th>Judul</th><th>Status</th><th>Action</th></tr>";
        $tampil = mysqli_query($conn, "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE status = 'Proses' ORDER BY pengaduan.tgl_pengaduan DESC");
        $no = 1;
        while ($r = mysqli_fetch_array($tampil)) {
            $id = $r['id_pengaduan'];
            $nik             = $r['nik'];
            $nama   = $r['nama'];
            $tgl_pengaduan       = $r['tgl_pengaduan'];
            $judul       = $r['judul'];
            $status           = $r['status'];

            echo "  <tr>
                    <td>$no</td>
                    <td>$nik</td>
                    <td>$nama</td>
                    <td>$tgl_pengaduan</td>
                    <td>$judul</td>
                    <td>$status</td>
                    <td>
                        <a href=?module=pengaduan&act=edit&id=$id>Edit</a> 
                        <a href=$aksi?module=pengaduan&act=hapus&id=$id>Hapus</a>
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
?>