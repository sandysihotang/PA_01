<?php
require('laporan/fpdf.php');
require("functions/my_functions.php");


class PDF extends FPDF
{
function Header()
{
    // Logo
    $this->Image('img/logo.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'STRUK GASTRO SIJABU JABU',0,0,'C');
    // Line break
    $this->Ln(20);
}
function FancyTable($header, $data,$id)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(20,65, 30,30, 45);
    $this->Cell(190,10,'No-Transaksi: '.$id,0,0,'L',true);
    $this->Ln();
    $this->Cell(array_sum($w),0,'','T');
    $this->Ln();
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],0,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    $my=new pemesanan;
    $no=1;
    $tot=0;
    // Data
    $fill = false;
    foreach($data as $row)
    {
        if (key_exists('id_menu',$row)) {
            $this->Cell($w[0],7,$no++,0,0,'C',$fill);
            $this->Cell($w[1],7,$my->read_makanan($row['id_menu'])->fetch_object()->nama_makanan,0,0,'C',$fill);
            $this->Cell($w[2],7,'Rp.'.number_format($my->read_makanan($row['id_menu'])->fetch_object()->Harga).'.00',0,0,'C',$fill);
            $this->Cell($w[3],7,number_format($row['jumlah_pesanan']),0,0,'C',$fill);
            $this->Cell($w[4],7,'Rp.'.number_format($row['total_harga']).'.00',0,0,'L',$fill);
            $tot+=$row['total_harga'];
            $this->Ln();
        }
        else if(key_exists('Id_menu_minum',$row)){
            $this->Cell($w[0],7,$no++,0,0,'C',$fill);
            $this->Cell($w[1],7,$my->read_minuman($row['Id_menu_minum'])->fetch_object()->nama_minuman,0,0,'C',$fill);
            $this->Cell($w[2],7,'Rp.'.number_format($my->read_minuman($row['Id_menu_minum'])->fetch_object()->harga).'.00',0,0,'C',$fill);
            $this->Cell($w[3],7,number_format($row['jumlah_pesanan']),0,0,'C',$fill);
            $this->Cell($w[4],7,'Rp.'.number_format($row['total_harga']).'.00',0,0,'L',$fill);
            $tot+=$row['total_harga'];
            $this->Ln();   
        }
        
        $fill = !$fill;
    }
    $this->Cell(130,10,'Total ',0,0,'L',$fill);
    $this->Cell(60,10,'Rp.'.number_format($tot).'.00',0,0,'L',$fill);
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
// Column headings
$header = array('No','Makanan/minuman','@', 'QTY', 'Harga(Rp.)');
// Data loading
//$data = $pdf->LoadData('countries.txt');
$my=new pemesanan;
$data=array();
$makan=$my->get_nama_makanan($_GET['id']);
while($makanan=mysqli_fetch_array($makan)){
    array_push($data,$makanan);
}
$minum=$my->get_nama_minuman($_GET['id']);
while($minuman=mysqli_fetch_array($minum)){
    array_push($data,$minuman);
}

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$data,$_GET['id']);
$pdf->Output();
?>
