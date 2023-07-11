<?php
require '../vendor/autoload.php';
require_once("library.php");
$client = new MongoDB\Client;
$database=$client->Admission_portal;
$collection = $database->personalDetails;
$email = $_SESSION["email"];
$name = $_SESSION["uname"];
$criteria = array("Email"=> $email);
$bson = $collection->findOne($criteria);
if(!empty($bson)){
$json = MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($bson));
$data = json_decode($json,TRUE);
ob_start();
$iterator = new RecursiveIteratorIterator(new RecursiveArrayIterator($data));
require('fpdf/fpdf.php');
class PDF_Rotate extends FPDF
{
var $angle=0;

function Rotate($angle,$x=-1,$y=-1)
{
    if($x==-1)
        $x=$this->x;
    if($y==-1)
        $y=$this->y;
    if($this->angle!=0)
        $this->_out('Q');
    $this->angle=$angle;
    if($angle!=0)
    {
        $angle*=M_PI/180;
        $c=cos($angle);
        $s=sin($angle);
        $cx=$x*$this->k;
        $cy=($this->h-$y)*$this->k;
        $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
    }
}

function _endpage()
{
    if($this->angle!=0)
    {
        $this->angle=0;
        $this->_out('Q');
    }
    parent::_endpage();
}
}
class PDF extends PDF_Rotate
{
    function RotatedText($x, $y, $txt, $angle)
{
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
}
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,4,24);
    // Arial bold 15
    $this->SetFont('Arial','UB',25);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Tezpur University Admissions',0,0,'C');
    // Line break
    $this->Ln(20);
    $this->SetFont('Arial','B',50);
    $this->SetTextColor(255,192,203);
    $this->RotatedText(35,190,'Tezpur University',45);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}
$pdf = new PDF();
$pdf->SetFont('Arial', 'B', 14);
$pdf->AddPage();
foreach ($iterator as $key=>$value) {
    $pdf->Cell(70,10,$key,1);
    $pdf->Cell(120,10,$value,1);
    $pdf->Ln();
}
$pdf->Output('PersonalDetails.pdf','I');
}
else{
    echo "<script>
alert('!!!!!Please Fill Application Form First!!!!!');
window.location.href='dashboard2.php';
</script>";
}
?>