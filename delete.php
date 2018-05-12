<?php 
include_once("functions/my_functions.php");

	if ($_GET['jenis']=="makanan") {
		$delete=new menu;
		$delete->delete_menu($_GET['id'],"makanan");	
		echo "<script>alert('Menu Makanan Berhasil Dihapus');</script>";
		header('Refresh:0 url=index.php');
	}
	else if($_GET['jenis']=="minuman"){
		$delete=new menu;
		$delete->delete_menu($_GET['id'],"minuman");
		echo "<script>alert('Menu Minuman Berhasil Dihapus');</script>";
		header('Refresh:0 url=index.php');
	}

 ?>