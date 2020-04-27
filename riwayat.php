<?php 
session_start();
if(isset($_SESSION['nama'])){}else{
	echo '<script>alert("Login dulu!");location.href="login.php"; </script>';}
$r1=1;
$r6=9;
$hal=1;
if(isset($_GET['hal'])){
$hal=$_GET['hal'];
$r6=$hal*9;$r1=$r6-8;
$hill=$hal-1;
}
$hall=$hal+1;
?>
<html>
<head>
<title>Riwayat-Alat tukang</title>
<link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<div id="lobby">
<div id="menu">
<span><div id="log"><img src="logo.jpg" height=80 align="center">
<a href="IndexU.php">HOME</a><a href="index.php">log out</a>
</div></span>
<a href="About.php?id=0">Tentang</a>
<a href="belanja.php?hal=1">belanja alat</a>
<div id="cari"><form action="belanja.php?hal=1" method="post">
<input type="image" alt="Submit button" src="sl.png" name="found">
<input type="text" name="search" placeholder="ketik nama alat">
</form></div><label>Selamat Datang <?php echo $_SESSION['nama']; ?></label>
</div>  
</br></br></br>
<?php
include'config.php';
$semua=mysqli_query($sambungan,"select id_tr,nama_alat,transaksi.jumlah,total_harga,status from transaksi,alat where alat.id_alat=transaksi.id_alat and id_akun='$_SESSION[id]'");
$respon=mysqli_num_rows($semua); 
	echo'<table id="ucontent" border=1pxs>';
	echo'<th>id transaksi</th>';
	echo'<th>nama barang</th>';
	echo'<th>jumlah</th>';
	echo'<th>harga</th>';
	echo'<th>status</th>';
	$par=0;
	while($row=mysqli_fetch_assoc($semua)){
		$par++;
		if($par>=$r1&&$par<=$r6){
	echo'<tr height=50px><td> <a href="bayar.php?id='.$row['id_tr'].'">'.$row['id_tr']."</a></td>";
	echo'<td><a href="bayar.php?id='.$row['id_tr'].'">'.$row['nama_alat']." </a></td>";
	echo'<td><a href="bayar.php?id='.$row['id_tr'].'">'.$row['jumlah'].' </a></td><td><a href="bayar.php?id='.$row['id_tr'].'">'.$row['total_harga']."</a></td>".
		'<td><a href="bayar.php?id='.$row['id_tr'].'">'.$row['status'].' </a></td></tr>';
		}
}
?>
</table> 
<div id="MButton">
<?php
	if(isset($_GET['hal'])){
	if($respon<=$r6&&$_GET['hal']<2){
		
	}
	else if($hal==1){
	echo '<a href="riwayat.php?hal='.$hall.'" > selanjutnya</a>';
}
	else if($r6<$respon){
		echo'<a href="riwayat.php?hal='.$hill.'" > sebelumnya</a>';
		echo'<a href="riwayat.php?hal='.$hall.'" > selanjutnya</a>';
	}
	else{
		echo'<a href="riwayat.php?hal='.$hill.'" >sebelumnya</a>';
	}}
	else{
		if($respon>$r6){
			echo '<a href="riwayat.php?hal='.$hall.'" > selanjutnya</a>';
		}
	}
?>
</div>
</div>
</body>
</html>