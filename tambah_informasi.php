<?php

include_once("functions/my_functions.php");

if (isset($_POST['tambah_infromasi'])) {
    $deskripsi = $_POST['text'];
    $judul = $_POST['judul'];
    $namagambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $fotobaru = 'informasi-' . date('His') . $namagambar;
    $path = 'img/informasi/' . $fotobaru;
    if (move_uploaded_file($tmp, $path)) {
        $name = new informasi;
        $name1 = $name->add_informasi($fotobaru, $deskripsi, $judul);
        if ($name1) {
            echo "<script>alert('Foto Berhasil Diunggah!')</script>";
            header('Refresh:0 url=about.php');
        } else {
            echo "<script>alert('Foto Gagal Diunggah!')</script>";
            header('Refresh:0 url=about.php');
        }
    }

}
?>