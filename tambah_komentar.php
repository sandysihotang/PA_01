<?php 
session_start();
include_once('functions/my_functions.php');
if (isset($_POST['tambah_komentar'])) {
	$komentar=$_POST['komentar'];
	$data=new komentar;
	$tambah=$data->tambah_komentar($_SESSION['id'],$komentar);
	if ($tambah) {
		echo "<script>alert('Komentar Ditambahkan')</script>";
		header('Refresh:0 url=index.php');
	}
}

 ?>