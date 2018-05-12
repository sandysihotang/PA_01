<?php 
	include_once"my_functions.php";
	if ($_POST['registrasi']) {
		$nik=$_POST['nik'];
		$fname=$_POST['nama_depan'];
		$lname=$_POST['nama_belakang'];
		$alamat=$_POST['alamat'];
		$tlp=$_POST['nomor_telephone'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$role=1;

		$db1=new connection;
		
		$queri1=$db1->connect()->prepare('INSERT INTO account(id,username,password,role) VALUES (?,?,?,?)');
		$queri1->bind_param('sssi',$nik,$username,$password,$role);
		$queri1->execute();


		// /echo $nik.$alamat.$tlp.$fname.$lname;
		$query=$db1->connect()->prepare('INSERT INTO pelanggan(nik,alamat,tlp,firstname,lastname) VALUES (?,?,?,?,?)');
		$query->bind_param("sssss",$nik,$alamat,$tlp,$fname,$lname);
		$query->execute();
		header('location: ../index.php');
	}
	
 ?>