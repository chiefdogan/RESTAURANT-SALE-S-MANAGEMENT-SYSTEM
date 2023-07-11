<?php
session_start();
 $conn=mysql_connect('localhost','root','');
 mysql_select_db('menu_mpya');

 $Afisa_name=mysql_real_escape_string(ucwords(strtolower($_POST['Afisa_name'])));
 $cash_recv=mysql_real_escape_string(ucfirst($_POST['cash_recv']));
 $place_from=mysql_real_escape_string($_POST['place_from']);
 $file=mysql_real_escape_string($_POST['file']);

if (isset($_POST['sbmt_recv'])) {
	    $_SESSION['Afisa_name']="";
		$_SESSION['cash_recv']="";
		$_SESSION['place_from']="";
		$_SESSION['file']="";
		$_SESSION['accout']="";
	if (empty($Afisa_name)) {
		$_SESSION['Afisa_name']="Jaza Jina la Afisa";
		$_SESSION['cash_recv']="";
		$_SESSION['place_from']="";
		$_SESSION['file']="";
		$_SESSION['accout']="";
		$_SESSION['accout']="";
		header('location:../reports-form/account_orda_form.php?=Error-1');
	}else{
		if (!preg_match('/^[a-z A-Z]*$/', $Afisa_name)) {
			$_SESSION['Afisa_name']="Jaza jina La Afisa Kwa Maneno Tuu";
			$_SESSION['cash_recv']="";
			$_SESSION['place_from']="";
			$_SESSION['file']="";
			$_SESSION['accout']="";
		    header('location:../reports-form/account_orda_form.php?=Error-2');
	}else{
		if (empty($cash_recv) ) {
			$_SESSION['Afisa_name']="";
			$_SESSION['cash_recv']="Jaza Kiasi Kilichopokelewa";
			$_SESSION['place_from']="";
			$_SESSION['file']="";
			$_SESSION['accout']="";
		    header('location:../reports-form/account_orda_form.php?=Error-3');
		   
	}else{
		if ($cash_recv <= 0) {
			$_SESSION['Afisa_name']="";
			$_SESSION['cash_recv']="Kiasi Ulichojaza ni kidogo kuliko 1";
			$_SESSION['place_from']="";
			$_SESSION['file']="";
			$_SESSION['accout']="";
		    header('location:../reports-form/account_orda_form.php?=Error-4');
		}else{
		if (empty(  $place_from)) {
			$_SESSION['Afisa_name']="";
			$_SESSION['cash_recv']="";
			$_SESSION['place_from']="Hujajaza Mahali Pesa Ilipotoka";
			$_SESSION['file']="";
			$_SESSION['accout']="";
	        header('location:../reports-form/account_orda_form.php?=Error-5');
	}else{
		$img_name=$_FILES['file']['name'];
		$img_size=$_FILES['file']['size'];
		$img_temp=$_FILES['file']['tmp_name'];
		$img_error=$_FILES['file']['error'];

		$img_extantion=strtolower(end(explode('.',$_FILES['file']['name'])));
		$img_allowed= array('jpg','JPG','pnp','PNG','jpeg','JPEG');
		$compare=in_array($img_extantion, $img_allowed);

		if ($compare=== FALSE) {
			$_SESSION['Afisa_name']="";
			$_SESSION['cash_recv']="";
			$_SESSION['place_from']="";
			$_SESSION['accout']="";
			$_SESSION['file']=$img_extantion."Aina hii ya picha hairuhusiwi";
	        header('location:../reports-form/account_orda_form.php?=Error-6');
		}elseif ($img_size>104857600) {
			$_SESSION['Afisa_name']="";
			$_SESSION['cash_recv']="";
			$_SESSION['place_from']="";
			$_SESSION['accout']="";
			$_SESSION['file']=$img_size."Picha hii ni kubwa mno";
	        header('location:../reports-form/account_orda_form.php?=Error-6');
		}elseif (empty($img_error)==True) {
			$img_new_name=uniqid('.',true).'.'.$img_extantion;

			if (move_uploaded_file($img_temp, "../sahihi/".$img_new_name)===FALSE) {
				$_SESSION['Afisa_name']="";
				$_SESSION['cash_recv']="";
				$_SESSION['place_from']="";
				$_SESSION['accout']="";
				$_SESSION['file']=$img_size."Hujaweha Sahihi";
		        header('location:../reports-form/account_orda_form.php?=Error-6');
			}elseif (move_uploaded_file($img_temp, "../sahihi/".$img_new_name)==TRUE) {
				
			}
			
		}


        $user_slct="SELECT * FROM users  ORDER BY user_id ASC";
		$user_qry=mysql_query($user_slct,$conn);
		while ($row=mysql_fetch_assoc($user_qry)) {
			$rol_id=$row['user_id'];
		}

		  $insert="INSERT INTO  acc_receive(user_id, Afisa_name, Amount_recv, Section_from, Signature,Time_recv,Date_recv)
          VALUES('$rol_id','$Afisa_name', ' $cash_recv', '$place_from', '$img_new_name', NOW(), NOW())";
          mysql_query($insert) ;
          $_SESSION['Afisa_name']="";
		  $_SESSION['cash_recv']="";
		  $_SESSION['place_from']="";
		  $_SESSION['file']="";
		  $_SESSION['image']=$img_name;
		  $_SESSION['accout']="Umefanikiwa Kupokea Fedha";

          header('location:../reports-form/account_orda_form.php?=Umefanikiwa-Kutuma-data');
	
                         }
           
		               }
					}
				}
			}
			
}    
else{
		$_SESSION['Afisa_name']="";
		$_SESSION['cash_recv']="";
		$_SESSION['place_from']="";
		$_SESSION['file']="";

	}


?>