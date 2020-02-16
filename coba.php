<?php
include_once("functions/my_functions.php");
$data = new pemesanan;
$kode_barang = $data->maxId()->fetch_array()['id'];
$nourut = (int)substr($kode_barang, 4, 4);
$nourut++;
$char = 'GS-';
$kode = $char . sprintf("%05s", $nourut);
echo $kode;

?>