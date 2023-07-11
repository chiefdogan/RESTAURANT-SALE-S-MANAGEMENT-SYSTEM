<?php
session_start();
$conn=mysql_connect('localhost','root','');
mysql_select_db('menu_mpya', $conn);

$ipta=mysql_real_escape_string( ucfirst($_POST['wng-add']) );
$iptb=mysql_real_escape_string($_POST['wng-amt']);
$iptc=mysql_real_escape_string( ucfirst($_POST['select']) );
//$iptd=mysql_real_escape_string($_POST['mbg-amt']);

if (isset($_POST['subt'])) {
    
    if (empty($ipta) && empty($iptb) && empty($iptc)) {
	    $_SESSION['add']="Hujajaza nafasi yoyote";
	    $_SESSION['wanga']="";
	    $_SESSION['adadi-watu']="";
	    $_SESSION['mboga']="";
	    $_SESSION['mboga-add-watu']="";
		header('location: ../html-php/mpikaji-add-menu.php?input=Error1');

	}else{
	if(!preg_match("/^[a-z A-Z]*$/",$ipta) ){
		$_SESSION['wanga']="Andika kwa maneno aina ya Wanga";
		$_SESSION['adadi-watu']="";
		$_SESSION['add']="";
		$_SESSION['mboga']="";
		$_SESSION['mboga-add-watu']="";
		header('location: ../html-php/mpikaji-add-menu.php?input=Error2');

	}else{
    if (empty($ipta)) {
		$_SESSION['wanga']="Jaza Wanga!!!";
		$_SESSION['adadi-watu']="";
		$_SESSION['add']="";
		$_SESSION['mboga']="";
		$_SESSION['mboga-add-watu']="";
		header('location: ../html-php/mpikaji-add-menu.php?input=Error3');

	}else{
	if (empty($iptb)) {
		$_SESSION['adadi-watu']="Jaza idadi ya watu!!!";
		$_SESSION['wanga']="";
		$_SESSION['add']="";
		$_SESSION['mboga']="";
		$_SESSION['mboga-add-watu']="";
		header('location: ../html-php/mpikaji-add-menu.php?input=Error4');
	}elseif ($iptb <= 0) {
		$_SESSION['adadi-watu']="Namba ni ndogo kuliko 1";
		$_SESSION['wanga']="";
		$_SESSION['add']="";
		$_SESSION['mboga']="";
		$_SESSION['mboga-add-watu']="";
		header('location: ../html-php/mpikaji-add-menu.php?input=Error4');
	}
	else{

		$user_slct="SELECT * FROM users where cheo='mpikaji'  ORDER BY user_id ASC";
		$user_qry=mysql_query($user_slct,$conn);
		while ($row=mysql_fetch_assoc($user_qry)) {
			$rol_id=$row['user_id'];
		}
		
	  $inst= "INSERT INTO food_add(user_id,food_type, food_aded, mboga_mnt_aded, mboga_added_salio, date_entered)
       values('$rol_id ', '$iptc','$ipta','$iptb','$iptb',NOW())" ;
       mysql_query($inst, $conn) or die( mysql_error());
       $_SESSION['add']="Umeongeza ".$ipta." kwa idadi ya watu ".$iptb;
       $_SESSION['wanga']="";
       $_SESSION['adadi-watu']="";
       $_SESSION['mboga']="";
       $_SESSION['mboga-add-watu']="";
	header('location: ../html-php/mpikaji-add-menu.php?input=success');
	
	/*	if (!preg_match("/^[a-z A-Z]*$/",$iptc ) ) {
		$_SESSION['mboga']="Andika kwa maneno aina ya Mboga";
		$_SESSION['wanga']="";
		$_SESSION['adadi-watu']="";
		$_SESSION['add']="";
		$_SESSION['mboga-add-watu']="";
		header('location: ../html-php/mpikaji-add-menu.php?input=Error5');
	}else{

		if (empty($iptc)) {
			$_SESSION['wanga']=" ";
			$_SESSION['adadi-watu']="";
			$_SESSION['add']="";
			$_SESSION['mboga-add-watu']=" ";
			$_SESSION['mboga']="Jaza mboga";
		header('location: ../html-php/mpikaji-add-menu.php?input=Error6');

       }elseif (empty($iptd)) {
       	 	$_SESSION['mboga']=" ";
			$_SESSION['wanga']="";
			$_SESSION['adadi-watu']="";
			$_SESSION['add']="";
			$_SESSION['mboga-add-watu']="Jaza idadi ya watu";
		header('location: ../html-php/mpikaji-add-menu.php?input=Error7');
       }
       else{
       	 if ($iptc && $iptd) {
       	 	$inset= "INSERT INTO mboga_add(mboga_aded,mboga_mnt_aded,mboga_added_salio,date_entered)
           values('$iptc','$iptd','$iptd',NOW())";
           mysql_query($inset);
           $_SESSION['add']="Umeongeza ".$iptc." kwa idadi ya watu ".$iptd;
           $_SESSION['wanga']="";
	       $_SESSION['adadi-watu']="";
	       $_SESSION['mboga']="";
	       $_SESSION['mboga-add-watu']="";
		  header('location: ../html-php/mpikaji-add-menu.php?input=success');	
       	 }
		}
		}*/
	}
	}
	}	
	}
	
		
	if ($ipta && $iptc && $iptc && $iptd) {
       $_SESSION['add']="Umeongeza ".$ipta."=".$iptb." watu na ".$iptc."=".$iptd." watu";
       $_SESSION['wanga']="";
       $_SESSION['adadi-watu']="";
       $_SESSION['mboga']="";
       $_SESSION['mboga-add-watu']="";

		header('location: ../html-php/mpikaji-add-menu.php?input=success');
	}

}
else{
	header('location: ../html-php/mpikaji-add-menu.php?');
}

?>