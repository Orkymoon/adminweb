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
        echo "<h2>Tambah Masyarakat</h2>
          <form method=POST action='$aksi?module=petugas&act=input'>
          <table>
          <tr><td>Nama Petugas</td>      <td> : <input type=text name='nama_petugas' size=60></td></tr>
          <tr><td>Username</td>      <td> : <input type=text name='username' size=60></td></tr>
          <tr><td>Password</td>      <td> : <input type=text name='password' size=60></td></tr>
          <tr><td>Telepon</td>      <td> : <input type=number name='telp' size=60></td></tr>
          <tr><td>Level</td>      <td> : <select class='form-select' name='level' required>
          <option value='Admin'>Admin</option>
          <option value='Petugas'>Petugas</option>
      </select></td></tr>


          <tr><td colspan=2><input type=submit value=Simpan>
          <input type=button value=Batal onclick=self.history.back()></td></tr>
          </table>
          </form>";
        break;

        //   Edit 
        case "edit":
        $edit = mysqli_query($conn, "SELECT * FROM petugas WHERE id_petugas='$_GET[id]'");
        $r    = mysqli_fetch_array($edit);

        if($r['level'] == 'Admin'){
            $admin = "selected";
        }
        else{
            $petugas = "selected";
        }
        
        echo "<h2>Edit Petugas</h2>
        <form method=POST action='$aksi?module=petugas&act=input'>
        <table>
        <tr><td>Nama Petugas</td>      <td> : <input type=text name='nama_petugas' size=60 value='$r[nama_petugas]'></td></tr>
        <tr><td>Username</td>      <td> : <input type=text name='username' size=60 value='$r[username]'></td></tr>
        <tr><td>Password</td>      <td> : <input type=text name='password' size=60 value='$r[password]'></td></tr>
        <tr><td>Telepon</td>      <td> : <input type=number name='telp' size=60 value='$r[telp]'></td></tr>";


        echo"<tr><td>Level</td>      <td> : <select class='form-select' name='level' required>
        <option value='Admin' $admin>Admin</option>
        <option value='Petugas' $petugas>Petugas</option>";
        echo"</select></td></tr>
        

        <tr><td colspan=2><input type=submit value=Simpan>
        <input type=button value=Batal onclick=self.history.back()></td></tr>
        </table>
        </form>";
        break;
        // if($_GET['level'] == 'Petugas'){echo"selected";}
}
?>