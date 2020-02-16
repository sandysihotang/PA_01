<?php

include_once("functions/my_functions.php");

if (isset($_POST['tambah_galery'])) {
    $deskripsi = $_POST['deskripsi'];
    $namagambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $fotobaru = 'galery-' . date('His') . $namagambar;
    $path = 'img/galery/' . $fotobaru;
    if (move_uploaded_file($tmp, $path)) {
        $name = new galery;
        $name1 = $name->add_galery($fotobaru, $deskripsi);
        if ($name1) {
            echo "<script>alert('Foto Berhasil Diunggah!')</script>";
            header('Refresh:0 url=galery.php');
        } else {
            echo "<script>alert('Foto Gagal Diunggah!')</script>";
            header('Refresh:0 url=galery.php');
        }
    }

}
?>