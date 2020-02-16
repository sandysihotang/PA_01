<?php
session_start();
$str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
$str = substr(str_shuffle($str), 0, 6);
$_SESSION['code'] = $str;
$img = imagecreate(100, 50);
imagecolorallocate($img, 255, 255, 255);
$txtcol = imagecolorallocate($img, 0, 0, 0);
imagestring($img, 20, 5, 5, $str, $txtcol);
header("Content:image/jpeg");
imagejpeg($img);
?>