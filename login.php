<?php
include "config/koneksi.php";
function antiinjection($data)
{
    global $conn;
    $filter_sql = mysqli_real_escape_string($conn, $data);
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($filter_sql, ENT_QUOTES)));
    return $filter_sql;
}
if (isset($_POST["submit"])) {  
    $username = antiinjection($_POST['username']);
    $password = antiinjection(md5($_POST['password']));
    if (empty($username) || empty($password)) {
        $empty = "Username dan password harus di isi!";
    } else {
        $proses = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'");
        $user = mysqli_num_rows($proses);
        $db = mysqli_fetch_array($proses);

        $proses2 = mysqli_query($conn, "SELECT * FROM masyarakat WHERE username = '$username' AND password = '$password'");
        $user2 = mysqli_num_rows($proses2);
        $db2 = mysqli_fetch_array($proses2);

        if ($user > 0) {
            session_start();
            $_SESSION['id_petugas'] = $db['id_petugas'];
            $_SESSION['username'] = $db['username'];
            $_SESSION['nama_petugas'] = $db['nama_petugas'];
            $_SESSION['password'] = $db['password'];
            $_SESSION['level'] = $db['level'];
            if ($db['level'] == 'Admin'){
                header('location: index.php?module=home');

                //   header('Location: index.php?module=dashboard-admin');
            }
            else {
                  header('Location: index.php?module=dashboard-petugas');
            }
            exit;
        } else if ($user2 > 0) {
            session_start();
            $_SESSION['nik'] = $db2['nik'];
            $_SESSION['nama'] = $db2['nama'];
            $_SESSION['username'] = $db2['username'];
            $_SESSION['telp'] = $db2['telp'];
            $_SESSION['password'] = $db2['password'];
            $_SESSION['level'] = $db2['level'];
            header('Location: index.php?module=dashboard-masyarakat');
            exit;
        } else {
            $error = 'Username atau password salah.';
        }
        mysqli_close($conn);
    }
}


























// $username = antiinjection($_POST['username']);
// $pass     = antiinjection(md5($_POST['password']));

// $login = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$pass' AND blokir='N'");
// $ketemu = mysqli_num_rows($login);
// $r = mysqli_fetch_array($login);

// // Apabila username dan password ditemukan
// if ($ketemu > 0) {
//     session_start();
//     $_SESSION['namauser']     = $r['username'];
//     $_SESSION['namalengkap']  = $r['nama_lengkap'];
//     $_SESSION['passuser']     = $r['password'];
//     $_SESSION['leveluser']    = $r['level'];

//     echo "<center>LOGIN BERHASIL <br>";

//     header('location:index.php?module=home');
// } else {
//     echo "<link href=../config/adminstyle.css rel=stylesheet type=text/css>";
//     echo "<center>LOGIN GAGAL! <br> 
//         Username atau Password Anda tidak benar.<br>
//         Atau accountedang d Anda siblokir.<br>";
//     echo "<a href=login.php><b>ULANGI LAGI</b></a></center>";
// }
?>

<html>

<head>
    <title></title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="header">
        <div id="content">
            <h2>Login</h2>
            <img src="images/login-welcome.gif" width="97" height="105" hspace="10" align="left">
            <form method="POST">
                <table>
                    <tr>
                        <td>Username</td>
                        <td> : <input type="text" name="username" id="username"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td> : <input type="password" name="password" id="password"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Login"></td>
                    </tr>
                </table>
            </form>
            <p>&nbsp;</p>
        </div>
        <div id="footer">
            Copyright &copy; 2023 by Maftuh Romadon All rights reserved.
        </div>
    </div>
</body>

</html>