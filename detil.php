<?php 
include'config.php';
$ia=$_GET['id'];
$query=mysqli_query($sambungan,"select * from alat where id_alat like '%$ia%'");
$jwb=mysqli_fetch_array($query);
?>
<html>
<head>
<title>detail-Alat tukang</title>
<link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<div id="lobby">
<div id="menu">
<span><div id="log"><img src="logo.jpg" height=80 align="center">
<a href="login.php">log in</a><a href="regis.php">buat akun</a>
</div></span>
<a href="About.php?id=1">Tentang</a>
<a href="alat.php?hal=1">belanja alat</a>
<div id="cari"><form action="belanja.php?hal=1" method="post">
<input type="image" alt="Submit button" src="sl.png" name="found">
<input type="text" name="search" placeholder="ketik nama alat">
</form></div>
</div>
</br></br></br><div id="ucontent"><?php
$gambr='  <img align="left" width=360px height=240px src="data:image/jpeg;base64,'.base64_encode($jwb['review']).'" /> </br>';
echo '<li>'.$gambr.'<font size="6">'.$jwb['nama_alat'].'</font></br><font size="5">'.$jwb['deskripsi'].'</font></li>'
	.'<p align="left" size="4">jenis:'.$jwb['jenis'].'</p><p align="right">Rp.'.$jwb['harga'].'</p></br></br>';
?>
<label onclick="location.href='login.php'">Beli?</label>
<a href="index.php?hal=1">home</a>
</div>
</div>
</body>
</html>