<?php
require('laporan/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('img/logo.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'GASTRO SIJABU JABU',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
include_once("functions/my_functions.php");

            $my=new pemesanan;
            $i=1;
            $tot=0;
            $makanan=$my->get_nama_makanan($_GET['id']);
            $pdf->Cell(0,10,'No-Transaksi: '.$_GET['id'],0,1);
            while($makanan1=mysqli_fetch_object($makanan)){
 			$pdf->Cell(0,10,$i.'. '.$my->read_makanan( $makanan1->id_menu )->fetch_assoc()['nama_makanan'].'................................Rp.'.number_format($makanan1->total_harga).'.00',0,1);

            $tot+=$makanan1->total_harga;
            $i++; }  
            $minuman=$my->get_nama_minuman($_GET['id']);
            while($minuman1=mysqli_fetch_object($minuman)){
             	$pdf->Cell(0,10,$i.'. '.$my->read_minuman( $minuman1->Id_menu_minum )->fetch_assoc()['nama_minuman'].'................................Rp.'.number_format($minuman1->total_harga).'.00',0,1); 
             $tot+=$minuman1->total_harga;$i++;
          } 
          	$pdf->Cell(0,10,'TOTAL SELURUHNYA........................Rp.'.number_format($tot).'.00',0,1);

$pdf->Output();
?>