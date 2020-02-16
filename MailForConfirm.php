<?php

class MailForConfirm
{
    function sendEmail($mail,$id)
    {
        $to = $mail;
        $subject = '[Pesanan Konfirmasi]';
        $message = $this->template($id);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: sandysihotang12@gmail.com\r\n";
        mail($to, $subject, $message, $headers);
    }

    function template($key)
    {
        return '<h1 align="center">Konfirmasi Pesanan</h1>
                  <p>Pesanan anda dengan No. Pemasanan: ' . $key . '</p>
                  <p>Telah Dikonfirmasi</p>
                  <p>Silahkan datang untuk mengambil Pesanan anda.</p>';
    }
}
