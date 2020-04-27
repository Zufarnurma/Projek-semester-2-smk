<?php 
session_start();
$ts=0;
if(isset($_POST['Login'])){
include'config.php';
$user = $_POST['username']; 
$pw = $_POST['pw'];
//$sambungan diambil dari config.php
$kueri= mysqli_query($sambungan,"select * from akun where user='$user' and password='$pw'");
$cekin=mysqli_num_rows($kueri);
$gg=mysqli_fetch_array($kueri);
$dd=$gg['id_akun'];
if($cekin>0){ 
	 
	if($gg['tipe']=="admin"){
		$_SESSION['nama']=$user;
		$_SESSION['id']=$dd;
		echo'<script>
		   location.href="indexA.php"</script>';
	}
	else if($gg['tipe']=="member"){
		$_SESSION['nama']= $user;
		$_SESSION['id']= $dd;
echo' <script>
	      location.href="IndexU.php"</script>';
		  }
		  else{echo'<script>alert("error!");</script>';}
}
else{
$ts=1;
}}
?>
<html>
<head>
<title>Login-Alat tukang</title>
<link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<div id="lobby">
<div id="menu">
<span><div id="log"><img src="logo.jpg" height=80 align="center">
<a href="index.php">HOME</a><a href="regis.php">Buat akun</a></div></span>
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
username<input type="text" id="username" name="username" placeholder="Username"></input></br>
Password<input type="password" id="pw" name="pw" placeholder="password"></input><input type="button" id="lht" onclick="lihat();" value="abc"></br>
<a href="index.php">batal</a> 
<input type="submit" id="submit" name="Login" value="Login"></input>
</form>
<?php

if($ts==0){
	
}
else if($ts==1){
	echo'<font color="red" size=2px>Username atau Password salah</font>';
}
else{
	
}
?>
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
</script>
</div>
</div>
</body>
</html>