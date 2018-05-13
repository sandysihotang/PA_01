<?php 
	include_once("functions/my_functions.php");
	session_start();
	if (isset($_POST['update_menu'])) {
		$porsi=$_POST['porsi'];
		$harga_baru=$_GET['harga']*$porsi;
		$update=new pemesanan;
		$data=$update->update_menu_beli($_GET['id'],$porsi,$harga_baru);
		if ($data) {
			echo "<script>alert('Behasil Diupdate')</script>";
			header('Refresh:0 url= list_transaksi.php');
		}
	}



 ?>