
<?php
 session_start();
$conn=mysql_connect('localhost','root','');
mysql_select_db('menu_mpya');
$get_link=$_GET['id'];
$user_det=$_GET['user_id'];


if($get_link){
	$delete="DELETE FROM sms_all WHERE ID='$get_link'";
mysql_query($delete);
header('location: ../reports-form/meneja_printed_ripoti_mblmbl.php');
}

if($user_det){
	$delete="DELETE FROM users WHERE user_id='$user_det'";
mysql_query($delete);
header('location: ../reports-form/meneja_signup_form.php');
}



?>