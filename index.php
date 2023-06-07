<?php
session_start();

if (empty($_SESSION['username']) and empty($_SESSION['password'])) {
	echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
	echo "<a href=login.php><b>LOGIN</b></a></center>";
	header('refresh: 3; URL=login.php');
} else {
?>

	<html>
	<head>
		<title></title>
		<script type="text/javascript" src="../nicEdit.js"></script>
		<script type="text/javascript">
			bkLib.onDomLoaded(function() {
				nicEditors.allTextAreas()
			});
		</script>
		</script>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="header">
			<div id="menu">
				<ul>
					<?php include "menu.php"; ?>
					<li><a href=logout.php>&#187; Logout</a></li>
				</ul>
				<!-- <p>&nbsp;</p> -->
			</div>
			<div id="content">
				<?php include "content.php"; ?>
			</div>
			<div id="footer">
				Copyright &copy; 2023 Orkymoon All rights reserved.
			</div>
		</div>
	</body>
	</html>
<?php
}
?>