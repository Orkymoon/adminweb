<?php
$edit = mysqli_query($conn, "SELECT * FROM masyarakat WHERE id_masyarakat='$_GET[id]'");
$r = mysqli_fetch_array($edit);


$aksi = "modul/mod_masyarakat/aksi_masyarakat.php";
?>
<h2>Edit Masyarakat</h2>
<form method="POST" action="<?=$aksi?>?module=masyarakat&act=update">
    <input type="hidden" name="id" value="<?=$r['id_masyarakat']?>">
    <table>
        <tr>
            <td>NIK</td>
            <td> : <input type="text" name="nik" size=60 value="<?=$r['nik']?>" disabled></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td> : <input type=text name="nama" size=60 value="<?=$r['nama']?>" required></td>
        </tr>
        <tr>
            <td>Username</td>
            <td> : <input type="text" name="username" size="60" value="<?=$r['username']?>" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td> : <input type="text" name="password" size="60" value="<?=$r['password']?>" disabled></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td> : <input type="text" name="telp" size="60" value="<?=$r['telp']?>" required></td>
        </tr>
        <tr>
            <td colspan=2>
                <input type="submit" value="Update">
                <input type="button" value="Batal" onclick="self.history.back()">
            </td>
        </tr>
    </table>
</form>

