<?php
require('fpdf.php');
$d=date('d_m_Y');

class PDF extends FPDF
{

function Header()
{
    $this->SetFont('Helvetica','',25);
	$this->SetFontSize(40);
    //Move to the right
    $this->Cell(80);
    //Line break
    $this->Ln();
}

//Page footer
function Footer()
{
   
}

//Load data
function LoadData($file)
{
	//Read file lines
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

//Simple table
function BasicTable($header,$data)
{ 

$this->SetFillColor(153,153,153);
//$this->SetDrawColor(255, 0, 0);
$w=array(17,17,17,17,17,17,17,17,17,17);
	
	
	//Header
	$this->SetFont('Arial','B',6);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],10,$header[$i],1,0,'L',true);
	$this->Ln();
	
	//Data
	
	$this->SetFont('Arial','',6);
	foreach ($data as $eachResult) 
	{ //width
		$this->Cell(10);
		$this->Cell(17,10,$eachResult["customize_id"],1);
		$this->Cell(17,10,$eachResult["fname"],1);
		$this->Cell(17,10,$eachResult["address"],1);
		$this->Cell(17,10,$eachResult["contact_no"],1);
		$this->Cell(17,10,$eachResult["email"],1);
		$this->Cell(17,10,$eachResult["total_inch"],1);
		$this->Cell(17,10,$eachResult["total_price"],1);
		
		$this->Cell(17,10,$eachResult["statuss"],1);
	
		$this->Ln();
		 	 	 	 	
	}
}

//Better table
}



$pdf=new PDF();

	

$header=array('Transaction ID','Client Name','address','Contact Number','Email', 'total Inch', 'total Price', 'Status');
//Data loading
//*** Load MySQL Data ***//
$objConnect = mysql_connect("localhost","root","") or die("Error:Please check your database username & password");
$objDB = mysql_select_db("emcdb");
$strSQL = "SELECT *
FROM tbl_customization";
$objQuery = mysql_query($strSQL);
$resultData = array();
for ($i=0;$i<mysql_num_rows($objQuery);$i++) {
	$result = mysql_fetch_array($objQuery);
	array_push($resultData,$result);
}
//************************//


//*** Table 1 ***//
$pdf->AddPage();

	$pdf->SetFont('Helvetica','',14);
	$pdf->Cell(75);
	$pdf->Write(5, 'Sales Report');
	$pdf->Ln();
	
	$pdf->Cell(22);
	$pdf->SetFontSize(8);
	$pdf->Cell(50);
	$result=mysql_query("select date_format(now(), '%W, %M %d, %Y') as date");
	while( $row=mysql_fetch_array($result) )
	{
		$pdf->Write(5,$row['date']);
	}
	$pdf->Ln();
	
	//count total numbers of visitors
	$result=mysql_query("Select * from tbl_user") or die ("Database query failed: $query" . mysql_error());
	
	$count = mysql_num_rows($result);
	$pdf->Cell(0);

	$pdf->Ln();

	$pdf->Ln(5);

$pdf->Ln(0);
$pdf->Cell(10);
$pdf->BasicTable($header,$resultData);
//forme();
//$pdf->Output("$d.pdf","F");
$pdf->Output();

?>