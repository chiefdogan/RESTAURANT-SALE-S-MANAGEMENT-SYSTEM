<?php
session_start();

include_once('pdf/fpdf.php');
$pdf=new FPDF();

$pdf->AddPage();
$pdf->SetAutoPageBreak(true,1);
$pdf->SetMargins(5,20,20);

$image1=$pdf->image('../PDF_REPORTS/images/ako1.jpg',5,11,195,30);
$date=date('d/ m/ Y');
$mlo_type=strtoupper($_SESSION['selected_mlo']);

$_SESSION['rept-id']=027401;
$_SESSION['rept-id-inc']+=1;
$rpt_id=$_SESSION['rept-id'] + $_SESSION['rept-id-inc'];
$_SESSION['report_id']=$rpt_id;



$pdf->Cell(193,30,'$image1',0,1);
$pdf->SetFont('arial','B','12');
$pdf->Cell(82,6,'Trh : '.$date,0,0,'C');
$pdf->Cell(40,6,$mlo_type,0,0);
$pdf->Cell(76,6,''/*'NO : '.$rpt_id*/,0,1, 'C');

$pdf->SetFont('times','B','10');
$pdf->Cell(12,8,'S/N',1,0);
$pdf->Cell(30,8,'ODA/NAMBA',1,0);
$pdf->Cell(42,8,'WANGA',1,0);
$pdf->Cell(42,8,'MBOGA',1,0);
$pdf->Cell(23,8,'ID/SAHANI',1,0);
$pdf->Cell(23,8,'MAUZO',1,0);
$pdf->Cell(24,8,'TAREHE',1,1);

$conn=mysql_connect('localhost','root','');
mysql_select_db('menu_mpya');

$sechi_bttn=$_SESSION['sech'];
 $spcfy_item=$_SESSION['itm_name'];

 if (isset($sechi_bttn)) {
 	if (empty($spcfy_item)) {
 		$select="SELECT id, order_no, wanga , mboga,SUM(T_cost),SUM(Plt_no),date_entered ,COUNT(*) FROM food_pchs 
                         GROUP BY wanga,mboga  HAVING COUNT(*) >= 1 ORDER BY wanga ASC";
		$qry=mysql_query($select, $conn);

		while ($rows=mysql_fetch_array($qry)) {

		$total_costs +=$rows['SUM(T_cost)'];
	    $total_plates +=$rows['SUM(Plt_no)'];

	    $pdf->SetFont('arial','B','8');
		$pdf->Cell(12,8,$rows['id'],1,0);
		$pdf->Cell(30,8,$rows['order_no'],1,0);
		$pdf->Cell(42,8,$rows['wanga'],1,0);
		$pdf->Cell(42,8,$rows['mboga'],1,0);
		$pdf->Cell(23,8,$rows['SUM(Plt_no)'],1,0);
		$pdf->Cell(23,8,$rows['SUM(T_cost)'],1,0);
		$pdf->Cell(24,8,$rows['date_entered'],1,1);

	}
	 $pdf->SetFont('times','B','15');
	 $pdf->Cell(126,10,'TOTAL COST',1,0,'C');
	 $pdf->SetFont('arial','B','11');
	 $pdf->Cell(23,10,$total_plates,1,0);
	 $pdf->Cell(23,10,$total_costs,1,0);
	 $pdf->Cell(24,10,'',1,1); 

 	}else{
 		$select="SELECT id, order_no, wanga , mboga,SUM(T_cost),SUM(Plt_no),date_entered ,COUNT(*) FROM food_pchs WHERE (wanga='$spcfy_item' || 
                  mboga='$spcfy_item'|| date_entered='$spcfy_item')  GROUP BY wanga,mboga  HAVING COUNT(*) >= 1 ORDER BY wanga ASC ";
		$qry=mysql_query($select, $conn);

		while ($rows=mysql_fetch_array($qry)) {

		$total_costs +=$rows['SUM(T_cost)'];
	    $total_plates +=$rows['SUM(Plt_no)'];

	    $pdf->SetFont('arial','B','8');
		$pdf->Cell(12,8,$rows['id'],1,0);
		$pdf->Cell(30,8,$rows['order_no'],1,0);
		$pdf->Cell(42,8,$rows['wanga'],1,0);
		$pdf->Cell(42,8,$rows['mboga'],1,0);
		$pdf->Cell(23,8,$rows['SUM(Plt_no)'],1,0);
		$pdf->Cell(23,8,$rows['SUM(T_cost)'],1,0);
		$pdf->Cell(24,8,$rows['date_entered'],1,1);

	}
	 $pdf->SetFont('times','B','15');
	 $pdf->Cell(126,10,'TOTAL COST',1,0,'C');
	 $pdf->SetFont('arial','B','11');
	 $pdf->Cell(23,10,$total_plates,1,0);
	 $pdf->Cell(23,10,$total_costs,1,0);
	 $pdf->Cell(24,10,'',1,1); 

 	}
 }

                  

$pdf->output();


?>
