<?php 
session_start();
include_once"header-pwd-resert.php";
if (!isset($_SESSION['ur_name']) ) {
 // header('location:pwd_resert.php#?');
}else{
  $uname=$_SESSION['ur_name'];
   $cheotype=$_SESSION['cheo_type'];
}

?>
<link rel="stylesheet" type="text/css" href="../css/style.a.css">
<link rel="stylesheet" type="text/css" href="../css/responinsive.inc.css">
<!--<link rel="stylesheet" type="text/css" href="./css/styl.css">-->

<div id="wrapper" class="layout" >
                <section class="resert-frm">
			        <div class="resert_hold">
			         <div class="lgn_h2"><h2>HARIRI NENO LAKO LA SIRI</h2></div>
			       <form action="../fnct-inc/update.inc.php" method="POST">
                

                  <div class="resert_input">
                      <div class="lable"><label >JINA LA MTUMIAJI</label></div>
                      <input type="text" name="ur_name_check" class="reset">
                      <div class="logn_lb"> <p><?php echo $_SESSION['user']; ?></p> </div>
                  </div>

                  <div class="resert_input"> 
                  <div class="lable"><label >WEKA NENO LA SIRI</label></div>
			            <input type="password" name="pwd_resert" class="reset" maxlength="8">
                  <div class="logn_lb"> <p><?php echo $_SESSION['pd'];?></p> </div>
                </div> 

                     
                <div class="resert_input"> 
                  <div class="lable"><label >THIBITISHA NENO LA SIRI</label></div>
			            <input type="password" name="pwd_cnfm_rst" class="reset" maxlength="8">
                  <div class="logn_lb"> <p><?php echo $_SESSION['pd_cfm'];?></p> </div>
                </div> 
			            <div class="lable"><label class="alert"><?php //echo $_SESSION['lg'];?></label></div> 
			                <input type="submit" name="resert" class="pt-sbt" value="Hariri">
			            </form>

			        
			            </div>
                </section>


</div>
	
<?php 
include_once"footer.php";
?>
