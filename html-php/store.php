
<?php 
session_start();
include_once"header-store.php";
if (!isset($_SESSION['ur_name']) ) {
  header('location:../index.php');
}else{
  $uname=$_SESSION['ur_name'];
   $cheotype=$_SESSION['cheo_type'];
}
?>
<link rel="stylesheet" type="text/css" href="../css/styl.css">
<link rel="stylesheet" type="text/css" href="../css/mpukj3.css">
<link rel="stylesheet" type="text/css" href="../css/responinsive.inc.css">
<link rel="stylesheet" type="text/css" href="../css/mpikaji.a.inc.css">


    <div id="wrapper">
    <section>
        <div class="container wlcm-bar"> 
          <div class="wlcm-bar-pic-holder">
            <div class="wlcm-bar-pic"> <?php echo "<img src='../images/".$_SESSION['ipt_img_stoo']."' alt='weka picha'>";?> </div>
            <div class="wlcm-bar-msg"><p><?php echo ucwords($_SESSION['msg3']);?></p></div>
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

            <div class="rept-box headShake ">
               <ul>
                 <a href="../reports-form/grn_orda_form.php " target="report"><li class="animated">Goods Received Note</li></a>
                 <a href="../reports-form/prch_orda_form.php " target="report"><li class="animated">Items Distribution</li></a>
                 <a href="../reports-form/main_store.php " target="report"><li class="animated">Main Store</li></a>
               </ul>
            </div>
              

           </aside>
           <div class="ifrm_hold">
             <iframe name="report"></iframe>

           </div>
        
      </div>
    </section>
  </div>
 

  


<?php 
include_once"footer.php";
?>