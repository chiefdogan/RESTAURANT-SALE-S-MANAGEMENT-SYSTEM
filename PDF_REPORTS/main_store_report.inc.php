<?php
session_start();
if (!isset($_SESSION['ur_name'])  ) {
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
$pdf->SetFont('times','U','24');
$pdf->Cell(123,30,"Tanzania's Caterer of Choice",0,1,"C");
$pdf->SetFont('Arial','u','14');
$pdf->Cell(75,9,'STOO KUU',0,0);
//$pdf->SetFont('times','B','24');
$pdf->Cell(58,9,$mlo_leo,0,0,"C");
$pdf->Cell(65,9,$date,0,1,'C');
$pdf->SetFont('Arial','B','12');
$pdf->Cell(40,7,'BIDHAA',1,0,'C');
$pdf->Cell(30,7,'K/KILICHOPO',1,0,'C');
$pdf->Cell(30,7,'KIZIO',1,0,'C');
$pdf->Cell(30,7,'BEI @',1,0,'C');
$pdf->Cell(35,7,'THAMANI (TSH)',1,0,'C');
$pdf->Cell(35,7,'TAREHE',1,1,'C');


 $conn=mysql_connect('localhost','root','');
 mysql_select_db('menu_mpya');
 $submt_btn=$_SESSION['sbmt'];
 $spcfy_ipt=$_SESSION['specify'];

if (isset($submt_btn)) {

  $dbselect=mysql_real_escape_string($_POST['date_text']);

   if ( empty($spcfy_ipt)) {

$select="SELECT * FROM  main_store ORDER BY id ASC";
$Qry=mysql_query($select);
while ($rows=mysql_fetch_array($Qry)) {
  $Item_nam=            $rows['ITEMS'];
  $Order_ptn=           $rows['BALANCE'];
  $Trans_rejct=         $rows['UNIT_MESSURE'];
  $Sale_price=          $rows['UNIT_COST'];
  $C_balanc=            $rows['Total_cost_balance'];
  $S_amunt=             $rows['date_enta'];
 

    $pdf->SetFont('Arial','B','8');
  $pdf->Cell(40,5.5,$Item_nam,1,0);
  $pdf->Cell(30,5.5,$Order_ptn,1,0,'R');
  $pdf->Cell(30,5.5,$Trans_rejct,1,0,'C');
  $pdf->Cell(30,5.5,$Sale_price,1,0,'R');
  $pdf->Cell(35,5.5,$C_balanc,1,0,'R');
  $pdf->Cell(35,5.5,$S_amunt,1,1,'C');

    
  $sum_amnt +=  $rows['BALANCE'];
  $sum_tcost += $rows['Total_cost_balance'];




}
  
   $pdf->SetFont('Arial','B','10');
  $pdf->Cell(40,5.5,'JUMLA (TSH)',1,0,'C');
  $pdf->Cell(30,5.5,$sum_amnt,1,0,'R');
  $pdf->Cell(30,5.5,'-',1,0,'C');
  $pdf->Cell(30,5.5,'-',1,0,'R');
  $pdf->Cell(35,5.5,$sum_tcost,1,0,'R');
  $pdf->Cell(35,5.5,'-',1,1,'C');

}else{
$select="SELECT * FROM  main_store WHERE ITEMS='$spcfy_ipt' || date_enta='$spcfy_ipt'|| BALANCE='$spcfy_ipt'||
UNIT_MESSURE='$spcfy_ipt'|| UNIT_COST='$spcfy_ipt'|| Total_cost_balance='$spcfy_ipt' ORDER BY ID ASC";
$Qry=mysql_query($select);
while ($rows=mysql_fetch_array($Qry)) {
  $Item_nam=            $rows['ITEMS'];
  $Order_ptn=           $rows['BALANCE'];
  $Trans_rejct=         $rows['UNIT_MESSURE'];
  $Sale_price=          $rows['UNIT_COST'];
  $C_balanc=            $rows['Total_cost_balance'];
  $S_amunt=             $rows['date_enta'];
 

    $pdf->SetFont('Arial','B','8');
  $pdf->Cell(40,5.5,$Item_nam,1,0);
  $pdf->Cell(30,5.5,$Order_ptn,1,0,'R');
  $pdf->Cell(30,5.5,$Trans_rejct,1,0,'C');
  $pdf->Cell(30,5.5,$Sale_price,1,0,'R');
  $pdf->Cell(35,5.5,$C_balanc,1,0,'R');
  $pdf->Cell(35,5.5,$S_amunt,1,1,'C');

    
  $sum_amnt +=  $rows['BALANCE'];
  $sum_tcost += $rows['Total_cost_balance'];




}
  
   $pdf->SetFont('Arial','B','12');
  $pdf->Cell(40,7,'JUMLA (TSH)',1,0,'C');
  $pdf->Cell(30,7,$sum_amnt,1,0,'R');
  $pdf->Cell(30,7,'-',1,0,'C');
  $pdf->Cell(30,7,'-',1,0,'R');
  $pdf->Cell(35,7,$sum_tcost,1,0,'R');
  $pdf->Cell(35,7,'-',1,1,'C');
}
}

$pdf->output();
?>