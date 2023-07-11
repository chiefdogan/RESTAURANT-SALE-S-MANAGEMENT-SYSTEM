<?php
session_start();
include"../php-inc/connect.inc.php";

if (isset($_POST['login'])) {
    
	$ur_name=mysqli_real_escape_string($conn, $_POST['ur_name']);
	$pwd=mysqli_real_escape_string($conn, $_POST['pwd']);
	$_SESSION['ipt2']=$ur_name;
	$_SESSION['ipt5']=$pwd;

	if (empty($ur_name)) {
		header('location:../index.php?=Empty_1');
		$_SESSION['lg']="Haujajaza jina la mtumiaji";
		$_SESSION['lga']="";
	    exit();
	}elseif(empty($pwd)){
        header('location:../index.php?=Empty_2');
        $_SESSION['lga']="Haujajaza Neno la Siri";
        $_SESSION['lg']="";
		
	}else{
	

		$slt="SELECT * FROM roles WHERE name='$ur_role'";
			$qly=mysqli_query($conn, $slt);
			$cnt=mysqli_num_rows($qly);

			if ($cnt == true) {
				while ($rows=mysqli_fetch_array($qly)) {
					$role_id=$rows['role_id'];
				}
			}

			$slt="SELECT * FROM users WHERE Ur_name='$ur_name' ORDER BY user_id ASC";
			$qly=mysqli_query($conn, $slt);
			$count=mysqli_num_rows($qly);

			$rand=1120;
 			$crons="@@#%,..///&&^!**%%_(}:;;>>";
 			$salt=hash('sha256', "$rand$pwd$crons");
           
           if ($count== 0) {
           	header('location:../index.php?index=username_error');
			$_SESSION['lg']="Umekosea Username ";
			$_SESSION['lga']="";
		}else{
			$row=mysqli_fetch_assoc($qly);
			if ($salt != $row['pwd']) {
				header('location:../index.php?index=pwd_error');
				$_SESSION['lga']="Umekosea Neno la Siri";
				$_SESSION['lg']="";
			}else{

		   
           	$cheo=$row['cheo'];
           	$username=$row['Ur_name'];
           	$passwd=$row['pwd'];
           	$_SESSION['Fr_name']=$row['Fr_name'];
	        $_SESSION['Last_name']=$row['Last_name'];
	        $_SESSION['ipt4']=$row['gender'];
	        $_SESSION['id_role']=$row['user_id'];
	        $image=$row['image'];

	        $_SESSION['ur_name']=$username;
	       $_SESSION['cheo_type']=$cheo;

     
	        $fst_nm=$_SESSION['Fr_name'];
        	$lst_name= $_SESSION['Last_name'];
        	$jinsia=$_SESSION['ipt4'];
        	$role_id=$row['user_id'];

     



          
             $mpikaji="mpikaji";
              $muuzaji="muuzaji";
              $mpakuaji="mpakuaji";
              $stoo="stoo";
              $muhasibu="muhasibu";
              $admini="admin";

              $insert="INSERT INTO loged_in(user_id, Fr_name, Last_name, gender, cheo, Time_enta, Date_enta)
            	         VALUES('$role_id','$fst_nm', '$lst_name', '$jinsia','$cheo', NOW(), NOW())";
            	         mysqli_query($conn,  $insert);

             if($cheo==$muuzaji){

             $_SESSION['ipt_img_mzji']=$image;
             $_SESSION['msg']="KARIBU  ".$_SESSION['Fr_name']." " .$_SESSION['Last_name'];
	         header('location:../html-php/muuzaji.php?muuzaji=successfully+log-in');
             }
             else if($cheo==$mpakuaji){


             $_SESSION['ipt_img_kuaji']=$image;
             $_SESSION['msg1']="KARIBU ".$_SESSION['Fr_name']." " .$_SESSION['Last_name'];
             header('location:../html-php/mpakuaji.php?mpakuajiji=umefanikiwa+kuingia');         

              }
             else if($cheo==$mpikaji){



         	$_SESSION['ipt_img']=$image;
        	$_SESSION['msg2']="KARIBU ". $_SESSION['Fr_name']." " .$_SESSION['Last_name'];
    	    header('location:../html-php/mpikaji.php?mpikaji=umefanikiwa+kuingia');
             }
             else if($cheo==$stoo){



         	$_SESSION['ipt_img_stoo']=$image;
        	$_SESSION['msg3']="KARIBU ".$_SESSION['Fr_name']." ".$_SESSION['Last_name'];
            header('location:../html-php/store.php?stoo=umefanikiwa+kuingia');
             }
             else if($cheo==$muhasibu){



	        $_SESSION['ipt_img_acc']=$image;
	    	$_SESSION['msg4']="KARIBU ".$_SESSION['Fr_name']." ".$_SESSION['Last_name'];
		    header('location:../html-php/accountant.php?mubasibu=umefanikiwa+kuingia');
             }
             else if($cheo==$admini){



        $_SESSION['ipt_img_mzj']=$image;
	    $_SESSION['mnj']="KARIBU ".$_SESSION['Fr_name']." ".$_SESSION['Last_name'];
    	header('location:../html-php/meneja.php?muuzaji=umefanikiwa+kuingia');
       }

/*}else{
	
	header('location:../index.php?index=Error7');
}*/

			}
		}


}
}else{
	header('location:../index.php?index=Error8');
	exit();
}


?>