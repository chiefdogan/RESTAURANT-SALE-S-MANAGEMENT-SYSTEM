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
//$att_image="<img src='../sahihi/".$rows['Signature']."' alt='weka picha'>";
//$acc_image=$pdf->image("<img src='../sahihi/".$rows['Signature']."' alt='weka picha'>");



$pdf->SetMargins(20,0,0);
$pdf->SetAutoPageBreak(true,0);
$pdf->AliasNbPages();

//$pdf->image($image,10,15,190,30);



$pdf->Cell(70,30,$image,0,0);
$pdf->SetFont('times','B','24');
$pdf->Cell(123,30,"Tanzania's Caterer of Choice",0,1,"C");
$pdf->SetFont('times','u','12');
$pdf->Cell(75,9,'ACCOUNTANT REPORT',0,0);
//$pdf->SetFont('times','B','24');
$pdf->Cell(58,9,$mlo_leo,0,0,"C");
$pdf->Cell(65,9,$date,0,1,'C');
$pdf->SetFont('Arial','B','8');
$pdf->Cell(15,8,'S/N',1,0,'C');
$pdf->Cell(60,8,'ATTENDANT NAME',1,0,'C');
$pdf->Cell(30,8,'AMOUNT RECEIVED',1,0,'C');
$pdf->Cell(30,8,'SECTION FROM ',1,0,'C');
$pdf->Cell(31.5,8,'DATE',1,1,'C');
/*$pdf->Cell(31.5,8,'ACC/SIGNATURE',1,1,'C');*/


$conn=mysql_connect('localhost','root','');
 mysql_select_db('menu_mpya');
    $submt_bttn=$_SESSION['sbmt'];
    $spcfy_inpt=$_SESSION['specify'];
 if (isset($submt_bttn)) {

  $dbselect=mysql_real_escape_string($_POST['date_text']);

   if ( empty($spcfy_inpt)) {

$select="SELECT * FROM acc_receive ORDER BY ID ASC";
$count=mysql_affected_rows($conn);
$Qry=mysql_query($select);
if ($count==TRUE) {
while ($rows=mysql_fetch_array($Qry)) {
  $Item_nam=            $rows['id'];
  $Order_ptn=           $rows['Afisa_name'];
  $Issue_ptn=           $rows['Amount_recv'];
  $Total_ptn_produce=   $rows['Section_from'];
  $date=   $rows['Date_recv'];
 //$Sales_ptn=           $pdf->image("../sahihi/".$rows['Signature']."");
  $Trans_rejct=         $att_image;
  

      $pdf->SetFont('Arial','B','10');
      $pdf->Cell(15,7,$Item_nam,1,0);
      $pdf->Cell(60,7,$Order_ptn,1,0);
      $pdf->Cell(30,7,$Issue_ptn,1,0,'R');
      $pdf->Cell(30,7, $Total_ptn_produce,1,0);
      $pdf->Cell(31.5,7,$date,1,1,'C');
      /*$pdf->Cell(31.5,7,$pdf->image("../sahihi/".$rows['Signature']."",$pdf->GetX()+0.7,$pdf->GetY()+0.5,30,6),1,1,true);*/  
 
  $Issue_ptn_sum +=$rows['Amount_recv'];

}
     $pdf->SetFont('Arial','B','11');
      $pdf->Cell(75,7,'SUM (TSH)',1,0,'C');
      $pdf->Cell(30,7,$Issue_ptn_sum,1,0,'R');
      $pdf->Cell(30,7, ' ' ,1,0);
      $pdf->Cell(31.5,7,' ',1,1,'C');
}

}else{
$select="SELECT * FROM acc_receive where Date_recv='$spcfy_inptect' || Afisa_name='$spcfy_inpt' ||
        Amount_recv='$spcfy_inpt'|| Section_from='$spcfy_inpt'  ORDER BY id ASC";
$count=mysql_affected_rows($conn);
$Qry=mysql_query($select);
if ($count==TRUE) {
while ($rows=mysql_fetch_array($Qry)) {
  $Item_nam=            $rows['id'];
  $Order_ptn=           $rows['Afisa_name'];
  $Issue_ptn=           $rows['Amount_recv'];
  $Total_ptn_produce=   $rows['Section_from'];
  $Trans_rejct=         $att_image;
  $date=   $rows['Date_recv'];
  

      $pdf->SetFont('Arial','B','10');
      $pdf->Cell(15,7,$Item_nam,1,0);
      $pdf->Cell(60,7,$Order_ptn,1,0);
      $pdf->Cell(30,7,$Issue_ptn,1,0,'R');
      $pdf->Cell(30,7, $Total_ptn_produce,1,0);
      $pdf->Cell(31.5,7,$date,1,1,'C');
     /* $pdf->Cell(31.5,7,$pdf->image("../sahihi/".$rows['Signature']."",$pdf->GetX()+0.7,$pdf->GetY()+0.5,30,6),1,1,true);*/  
 
      $Issue_ptn_sum +=$rows['Amount_recv'];

}
     $pdf->SetFont('Arial','B','11');
      $pdf->Cell(75,7,'SUM (TSH)',1,0,'C');
      $pdf->Cell(30,7,$Issue_ptn_sum,1,1,'R');
      $pdf->Cell(30,7, ' ' ,1,0);
      $pdf->Cell(31.5,7,' ',1,1,'C');
}
}
}



$pdf->output();
?>