<?php
include_once("my_functions.php");
session_start();
if ($_POST['login']) {
    if ($_SESSION['code'] && $_SESSION['code'] != $_POST['captcha']) {
        echo "<script>alert('Masukkan code dengan baik!');</script>";
        header("Refresh:0 url=../index.php");
    }
    $conection = new connection;
    $username = mysqli_escape_string($conection->connect(), $_POST['username']);
    $password = md5($_POST['password']);
    $query = mysqli_query($conection->connect(), "SELECT * FROM account where username='$username' AND password='$password' LIMIT 1");
    //pengecekan username dan password
    if ($query->num_rows > 0) {
        $mydata = $query->fetch_assoc();
        $outen = new outentikasi;
        if ($mydata['role'] == 3) {
            $outen->set_session('is_logged_in', TRUE);
            $outen->set_session('user', $mydata['role']);
            $outen->set_session('id', $mydata['id']);
            header("location: ../kasir.php");
        } else {
            $outen->set_session('is_logged_in', TRUE);
            $outen->set_session('user', $mydata['role']);
            $outen->set_session('id', $mydata['id']);
            header("location: ../index.php");
        }
    } else {
        echo "<script>alert('Maaf Anda Tidak Terdaftar!');</script>";
        header("Refresh:0 url=../index.php");
    }
}
?>