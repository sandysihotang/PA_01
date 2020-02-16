<?php
include_once "my_functions.php";
session_start();
if ($_POST['forgot']) {
    if ($_SESSION['code'] && $_SESSION['code'] != $_POST['captcha']) {
        echo "<script>alert('Captcha Error! Please Try Again.');</script>";
        header("Refresh:0 url=../index.php");
        return;
    }
    $email = $_POST['email'];
    $db = new connection();
    $query = $db->connect()->prepare("SELECT email FROM account WHERE email = ? LIMIT 1");
    $query->bind_param('s', $email);
    $query->execute();
    $query->bind_result($email);
    if ($query->fetch()) {
        require_once '../mail.php';
        $mail = new mail();
        $mail->sendEmail($email);
    } else {
        echo "<script>alert('Email Yang anda daftar tidak ada!');</script>";
        header("Refresh:0 url=../index.php");
    }
} else {
    header("Refresh:0 url=../index.php");
}
?>