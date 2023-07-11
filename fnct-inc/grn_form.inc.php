<?php
session_start();
 $conn=mysql_connect('localhost','root','');
 mysql_select_db('menu_mpya');

 $sup_name=mysql_real_escape_string(ucwords(ucfirst($_POST['sup_name'])));
 $item_nam=mysql_real_escape_string(ucfirst($_POST['item_nam']));
 $recved_qty=mysql_real_escape_string($_POST['recved_qty']);
 $selct_unit=mysql_real_escape_string($_POST['selct_unit']);
 $unit_cost=mysql_real_escape_string($_POST['unit_cost']);
 /*$rejected_qty=mysql_real_escape_string($_POST['rejected_qty']);
 $sales_cost=mysql_real_escape_string($_POST['sales_cost']);*/

if (isset($_POST['sbmt'])) {
	if (empty($sup_name)) {
		$_SESSION['sup-name']="Jaza Jina la Mletaji";
		$_SESSION['item_nam']="";
		$_SESSION['recved_qty']="";
		$_SESSION['selct_unit']="";
		$_SESSION['unit_cost']="";
		$_SESSION['grn_sc']="";
		header('location:../reports-form/grn_orda_form.php?=Error-1');
	}else{
		if (!preg_match('/^[a-z A-Z]*$/', $sup_name)) {
			$_SESSION['sup-name']="Jaza Jina La Mleta Bidhaaa kwa maneno";
			$_SESSION['item_nam']="";
			$_SESSION['recved_qty']="";
			$_SESSION['selct_unit']="";
			$_SESSION['unit_cost']="";
			$_SESSION['grn_sc']="";
		    header('location:../reports-form/grn_orda_form.php?=Error-2');
	}else
	if (!preg_match('/^[a-z A-Z]*$/', $item_nam)) {
		    $_SESSION['item-nam']="Jaza Jina La Bidhaaa kwa maneno";
			$_SESSION['sup-name']="";
			$_SESSION['recved_qty']="";
			$_SESSION['selct_unit']="";
			$_SESSION['unit_cost']="";
			$_SESSION['grn_sc']="";
		    header('location:../reports-form/grn_orda_form.php?=Error-2');
	}else{
		if (empty($item_nam) ) {
			$_SESSION['item-nam']="Jaza Jina La Bidhaaa ";
		    $_SESSION['sup-name']="";
			$_SESSION['recved_qty']="";
			$_SESSION['selct_unit']="";
			$_SESSION['unit_cost']="";
			$_SESSION['grn_sc']="";
		    header('location:../reports-form/grn_orda_form.php?=Error-3');
		   
	}else{
		if (empty($recved_qty)  ) {
			$_SESSION['recved_qty']="Jaza Kiasi Kilichopokelewa";
			$_SESSION['sup-name']="";
			$_SESSION['item-nam']="";
			$_SESSION['selct_unit']="";
			$_SESSION['unit_cost']="";
			$_SESSION['grn_sc']="";
		    header('location:../reports-form/grn_orda_form.php?=Error-4');
	}else{
		if ($recved_qty <= 0) {
			$_SESSION['recved_qty']="Kiasi Kilichopokelewa Hakiwezi Kuwa Namba Hasi";
			$_SESSION['sup-name']="";
			$_SESSION['item-nam']="";
			$_SESSION['selct_unit']="";
			$_SESSION['unit_cost']="";
			$_SESSION['grn_sc']="";
		    header('location:../reports-form/grn_orda_form.php?=Error-5');
		}else{
		if (empty($selct_unit)) {
			$_SESSION['selct_unit']="Chagua Kizio";
			$_SESSION['sup-name']="";
			$_SESSION['item-nam']="";
			$_SESSION['recved_qty']="";
			$_SESSION['unit_cost']="";
			$_SESSION['grn_sc']="";
	        header('location:../reports-form/grn_orda_form.php?=Error-6');
	}else{
		if (empty($unit_cost)) {
			$_SESSION['unit_cost']="Jaza Bei ya Kila Kiwango";
			$_SESSION['sup-name']="";
			$_SESSION['item-nam']="";
			$_SESSION['recved_qty']="";
			$_SESSION['selct_unit']="";
			$_SESSION['grn_sc']="";
            header('location:../reports-form/grn_orda_form.php?=Error-7');
	}else{
	   if ($unit_cost <=0) {
		    $_SESSION['unit_cost']="Bei Haiwezi kua Namba Hasi";
			$_SESSION['sup-name']="";
			$_SESSION['item-nam']="";
			$_SESSION['recved_qty']="";
			$_SESSION['selct_unit']="";
			$_SESSION['grn_sc']="";
            header('location:../reports-form/grn_orda_form.php?=Error-8');
	}else{

		$usa_slct="SELECT user_id FROM users ORDER BY user_id ASC";
		$usa_qry=mysql_query($usa_slct,$conn);
		while ($row=mysql_fetch_assoc($usa_qry)) {
			$gd_id=$row['user_id'];
		}


		  $total_value= $recved_qty * $unit_cost;

		  $insert="INSERT INTO  good_rcved_nt(user_id, Supplier_name, item_name, Qty_received, kizio, Cost_per_unit, Total_cost, Time_ent, Date_ent)
          VALUES('$gd_id', '$sup_name', '$item_nam', '$recved_qty', '$selct_unit', '$unit_cost', '$total_value',  NOW(), NOW())";
          mysql_query($insert) or die(mysql_error()) ;


        $slct="SELECT * FROM main_store where ITEMS='$item_nam' ";
          $qry=mysql_query($slct);
          $retriev = mysql_affected_rows($conn);
          if ($retriev >= 1) {
          while ($rows=mysql_fetch_assoc($qry)) {
          	$id_no=$rows['ID'];
          	 $items=$rows['ITEMS'];
          	 $toto_nmt=$rows['TOTAL_AMOUNT'];
          	 $blc_upd=$rows['BALANCE'];
          	 $un_masure=$rows['UNIT_MESSURE'];
          	 $un_cost=$rows['UNIT_COST'];
          	 $tot_cost=$rows['TOTAL_COST'];


          	      }
              }
          	
              if ($item_nam == $items && $selct_unit==$un_masure && $unit_cost==$un_cost) {
          	 	$sum_unts=$recved_qty + $toto_nmt;
          	 	$sum_balc=$recved_qty + $blc_upd;
          	 	$sum_cost=$recved_qty * $un_cost;
          	 	$total_cost=$sum_cost + $tot_cost;
          	 	$updat2="UPDATE main_store  SET TOTAL_AMOUNT='$sum_unts',
          	 	 BALANCE='$sum_balc', TOTAL_COST='$total_cost',Total_cost_balance='$total_cost'  where ID='$id_no' ";
          	 	$retriev=mysql_query($updat2);
          	 	

          	 }else{
          $inset="INSERT INTO  main_store(user_id, ITEMS, TOTAL_AMOUNT, BALANCE, UNIT_MESSURE, UNIT_COST, TOTAL_COST,Total_cost_balance, Time_enta,date_enta)
          VALUES('$gd_id', '$item_nam', '$recved_qty', '$recved_qty', '$selct_unit','$unit_cost','$total_value','$total_value',NOW(),NOW())";
          mysql_query($inset) ;
            
          	 }

        /*  $_SESSION['']="Umefanikiwa Kutuma data";
          header('location:../html-php/mpikaji-stock-sheet.php?=Umefanikiwa-Kutuma-data');*/

		   

          $_SESSION['grn_sc']="Umefanikiwa Kutuma data";
          $_SESSION['unit_cost']=" ";
			$_SESSION['sup-name']="";
			$_SESSION['item-nam']="";
			$_SESSION['recved_qty']="";
			$_SESSION['selct_unit']="";
          header('location:../reports-form/grn_orda_form.php?=Umefanikiwa-Kutuma-data');
	

           
		               }
					}
				}
			}
			
		}
				
	}
   }
 }	    
	 
}else{
		$_SESSION['unit_cost']="";
		$_SESSION['sup-name']="";
		$_SESSION['item-nam']="";
		$_SESSION['recved_qty']="";
		$_SESSION['selct_unit']="";

	}


?>