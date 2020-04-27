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
<label>Selamat Datang <?php session_start();
if(isset($_SESSION['nama'])){}else{
	echo '<script>alert("Login dulu!");location.href="login.php"; </script>';} echo $_SESSION['nama']; ?></label>
</div>
</br></br></br></br></br></br></br></br><p>Halaman Admin</p>
<div id="description"><p></p>
</br></br></br></br></div>
</div>
</body>
</html>