<?php 
include_once"my_functions.php";
session_start();
if (isset($_SESSION['is_logged_in'])) {
	$out=new outentikasi;

	$out->destroy_session('is_logged_in');
}
	
	header('location: ../index.php');
	
 ?>