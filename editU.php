<?php 
session_start();
if(isset($_SESSION['nama'])){}else{
	echo '<script>alert("Login dulu!");location.href="login.php"; </script>';}
include'config.php';
$ia=$_GET['id'];
$query=mysqli_query($sambungan,"select * from akun where id_akun ='$ia'");
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
<h2>ID Akun:<?php echo $jwb['id_akun'];?></h2>
</br></br></br></br></br></br>
<table border=0px>
<form action="" method="post">
<tr><td>Nama user</td><td>:</td><td><input type="text" name="nam" value="<?php echo $jwb['user'];?>" ></td></tr>
<tr><td>password</td><td>:</td><td><input type="text" name="pw" value="<?php echo $jwb['password'];?>" ></td></tr>
<tr><td>alamat</td><td>:</td><td><textarea name="des" ><?php echo $jwb['alamat'];?></textarea></td></tr>
<tr><td>email</td><td>:</td><td><textarea name="eml" ><?php echo $jwb['email'];?></textarea></td></tr>
<tr><td>tipe</td><td>:</td><td><select name="sst"><option value="admin" <?php if($jwb['tipe']=="admin"){echo "selected";}?>>admin</option>
<option value="member" <?php if($jwb['tipe']=="member"){echo "selected";}?>>member</option>
</select></td></tr>
</table>
</br></br></br></br></br>
<input type="submit" name="simpan" value="simpan"></form>
<?php
if(isset($_POST['simpan'])){
	$stat=$_POST['sst'];
	$pw=$_POST['pw'];
	$des=$_POST['des']; 
	$nm=$_POST['nam'];
	$em=$_POST['eml'];
	$simpanan=mysqli_query($sambungan,"update akun set email='$em',password='$pw',tipe='$stat',user='$nm',alamat='$des' where id_akun like '%$ia%'");
	if($simpanan){
		echo'<script>alert("disimpan"); location.href="usr.php";</script>';
	}
}
?>
</div>
</div>
</body>
</html>