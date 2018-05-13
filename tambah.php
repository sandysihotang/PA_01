<?php 
	require_once"functions/my_functions.php";
	if (isset($_POST['tambah_makanan'])) {
		$nama_makanan=$_POST['nama_makanan'];
		$harga=$_POST['harga'];
		$stock=$_POST['stok'];
		$gambar=$_FILES['gambar']['name'];
		$tmp=$_FILES['gambar']['tmp_name'];
		$fotobaru='makanan-'.date('His').$gambar;
		$path='img/menu/'.$fotobaru;

		if (move_uploaded_file($tmp,$path)) {
			$name=new menu;
			$key=$name->tambah_menu_makanan($nama_makanan,$fotobaru,$harga,$stock);
			if ($key) {
				echo "<script>alert('Menu Makanan Berhasil Ditambahkan');</script>";
				header('Refresh:0  url=index.php');
			}
			else{
				echo "<script>alert('Menu Makanan Gagal Ditambahkan');</script>";
				header('Refresh:0  url=index.php');
			}
		}
	}


		if (isset($_POST['tambah_minuman'])) {
		$nama_makanan=$_POST['nama_minuman'];
		$harga=$_POST['harga'];
		$stock=$_POST['stok'];
		$gambar=$_FILES['gambar']['name'];
		$tmp=$_FILES['gambar']['tmp_name'];
		$fotobaru='minuman-'.date('His').$gambar;
		$path='img/menu/'.$fotobaru;

		if (move_uploaded_file($tmp,$path)) {
			$name=new menu;
			$key=$name->tambah_menu_minuman($nama_makanan,$fotobaru,$harga,$stock);
			if ($key) {
				echo "<script>alert('Menu Minuman Berhasil Ditambahkan');</script>";
				header('Refresh:0  url=index.php');
			}
			else{
				echo "<script>alert('Menu Minuman Gagal Ditambahkan');</script>";
				header('Refresh:0  url=index.php');	
			}
		}
	}



	if (isset($_POST['update_makanan'])) {
		$nama_makanan=$_POST['nama_makanan'];
		$harga=$_POST['harga'];
		$stock=$_POST['stok'];
		$gambar=$_FILES['gambar']['name'];
		$tmp=$_FILES['gambar']['tmp_name'];
		$fotobaru='makanan-'.date('His').$gambar;
		$path='img/menu/'.$fotobaru;

		if (move_uploaded_file($tmp,$path)) {
			$name=new menu;
			$key=$name->update_menu_makanan($nama_makanan,$fotobaru,$harga,$stock,$_GET['id']);
			if ($key) {
				echo "<script>alert('Menu Makanan Berhasil Diubah');</script>";
				header('Refresh:0  url=index.php');
			}
			else{
				echo "<script>alert('Menu Makanan Gagal Diubah');</script>";
				header('Refresh:0  url=index.php');
			}
	}
}
 ?>