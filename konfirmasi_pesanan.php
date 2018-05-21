<?php 
	include_once("functions/my_functions.php");
	if (isset($_POST['ubah'])) {
		$action=$_POST['aksi'];
		$id=$_GET['id'];
		$aksi=new konfirmasi_pelanggan;
		$aksi->action_pemesanan($action,$id);
		header('Refresh:0 url=kasir.php');
	}



 ?>