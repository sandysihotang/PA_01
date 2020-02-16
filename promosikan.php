<?php 

	include_once"functions/my_functions.php";
	if ($_GET['jenis']==md5('makanan')) {
		if ($_GET['status']=='Tidak dipromosikan') {
			$data=new menu;
			$status=$data->promosi_makanan($_GET['id'],'Promosikan');
			if ($status) {
				echo "<script>alert('Berhasil Untuk Dipromosikan!')</script>";
				header('Refresh:0 url=index.php');
			}
			else{
				echo "<script>alert('Gagal Untuk Dipromosikan!')</script>";
				header('Refresh:0 url=index.php');
			}
		}
		else if ($_GET['status']=='Promosikan') {
			$data=new menu;
			$status=$data->promosi_makanan($_GET['id'],'Tidak dipromosikan');
			if ($status) {
				echo "<script>alert('Berhasil Untuk Hapus Promosi!')</script>";
				header('Refresh:0 url=index.php');
			}
			else{
				echo "<script>alert('Gagal Untuk Hapus Promosikan!')</script>";
				header('Refresh:0 url=index.php');
			}
		}
	}
	if ($_GET['jenis']==md5('minuman')) {
		if ($_GET['status']=='Tidak dipromosikan') {
			$data=new menu;
			$status=$data->promosi_minuman($_GET['id'],'Promosikan');
			if ($status) {
				echo "<script>alert('Berhasil Untuk Dipromosikan!')</script>";
				header('Refresh:0 url=index.php');
			}
			else{
				echo "<script>alert('Gagal Untuk Dipromosikan!')</script>";
				header('Refresh:0 url=index.php');
			}
		}
		else if ($_GET['status']=='Promosikan') {
			$data=new menu;
			$status=$data->promosi_minuman($_GET['id'],'Tidak dipromosikan');
			if ($status) {
				echo "<script>alert('Berhasil Untuk Hapus Promosi!')</script>";
				header('Refresh:0 url=index.php');
			}
			else{
				echo "<script>alert('Gagal Untuk Hapus Promosikan!')</script>";
				header('Refresh:0 url=index.php');
			}
		}
	}
 ?>