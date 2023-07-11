<?php 
session_start();
include_once"html-php/header-index.php";

?>
<link rel="icon"  href="../img/AKO.jpg">
<link rel="stylesheet" type="text/css" href="./css/style.a.css">
<link rel="stylesheet" type="text/css" href="./css/responinsive.inc.css">

<div id="wrapper" class="layout" >
     <section class="lgn-frm">
        <div class="container">
		    <div class="form_hold">
			   <div class="lgn_h2"><h2>INGIA SEHEMU YAKO YA KAZI</h2></div>
				   <form action="./lgn-inc/lgn.inc.php" method="POST">

							  <div class="logn_input">
							      <div class="lable"><label >JINA LA MTUMIAJI</label></div>
							      <input type="text" name="ur_name" class="pwd">
							      <div class="logn_lb"> <p><?php echo $_SESSION['lg']; ?></p> </div>
							  </div>
						     
							<div class="logn_input"> 
							  <div class="lable"><label >WEKA NENO LA SIRI</label></div>
							        <input type="password" name="pwd" class="pwd" maxlength="8">
							  <div class="logn_lb"> <p><?php echo $_SESSION['lga'];?></p> </div>
							</div> 

						    <!--<div class="lable"><label class="alert"><?php //echo $_SESSION['lg'];?></label></div> -->
						   <input type="submit" name="login" class="pt-sbt" value="Ingia">
				     </form>

			        <a href="html-php/pwd_resert.php">Umesahau neno la siri ?</a>
		        </div>
        </div>
    </section>


</div>
	
<?php 
include_once"./html-php/footer.php";
?>
