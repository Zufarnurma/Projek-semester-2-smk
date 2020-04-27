<?php 
$ia=$_GET['id'];
include'config.php';
if(isset($_POST['simpan'])){
	$stat=$_POST['sst'];
	$simpanan=mysqli_query($sambungan,"update transaksi set status='$stat' where id_tr like '%$ia%'");
	echo '<script>location.href="aktivitas.php";</script>';
}
session_start();
if(isset($_SESSION['nama'])){}else{
	echo '<script>alert("Login dulu!");location.href="login.php"; </script>';}


$query=mysqli_query($sambungan,"select * from transaksi where id_tr like '%$ia%'");
$jwb=mysqli_fetch_array($query);
$barr=mysqli_query($sambungan,"select * from alat where id_alat='$jwb[id_alat]'");
$barang=mysqli_fetch_array($barr);
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
<h2>Resi Transaksi dengan id:<?php echo $jwb['id_tr'];?></h2>
harga yang dibayar:Rp.<?php echo $jwb['total_harga'];?>
</br></br><p>*admin hanya boleh mengubah status transaksi*</p></br></br></br>
<table border=0px>
<form action="" method="post">
<tr><td>barang yang dipesan</td><td>:</td><td><?php echo $barang['nama_alat'];?></td></tr>
<tr><td>jumlah item</td><td>:</td><td><?php echo $jwb['jumlah'];?></td></tr>
<tr><td>id pelanggan</td><td>:</td><td><?php echo $jwb['id_akun'];?></td></tr>
<tr><td>metode pembayaran</td><td>:</td><td>cash on delivery</td></tr>
<tr><td>alamat</td><td>:</td><td><?php echo $jwb['alamat'];?></td></tr>
<tr><td>status</td><td>:</td><td><select name="sst"><option value="selesai" <?php if($jwb['status']=="selesai"){echo "selected";}?>>selesai</option>
<option value="bayar" <?php if($jwb['status']=="bayar"){echo "selected";}?>>belum bayar</option><option value="kirim" <?php if($jwb['status']=="kirim"){echo "selected";}?>>sedang dikirim</option>
</select></td></tr>
</table>
</br></br></br></br></br>
<input type="submit" name="simpan" value="simpan"></form>
</div>
</div>
</body>
</html>