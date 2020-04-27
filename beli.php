<?php

include'config.php';

session_start();

if(isset($_SESSION['nama'])){}else{

	echo '<script>alert("Login dulu!");location.href="login.php"; </script>';}
$alamat=$_POST['alamat'];

$ir=$_SESSION['id'];

$nomor=$_GET['id'];

$harg=mysqli_fetch_array(mysqli_query($sambungan,"select * from alat where id_alat='$nomor'"));

$jumlah=$_POST['jumlah'];

$kurang=$harg['jumlah']-$jumlah;

$har=$harg['harga'];

$total=$jumlah*$har;

$barang=mysqli_query($sambungan,"select max(id_tr) as id from transaksi");

$sid=mysqli_fetch_assoc($barang);

$rar=$sid['id'];

$prim=(int) substr($rar,4,5);

$prim++;

$dpn="beli";

$itr=$dpn.sprintf('%05s',$prim); 

$kirim=mysqli_query($sambungan,"insert into transaksi value('$itr','$ir','$alamat','$nomor',$jumlah,'$total','bayar')");

$stk=mysqli_query($sambungan,"update alat set jumlah=$kurang where id_alat='$nomor'");

if($kirim){

	if($stk){

	echo '<script>alert("konfirmasi untuk'.$itr.'");'

	.'location.href="bayar.php?id='.$itr.'";</script>';

	}

}else{

	echo '<script>alert("transaksi'.$itr.' gagal");'

		.'location.href="beli.php?hal=1";</script>';

}



?> 
