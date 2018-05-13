<?php 
include_once("functions/my_functions.php");
session_start();
if (isset($_POST['lanjutkan'])) {
	$porsi=$_POST['jumlah_porsi'];
	$id_makanan=$_GET['id'];
	$account=new outentikasi;
	$id_pelanggan=$account->get_session('id');
	$id_pemesanan=md5(date('His'));
	$pesan=new pemesanan;
	$data=$pesan->read_makanan($id_makanan);
	$menu=$data->fetch_assoc();
	$total_harga=$menu['Harga']*$porsi;
	$yes=$pesan->add_to_chart_makanan($id_pemesanan,$id_pelanggan,$id_makanan,$porsi,$total_harga);
	if ($yes) {
		echo "<script>alert('Berhasil Dimasukkan Kedaftar Pesananan!')</script>";
		header("refresh:0 url=list_transaksi.php");
	}
	else{
		echo "<script>alert('Gagal Memasukkan Kedaftar Pesananan!')</script>";
		header("refresh:0 url=index.php");
	}
	
	$porsi_baru=$menu['stock'] - $porsi;
	$sfd=$pesan->update_porsi($id_makanan,$porsi_baru);
}
 ?>