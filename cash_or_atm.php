<?php 
	include_once("functions/my_functions.php");
	if (isset($_POST['cash'])) {
		$action=new pemesanan;
			$myaction=$action->action_metode_bayar_cash($_GET['id'],1);
			if ($myaction) {
				echo "<script>alert('Selesai Ditambahkan')</script>";
				header('Refresh:0 url= penyelesaian_pesanan.php');
			}
			else{
				echo "<script>alert('Gagal Memasukkan Metode Bayar ')</script>";
				header('Refresh:0 url= list_transaksi.php');
		}
				
	}
	if (isset($_POST['atm'])) {
		$action=new pemesanan;
		$date=$_POST['time'];
		if (strtotime($date)<strtotime(date('Y-m-d H:i:s'))) {
			echo "<script>alert('Masukkan Tanggal dan waktu yang VALID!')</script>";
			header('Refresh:0 url= list_transaksi.php');
		}else{
			$myaction=$action->action_metode_bayar_atm($_GET['id'],2,$date);
			if ($myaction) {
				echo "<script>alert('Metode Bayar Anda Adalah ATM Segera kirim bukti bayar anda')</script>";
				header('Refresh:0 url= list_transaksi.php');
			}else{
				echo "<script>alert('Gagal Memasukkan Metode Bayar ')</script>";
				header('Refresh:0 url= list_transaksi.php');
			}
		}
	}
 ?>