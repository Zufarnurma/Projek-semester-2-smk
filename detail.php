<?php 
include'config.php';
$ia=$_GET['id'];
$query=mysqli_query($sambungan,"select * from alat where id_alat like '%$ia%'");
$jwb=mysqli_fetch_array($query);
?>
<script>
function pluss(){
	jm=document.getElementById("jumlah");
	lmt=document.getElementById("maxx");
	var bts=lmt.value;
	var bel=jm.value; 
	bel++;
	if(bts < bel){ 
		bel--;
	}
	jm.value=bel;
}
function minus(){
	jn=document.getElementById("jumlah");
	var bil=jn.value;
	if(bil>0){
	bil--;
	}
	jn.value=bil;
}
</script>
<html>
<head>
<title>detail-Alat tukang</title>
<link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<div id="lobby">
<div id="menu">
<span><div id="log"><img src="logo.jpg" height=80 align="center">
<a href="riwayat.php">Transaksi</a><a href="index.php">log out</a>
</div></span>
<a href="About.php?id=0">Tentang</a>
<a href="belanja.php?hal=1">belanja alat</a>
<div id="cari"><form action="belanja.php?hal=1" method="post">
<input type="image" alt="Submit button" src="sl.png" name="found">
<input type="text" name="search" placeholder="ketik nama alat">
</form></div><label>Selamat Datang <?php session_start();
if(isset($_SESSION['nama'])){}else{
	echo '<script>alert("Login dulu!");location.href="login.php"; </script>';} echo $_SESSION['nama']; ?></label>
</div>
</br></br></br><div id="ucontent"><?php
$gambr='  <img align="left" width=360px height=240px src="data:image/jpeg;base64,'.base64_encode($jwb['review']).'" /> </br>';
echo '<li>'.$gambr.'<font size="6">'.$jwb['nama_alat'].'</font></br><font size="5">'.$jwb['deskripsi'].'</font></li>'
	.'<p align="left" size="4">jenis:'.$jwb['jenis'].'</p><p align="right">Rp.'.$jwb['harga'].'</p>'.
	'<p align="right">stok: <input type="text" id="maxx" value="'.$jwb['jumlah'].'" readonly></p>'
	.'</br></br><form action="beli.php?id='.$jwb['id_alat'].'" method=post>'.
	'<p align="right">alamat tujuan</br><textarea align="right" name="alamat" placeholder="alamat pengiriman"></textarea></p>'.
	'<input type="button" id="kurang" onclick="minus();" name="kurang"  value="-"> <input type="text" id="jumlah" value="1" name="jumlah" />'.
	'<input type="button" id="tambah" onclick="pluss();" name="tambah" value="+"></br></br><input align="center" type="submit" value="beli">';
?>
<a href="belanja.php?hal=1">kembali</a>
</form>
</div>
</div>
</body>
</html>