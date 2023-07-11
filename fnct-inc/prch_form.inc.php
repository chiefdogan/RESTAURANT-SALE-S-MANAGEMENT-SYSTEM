<?php
session_start();
 $conn=mysql_connect('localhost','root','');
 mysql_select_db('menu_mpya');

 $item_nam=mysql_real_escape_string(ucfirst($_POST['item_nam']));
 $order_num=mysql_real_escape_string($_POST['order_num']);
 $recved_qty=mysql_real_escape_string($_POST['recved_qty']);
 $selct_unit=mysql_real_escape_string($_POST['selct_unit']);
 $unit_cost=mysql_real_escape_string($_POST['unit_cost']);
 $image=mysql_real_escape_string($_POST['image']);
 $balance=mysql_real_escape_string($_POST['balance']);
 /*$rejected_qty=mysql_real_escape_string($_POST['rejected_qty']);
 $sales_cost=mysql_real_escape_string($_POST['sales_cost']);*/

if (isset($_POST['submit'])) {

	if (empty($item_nam) ) {
			$_SESSION['item-nm']="Jaza Jina La Bidhaaa ";
		    $_SESSION['order_nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['unit_cst']="";
			$_SESSION['balance']="";
			$_SESSION['toto_alet']="";
		    header('location:../reports-form/prch_orda_form.php?=Error-3');
	}else{
		if (!preg_match('/^[a-z A-Z]*$/', $item_nam)) {
			 $_SESSION['item-nm']="Jaza Jina La Bidhaaa kwa maneno";
			  $_SESSION['order_nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['unit_cst']="";
			$_SESSION['balance']="";
			$_SESSION['toto_alet']="";
		    header('location:../reports-form/prch_orda_form.php?=Error-2');
    }else{
    	if (empty($balance)) {
			$_SESSION['unit_cst']="";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['toto_alet']="";
			$_SESSION['balance']="Jaza Kiasi Kilichopo ";
            header('location:../reports-form/prch_orda_form.php?=Error-8');
	}else{
		if ($balance <= -1) {
			$_SESSION['unit_cst']="";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['toto_alet']="";
			$_SESSION['balance']="Kiasi Kilichopo Kiwekikubwa kuliko 0 ";
            header('location:../reports-form/prch_orda_form.php?=Error-8');
	}else{
	    if  ( $order_num <=0){
		   $_SESSION['order_nm']="Kiasi Kilichoobwa Kiwe Kikubwa Kuliko 0";
			$_SESSION['item-nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['unit_cst']="";
			$_SESSION['balance']="";
			$_SESSION['toto_alet']="";
		    header('location:../reports-form/prch_orda_form.php?=Error-2');
	
	}else{
	if (empty($order_num)) {
			$_SESSION['order_nm']="Jaza kiasi kilichoombwa";
			$_SESSION['item-nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['unit_cst']="";
			$_SESSION['balance']="";
			$_SESSION['toto_alet']="";
			header('location:../reports-form/prch_orda_form.php?=Error-1');
		   
	}else{
		/*if (empty($recved_qty)  ) {
			$_SESSION['recved_qt']="Jaza Kiasi Kilichopokelewa";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['selct_unt']="";
			$_SESSION['unit_cst']="";
			$_SESSION['balance']="";
		    header('location:../reports-form/prch_orda_form.php?=Error-4');
	}else{*/
		if ($recved_qty <= 0) {
			$_SESSION['recved_qt']="Kiasi Kilichopokelewa Kiwe Kikubwa Kuliko 0";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['selct_unt']="";
			$_SESSION['unit_cst']="";
			$_SESSION['balance']="";
			$_SESSION['toto_alet']="";
		    header('location:../reports-form/prch_orda_form.php?=Error-5');
		}else{
		 if ($recved_qty > $order_num) {
		 	$_SESSION['recved_qt']="Jaza Kiasi Kinachotolewa ni kikubwa kuliko kinachoombwa";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['selct_unt']="";
			$_SESSION['unit_cst']="";
			$_SESSION['balance']="";
			$_SESSION['toto_alet']="";
		    header('location:../reports-form/prch_orda_form.php?=Error-4');
		 }else{
		if (empty($selct_unit)) {
			$_SESSION['selct_unt']="Chagua Kizio";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['unit_cst']="";
			$_SESSION['balance']="";
			$_SESSION['toto_alet']="";
	        header('location:../reports-form/prch_orda_form.php?=Error-6');
	}else{
		if (empty($unit_cost)) {
			$_SESSION['unit_cst']="Jaza Bei ya Kila Kiwango";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['balance']="";
			$_SESSION['toto_alet']="";
            header('location:../reports-form/prch_orda_form.php?=Error-7');
	}else{
	   if ($unit_cost <=0) {
		    $_SESSION['unit_cst']="Bei Iwe kubwa Kuliko 0";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['balance']="";
			$_SESSION['toto_alet']="";
            header('location:../reports-form/prch_orda_form.php?=Error-8');
	}else{

		$usa_slct="SELECT user_id FROM users ORDER BY user_id ASC";
		$usa_qry=mysql_query($usa_slct,$conn);
		while ($row=mysql_fetch_assoc($usa_qry)) {
			$gd_id=$row['user_id'];
		}
		
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


          if ($unit_cost== $un_cost && $selct_unit==$un_masure ) {
          	if ($recved_qty > $toto_nmt) {
          	$_SESSION['unit_cst']=" ";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['balance']="";
			$_SESSION['toto_alet']="Kiasi Kinachotakiwa ni kikubwa.Kilichopo ni  ".$toto_nmt;
          	}else{
          $dcs_mnt= $toto_nmt- $recved_qty;
          $cost_aqd= $recved_qty * $unit_cost;
          $dcs_cs=$tot_cost - $cost_aqd;
          $udate="UPDATE main_store SET BALANCE='$dcs_mnt', Total_cost_balance='$dcs_cs' WHERE ID='$id_no'";
          $count=mysql_query($udate);

            $total_value= $recved_qty * $unit_cost;
          $t_goods_available=$balance + $recved_qty;
		  $insert="INSERT INTO   purche_order_rpt(user_id, vifaa_aina,balance_open, Amount_rqsted, Amount_rcved,Toatal_good_available,Cost_per_unit, kizio,Total_cost,signature, Time_ent, Date_ent)
          VALUES('$gd_id', '$item_nam', '$balance', '$order_num', '$recved_qty', '$t_goods_available', '$unit_cost', '$selct_unit','$total_value','$image', NOW(), NOW())";
            $_SESSION['unit_cst']=" ";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['balance']="";
            $_SESSION['toto_alet']="Umefanikiwa Kuchukua Bidhaa";
          mysql_query($insert) ;
      }
        
          }else
          if ($unit_cost!= $un_cost || $selct_unit!=$un_masure) {
          	$_SESSION['unit_cst']=" ";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['balance']="";
			$_SESSION['toto_alet']="Bidhaa ".ucfirst($item_nam)." Imeisha";
          header('location:../reports-form/prch_orda_form.php?=Error_10');
          }

          $_SESSION['unit_cst']=" ";
			$_SESSION['item-nm']="";
			$_SESSION['order_nm']="";
			$_SESSION['recved_qt']="";
			$_SESSION['selct_unt']="";
			$_SESSION['balance']="";
          header('location:../reports-form/prch_orda_form.php?=Umefanikiwa-Kutuma-data');
                        //  }
	
                         }
           
		               }
					}
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
		$_SESSION['order_num']="";
		$_SESSION['item-nam']="";
		$_SESSION['recved_qty']="";
		$_SESSION['selct_unit']="";
		$_SESSION['toto_alet']="";

	}


?>