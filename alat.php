<?php 

include'config.php';

$r1=1;

$r4=4;

$hal=1;

if($hal!=$_GET['hal']){

$hal=$_GET['hal'];

$r4=$hal*4;$r1=$r4-3;

$hill=$hal-1;

}

$hall=$hal+1;

if(isset($_POST['search'])){

	$ram=$_POST['search'];
	$_GET['s']=$ram;

	if($ram!=null){

		$target="where nama_alat like '%$ram%'";

	}

	else{

		$target="where id_alat like 'tool%'";

	} 

} 

else{

	$ram=null;

	if(isset($_GET['s'])){

		$ram=$_GET['s'];

	}

	if($ram!=null){

		$target="where nama_alat like '%$ram%'";

	}

	else{

		$target="where id_alat like 'tool%'";

	} 

}

?>

<html>

<head>

<title>belanja-Alat tukang</title>

<link rel="stylesheet" type="text/css" href="layout.css">

</head>

<body>

<div id="lobby">

<div id="menu">

<span><div id="log"><img src="logo.jpg" height=80 align="center">

<a href="login.php" >log in</a>

<a href="regis.php">buat akun</a>

</div></span>

<a href="About.php?id=1">tentang</a>

<a href="index.php">HOME</a>

<div id="cari"><form action="" method="post">

<input type="image" alt="Submit button" src="sl.png" name="found">

<input type="text" name="search" placeholder="ketik nama alat">

</form></div>

</div>  

</br>

</br>

</br>





<?php

$semua=mysqli_query($sambungan,"select * from alat $target");

$respon=mysqli_num_rows($semua);

	if($respon==0){

		echo"<h1>Kata kunci ".$ram." tidak ditemukan<h1><p>coba gunakan kata kunci lain</p>";

	}

	echo'<table id="ucontent" border=0px >';

	$par=0;

	while($row=mysqli_fetch_assoc($semua)){

		$par++;

		if($par>=$r1&&$par<=$r4){

			if($row['jumlah']>0){

		$gambr='<a href="detil.php?id='.$row['id_alat'].'"><img width=240px height=120px src="data:image/jpeg;base64,'.base64_encode($row['review']).'" /></br></br>';

	echo' <tr ><td>';

	echo $gambr.$row['nama_alat']."</br></br>tipe:".$row['jenis']."</a></td>";

	echo "<td>".'<a href="detil.php?id='.$row['id_alat'].'"> stok: '.$row['jumlah']."</td></a>";

	echo'<td>'.'<a href="detil.php?id='.$row['id_alat'].'">Rp.'.$row['harga'].'</td></a></tr> ';

			}

			else{

				$gambr='<img width=240px height=120px src="data:image/jpeg;base64,'.base64_encode($row['review']).'" /></br></br>';

				echo' <tr ><td>';

				echo $gambr.$row['nama_alat']."</br></br>tipe:".$row['jenis']." </td>";

				echo "<td>Stok habis</td> ";

				echo'<td>Rp.'.$row['harga'].'</td> </tr> ';

			}

		}

}

?>

</table> 



<div id=MButton>

<?php

	if($respon<$r4 && $_GET['hal']<2){

		

	}

	else if($hal==1){

	echo '<a href=" alat.php?hal='.$hall.'&s='.$ram.'" > selanjutnya</a>';

}

	else if($r4<$respon){

		echo'<a href=" alat.php?hal='.$hill.'&s='.$ram.'" > sebelumnya</a>';

		echo'<a href=" alat.php?hal='.$hall.'&s='.$ram.'" > selanjutnya</a>';

	}

	else{

		echo'<a href=" alat.php?hal='.$hill.'&s='.$ram.'" >sebelumnya</a>';

	}

?>

</div>

</div>

</body>

</html> 
