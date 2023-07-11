<?php
//include_once"add-menu.inc.php";
session_start();


$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'menu_mpya');

$ID=$_GET['ida'];
$id_no=$_GET['idb'];
$delete_id=$_GET['id'];
$delt_id=$_GET['id'];
$prch_id=$_GET['idp'];
                        if ($ID==true) {
                     	$udate="UPDATE food_add SET alet_icon=1 WHERE food_add_id='$ID '";
		                $count=mysqli_query($conn,$udate)or die(mysqli_error());
			            header('location:../html-php/mpakuaji.php?seccessful');
                        }

                  if ($id_no==true) {
                     	$udate="UPDATE  food_add SET alet_icon=1 WHERE food_add_id='$id_no'";
		                $count=mysqli_query($conn,$udate)or die(mysqli_error());
			           header('location:../html-php/mpakuaji.php?seccessful');
                        }

                 if ($delete_id==true) {
                       $delt_wang_udate="UPDATE  food_deleted SET alet_icon=1 WHERE id='$delete_id'";
		                $count_wang=mysqli_query($conn,$delt_wang_udate)or die('No update:');
			          header('location:../html-php/mpikaji.php?seccessful');
                       }

                  if ($delt_id==true) {
                       $delt_mbg_udate="UPDATE  food_deleted SET alet_icon=1 WHERE ID='$delt_id'";
		                $count=mysqli_query($conn,$delt_mbg_udate)or die('No update:');
			            header('location:../html-php/mpikaji.php?seccessful');
                       }

                       if ($prch_id==true) {
                       $delt_p_udate="UPDATE  food_pchs SET alet_icon=1 WHERE id='$prch_id'";
		                $count=mysqli_query($conn,$delt_p_udate)or die(mysqli_error());
			            header('location:../html-php/mpakuaji.php?seccessful');
                       }
			           
			           
                if (isset($_POST['resert'])) {
                    $urname_chak=mysqli_real_escape_string($_POST['ur_name_check']);
                    $pwd_rst=mysqli_real_escape_string( $_POST['pwd_resert']);
                    $pwd_cnfm_chak=mysqli_real_escape_string($_POST['pwd_cnfm_rst']);

                    if (empty($urname_chak)) {
                      $_SESSION['user']= 'Hujajaza Neno la Mtumiaji';
                      $_SESSION['pd']=' ';
                      $_SESSION['pd_cfm']=' ';
                      header('location: ../html-php/pwd_resert.php?=error1');


                    }elseif (empty($pwd_rst)) {
                      $_SESSION['pd']= 'Hujajaza Neno la Siri';
                      $_SESSION['pd_cfm']=' ';
                      $_SESSION['user']=' ';
                      header('location: ../html-php/pwd_resert.php?=error2');

                    }elseif (empty($pwd_cnfm_chak)) {
                      $_SESSION['pd_cfm']= ' Hujadhibitisha Neno la Siri';
                      $_SESSION['pd']=' ';
                      $_SESSION['user']=' ';
                      header('location: ../html-php/pwd_resert.php?=error3');

                    }elseif ($pwd_rst != $pwd_cnfm_chak ) {
                      $_SESSION['pd-cfm']= ' Maneno la Siri Hayafanani';
                      $_SESSION['pd']=' ';
                      $_SESSION['user']=' ';
                      header('location: ../html-php/pwd_resert.php?=error4');

                    }else{
                      $ur_select= "SELECT * FROM users where Ur_name='$urname_chak'";
                      $qry_row= mysqli_query($conn,$ur_select) or die(mysqli_error());
                      $cnt_rw=mysqli_num_rows($qry_row);
                      if ($cnt_rw== false) {
                        $_SESSION['user']= 'Neno la Mtumiaji halipo';
                        $_SESSION['pd']=' ';
                       $_SESSION['pd_cfm']=' ';
                        header('location: ../html-php/pwd_resert.php');
                      }else{
                        $ftch_result=mysqli_fetch_array($qry_row);
                        $pwd_feched= $ftch_result['pwd'];
                        $pwd_cnfm_feched= $ftch_result['Cnfm_pwd'];
                        $ur_feched= $ftch_result['Ur_name'];

                        $rand=1120;
                        $crons="@@#%,..///&&^!**%%_(}:;;>>";
                        $salt=hash('sha256', "$rand$pwd_rst$crons");
                        $salt2=hash('sha256', "$rand$pwd_cnfm_chak$crons");

                        $update_pwd=" UPDATE users SET pwd='$salt' WHERE Ur_name='$urname_chak' ";
                        mysqli_query($conn,$update_pwd) or die(mysqli_error());
                        $_SESSION['user']= ' ';
                        $_SESSION['pd']=' ';
                       $_SESSION['pd_cfm']=' ';
                       $_SESSION['pd-cfm']=' ';
                        header('location: ../index.php');
                      }
                      header('location: ../index.php');
                    }

                  }  


                   

			 

?>