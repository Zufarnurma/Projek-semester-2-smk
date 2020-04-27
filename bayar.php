<?php 

session_start();

if(isset($_SESSION['nama'])){}else{

	echo '<script>alert("Login dulu!");location.href="login.php"; </script>';}

include'config.php';

$ia=$_GET['id'];





if(isset($_GET['st'])){



	$jadi=$_GET['st']; 

	$updt=mysqli_query($sambungan,"update transaksi set status='$jadi' where id_tr='$ia'");

}



$query=mysqli_query($sambungan,"select * from transaksi where id_tr like '%$ia%'");

$jwb=mysqli_fetch_array($query);

$barr=mysqli_query($sambungan,"select * from alat where id_alat='$jwb[id_alat]'");

$barang=mysqli_fetch_array($barr);

?>

<html>

<head>

<title>bayar-Alat tukang</title>

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

</form></div><label>Selamat Datang <?php echo $_SESSION['nama']; ?></label>

</div>



</br></br></br><div id="ucontent"> 

<h2>Transaksi id:<?php echo $jwb['id_tr'];?></h2>

harga yang harus anda bayar:Rp.<?php echo numberformat($jwb['total_harga']);?>

</br></br></br></br></br></br>

<table border=0px>

<tr><td>barang yang dipesan</td><td>:</td><td><?php echo $barang['nama_alat'];?></td></tr>

<tr><td>jumlah item</td><td>:</td><td><?php echo $jwb['jumlah'];?></td></tr>

<tr><td>id pelanggan</td><td>:</td><td><?php echo $jwb['id_akun'];?></td></tr>

<tr><td>metode pembayaran</td><td>:</td><td>cash on delivery</td></tr>

<tr><td>alamat</td><td>:</td><td><?php echo $jwb['alamat'];?></td></tr>

</table>

</br></br></br></br></br>

<?php

if($jwb['status']=="bayar"){

	echo '<input type="button" onclick="sent();" id="kirim" value="beli">';

	echo '<input type="button" onclick="ccl();" id="batal" value="batal">';

}

else if($jwb['status']=="kirim"){

	echo '<input type="button" onclick="take();" id="terima" value="diterima">'; 

}

else if($jwb['status']=="batal"){

	echo 'Transaksi ini dibatalkan'; 

}

else{

	echo"Transaksi telah selesai";

}

?>

<script>



function take(){ 

	alert("pesanan <?php echo $barang['nama_alat'];?> diterima"); 

	location.href="bayar.php?id=<?php echo $ia; ?>&st=selesai";

}

function sent(){

	alert("pengiriman <?php echo $barang['nama_alat'];?> dilakukan"); 

	location.href="bayar.php?id=<?php echo $ia; ?>&st=kirim";

}

function ccl(){

	alert("pembelian <?php echo $barang['nama_alat'];?> dibatalkan"); 

	location.href="bayar.php?id=<?php echo $ia; ?>&st=batal";

}

</script>



</div>

</div>

</body>

</html>
