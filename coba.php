<?php 
include_once("functions/my_functions.php");
	$query=new laporan_penjualan;
	$data=$query->read_laporan();
	print_r($data->fetch_assoc());
	echo "<br>";
	print_r($data->fetch_assoc());
	echo "<br>";
	print_r($data->fetch_assoc());
	echo "<br>";
	print_r($data->fetch_assoc());
	echo "<br>";
	print_r($data->fetch_assoc());
	echo "<br>";
	print_r($data->fetch_assoc());


	echo "<br><br><br><br>";

	$query=new laporan_penjualan;
	$data=$query->read_laporan();
	$no=0;
		echo "<br>";
		echo $data2['tanggal_ambil'];
		echo "<br>";
	}
	// print_r ($data->fetch_assoc());


	// echo $data['id'];
?>