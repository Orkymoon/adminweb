<?php
$aksi = "modul/mod_masyarakat/aksi_masyarakat.php";
?>
<h2>Tambah Masyarakat</h2>
<form method=POST action="<?=$aksi?>?module=masyarakat&act=input">
    <table>
        <tr>
            <td>NIK</td>
            <td> : <input type="number" name="nik" size="60" required></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td> : <input type="text" name="nama" size="60" required></td>
        </tr>
        <tr>
            <td>Username</td>
            <td> : <input type="text" name="username" size="60" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td> : <input type="text" name="password" size="60" required></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td> : <input type="number" name="telp" size="60" required></td>
        </tr>

        <tr>
            <td colspan=2><input type="submit" value="Simpan">
                <input type="button" value="Batal" onclick="self.history.back()">
            </td>
        </tr>
    </table>
</form>