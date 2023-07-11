<?php
session_start();
if (!isset($_SESSION['ur_name'])) {
  header('location:../index.php');
}else{
  $uname=$_SESSION['ur_name'];
   $cheotype=$_SESSION['cheo_type'];
}
include_once('../PDF_REPORTS/pdf/fpdf.php');
$pdf=new FPDF();
$pdf->AddPage();

$image=$pdf->image('../PDF_REPORTS/images/ako.jpg',5,11,70,28);
$_SESSION['date']=date('d/m/Y');
$date=$_SESSION['date'];
$mlo_leo=strtoupper($_SESSION['selected_mlo']);




$pdf->SetMargins(5,0,0);
$pdf->SetAutoPageBreak(true,0);
$pdf->AliasNbPages();

//$pdf->image($image,10,15,190,30);



$pdf->Cell(70,30,$image,0,0);
$pdf->SetFont('times','B','24');
$pdf->Cell(123,30,"Tanzania's Caterer of Choice",0,1,"C");
$pdf->SetFont('times','u','12');
$pdf->Cell(75,9,'PURCHACE ORDER REPORT',0,0);
//$pdf->SetFont('times','B','24');
$pdf->Cell(58,9,$mlo_leo,0,0,"C");
$pdf->Cell(65,9,$date,0,1,'C');
$pdf->SetFont('Arial','B','8');
$pdf->Cell(31,10.5,'AINA YA VIFAA',1,0,'L');
$pdf->Cell(20,10.5,'K/KILICHOPO',1,0,'L');
$pdf->Cell(27,10.5,'K/KILICHOOMBWA',1,0,'L');
$pdf->Cell(28.5,10.5,'K/KILICHOTOLEWA',1,0,'L');
$pdf->Cell(28.5,10.5,'J/KIASI KILICHOPO',1,0,'L');
$pdf->Cell(15,10.5,'KIZIO',1,0,'C');
$pdf->Cell(13,10.5,'BEI @',1,0,'C');
$pdf->Cell(19,10.5,'JUMLA',1,0,'C');
$pdf->Cell(17,10.5,'TAREHE',1,1,'C');


 $conn=mysql_connect('localhost','root','');
 mysql_select_db('menu_mpya');
 $submt_btn=$_SESSION['sbmt'];
 $spcfy_ipt=$_SESSION['specify'];

if (isset($submt_btn)) {

  $dbselect=mysql_real_escape_string($_POST['date_text']);

   if ( empty($spcfy_ipt)) {
 $select="SELECT * FROM  purche_order_rpt ORDER BY id ASC";
$Qry=mysql_query($select);
while ($rows=mysql_fetch_array($Qry)) {
  $Item_nam=            $rows['vifaa_aina'];
  $Order_ptn=           $rows['balance_open'];
  $Issue_ptn=           $rows['Amount_rqsted'];
  $Total_ptn_produce=   $rows['Amount_rcved'];
  $Sales_ptn=           $rows['Toatal_good_available'];
  $Trans_rejct=         $rows['kizio'];
  $Sale_price=          $rows['Cost_per_unit'];
  $C_balanc=            $rows['Total_cost'];
  $S_amunt=             $rows['Date_ent'];
 

    $pdf->SetFont('Arial','B','8');
	$pdf->Cell(31,7,$Item_nam,1,0);
	$pdf->Cell(20,7,$Order_ptn,1,0,'R');
	$pdf->Cell(27,7,$Issue_ptn,1,0,'R');
	$pdf->Cell(28.5,7, $Total_ptn_produce,1,0,'R');
	$pdf->Cell(28.5,7,$Sales_ptn,1,0,'R');
	$pdf->Cell(15,7,$Trans_rejct,1,0);
	$pdf->Cell(13,7,$Sale_price,1,0,'R');
	$pdf->Cell(19,7,$C_balanc,1,0,'R');
	$pdf->Cell(17,7,$S_amunt,1,1);

    
  $sum_opn+=$rows['balance_open'];
  $sum_reqst += $rows['Amount_rqsted'];
  $sum_resved += $rows['Amount_rcved'];
  $sum_trvd += $rows['Toatal_good_available'];
  $sum_tcost += $rows['Total_cost'];




}
  
   $pdf->SetFont('Arial','B','10');
	$pdf->Cell(31,7,'TOTAL (TSH)',1,0,'C');
	$pdf->Cell(20,7,$sum_opn,1,0,'R');
	$pdf->Cell(27,7,$sum_reqst,1,0,'R');
	$pdf->Cell(28.5,7, $sum_resved,1,0,'R');
	$pdf->Cell(28.5,7,$sum_trvd,1,0,'R');
	$pdf->Cell(15,7,'-',1,0);
	$pdf->Cell(13,7,'-',1,0);
	$pdf->Cell(19,7,$sum_tcost,1,0,'R');
	$pdf->Cell(17,7,'-',1,1);
}else{
 
$select="SELECT * FROM  purche_order_rpt WHERE vifaa_aina='$spcfy_ipt'||balance_open='$spcfy_ipt'||
        Amount_rqsted='$spcfy_ipt' ||Amount_rcved='$spcfy_ipt' || Toatal_good_available='$spcfy_ipt'||
         kizio='$spcfy_ipt'|| Cost_per_unit='$spcfy_ipt' || Total_cost='$spcfy_ipt' ORDER BY id ASC"; 
$Qry=mysql_query($select);
while ($rows=mysql_fetch_array($Qry)) {
  $Item_nam=            $rows['vifaa_aina'];
  $Order_ptn=           $rows['balance_open'];
  $Issue_ptn=           $rows['Amount_rqsted'];
  $Total_ptn_produce=   $rows['Amount_rcved'];
  $Sales_ptn=           $rows['Toatal_good_available'];
  $Trans_rejct=         $rows['kizio'];
  $Sale_price=          $rows['Cost_per_unit'];
  $C_balanc=            $rows['Total_cost'];
  $S_amunt=             $rows['Date_ent'];
 

    $pdf->SetFont('Arial','B','8');
  $pdf->Cell(31,7,$Item_nam,1,0);
  $pdf->Cell(20,7,$Order_ptn,1,0,'R');
  $pdf->Cell(27,7,$Issue_ptn,1,0,'R');
  $pdf->Cell(28.5,7, $Total_ptn_produce,1,0,'R');
  $pdf->Cell(28.5,7,$Sales_ptn,1,0,'R');
  $pdf->Cell(15,7,$Trans_rejct,1,0);
  $pdf->Cell(13,7,$Sale_price,1,0,'R');
  $pdf->Cell(19,7,$C_balanc,1,0,'R');
  $pdf->Cell(17,7,$S_amunt,1,1);

    
  $sum_opn+=$rows['balance_open'];
  $sum_reqst += $rows['Amount_rqsted'];
  $sum_resved += $rows['Amount_rcved'];
  $sum_trvd += $rows['Toatal_good_available'];
  $sum_tcost += $rows['Total_cost'];




}
  
   $pdf->SetFont('Arial','B','10');
  $pdf->Cell(31,7,'TOTAL (TSH)',1,0,'C');
  $pdf->Cell(20,7,$sum_opn,1,0,'R');
  $pdf->Cell(27,7,$sum_reqst,1,0,'R');
  $pdf->Cell(28.5,7, $sum_resved,1,0,'R');
  $pdf->Cell(28.5,7,$sum_trvd,1,0,'R');
  $pdf->Cell(15,7,'-',1,0);
  $pdf->Cell(13,7,'-',1,0);
  $pdf->Cell(19,7,$sum_tcost,1,0,'R');
  $pdf->Cell(17,7,'-',1,1);
}
}

$pdf->output();
?>