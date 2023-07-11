<?php
session_start();
if (!isset($_SESSION['ur_name']) ) {
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
$submt=$_SESSION['sbmt'];
$sect=$_SESSION['sect'];




$pdf->SetMargins(12,0,0);
$pdf->SetAutoPageBreak(true,0);
$pdf->AliasNbPages();

//$pdf->image($image,10,15,190,30);



$pdf->Cell(70,30,$image,0,0);
$pdf->SetFont('times','B','24');
$pdf->Cell(123,30,"Tanzania's Caterer of Choice",0,1,"C");
$pdf->SetFont('times','u','12');
$pdf->Cell(75,9,'GOODS RECEIVED NOTE',0,0);
//$pdf->SetFont('times','B','24');
$pdf->Cell(58,9,$mlo_leo,0,0,"C");
$pdf->Cell(65,9,$date,0,1,'C');
$pdf->SetFont('Arial','B','10');
$pdf->Cell(40,10.5,'item',1,0,'C');
$pdf->Cell(30,10.5,'Qnty/Recieved',1,0,'C');
$pdf->Cell(25,10.5,'Units',1,0,'C');
$pdf->Cell(30,10.5,'Costs ',1,0,'C');
$pdf->Cell(30,10.5,'Our Order No',1,0,'C');
$pdf->Cell(30,10.5,'Date',1,1,'C');

 $conn=mysql_connect('localhost','root','');
 mysql_select_db('menu_mpya');

 $submt_bttn=$_SESSION['sbmt'];
 $spcfy_inpt=$_SESSION['specify'];

 if (isset($submt_bttn)) {

  $dbselect=mysql_real_escape_string($_POST['date_text']);

   if ( empty($spcfy_inpt)) {
$select="SELECT * FROM good_rcved_nt ORDER BY ID ASC ";
$Qry=mysql_query($select);
while ($rows=mysql_fetch_array($Qry)) {
  $Item_nam=            $rows['item_name'];
  $Order_ptn=           $rows['Qty_received'];
  $Issue_ptn=           $rows['kizio'];
  $Total_ptn_produce=   $rows['Cost_per_unit'];
  $Sales_ptn=           $rows['Total_cost'];
  $Trans_rejct=         $rows['Date_ent'];


    $pdf->SetFont('Arial','B','8');
	$pdf->Cell(40,7,$Item_nam,1,0,'TR');
	$pdf->Cell(30,7,$Order_ptn,1,0,'R');
	$pdf->Cell(25,7,$Issue_ptn,1,0,'C');
	$pdf->Cell(30,7, $Total_ptn_produce,1,0,'R');
	$pdf->Cell(30,7,$Sales_ptn,1,0,'R');
	$pdf->Cell(30,7,$Trans_rejct,1,1,'C');

    
 $sum_revd += $rows['Qty_received'];
 $sum_tcost += $rows['Total_cost'];




}
  
   $pdf->SetFont('Arial','B','10');
	$pdf->Cell(40,7,'TOTAL (TSH)',1,0,'C');
	$pdf->Cell(30,7,$sum_revd,1,0,'R');
	$pdf->Cell(25,7,'-',1,0);
	$pdf->Cell(30,7, '-',1,0);
	$pdf->Cell(30,7,$sum_tcost,1,0,'R');
	$pdf->Cell(30,7,'-',1,1);
}else{

$select="SELECT * FROM good_rcved_nt where  Date_ent='$spcfy_inpt' || item_name='$spcfy_inpt'|| 
        Qty_received='$spcfy_inpt' || kizio='$spcfy_inpt' || Cost_per_unit='$spcfy_inpt'|| Total_cost='$spcfy_inpt' ORDER BY ID ASC";
$Qry=mysql_query($select);
while ($rows=mysql_fetch_array($Qry)) {
  $Item_nam=            $rows['item_name'];
  $Order_ptn=           $rows['Qty_received'];
  $Issue_ptn=           $rows['kizio'];
  $Total_ptn_produce=   $rows['Cost_per_unit'];
  $Sales_ptn=           $rows['Total_cost'];
  $Trans_rejct=         $rows['Date_ent'];


    $pdf->SetFont('Arial','B','8');
  $pdf->Cell(40,7,$Item_nam,1,0,'TR');
  $pdf->Cell(30,7,$Order_ptn,1,0,'R');
  $pdf->Cell(25,7,$Issue_ptn,1,0,'C');
  $pdf->Cell(30,7, $Total_ptn_produce,1,0,'R');
  $pdf->Cell(30,7,$Sales_ptn,1,0,'R');
  $pdf->Cell(30,7,$Trans_rejct,1,1,'C');

    
 $sum_revd += $rows['Qty_received'];
 $sum_tcost += $rows['Total_cost'];




}
  
   $pdf->SetFont('Arial','B','10');
  $pdf->Cell(40,7,'TOTAL (TSH)',1,0,'C');
  $pdf->Cell(30,7,$sum_revd,1,0,'R');
  $pdf->Cell(25,7,'-',1,0);
  $pdf->Cell(30,7, '-',1,0);
  $pdf->Cell(30,7,$sum_tcost,1,0,'R');
  $pdf->Cell(30,7,'-',1,1);

}
}

$pdf->output();
?>