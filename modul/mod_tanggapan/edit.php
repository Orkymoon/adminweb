<?php
$edit = mysqli_query($conn, "SELECT * FROM petugas WHERE id_petugas='$_GET[id]'");
$r = mysqli_fetch_array($edit);

if ($r['level'] == 'Admin') {
    $admin = "selected";
} else {
    $petugas = "selected";
}

$aksi = "modul/mod_petugas/aksi_petugas.php";
?>
<h2>Edit Petugas</h2>
<form method=POST action="<?= $aksi ?>?module=petugas&act=update">
    <input type="hidden" name="id" value="<?= $r['id_petugas'] ?>">
    <table>
        <tr>
            <td>Nama Petugas</td>
            <td> : <input type="text" name="nama_petugas" size="60" value="<?= $r['nama_petugas'] ?>" required></td>
        </tr>
        <tr>
            <td>Username</td>
            <td> : <input type="text" name="username" size="60" value="<?= $r['username'] ?>" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td> : <input type="text" name="password" size="60" value="<?= $r['password'] ?>" disabled></td>
        </tr>
        <tr>
            <td>Telepon</td>
            <td> : <input type="number" name="telp" size="60" value="<?= $r['telp'] ?>" required></td>
        </tr>


        <tr>
            <td>Level</td>
            <td>
                <select class="form-select" name="level" required>
                    <option value="Admin"  <?php if($r['level']== 'Admin'){echo"selected";}?>>Admin</option>
                    <option value="Petugas"<?php if($r['level']== 'Petugas'){echo"selected";}?>>Petugas</option>";
                </select>
            </td>
        </tr>


        <tr>
            <td colspan=2><input type="submit" value="Simpan">
                <input type="button" value="Batal" onclick="self.history.back()">
            </td>
        </tr>
    </table>
</form>