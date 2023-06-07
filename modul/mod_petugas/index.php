<?php

//Hak Akses Admin
if ($_SESSION['level'] != "Admin") {
    echo "<script>
    alert('Anda tidak berhak mengakses modul ini!');
    document.location='?module=home';
    </script>";
}

$aksi = "modul/mod_petugas/aksi_petugas.php";
switch (isset($_GET['act']) ? $_GET['act'] : '') {
        // Tampil Agenda
    default:
        echo "<h2>DATA PETUGAS</h2>
       <input type=button value='Tambah' onclick=location.href='?module=petugas&act=tambah'>
       <table>
       <tr><th>No</th><th>Nama</th><th>Username</th><th>Password</th><th>Telp</th><th>Level</th><th>Action</th></tr>";
        $tampil = mysqli_query($conn, "SELECT * FROM petugas ORDER BY id_petugas DESC");
        $no = 1;
        while ($r = mysqli_fetch_array($tampil)) {
            $id             = $r['id_petugas'];
            $nama_petugas   = $r['nama_petugas'];
            $username       = $r['username'];
            $password       = $r['password'];
            $telp           = $r['telp'];
            $level          = $r['level'];

            echo "  <tr>
                    <td>$no</td>
                    <td>$nama_petugas</td>
                    <td>$username</td>
                    <td>$password</td>
                    <td>$telp</td>
                    <td>$level</td>
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
?>