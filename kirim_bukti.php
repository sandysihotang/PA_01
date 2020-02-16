<?php

include_once('functions/my_functions.php');
if (isset($_POST['kirim'])) {
    $name = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $nama_bukti = "bukti-" . $name;
    $path = 'img/bukti-bayar/' . $nama_bukti;
    if (move_uploaded_file($tmp, $path)) {
        $pemesanan = new pemesanan;
        $bukti = $pemesanan->kirim_bukti($nama_bukti, $_GET['id'], $_GET['pel']);
        if ($bukti) {
            echo "<script>alert('Berhasil Mengirim Bukti')</script>";
            header('Refresh:0 url=list_transaksi.php');
        }
    } else {
        echo "<script>alert('Kirim Foto Yang Kurang dari 1 Mb')</script>";
        header('Refresh:0 url=list_transaksi.php');
    }
}
?>