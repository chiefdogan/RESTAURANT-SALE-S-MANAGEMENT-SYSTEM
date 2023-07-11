<?php

session_start();
$conn=mysqli_connect('localhost','root','');
mysqli_select_db('menu_mpya');
$id=mysqli_real_escape_string($_POST['fr_name']);
$id1=mysqli_real_escape_string($_POST['lst_name']);
$id2=mysqli_real_escape_string($_POST['ur_name']);
$id3=mysqli_real_escape_string($_POST['echo']);
$id4=mysqli_real_escape_string($_POST['gnd']);
$id5=mysqli_real_escape_string($_POST['pwd']);
$id6=mysqli_real_escape_string($_POST['cnf-pwd']);
$id7=mysqli_real_escape_string($_FILES['image']);

if (isset($_POST['sbmt'])) {
	if (empty($id) ||empty($id1)||empty($id2)||empty($id3)||empty($id4)||empty($id5)||empty($id6) ) {
		$_SESSION['msga']="Jaza nafasi zote";
		$_SESSION['msge']="";
 		$_SESSION['msgb']="";
 		$_SESSION['msgc']="";
 		$_SESSION['msgd']="";
 		$_SESSION['msg_alert']="";
		header('location:../html-php/usajili.php?usajili=Error1');
		exit();

	}elseif (!preg_match("/^[a-z A-Z]*$/",$id)) {
		$_SESSION['msga']="Jaza Jina kwa maneno";
		$_SESSION['msge']="";
 		$_SESSION['msgb']="";
 		$_SESSION['msgc']="";
 		$_SESSION['msgd']="";
 		$_SESSION['msg_alert']="";
	   header('location:../html-php/usajili.php?usajili=names+in+characters');
		exit();	

	}elseif(!preg_match("/^[a-z A-Z]*$/",$id1)){
		$_SESSION['msgb']="Jaza Jina kwa maneno";
		$_SESSION['msga']="";
 		$_SESSION['msge']="";
 		$_SESSION['msgc']="";
 		$_SESSION['msgd']="";
 		$_SESSION['msg_alert']="";
        header('location:../html-php/usajili.php?usajili=user+in+characters');
		exit();	
		
	}else{
		$slt="SELECT * FROM roles WHERE name='$id3'";
		$psc=mysqli_query($slt);
		while ($rows=mysqli_fetch_array($psc)) {
			 $role_id=$rows['role_id'];

		}

		$slt="SELECT * FROM users WHERE Ur_name='$id2'";
		$psc=mysqli_query($slt);
		$cnt=mysqli_num_rows($psc);
		while ($rows=mysqli_fetch_array($psc)) {
			 $role_id=$rows['role_id'];

		}
		if ($cnt >= 1) {
			$_SESSION['msgc']="Jina la mtumiaji lilishatumika.";
			$_SESSION['msga']="";
     		$_SESSION['msgb']="";
     		$_SESSION['msge']="";
     		$_SESSION['msgd']="";
     		$_SESSION['msg_alert']="";
			header('location:../html-php/usajili.php?usajili=Username+Exists');
		    exit();
		
	}else {
	if($id5!=$id6) {
		$_SESSION['msgd']="Nywira Hazifanani";
		$_SESSION['msga']="";
 		$_SESSION['msgb']="";
 		$_SESSION['msgc']="";
 		$_SESSION['msge']="";
 		$_SESSION['msg_alert']="";
		header('location:../html-php/usajili.php?usajili=Password-Errors');
		exit();	
	}

	else{


		$Error= array();
     	$image_name=$_FILES['image']['name'];
     	$image_size=$_FILES['image']['size'];
     	$image_tmp=$_FILES['image']['tmp_name'];
     	$image_error=$_FILES['image']['error'];



     	//Extracting immage extansion
     	$image_ext=strtolower(end(explode('.', $_FILES['image']['name'])));

     	//Type of extansion allowwed
     	$allowed=array("jpg","png","jpeg");

     	//Comparing the extension to the allowed one
     	$compare=in_array($image_ext, $allowed);
     	


     	if ($compare=== false) {
     		$_SESSION['msge']=$image_ext.' This type of extension is not allowed';
     		$_SESSION['msga']="";
     		$_SESSION['msgb']="";
     		$_SESSION['msgc']="";
     		$_SESSION['msgd']="";
     		$_SESSION['msg_alert']="";
     		header('location:../html-php/usajili.php?usajili=Error-a');
     	}
        // 1MB == 1048579KB
      if ($image_size > 13631488) {
     			$_SESSION['msge']='The image size is too large';
     			$_SESSION['msga']="";
	     		$_SESSION['msgb']="";
	     		$_SESSION['msgc']="";
	     		$_SESSION['msgd']="";
	     		$_SESSION['msg_alert']="";
     			header('location:../html-php/usajili.php?usajili=Error-b');
     		}

     	  if (empty($Error) == true) {
     				//Create new image name to allow image over right
     				$image_new_nme=uniqid('.',true). '.' .$image_name;

     				//Store image into the created folder
     				if (move_uploaded_file($image_tmp, "../images/".$image_new_nme)===false) {
     					$_SESSION['msge']='Picha haijatunzwa';
		     			$_SESSION['msga']="";
			     		$_SESSION['msgb']="";
			     		$_SESSION['msgc']="";
			     		$_SESSION['msgd']="";
			     		$_SESSION['msg_alert']="";
     			        header('location:../html-php/usajili.php?usajili=Error-b');

     				}elseif(move_uploaded_file($image_tmp, "../images/".$image_new_nme)==true){
     				
     			
				 }
     			}

     			$rand=1120;
     			$crons="@@#%,..///&&^!**%%_(}:;;>>";
     			$salt=hash('sha256', "$rand$id5$crons");
     			//$salt2=hash('sha256', "$rand$id6$crons");

		    $inst="INSERT INTO users(Fr_name, Last_name ,Ur_name, cheo, role_id, gender, image, pwd, Cnfm_pwd, Time_enta, Date_enta) 
					values('$id', '$id1', '$id2', '$id3', '$role_id', '$id4', '$image_new_nme', '$salt', '$salt2', NOW(), NOW())";
                  mysqli_query($inst,$conn) or die(mysqli_error());
					$_SESSION['msg_alert']=ucwords("Umefanikiwa kumsajili ".$id." ".$id1);
					$_SESSION['msga']="";
		     		$_SESSION['msgb']="";
		     		$_SESSION['msgc']="";
		     		$_SESSION['msgd']="";
					header('location:../html-php/usajili.php?usajili=Umefanikiwa kusajili');
        }
    }
  }
}




?>                                       