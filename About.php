<html>

<head>

<title>Tentang-Alat tukang</title>

<link rel="stylesheet" type="text/css" href="layout.css">

</head>

<body>

<div id="lobby">

<div id="menu">

<span><div id="log"><img src="logo.jpg" height=80 align="center"><?php 

    session_start(); 

if($_GET['id']==1){

	echo '<a href="login.php">log in</a><a href="regis.php">buat akun</a></div></span>'.
'<a href="index.php">home</a>'.

'<a href="alat.php?hal=1">belanja alat</a>'.

'<div id="cari"><form action="alat.php?hal=1" method="post">

<input type="image" alt="Submit button" src="sl.png" name="found">

<input type="text" name="search" placeholder="ketik nama alat">

</form></div>';

}

else if($_GET['id']==0){



	echo '<a href="riwayat.php">Transaksi</a><a href="index.php">log out</a></div></span>'.

'<a href="IndexU.php">home</a><a href="belanja.php?hal=1">belanja alat</a>'.

'<div id="cari"><form action="belanja.php?hal=1" method="post">

<input type="image" alt="Submit button" src="sl.png" name="found">

<input type="text" name="search" placeholder="ketik nama alat">

</form></div><label>Selamat Datang '.$_SESSION['nama'].'</label>';

}

?>

</div> 

</br>

</br>

</br>

<div id="conten">

<h1>Alat Tukang<h1></br></br>

<h2>Website yang dikembangkan dengan tujuan menjadi sarana 

</br>yang dapat digunakan sebagai tempat jual beli peralatan pertukangan dengan cara yang simpel</h2>

</br></br></br>

<div id="AT">author <p>Jakarta,20 januari 2020</p></br>Zufar Nur M.A <p>Terima kasih</p></div>

</div>   

</body>

</html> 
