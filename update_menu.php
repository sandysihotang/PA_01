<?php 
	include_once("functions/my_functions.php");
	session_start();
	if (isset($_POST['update_menu'])) {
		$porsi=$_POST['porsi'];
		$update=new pemesanan;
		if ($_GET['jenis']=='makanan') {
			$harga=$update->read_makanan($_GET['id_menu'])->fetch_object()->Harga;
			$harga_baru=$harga*$porsi;		
			$data=$update->update_menu_beli($_GET['id'],$porsi,$harga_baru);
			if ($data) {
				if($_SESSION['user']==3){
					echo "<script>alert('Behasil Diupdate')</script>";
					header('Refresh:0 url= list_transaksi_manual.php');	
				}else{
					echo "<script>alert('Behasil Diupdate')</script>";
					header('Refresh:0 url= list_transaksi.php');
				}
			}
		}
		if($_GET['jenis']=='minuman'){
			$harga=$update->read_minuman($_GET['id_menu'])->fetch_object()->harga;
			$harga_baru=$harga*$porsi;	
			$data=$update->update_menu_beli_minum($_GET['id'],$porsi,$harga_baru);
			if ($data) {
				if($_SESSION['user']==3){
					echo "<script>alert('Behasil Diupdate')</script>";
					header('Refresh:0 url= list_transaksi_manual.php');	
				}else{
					echo "<script>alert('Behasil Diupdate')</script>";
					header('Refresh:0 url= list_transaksi.php');
				}
			}
		}
	}



 ?>