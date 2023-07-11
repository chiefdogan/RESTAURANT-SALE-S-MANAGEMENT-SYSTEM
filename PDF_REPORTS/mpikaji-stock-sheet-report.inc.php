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
//$mlo_leo=strtoupper($_SESSION['selected_mlo']);




$pdf->SetMargins(5,0,0);
$pdf->SetAutoPageBreak(true,0);
$pdf->AliasNbPages();

//$pdf->image($image,10,15,190,30);



$pdf->Cell(70,30,$image,0,0);
$pdf->SetFont('times','B','24');
$pdf->Cell(123,30,"Tanzania's Caterer of Choice",0,1,"C");
$pdf->SetFont('times','u','12');
$pdf->Cell(75,9,'KITCHEN CELLS CONTROL SHEET',0,0);
//$pdf->SetFont('times','B','24');
$pdf->Cell(58,9,$mlo_leo,0,0,"C");
$pdf->Cell(65,9,$date,0,1,'C');
$pdf->SetFont('Arial','B','8.5');
$pdf->Cell(28,10.5,'item',1,0);
$pdf->Cell(20,10.5,'O/bal porton',1,0,'L');
$pdf->Cell(17,10.5,'Iss/portion',1,0);
$pdf->Cell(20,10.5,'Total portion ',1,0);
$pdf->Cell(19,10.5,'Sale portion',1,0);
$pdf->Cell(19,10.5,'Trans/reject',1,0);
$pdf->Cell(19,10.5,'Sales price',1,0);
$pdf->Cell(17,10.5,'C/balance',1,0);
$pdf->Cell(16,10.5,'S/amount',1,0);
$pdf->Cell(21,10.5,'C/stock value',1,1);
//$pdf->Cell(14,10.5,'Variance',1,1);

 $conn=mysql_connect('localhost','root','');
 mysql_select_db('menu_mpya');

 $inpt_field=$_SESSION['field'];
  $inpt_tfta=$_SESSION['field_tuma'];

  if (isset($inpt_tfta)) {

    if (!$inpt_field) {
      $select="SELECT * FROM stock_sheet ORDER BY ID ASC";
$Qry=mysql_query($select);
while ($rows=mysql_fetch_array($Qry)) {
  $Item_nam=            $rows['Item_name'];
  $Order_ptn=           $rows['Ordered_ptn'];
  $Issue_ptn=           $rows['Issued_ptn'];
  $Total_ptn_produce=   $rows['Total_ptn_produced'];
  $Sales_ptn=           $rows['Sale_ptn'];
  $Trans_rejct=         $rows['Trans_reject'];
  $Sale_price=          $rows['Sales_price'];
  $C_balanc=            $rows['C_balance'];
  $S_amunt=             $rows['S_amount'];
  $C_stock_valu=        $rows['C_stock_value'];
 // $Varianc=             $rows['Date_entered'];

    $pdf->SetFont('Arial','B','10');
  $pdf->Cell(28,7,$Item_nam,1,0);
  $pdf->Cell(20,7,$Order_ptn,1,0, 'R');
  $pdf->Cell(17,7,$Issue_ptn,1,0, 'R');
  $pdf->Cell(20,7, $Total_ptn_produce,1,0, 'R');
  $pdf->Cell(19,7,$Sales_ptn,1,0, 'R');
  $pdf->Cell(19,7,$Trans_rejct,1,0, 'R');
  $pdf->Cell(19,7,$Sale_price,1,0, 'R');
  $pdf->Cell(17,7,$C_balanc,1,0, 'R');
  $pdf->Cell(16,7,$S_amunt,1,0, 'R');
  $pdf->Cell(21,7,$C_stock_valu,1,1, 'R');
  //$pdf->Cell(14,7,'-',1,1, 'R');
    
  $Order_ptn_sum +=           $rows['Ordered_ptn'];
  $Issue_ptn_sum +=           $rows['Issued_ptn'];
  $Total_ptn_produce_sum +=   $rows['Total_ptn_produced'];
  $Sales_ptn_sum +=           $rows['Sale_ptn'];
  $Trans_rejct_sum +=         $rows['Trans_reject'];
  $Sale_price_sum +=          $rows['Sales_price'];
  $C_balanc_sum +=            $rows['C_balance'];
  $S_amunt_sum +=             $rows['S_amount'];
  $C_stock_valu_sum +=        $rows['C_stock_value'];
  $Varianc_sum +=             $rows['Variance'];




}
     
    }else{
      $select="SELECT * FROM stock_sheet WHERE Item_name='$inpt_field' || Ordered_ptn='$inpt_field'|| Issued_ptn='$inpt_field'
      ||Total_ptn_produced='$inpt_field'||Sale_ptn='$inpt_field' ||Trans_reject='$inpt_field' ||Sales_price='$inpt_field' ||C_balance='$inpt_field' 
      || S_amount='$inpt_field' ||C_stock_value='$inpt_field' ||Date_entered='$inpt_field' ORDER BY ID ASC";
$Qry=mysql_query($select);
while ($rows=mysql_fetch_array($Qry)) {
  $Item_nam=            $rows['Item_name'];
  $Order_ptn=           $rows['Ordered_ptn'];
  $Issue_ptn=           $rows['Issued_ptn'];
  $Total_ptn_produce=   $rows['Total_ptn_produced'];
  $Sales_ptn=           $rows['Sale_ptn'];
  $Trans_rejct=         $rows['Trans_reject'];
  $Sale_price=          $rows['Sales_price'];
  $C_balanc=            $rows['C_balance'];
  $S_amunt=             $rows['S_amount'];
  $C_stock_valu=        $rows['C_stock_value'];
 // $Varianc=             $rows['Date_entered'];

    $pdf->SetFont('Arial','B','10');
  $pdf->Cell(28,7,$Item_nam,1,0);
  $pdf->Cell(20,7,$Order_ptn,1,0, 'R');
  $pdf->Cell(17,7,$Issue_ptn,1,0, 'R');
  $pdf->Cell(20,7, $Total_ptn_produce,1,0, 'R');
  $pdf->Cell(19,7,$Sales_ptn,1,0, 'R');
  $pdf->Cell(19,7,$Trans_rejct,1,0, 'R');
  $pdf->Cell(19,7,$Sale_price,1,0, 'R');
  $pdf->Cell(17,7,$C_balanc,1,0, 'R');
  $pdf->Cell(16,7,$S_amunt,1,0, 'R');
  $pdf->Cell(21,7,$C_stock_valu,1,1, 'R');
  //$pdf->Cell(14,7,'-',1,1, 'R');
    
  $Order_ptn_sum +=           $rows['Ordered_ptn'];
  $Issue_ptn_sum +=           $rows['Issued_ptn'];
  $Total_ptn_produce_sum +=   $rows['Total_ptn_produced'];
  $Sales_ptn_sum +=           $rows['Sale_ptn'];
  $Trans_rejct_sum +=         $rows['Trans_reject'];
  $Sale_price_sum +=          $rows['Sales_price'];
  $C_balanc_sum +=            $rows['C_balance'];
  $S_amunt_sum +=             $rows['S_amount'];
  $C_stock_valu_sum +=        $rows['C_stock_value'];
  $Varianc_sum +=             $rows['Variance'];




}

    }
  }


  
   $pdf->SetFont('Arial','B','12');
	$pdf->Cell(28,7,'SUM',1,0,'L');
	$pdf->Cell(20,7,$Order_ptn_sum,1,0, 'R');
	$pdf->Cell(17,7,$Order_ptn_sum,1,0, 'R');
	$pdf->Cell(20,7, $Total_ptn_produce_sum,1,0, 'R');
	$pdf->Cell(19,7,$Sales_ptn_sum,1,0, 'R');
	$pdf->Cell(19,7,$Trans_rejct_sum,1,0, 'R');
	$pdf->Cell(19,7,$Sale_price_sum,1,0, 'R');
	$pdf->Cell(17,7,$C_balanc_sum,1,0, 'R');
	$pdf->Cell(16,7,$S_amunt_sum,1,0, 'R');
	$pdf->Cell(21,7,$C_stock_valu_sum,1,1, 'R');
	//$pdf->Cell(14,7,'-',1,1, 'R');


$pdf->output();
?>