<?php
session_start();
if(isset($_SESSION['nama'])){
	session_destroy();
}
?>
<html>
<head>
<title>Home-Alat tukang</title>
<link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<div id="lobby">
<div id="menu">
<span><div id="log"><img src="logo.jpg" height=80 align="center">
<a href="login.php">log in</a><a href="regis.php">buat akun</a></div></span>
<a href="About.php?id=1">Tentang</a>
<a href="alat.php?hal=1">belanja alat</a>
<div id="cari"><form action="alat.php?hal=1" method="post">
<input type="image" alt="Submit button" src="sl.png" name="found">
<input type="text" name="search" placeholder="ketik nama alat">
</form></div>
</div>
</br></br></br></br></br></br></br></br><p>Cara mudah mendapatkan alat pertukangan</p>
<div id="description"><p>Rasakan pengalaman membeli alat pertukangan dengan begitu mudah dan cepat</p>
</br></br></br></br></div>
<div id="MButton"><a href="alat.php?hal=1">Lihat toko</a></div>
</div>
</body>
</html>