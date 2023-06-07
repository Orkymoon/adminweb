<?php
$aksi = "modul/mod_petugas/aksi_petugas.php";
?>
<h2>Tambah Masyarakat</h2>
<form method="POST" action="<?=$aksi?>?module=petugas&act=input">
    <table>
        <tr>
            <td>Nama Petugas</td>
            <td> : <input type="text" name="nama_petugas" size="60" required></td>
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
            <td>Level</td>
            <td> : <select class="form-select" name="level" required>
                    <option value="Admin">Admin</option>
                    <option value="Petugas">Petugas</option>
                </select></td>
        </tr>
        <tr>
            <td colspan=2><input type="submit" value="Simpan">
                <input type="button" value="Batal" onclick="self.history.back()">
            </td>
        </tr>
    </table>
</form>