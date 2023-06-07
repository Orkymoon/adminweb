<?php

//Hak Akses Admin
if ($_SESSION['level'] != "Admin") {
    echo "<script>
    alert('Anda tidak berhak mengakses modul ini!');
    document.location='?module=home';
    </script>";
}

$aksi = "modul/mod_masyarakat/aksi_masyarakat.php";
switch (isset($_GET['act']) ? $_GET['act'] : '') {
        // Tampil Agenda
    default:
        echo "<h2>DATA MASYARAKAT</h2>
       <input type=button value='Tambah' onclick=location.href='?module=masyarakat&act=tambah'>
       <table>
       <tr><th>No</th><th>NIK</th><th>Nama</th><th>Username</th><th>Password</th><th>Telp</th><th>Action</th></tr>";
        $tampil = mysqli_query($conn, "SELECT * FROM masyarakat ORDER BY nama ASC");
        $no = 1;
        while ($r = mysqli_fetch_array($tampil)) {
            $id         = $r['id_masyarakat'];
            $nik        = $r['nik'];
            $nama       = $r['nama'];
            $username   = $r['username'];
            $password   = $r['password'];
            $telp       = $r['telp'];

            echo "  <tr>
                    <td>$no</td>
                    <td>$nik</td>
                    <td>$nama</td>
                    <td>$username</td>
                    <td>$password</td>
                    <td>$telp</td>
                    <td>
                        <a href=?module=masyarakat&act=edit&id=$id>Edit</a> 
                        <a href=$aksi?module=masyarakat&act=hapus&id=$id>Hapus</a>
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
