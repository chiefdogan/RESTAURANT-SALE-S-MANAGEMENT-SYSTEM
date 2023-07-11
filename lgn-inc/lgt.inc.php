<?php
session_start();
//if (session_destroy()) {
	unset($_SESSION['ipt2']);
	unset($_SESSION['ipt5']);
	session_destroy();
	@header('location:../index.php');
//}

?>