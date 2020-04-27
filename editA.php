<?php 
session_start();
if(isset($_SESSION['nama'])){}else{
	echo '<script>alert("Login dulu!");location.href="login.php"; </script>';}
include'config.php';
$ia=$_GET['id'];
$query=mysqli_query($sambungan,"select * from alat where id_alat ='$ia'");
$jwb=mysqli_fetch_array($query); 
?>
<html>
<head>
<title>ADMIN!-Alat tukang</title>
<link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<div id="lobby">
<div id="menu">
<span><div id="log"><img src="logo.jpg" height=80 align="center">
<a href="tambah alat.php">Tambah alat</a>
<a href="index.php">log out</a>
</div></span>
<a href="usr.php?hal=1">User</a>
<a href="DTalat.php?hal=1">Data alat</a> 
<a href="aktivitas.php">semua transaksi</a>
<label>Selamat Datang <?php  echo $_SESSION['nama']; ?></label>
</div>

</br></br></br><div id="ucontent"> 
<h2>ID Alat:<?php echo $jwb['id_alat'];?></h2>
</br></br></br></br></br></br>
<table border=0px>
<form action="" method="post">
<tr><td>Nama Barang</td><td>:</td><td><input type="text" name="nam" value="<?php echo $jwb['nama_alat'];?>" ></td></tr>
<tr><td>Jumlah Item</td><td>:</td><td><input type="text" name="jml" value="<?php echo $jwb['jumlah'];?>" ></td></tr>
<tr><td>Deskripsi</td><td>:</td><td><textarea name="dss"  ><?php echo $jwb['deskripsi'];?></textarea></td></tr>
<tr><td>Review</td><td>:</td><td><?php echo '<img width=140px height=70px src="data:image/jpeg;base64,'.base64_encode($jwb['review']).'" />';?></td></tr>
<tr><td>Harga</td><td>:</td><td><input type="text"  name="harr" value="<?php echo $jwb['harga'];?>" ></td></tr>
<tr><td>Jenis</td><td>:</td><td><select name="sst"><option value="keamanan" <?php if($jwb['jenis']=="keamanan"){echo "selected";}?>>keamanan</option>
<option value="material" <?php if($jwb['jenis']=="material"){echo "selected";}?>>material</option><option value="perkakas" <?php if($jwb['jenis']=="perkakas"){echo "selected";}?>>perkakas</option>
<option value="electronic" <?php if($jwb['jenis']=="electronic"){echo "selected";}?>>electronic</option><option value="alat berat" <?php if($jwb['jenis']=="alat berat"){echo "selected";}?>>alat berat</option>
</select></td></tr>
</table>
</br></br></br></br></br>
<input type="submit" name="simpan" value="simpan"></form>
<?php
if(isset($_POST['simpan'])){
	$stat=$_POST['sst'];
	$harga=$_POST['harr'];
	$des=$_POST['dss'];
	$jumlah=$_POST['jml'];
	$nm=$_POST['nam'];
	$simpanan=mysqli_query($sambungan,"update alat set jenis='$stat',nama_alat='$nm',jumlah='$jumlah',harga='$harga',deskripsi='$des' where id_alat like '%$ia%'");
	if($simpanan){
		echo'<script>alert("disimpan"); location.href="DTalat.php";</script>';
	}
}
?>
</div>
</div>
</body>
</html>