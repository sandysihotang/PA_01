<?php 
include_once("functions/my_functions.php");
if (isset($_POST['daftar'])) {
	$insert=new daftar_admin_kasir;
	$insert->username=$_POST['username'];
	$insert->password=md5($_POST['password']);
	$insert->role=$_POST['role'];
	$insert->id=CRC32(time() . mt_rand(1,1000000));
	if($insert->daftar()){
		echo "<script>alert('Berhasil Didaftar')</script>";
		header('refresh:0 url=daftar.php');
	}
}
 ?>