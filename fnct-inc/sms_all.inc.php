<?php
 session_start();
 include"../php-inc/connect.inc.php";
/*$conn=mysql_connect('localhost','root','');
mysql_select_db('menu_mpya');*/
$get_link=$_GET['$id_no'];



if (isset($_POST['submit'])) {
	$tx_area=mysqli_real_escape_string(ucwords(strtolower($conn,$_POST['txt_area'])));
	if (empty($tx_area)) {
		$_SESSION['txt']='Haujaandika Ujumbe';
		header('location: ../reports-form/meneja_printed_ripoti_mblmbl.php?=Error');
	}else{

		$user_slct="SELECT user_id FROM users ORDER BY user_id ASC";
		$user_qry=mysqli_query($conn, $user_slct);
		while ($row=mysqli_fetch_assoc($user_qry)) {
		$rol_id=$row['user_id'];
		}

		$insert="INSERT INTO sms_all(user_id, message, time_enta, date_enta)
		         VALUES('$rol_id','$tx_area',NOW(),NOW())";
		         mysqli_query($conn,$insert) or die(mysqli_error($conn));
		         header('location: ../reports-form/meneja_printed_ripoti_mblmbl.php');
	}
}
              $select="SELECT * FROM sms_all ORDER BY ID DESC LIMIT 1";
              $query=mysqli_query($conn, $select);
              $count=mysqli_num_rows($query);
              if ($count==true) {
                while ($rows=mysqli_fetch_array($query)) {
                  $_SESSION['text'] = $rows['message'];
                  $id= $rows['ID'];
                  
                }
                echo $_SESSION['text'];
              }
               

              if (isset($_POST['editing'])) {
              	$tx_are=mysqli_real_escape_string(ucwords(strtolower( $conn, $_POST['txt_area'])));
              		if (!$tx_are) {
		       header('location: ../reports-form/meneja_printed_ripoti_mblmbl.php?=Error-1');
				}else{
				$edit_p="UPDATE sms_all SET message='$tx_are' WHERE ID='$id'";
				$PROCESS=mysqli_query($conn, $edit_p) or die('Masahihisho hayajafanyika:');
				header('location: ../reports-form/meneja_printed_ripoti_mblmbl.php');
			 }

              }
               
mysqli_close($conn);
?>