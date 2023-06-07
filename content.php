<?php
include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_combobox.php";
include "config/class_paging.php";



// Bagian User
if ($_GET['module']=='masyarakat'){
  include "modul/mod_masyarakat/index.php";
}

// Bagian User
elseif ($_GET['module']=='petugas'){
  include "modul/mod_petugas/index.php";
}

// Bagian Modul
elseif ($_GET['module']=='pengaduan'){
  include "modul/mod_pengaduan/index.php";
}

// Bagian Kategori
elseif ($_GET['module']=='tanggapan'){
  include "modul/mod_tanggapan/index.php";
}

// Bagian Berita
elseif ($_GET['module']=='berita'){
  include "modul/mod_berita/berita.php";
}

// Bagian Komentar Berita
elseif ($_GET['module']=='komentar'){
  include "modul/mod_komentar/komentar.php";
}

// Bagian Tag
elseif ($_GET['module']=='tag'){
  include "modul/mod_tag/tag.php";
}

// Bagian Agenda
elseif ($_GET['module']=='agenda'){
  include "modul/mod_agenda/agenda.php";
}

// Bagian Banner
elseif ($_GET['module']=='banner'){
  include "modul/mod_banner/banner.php";
}

// Bagian Poling
elseif ($_GET['module']=='poling'){
  include "modul/mod_poling/poling.php";
}

// Bagian Download
elseif ($_GET['module']=='download'){
  include "modul/mod_download/download.php";
}

// Bagian Hubungi Kami
elseif ($_GET['module']=='hubungi'){
  include "modul/mod_hubungi/hubungi.php";
}

// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}
?>
