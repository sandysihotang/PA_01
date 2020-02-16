<?php

class mail
{
    function sendEmail($mail)
    {
        $to = $mail;
        $subject = '[Change Password]';
        $message = $this->template($to);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: sandysihotang12@gmail.com\r\n";
        if (mail($to, $subject, $message, $headers)) {
            require_once 'functions/my_functions.php';
            $db = new connection();
            $status = 1;
            $query = $db->connect()->prepare('UPDATE account SET state_change_password = ? WHERE email = ?');
            $query->bind_param('is', $status, $to);
            $query->execute();
            $query->close();
            echo "<script>alert('Email untuk reset Password telah dikiriman ke email anda!');</script>";
            header("Refresh:0 url=../index.php");
        } else {
            echo "<script>alert('Terjadi masalah saat pengiriman Email<br>Coba lagi!');</script>";
            header("Refresh:0 url=../index.php");
        }
    }

    function template($key)
    {
        return '<h1 align="center">Tab Reset Password Link to Reset Your Password.</h1>
                    <h2><a href="localhost/pa1/reset.php?id=' . base64_encode($key) . '">Reset Password</a></h2>';
    }
}
