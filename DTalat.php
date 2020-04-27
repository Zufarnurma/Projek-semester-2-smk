<?php 
$r1=1;
$r6=6;
$hal=1;
if(isset($_GET['hal'])){
$hal=$_GET['hal'];
$r6=$hal*6;$r1=$r6-5;
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
<a href="index.php">log out</a>
</div></span>
<a href="usr.php?hal=1">user</a>
<a href="indexA.php">HOME</a>
<a href="aktivitas.php">semua transaksi</a> <label>Selamat Datang <?php session_start();
if(isset($_SESSION['nama'])){}else{
	echo '<script>alert("Login dulu!");location.href="login.php"; </script>';} echo $_SESSION['nama']; ?></label>
</div>  
</br></br></br>
<?php
include'config.php';
$semua=mysqli_query($sambungan,"select * from alat");
$respon=mysqli_num_rows($semua); 
	echo'<table id="conten" border=1pxs>';
	echo'<th>id alat</th>';
	echo'<th>Nama alat</th>';
	echo'<th>jenis</th>';
	echo'<th>jumlah</th>';
	echo'<th>harga</th>'; 
	echo'<th>review</th>';
	echo'<th>act</th>';
	while($row=mysqli_fetch_assoc($semua)){
		$par=(int) substr($row['id_alat'],4,3);
		if($par>=$r1&&$par<=$r6){
		$gambr='<img width=140px height=70px src="data:image/jpeg;base64,'.base64_encode($row['review']).'" />';
	echo"<tr> <td>".$row['id_alat']."</td>";
	echo"<td>".$row['nama_alat']." </td><td>".$row['jenis']."</td>";
	echo"<td>".$row['jumlah']." </td><td>".$row['harga']."</td>";
	echo'<td>'.$gambr.'</td><td><a href="editA.php?id='.$row['id_alat'].'">edit</a></td></tr>';
		}
}
?>
</table> 
<div id="MButton">
<?php
	if($respon<=$r6&&$hal<2){
		
	}
	else if($hal==1){
	echo '<a href="DTalat.php?hal='.$hall.'" > selanjutnya</a>';
}
	else if($r6<$respon){
		echo'<a href="DTalat.php?hal='.$hill.'" > sebelumnya</a>';
		echo'<a href="DTalat.php?hal='.$hall.'" > selanjutnya</a>';
	}
	else{
		echo'<a href="DTalat.php?hal='.$hill.'" >sebelumnya</a>';
	}
?>
</div>
</div>
</body>
</html>