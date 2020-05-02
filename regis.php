<?php
if(isset($_POST['daftar'])){
include'config.php';
$user = $_POST['username']; 
$pw = $_POST['pw'];
$rumah = $_POST['address']; 
$email = $_POST['email'];
$cpw = $_POST['cpw'];
//$sambungan diambil dari koneksi.php
if($pw==$cpw){
$kueri= mysqli_query($sambungan,"insert into akun(user,password,email,alamat,tipe) values('$user','$pw','$email','$rumah','member')");
if($kueri){
	echo'<script>alert ("akun berhasil dibuat");
	      location.href="login.php"</script>';
}else{
	echo'<script>alert ("akun gagal dibuat");
	      location.href=""</script>';
}}
else{
	echo '<script>alert ("Password salah");</script>';
}}
?>
<html>
<head>
<title>Daftar-Alat tukang</title>
<link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<div id="lobby">
<div id="menu">
<span><div id="log"><img src="logo.jpg" height=80 align="center">
<a href="login.php">log in</a><a href="index.php">HOME</a></div></span>
<a href="About.php?id=1">Tentang</a>
<a href="alat.php?hal=1">belanja alat</a> 
<div id="cari"><form action="alat.php?hal=1" method="post">
<input type="image" alt="Submit button" src="sl.png" name="found">
<input type="text" name="search" placeholder="ketik nama alat">
</form></div>
</div>
</br></br></br></br></br></br>
<div class="plat">
<form action="" method="post">
Buat username<input type="text" id="username" name="username" placeholder="Username"></input></br>
email<input type="email" id="email" name="email" placeholder="email@gmail.com"></input></br>
alamat<input type="text"id="address" name="address" placeholder="alamat"></input></br>
Buat Password<input type="password" id="pw" name="pw" placeholder="password baru"></input>
<input type="button" id="lht" onclick="lihat();" value="abc"></br>
Konfirmasi Password<input input type="password" id="cpw" name="cpw" placeholder="Masukan password ulang"></input>
<input type="button" id="lht2" onclick="lihat2();" value="abc"></br>
<a href="index.php">batal</a> 
<input type="submit" id="submit" name="daftar" value="Daftar"></input>
</form>
<script>
function lihat(){
	tbl=document.getElementById("lht");
	var vtb=tbl.value;
	pswd=document.getElementById("pw");
	if(vtb=="abc"){
		pswd.type="text";
		tbl.value="***";
	}
	else{
		pswd.type="password";
		tbl.value="abc";
	}
}
function lihat2(){
	tbl=document.getElementById("lht2");
	var vtb=tbl.value;
	pswd=document.getElementById("cpw");
	if(vtb=="abc"){
		pswd.type="text";
		tbl.value="***";
	}
	else{
		pswd.type="password";
		tbl.value="abc";
	}
}
</script>
</div>
</div>
</body>
</html>