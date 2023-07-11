<?php
session_start();
 $conn=mysql_connect('localhost','root','');
 mysql_select_db('menu_mpya');

 $item_name=mysql_real_escape_string(ucwords($_POST['item-name']));
 $order_num=mysql_real_escape_string($_POST['order_num']);
 $issed_num=mysql_real_escape_string($_POST['issed_num']);
 $produced_qty=mysql_real_escape_string($_POST['produced_qty']);
 $sales_qty=mysql_real_escape_string($_POST['sales_qty']);
 $rejected_qty=mysql_real_escape_string($_POST['rejected_qty']);
 $sales_cost=mysql_real_escape_string($_POST['sales_cost']);
 
if (isset($_POST['submit'])) {
	if (empty($item_name)) {
		$_SESSION['item-name']="jaza jina la bidhaa";
		$_SESSION['issed_num']="";
		$_SESSION['order_num']="";
		$_SESSION['sales_qty']="";
		$_SESSION['sales_cost']="";
		$_SESSION['produced_qty']="";
		header('location:../html-php/mpikaji-stock-sheet.php?=Error-1');
	}else{
		if (!preg_match('/^[a-z A-Z]*$/', $item_name)) {
			$_SESSION['item-name']="Jaza Jina La Bidhaaa kwa maneno";
			$_SESSION['issed_num']="";
			$_SESSION['order_num']="";
			$_SESSION['sales_qty']="";
			$_SESSION['sales_cost']="";
			$_SESSION['produced_qty']="";
		    header('location:../html-php/mpikaji-stock-sheet.php?=Error-2');
	}else{
		if (empty($order_num)  ) {
			$_SESSION['order_num']="jaza Kiasi Kilichoagizwa ";
			$_SESSION['issed_num']="";
			$_SESSION['item-name']="";
			$_SESSION['sales_qty']="";
			$_SESSION['sales_cost']="";
			$_SESSION['produced_qty']="";
		    header('location:../html-php/mpikaji-stock-sheet.php?=Error-4');
		   
	}else{
		if (empty($issed_num) ) {
			$_SESSION['issed_num']="jaza Kiasi Kilichopokelewa ";
			$_SESSION['order_num']="";
			$_SESSION['item-name']="";
			$_SESSION['sales_qty']="";
			$_SESSION['sales_cost']="";
			$_SESSION['produced_qty']="";
		    header('location:../html-php/mpikaji-stock-sheet.php?=Error-3');
	}else{
		if ( empty($produced_qty) ) {
			$_SESSION['produced_qty']="jaza Kiasi Kilichozalishwa ";
            $_SESSION['order_num']="";
			$_SESSION['item-name']="";
			$_SESSION['sales_qty']="";
			$_SESSION['sales_cost']="";
			$_SESSION['issed_num']="";
	        header('location:../html-php/mpikaji-stock-sheet.php?=Error-5');
	}else{
		if ( empty($sales_qty)) {
			$_SESSION['sales_qty']="jaza Kiasi Kilichouzwa ";
			$_SESSION['order_num']="";
			$_SESSION['item-name']="";
			$_SESSION['produced_qty']="";
			$_SESSION['sales_cost']="";
			$_SESSION['issed_num']="";
            header('location:../html-php/mpikaji-stock-sheet.php?=Error-6');
	}else{
		if (empty($sales_cost)) {
			$_SESSION['sales_cost']="jaza Bei kwa Kila Uzo ";
			$_SESSION['order_num']="";
			$_SESSION['item-name']="";
			$_SESSION['produced_qty']="";
			$_SESSION['sales_qty']="";
			$_SESSION['issed_num']="";
            header('location:../html-php/mpikaji-stock-sheet.php?=Error-7');
	}else{
		

		  $total_sales_value= $sales_qty * $sales_cost;

		  if (empty($rejected_qty)) {
		  	$stock_balance=$produced_qty - $sales_qty;
		  	$stock_balance_value=$stock_balance * $sales_cost;

		$user_slct="SELECT * FROM users  ORDER BY user_id ASC";
		$user_qry=mysql_query($user_slct,$conn);
		while ($row=mysql_fetch_assoc($user_qry)) {
			$rol_id=$row['user_id'];
		}

		  	$insert="INSERT INTO stock_sheet(user_id, Item_name, Ordered_ptn, Issued_ptn, Total_ptn_produced,
           Sale_ptn, Trans_reject, Sales_price, C_balance, S_amount, C_stock_value, Variance, Time_entered, Date_entered)
          VALUES('$rol_id', '$item_name', '$order_num', '$issed_num', '$produced_qty', '$sales_qty', '$rejected_qty',
           '$sales_cost','$stock_balance', '$total_sales_value', '$stock_balance_value','-',NOW(),NOW())";
          mysql_query($insert) ;

          $_SESSION['']="Umefanikiwa Kutuma data";
            $_SESSION['sales_cost']="";
			$_SESSION['order_num']="";
			$_SESSION['item-name']="";
			$_SESSION['produced_qty']="";
			$_SESSION['sales_qty']="";
			$_SESSION['issed_num']="";
          header('location:../html-php/mpikaji-stock-sheet.php?=Umefanikiwa-Kutuma-data');

		  }elseif ($rejected_qty) {
		  	$sq_rectq= $sales_qty + $rejected_qty;
		  	$stock_balance=$produced_qty- $sq_rectq;
		    $stock_balance_value=$stock_balance * $sales_cost;

			$user_slct="SELECT * FROM users  ORDER BY user_id ASC";
			$user_qry=mysql_query($user_slct,$conn);
			while ($row=mysql_fetch_assoc($user_qry)) {
		    $rol_id=$row['user_id'];
			}

		    $insert="INSERT INTO stock_sheet(user_id, Item_name, Ordered_ptn, Issued_ptn, Total_ptn_produced,
            Sale_ptn, Trans_reject, Sales_price, C_balance, S_amount, C_stock_value, Variance, Time_entered, Date_entered)
            VALUES('$rol_id', '$item_name', '$order_num', '$issed_num', '$produced_qty','$sales_qty','$rejected_qty',
           '$sales_cost','$stock_balance', '$total_sales_value','$stock_balance_value','-',NOW(),NOW())";
          mysql_query($insert) ;

          $_SESSION['']="Umefanikiwa Kutuma data";
          $_SESSION['sales_cost']="";
		  $_SESSION['order_num']="";
		  $_SESSION['item-name']="";
		  $_SESSION['produced_qty']="";
		  $_SESSION['sales_qty']="";
		  $_SESSION['issed_num']="";
          header('location:../html-php/mpikaji-stock-sheet.php?=Umefanikiwa-Kutuma-data');
		  }
		  

           
		             
					}
				}
			}
			
		}
				
		}	    
		}
	 }
	}else{
		$_SESSION['sales_qty']="";
			$_SESSION['produced_qty']=" ";
			$_SESSION['sales_cost']="";
			$_SESSION['item-name']="";
			$_SESSION['issed_num']="";
			$_SESSION['order_num']="";
	}


?>