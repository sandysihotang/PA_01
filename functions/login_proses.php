<?php 
	include_once("my_functions.php");
	session_start();
	if ($_POST['login']) {
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$conection=new connection;
		$query=$conection->connect()->prepare("SELECT * FROM account where username=? AND password=?");
		$query->bind_param('ss',$username,$password);
		$query->execute();
		$data=$query->get_result();
		if($data->num_rows>0){
			$mydata=$data->fetch_assoc();
			$outen=new outentikasi;
			$outen->set_session('is_logged_in',TRUE);
			$outen->set_session('user',$mydata['role']);
			$outen->set_session('id',$mydata['id']);
			header("location: ../index.php");
		}
		else{
			echo"<script>alert('Maaf Anda Tidak Terdaftar!');</script>";
			header("Refresh:0 url=../index.php");
		}
	}

 ?>