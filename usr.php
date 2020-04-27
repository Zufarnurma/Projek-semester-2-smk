<?php 
$r1=1;
$r6=10;
$hal=1;
if(isset($_GET['hal'])){
$hal=$_GET['hal'];
$r6=$hal*10;$r1=$r6-9;
$hill=$hal-1;
}
$hall=$hal+1;
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
<a href="index.php">log out</a></div></span>
<a href="indexA.php">HOME</a>
<a href="DTalat.php?hal=1">Data alat</a> 
<a href="aktivitas.php">semua transaksi</a><label>Selamat Datang <?php session_start();
if(isset($_SESSION['nama'])){}else{
	echo '<script>alert("Login dulu!");location.href="login.php"; </script>';} echo $_SESSION['nama']; ?></label>
</div>  
</br></br></br>
<?php
include'config.php';
$semua=mysqli_query($sambungan,"select * from akun");
$respon=mysqli_num_rows($semua);
if($respon){
	echo'<table id="conten" border=1px>';
	echo'<th>id akun</th>';
	echo'<th>username</th>';
	echo'<th>password</th>';
	echo'<th>email</th>';
	echo'<th>alamat</th>'; 
	echo'<th>tipe</th>';
	echo'<th>act</th>';
	while($row=mysqli_fetch_assoc($semua)){
		$par=$row['id_akun'];
		if($par>=$r1&&$par<=$r6){
			echo"<tr> <td>".$row['id_akun']."</td>";
			echo"<td>".$row['user']." </td><td>".$row['password']."</td>";
			echo"<td>".$row['email']." </td><td>".$row['alamat']."</td>";
			echo"<td>".$row['tipe'].'</td><td><a href="editU.php?id='.$row['id_akun'].'">edit</a></td></tr>';
		}
	}
}
?>
</table> 
<div id="MButton">
<?php
	if($respon<$r6 && $hal<2){
		
	}
	else if($hal==1){
	echo '<a href="usr.php?hal='.$hall.'" > selanjutnya</a>';
}
	else if($r6<$respon){
		echo'<a href="usr.php?hal='.$hill.'" > sebelumnya</a>';
		echo'<a href="usr.php?hal='.$hall.'" > selanjutnya</a>';
	}
	else{
		echo'<a href="usr.php?hal='.$hill.'" >sebelumnya</a>';
	}
?>
</div>
</div>
</body>
</html>