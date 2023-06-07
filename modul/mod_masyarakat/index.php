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
        $tampil = mysqli_query($conn, "SELECT * FROM masyarakat ORDER BY id_masyarakat DESC");
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
        echo "<h2>Tambah Masyarakat</h2>
          <form method=POST action='$aksi?module=masyarakat&act=input'>
          <table>
          <tr><td>NIK</td>      <td> : <input type=number name='nik' size=60></td></tr>
          <tr><td>Nama</td>      <td> : <input type=text name='nama' size=60></td></tr>
          <tr><td>Username</td>      <td> : <input type=text name='username' size=60></td></tr>
          <tr><td>Password</td>      <td> : <input type=text name='password' size=60></td></tr>
          <tr><td>Telepon</td>      <td> : <input type=number name='telp' size=60></td></tr>
          
          <tr><td colspan=2><input type=submit value=Simpan>
          <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table>
          </form>";
        break;

        //   Edit 
        case "edit":
        $edit = mysqli_query($conn, "SELECT * FROM masyarakat WHERE id_masyarakat='$_GET[id]'");
        $r    = mysqli_fetch_array($edit);

        echo "<h2>Edit Masyarakat</h2>
          <form method=POST action=$aksi?module=masyarakat&act=update>
          <input type=hidden name=id value=$r[id_masyarakat]>
          <table>
          <tr><td>NIK</td>      <td> : <input type=text name='nik' size=60 value='$r[nik]'></td></tr>
          <tr><td>Nama</td>      <td> : <input type=text name='nama' size=60 value='$r[nama]'></td></tr>
          <tr><td>Username</td>      <td> : <input type=text name='username' size=60 value='$r[username]'></td></tr>
          <tr><td>Password</td>      <td> : <input type=text name='password' size=60 value='$r[password]'></td></tr>
          <tr><td>Telepom</td>      <td> : <input type=text name='telp' size=60 value='$r[telp]'></td></tr>
          
         

          
          <tr>
          <td colspan=2>
          <input type=submit value=Update>
          <input type=button value=Batal onclick=self.history.back()>
          </td>
          </tr>
          </table>
          </form>";
        break;
}
