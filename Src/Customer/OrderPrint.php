<?php
include("../../Library/connect.php");
ob_end_clean();
require('../../Library/fpdf/fpdf.php');
class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../../icon.png',10,6,20);
        // Arial bold 15
        $this->SetFont('Courier','B',30);
        // Move to the right
        $this->Cell(25);
        // Title
        $this->Cell(0,0,"Winesor's Wine",0,0);
        $this->Ln(10);
        $this->Cell(25);
        $this->SetFont('Courier','I',20);
        $this->Cell(0,0,'The Land & The Folk',0,0);
        // Line break
        $this->Ln(25);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'R');
    }

    function ChapterTitle($num)
    {
    // Title
        $this->SetFont('Arial','',12);
        $this->SetFillColor(200,220,255);
        $this->Cell(0,6,"$num",0,1,'L',true);
    // Save ordinate
        $this->y0 = $this->GetY();
    }

}


$pdf = new PDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$id = $_POST['OrderId'];


// --Customer Infor--
$query = "SELECT 
w.WineName ,or1.WineOrderQuantity,o.OrderCreateDate, o.OrderDeliverDate,
o.OrderDeliverPlace, u.FullName, 
p.PaymentMethodName,or1.WineSoldPrice
FROM `order` o
JOIN paymentmethod p ON o.PaymentMethodId = p.PaymentMethodId
JOIN user u ON o.Username = u.Username
JOIN orderwinedetails or1 ON o.OrderId = or1.OrderId 
JOIN wine w ON or1.WineOrderId = w.WineId and
o.orderId = ".$id;
$sql = mysqli_query($conn,$query);
$num = 0;
$total = 0;

while(list($WineName, $WineOrderQuantity, $OrderCreateDate, $OrderDeliverDate, $OrderDeliverPlace, $FullName, $PaymentMethodName, $WineSoldPrice) = mysqli_fetch_row($sql)){
    $pdf->ChapterTitle(++$num);
    $pdf->Ln(10);
    $pdf->Cell(1,5,'Wine Name: '.$WineName,0,1);
    $pdf->Ln(5);
    $pdf->Cell(1,5,'Quantity: '.$WineOrderQuantity,0,1);
    $pdf->Ln(5);
    $pdf->Cell(1,5,'Order Deliver Date: '.$OrderDeliverDate,0,1);
    $pdf->Ln(5);
    $pdf->Cell(1,5,'Order Deliver Place: '.utf8_decode($OrderDeliverPlace),0,1);
    $pdf->Ln(5);
    $pdf->Cell(1,5,'Customer Name: '.$FullName,0,1);
    $pdf->Ln(5);
    $pdf->Cell(1,5,'Payment Method: '.$PaymentMethodName,0,1);
    $pdf->Ln(5);
    $pdf->Cell(1,5,'Price: '.$WineSoldPrice,0,1);
    $pdf->Ln(35);
    $total = $total + $WineSoldPrice;
}
$pdf->SetFillColor(200,220,255);
$pdf->SetFont('Courier','B',30);
$pdf->Cell(1,5,'Total: $'.$total,0,1);
$pdf->Output();
?>