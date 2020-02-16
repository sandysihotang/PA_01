<?php
include_once("functions/my_functions.php");
session_start();
if (isset($_POST['pesan'])) {
    $all = new meja;
    $id = $_SESSION['id'];
    if ($all->check($id)) {
        echo "<script>alert('Anda Masih Mempunyai Pesanan Meja')</script>";
        header('Refresh:0 url= pesan_meja.php');
    } else {
        $jenis = $_POST['jenis'];
        $jumlah = $_POST['jumlah'];
        $date = $_POST['date'];
        if (strtotime($date) < strtotime(date('Y-m-d H:i:s'))) {
            echo "<script>alert('Masukkan Tanggal dan waktu yang VALID!')</script>";
            header('Refresh:0 url= pesan_meja.php');
        } else {
            $data = $all->add_meja($jenis, $jumlah, $date, $id);
            if ($data) {
                echo "<script>alert('Berhasil Memesan Meja')</script>";
                header('Refresh:0 url= pesan_meja.php');
            } else {
                echo "<script>alert('Gagal Memesan Meja')</script>";
                header('Refresh:0 url= pesan_meja.php');
            }
        }
    }
}


?>