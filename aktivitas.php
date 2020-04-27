<?php 

$kategory="";

session_start();

if(isset($_SESSION['nama'])){}else{

	echo '<script>alert("Login dulu!");location.href="login.php"; </script>';}
$r1=1;

$r6=8;

$hal=1;

if(isset($_GET['ktg'])){

	if($_GET['ktg']=="semua"){

		$kategory="";

	}

	else{

	$kategory=" and status='".$_GET['ktg']."'";

	}

}

if(isset($_GET['hal'])){

$hal=$_GET['hal'];

$r6=$hal*8;$r1=$r6-7;

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

<a href="DTalat.php">data alat</a>

<a href="indexA.php">HOME</a> <label>Selamat Datang <?php echo $_SESSION['nama']; ?></label>

</div>  

</br></br></br>

<?php

include'config.php';

$semua=mysqli_query($sambungan,"select id_tr,nama_alat,total_harga,user, transaksi.jumlah,status from transaksi,alat,akun where alat.id_alat=transaksi.id_alat and transaksi.id_akun=akun.id_akun $kategory");

$respon=mysqli_num_rows($semua); 

	echo'<table id="ucontent" border=1pxs>';

	echo'<th>id transaksi</th>';

	echo'<th>nama barang</th>';

	echo'<th>jumlah</th>';

	$par=0;

	while($row=mysqli_fetch_assoc($semua)){

		$par++;

		if($par>=$r1&&$par<=$r6){

	echo'<tr height=20px style="border-bottom:none;"> <td><a href="edit.php?id='.$row['id_tr'].'">'.$row['id_tr']."</a></td>";

	echo'<td><a href="edit.php?id='.$row['id_tr'].'">'.$row['nama_alat']." </a></td>";

	echo'<td><a href="edit.php?id='.$row['id_tr'].'">'.$row['jumlah'].' </a></td></tr><tr style="border-top:none;" height=20px>'.

	'<td><a href="edit.php?id='.$row['id_tr'].'">'.$row['total_harga'].'</a></td>'.

	'<td><a href="edit.php?id='.$row['id_tr'].'">'.$row['user'].'</a></td>'.

		'<td><a href="edit.php?id='.$row['id_tr'].'">'.$row['status'].' </a></td></tr>';

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

		if(isset($_GET['ktg'])){

	echo '<a href="aktivitas.php?hal='.$hall.'&ktg='.$_GET['ktg'].'" > selanjutnya</a>';

		}

		else{echo '<a href="aktivitas.php?hal='.$hall.'" > selanjutnya</a>';

		}

}

	else if($r6<$respon){

		if(isset($_GET['ktg'])){

	echo '<a href="aktivitas.php?hal='.$hall.'&ktg='.$_GET['ktg'].'" > selanjutnya</a>';

	echo '<a href="aktivitas.php?hal='.$hill.'&ktg='.$_GET['ktg'].'" > sebelumnya</a>';

		}

		else{

			echo '<a href="aktivitas.php?hal='.$hall.'" > selanjutnya</a>';

		echo'<a href="aktivitas.php?hal='.$hill.'" > sebelumnya</a>';

		}

	}

	else{		if(isset($_GET['ktg'])){

	echo '<a href="aktivitas.php?hal='.$hill.'&ktg='.$_GET['ktg'].'" > sebelumnya</a>';

		}

		else{echo '<a href="aktivitas.php?hal='.$hill.'" > sebelumnya</a>';

		}

		}}

	else{

		if($respon>$r6){

			if(isset($_GET['ktg'])){

	echo '<a href="aktivitas.php?hal='.$hall.'&ktg='.$_GET['ktg'].'" > selanjutnya</a>';

		}

		else{echo '<a href="aktivitas.php?hal='.$hall.'" > selanjutnya</a>';

		}

		}

	}

?>

</div>

<div id="kategori">

<ul> 

<li><a href="aktivitas.php?ktg=selesai">selesai</a></li>

<li><a href="aktivitas.php?ktg=bayar">belum di bayar</a></li>

<li><a href="aktivitas.php?ktg=kirim">sedang di kirim</a></li>

<li><a href="aktivitas.php?ktg=semua">semua</a></li>

</ul>

</div>

</div>

</body>

</html> 
