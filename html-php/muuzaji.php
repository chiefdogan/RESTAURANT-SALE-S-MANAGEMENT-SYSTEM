<?php 
session_start();
include_once"../hdr/header.php";
if (!isset($_SESSION['ur_name']) ) {
  header('location:../index.php');
  exit();
}else{
  $uname=$_SESSION['ur_name'];
   $cheotype=$_SESSION['cheo_type'];
}
?>
<link rel="stylesheet" type="text/css" href="../css/muzaji1.css">
<link rel="stylesheet" type="text/css" href="../css/styl.css">
<link rel="stylesheet" type="text/css" href="../css/responinsive.inc.css">


  <div id="wrapper">
    <section>
        <div class="container wlcm-bar"> 
          <div class="wlcm-bar-pic-holder">
            <div class="wlcm-bar-pic">
             <?php 
             if (!isset($_SESSION['ipt_img_mzji'])) {
              exit();
             }else{
                echo "<img src='../images/".$_SESSION['ipt_img_mzji']."' alt='weka picha'>";
             }
             ?></div>
            <div class="wlcm-bar-msg"><p>
            <?php
            if (!isset($_SESSION['msg'])) {
               exit(); 
            }else{
              echo ucwords($_SESSION['msg']);
            }
             ?></p></div>
            }
          </div>
             
          <div class="wlcm-bar-alert">
             <div class="alert_sms">
              <h4>
              <?php
              if (!isset($_SESSION['alt'])) {
                exit();
              }else{
                echo $_SESSION['alt'];
              }

               ?></h4>
              }
            </div>
            <div class="message">
              <marquee><h4><?php include_once'../fnct-inc/sms_all.inc.php';?></h4></marquee>
            </div>
          </div>
        </div>
    </section>

    <section class="menu-list">
      <div class="container ">
            <form action="../fnct-inc/mzj.inc.php" method="POST">
           <article class="lft-menu-list">
                  <div class="h2"><p>CHAGUA MLO WAKO WA LEO</p></div>

                  <div id="wng-wrapper">
                  <div class="wng-tl"><p>WANGA</p></div>
                  <div class="wng-list">
                        <div class="lb-wng"><input type="radio" name="wng" value="UGALI DONA"> UGALI DONA</div><br>
                        <div class="lb-wng"><input type="radio" name="wng" value="UGALI MUHOGO">UGALI MUHOGO</div><br>
                        <div class="lb-wng"><input type="radio" name="wng" value="UGALI SEMBE">UGALI SEMBE</div><br>
                        <div class="lb-wng"><input type="radio" name="wng" value="WALI PILAU">WALI PILAU</div><br>
                        <div class="lb-wng"><input type="radio" name="wng" value="WALI MWEUPE">WALI MWEUPE</div><br>
                        <div class="lb-wng"><input type="radio" name="wng" value="NDIZI">NDIZI</div><br>
                        <!--<div class="lb-wng"><input type="radio" name="wng" value="TAMBI">TAMBI</div><br>-->
                        <div class="lb-wng"><input type="radio" name="wng" value="VIAZI">VIAZI</div><br>
                        
                  </div>
                  </div>
                  
                  <div id="mbg-wrapper">
                    <div class="mbg-tl">
                      <div class="mbg-nm-tl">
                      <p>MBOGA</p>
                      </div>

                      <div class="mbg-idd-tl">
                         <div class="mbg-idd-ttl">
                             <p>IDADI</p>
                         </div>
                         <div class="mbg-idd-cst">
                            <p>KIASI</p>
                         </div>
                      </div>
                    </div>
                  <div class="mbg-list">
                <div id="label" class="label"><input type="radio" name="mbg" value="MAHARAGE" href="javascript:void(0)"
                 onclick="document.getElementById('bei').style.display='block';
                          document.getElementById('bei1').style.display='none';
                          document.getElementById('bei2').style.display='none';
                          document.getElementById('bei3').style.display='none';
                          document.getElementById('bei4').style.display='none';
                          document.getElementById('bei5').style.display='none';
                          document.getElementById('bei6').style.display='none';
                          document.getElementById('bei7').style.display='none';

                          document.getElementById('be').style.display='block';
                          document.getElementById('be1').style.display='none';
                          document.getElementById('be2').style.display='none';
                          document.getElementById('be3').style.display='none';
                          document.getElementById('be4').style.display='none';
                          document.getElementById('be5').style.display='none';
                          document.getElementById('be6').style.display='none';
                          document.getElementById('be7').style.display='none';
                          //document.getElementById('mbga').checked = true;
                        "> MAHARAGE 
                      
                        <input id="bei" type="number" min='1000' name="beio" placeholder="ingiza bei">
                        <input id="be" type="number" min='1' name="quantity" placeholder="Idadi">
                      
                    </div><br>

                    <div class="label"><input  type="radio" name="mbga" value="KIBUA" href="javascript:void(0)"
                     onclick="document.getElementById('bei1').style.display='block';
                              document.getElementById('bei').style.display='none';
                              document.getElementById('bei2').style.display='none';
                              document.getElementById('bei3').style.display='none';
                              document.getElementById('bei4').style.display='none';
                              document.getElementById('bei5').style.display='none';
                              document.getElementById('bei6').style.display='none';
                              document.getElementById('bei7').style.display='none';

                              document.getElementById('be').style.display='none';
                              document.getElementById('be1').style.display='block';
                              document.getElementById('be2').style.display='none';
                              document.getElementById('be3').style.display='none';
                              document.getElementById('be4').style.display='none';
                              document.getElementById('be5').style.display='none';
                              document.getElementById('be6').style.display='none';
                              document.getElementById('be7').style.display='none';
                             ">KIBUA  
                        <input id="bei1" type="number" min='1000'  name="beia" placeholder="ingiza bei">
                        <input id="be1" type="number" min='1' name="be1" placeholder="Idadi">
                    </div><br>

                    <div class="label"><input type="radio" name="mbgb" value="NYAMA ROST" href="javascript:void(0)" 
                      onclick="document.getElementById('bei2').style.display='block';
                               document.getElementById('bei1').style.display='none';
                               document.getElementById('bei').style.display='none';
                               document.getElementById('bei3').style.display='none';
                               document.getElementById('bei4').style.display='none';
                               document.getElementById('bei5').style.display='none';
                               document.getElementById('bei6').style.display='none';
                               document.getElementById('bei7').style.display='none';

                               document.getElementById('be').style.display='none';
                               document.getElementById('be1').style.display='none';
                               document.getElementById('be2').style.display='block';
                               document.getElementById('be3').style.display='none';
                               document.getElementById('be4').style.display='none';
                               document.getElementById('be5').style.display='none';
                               document.getElementById('be6').style.display='none';
                               document.getElementById('be7').style.display='none';
                            ">NYAMA ROST 
                        <input id="bei2" id="bei" type="number" min='1000' name="beib" placeholder="ingiza bei">
                        <input id="be2" type="number" min='1' name="be2" placeholder="Idadi">
                    </div><br>

                    <div class="label"><input type="radio" name="mbgc" value="NYAMA CHOMA" href="javascript:void(0)" 
                      onclick="document.getElementById('bei3').style.display='block';
                               document.getElementById('bei1').style.display='none';
                               document.getElementById('bei2').style.display='none';
                               document.getElementById('bei').style.display='none';
                               document.getElementById('bei4').style.display='none';
                               document.getElementById('bei5').style.display='none';
                               document.getElementById('bei6').style.display='none';
                               document.getElementById('bei7').style.display='none';

                               document.getElementById('be').style.display='none';
                               document.getElementById('be1').style.display='none';
                               document.getElementById('be2').style.display='none';
                             document.getElementById('be3').style.display='block';
                             document.getElementById('be4').style.display='none';
                             document.getElementById('be5').style.display='none';
                             document.getElementById('be6').style.display='none';
                             document.getElementById('be7').style.display='none';
                            ">NYAMA CHOMA 
                        <input id="bei3" type="number" min='1000' name="beic" placeholder="ingiza bei">
                        <input id="be3" type="number" min='1' name="be3" placeholder="Idadi">
                    </div><br>

                    <div class="label"><input type="radio" name="mbgd" value="KUKU ROST" href="javascript:void(0)" 
                      onclick="document.getElementById('bei4').style.display='block';
                             document.getElementById('bei1').style.display='none';
                             document.getElementById('bei2').style.display='none';
                             document.getElementById('bei3').style.display='none';
                             document.getElementById('bei').style.display='none';
                             document.getElementById('bei5').style.display='none';
                             document.getElementById('bei6').style.display='none';
                             document.getElementById('bei7').style.display='none';

                             document.getElementById('be').style.display='none';
                             document.getElementById('be1').style.display='none';
                             document.getElementById('be2').style.display='none';
                             document.getElementById('be3').style.display='none';
                             document.getElementById('be4').style.display='block';
                             document.getElementById('be5').style.display='none';
                             document.getElementById('be6').style.display='none';
                             document.getElementById('be7').style.display='none';
                            ">KUKU ROST 
                        <input id="bei4" type="number" min='1000' name="beid" placeholder="ingiza bei">
                        <input id="be4" type="number" min='1' name="be4" placeholder="Idadi">
                    </div><br>

                    <div class="label"><input type="radio" name="mbge" value="KUKU CHOMA" href="javascript:void(0)" 
                    onclick="document.getElementById('bei5').style.display='block';
                             document.getElementById('bei1').style.display='none';
                             document.getElementById('bei2').style.display='none';
                             document.getElementById('bei3').style.display='none';
                             document.getElementById('bei4').style.display='none';
                             document.getElementById('bei').style.display='none';
                             document.getElementById('bei6').style.display='none';
                             document.getElementById('bei7').style.display='none';

                             document.getElementById('be').style.display='none';
                             document.getElementById('be1').style.display='none';
                             document.getElementById('be2').style.display='none';
                             document.getElementById('be3').style.display='none';
                             document.getElementById('be4').style.display='none';
                             document.getElementById('be5').style.display='block';
                             document.getElementById('be6').style.display='none';
                             document.getElementById('be7').style.display='none';
                            ">KUKU CHOMA 
                        <input id="bei5" type="number" min='1000' name="beie" placeholder="ingiza bei">
                        <input id="be5" type="number" min='1' name="be5" placeholder="Idadi">
                    </div><br>

                    <div class="label"><input type="radio" name="mbgf" value="SANGARA CHOMA" href="javascript:void(0)" 
                      onclick="document.getElementById('bei6').style.display='block';
                               document.getElementById('bei1').style.display='none';
                               document.getElementById('bei2').style.display='none';
                               document.getElementById('bei3').style.display='none';
                               document.getElementById('bei4').style.display='none';
                               document.getElementById('bei5').style.display='none';
                               document.getElementById('bei').style.display='none';
                               document.getElementById('bei7').style.display='none';

                               document.getElementById('be').style.display='none';
                               document.getElementById('be1').style.display='none';
                               document.getElementById('be2').style.display='none';
                               document.getElementById('be3').style.display='none';
                               document.getElementById('be4').style.display='none';
                               document.getElementById('be5').style.display='none';
                               document.getElementById('be6').style.display='block';
                               document.getElementById('be7').style.display='none';
                              ">SANGARA CHOMA 
                        <input id="bei6" type="number" min='1000' name="beif" placeholder="ingiza bei">
                        <input id="be6" type="number" min='1' name="be6" placeholder="Idadi">
                    </div><br>

                    <div class="label"><input type="radio" name="mbgg" value="SANGARA ROST" href="javascript:void(0)" 
                      onclick="document.getElementById('bei7').style.display='block';
                               document.getElementById('bei1').style.display='none';
                               document.getElementById('bei2').style.display='none';
                               document.getElementById('bei3').style.display='none';
                               document.getElementById('bei4').style.display='none';
                               document.getElementById('bei5').style.display='none';
                               document.getElementById('bei6').style.display='none';
                               document.getElementById('bei').style.display='none';

                               document.getElementById('be').style.display='none';
                               document.getElementById('be1').style.display='none';
                               document.getElementById('be2').style.display='none';
                               document.getElementById('be3').style.display='none';
                               document.getElementById('be4').style.display='none';
                               document.getElementById('be5').style.display='none';
                               document.getElementById('be6').style.display='none';
                               document.getElementById('be7').style.display='block';


                              ">SANGARA ROST 
                        <input id="bei7" type="number" min='1000' name="beig" placeholder="ingiza bei">
                        <input id="be7" type="number" min='1' name="be7" placeholder="Idadi">
                    </div><br>


                  </div>
             </div>
                    <input type="submit" name="submit" value="NUNUA">
                     </article>
                        </form>

          
           <aside class="rgt-menu-list">
               <div  class="chng">
                   <p>CHENJI ILIYOBAKI</p>
                    <?php 
                      echo"<h2>";
                       if (!isset($_SESSION['chg'])) {
                         exit();
                       }else{
                        echo $_SESSION['chg'];
                       }
                      echo "</h2>";
                          ?>
               </div>
               <div class="chk-id">
                    <p>NAMBA YA CHAKULA</p>
                    <?php
                     echo"<div class='chk-lb'> <div class='lb'><label>Oda na:-</label></div> <div class='h2-na'><h2 >"; echo $_SESSION['cnt']; echo "</h2></div> </div>";
                     echo"<div class='chk-lb'> <div class='lb'><label>Sahani na:-</label></div> <div class='h2-na'><h2 >"; echo $_SESSION['plt_no']; echo "</h2></div> </div>";
                     echo"<div><h3>"; 
                      if (!isset($_SESSION['chk'])) {
                        exit();
                      }else{
                        echo $_SESSION['chk'];
                      }
                      echo "</h3></div>";
                   
                    ?>
                  
               </div>

               <div class="prnt-id">
                    <p>Sales Summary Report</p>
                    <a href="sales-smry-rpt.inc.php" target="_blank">Angalia Ripoti</a>
               </div>

           </aside>
        
      </div>
    </section>
 
</div>
  


<?php 
include_once"footer.php";
?>