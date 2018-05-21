<?php 
	include_once("functions/my_functions.php");
	if (isset($_POST['cash'])) {
		$action=new pemesanan;
		$date=$_POST['time'];
		$myaction=$action->action_metode_bayar_cash($_GET['id'],1,$date);
		if ($myaction) {
			echo "<script>alert('Metode Bayar Anda Adalah Cash Atau Bayar Ditempat')</script>";
			header('Refresh:0 url= list_transaksi.php');
		}else{
			echo "<script>alert('Gagal Memasukkan Metode Bayar ')</script>";
			header('Refresh:0 url= list_transaksi.php');
		}
	}
	if (isset($_POST['atm'])) {
		$action=new pemesanan;
		$myaction=$action->action_metode_bayar_atm($_GET['id'],2,$date);
		if ($myaction) {
			echo "<script>alert('Metode Bayar Anda Adalah ATM Segera kirim bukti bayar anda')</script>";
			header('Refresh:0 url= list_transaksi.php');
		}else{
			echo "<script>alert('Gagal Memasukkan Metode Bayar ')</script>";
			header('Refresh:0 url= list_transaksi.php');
		}
	}
 ?>