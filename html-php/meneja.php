
<?php 
session_start();
include_once"header-mnj.php";
/*if (!isset($_SESSION['ur_name'])) {
  header('location:../index.php');
}else{
  $uname=$_SESSION['ur_name'];
   $cheotype=$_SESSION['cheo_type'];
}*/
?>

<link rel="stylesheet" type="text/css" href="../css/styl.css">
<link rel="stylesheet" type="text/css" href="../css/mpukj3.css">
<link rel="stylesheet" type="text/css" href="../css/mpikaji.a.inc.css">
<link rel="stylesheet" type="text/css" href="../css/responinsive.inc.css">
<!--<link rel="stylesheet" type="text/css" href="../css/signup.aa.inc.css">-->
<link rel="stylesheet" type="text/css" href="../css/animate.css">
    <div id="wrapper">
    <section>
        <div class="container wlcm-bar"> 
          <div class="wlcm-bar-pic-holder">
            <div class="wlcm-bar-pic"> <?php echo "<img src='../images/".$_SESSION['ipt_img_mzj']."'>";?> </div>
            <div class="wlcm-bar-msg"><p><?php echo $_SESSION['mnj'];?></p></div>
          </div>
             
          <div class="wlcm-bar-alert">
            <div class="alert_sms">
              <h4></h4>
            </div>
            <div class="message">
              <marquee><h4><?php include_once'../fnct-inc/sms_all.inc.php';?></h4></marquee>
            </div>
              
          </div>


        </div>
    </section>

  
    <section class="menu-list-store">
      <div class="container">
         <aside class="rgt-mpkj-list-store">
                <div  class="add-box">
                  <p>RIPOTI</p>
                </div>
                
                <div class="rept-box headShake animated">
                   <ul>
                    <div class="mj-lst">
                        <a href="../reports-form/meneja_sales_summary_form.php " target="report"><li>MAUZO YA SIKU</li></a>
                        <a href="../reports-form/meneja_mpakuaji_mpikaji_chakula.php" target="report"><li>MTIRIRIKO WA CHAKULA</li></a>
                        <a href="../reports-form/meneja_ripoti_mblmbl.php" target="report"><li>KARATASI MBALIMBALI</li></a>
                        <a href="../reports-form/meneja_printed_ripoti_mblmbl.php" target="report"><li>WEKA UJUMBE</li></a>
                        <a href="../reports-form/meneja_loged_in_form.php" target="report"><li>WATU WALIOINGA</li></a>
                        <a href="../reports-form/meneja_signup_form.php" target="report"><li>WATU WALIOSAJILIWA</li></a>
                        <a href="usajili.php"  target="report"><li>MSAJILI MUHUDUMU</li></a>
                       <!-- <a href="javascript:void(0)" onclick="document.getElementById('lg-frm').style.display='block';document.getElementById('shadow').style.display='block'"><li>MSAJILI MUHUDUMU</li></a>-->
                    </div>
                  </ul>
                </div>
                  
         </aside>

         <div class="ifrm_hold">
             <iframe name="report"></iframe>

           </div>



      </div>
  </section>

  <div id="shadow" class="shdow_windw" ></div>

  <section id="lg-frm" class="lg-frm">
        <div class="container">
                <a href="usajili.php" class="pt-urn" target="_blank">MUUZAJI</a>
                <a href="usajili.kj.php" class="pt-urn" target="_blank">MPAKUAJI</a>
                <a href="usajili.pikj.php" class="pt-urn" target="_blank">MPIKAJI</a>
                <a href="usajili.store.php" class="pt-urn" target="_blank">STORE</a>
                <a href="usajili.acc.php" class="pt-urn" target="_blank">ACCOUNTANT</a>
                <a href="usajili.mj.php" class="pt-urn" target="_blank">MENEJA</a>
            
       <div  class="cncel-btn"><button href="javascript:void(0)" onclick="document.getElementById('lg-frm').style.display='none';document.getElementById('shadow').style.display='none'">Toka</button></div>
        </div>
  </section>


  </div>




<?php 
include_once"footer.php";
?>