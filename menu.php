<?php
include "config/koneksi.php";


if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}

if ($_SESSION['level'] == 'Admin') {
  $sql = mysqli_query($conn, "SELECT * FROM module WHERE (status='Admin' OR status='Petugas' OR status='All') AND aktif='Y' ORDER BY urutan");
} else if ($_SESSION['level'] == 'Petugas') {
  $sql = mysqli_query($conn, "SELECT * FROM module WHERE (status='Petugas' OR status='All') AND aktif='Y' ORDER BY urutan");
} else if ($_SESSION['level'] == 'Masyarakat') {
  $sql = mysqli_query($conn, "SELECT * FROM module WHERE (status='Masyarakat' OR status='All') AND aktif='Y' ORDER BY urutan");
}
while ($m = mysqli_fetch_array($sql)) {
  echo "<li><a href='$m[link]'>&#187; $m[nama_modul]</a></li>";
  // echo "<a class='sidebar-link' href='$m[link]' aria-expanded='false'><span><i class='$m[icon]'></i></span><span class='hide-menu'>$m[nama_modul]</span></a>";
}

// if ($_SESSION['level']=='admin'){
//   $sql=mysqli_query($conn,"select * from modul where aktif='Y' order by urutan");
// }
// else{
//   $sql=mysqli_query($conn,"select * from modul where status='user' and aktif='Y' order by urutan"); 
// } 
// while ($m=mysqli_fetch_array($sql)){  
//   echo "<li><a href='$m[link]'>&#187; $m[nama_modul]</a></li>";
// }
?>
