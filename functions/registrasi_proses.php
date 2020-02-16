<?php /** @noinspection ALL */
include_once "my_functions.php";
if ($_POST['registrasi']) {
    if ($_SESSION['code'] && $_SESSION['code'] != $_POST['captcha']) {
        echo "<script>alert('Masukkan code dengan baik!');</script>";
        header("Refresh:0 url=../index.php");
    }
    $nik = $_POST['nik'];
    $fname = $_POST['nama_depan'];
    $lname = $_POST['nama_belakang'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST['nomor_telephone'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    //punya sarah teknik md5
    $password = md5($_POST['password']);
    $role = 1;

    $db1 = new connection;

    $queri1 = $db1->connect()->prepare('INSERT INTO account(id,username,password,role,email) VALUES (?,?,?,?,?)');
    $queri1->bind_param('sssis', $nik, $username, $password, $role, $email);
    $queri1->execute();


    // /echo $nik.$alamat.$tlp.$fname.$lname;
    $query = $db1->connect()->prepare('INSERT INTO pelanggan(nik,alamat,tlp,firstname,lastname) VALUES (?,?,?,?,?)');
    $query->bind_param("sssss", $nik, $alamat, $tlp, $fname, $lname);
    $query->execute();
    echo "<script>alert('Sukses mendaftarkan akun.');</script>";
    header('location: ../index.php');
}
?>