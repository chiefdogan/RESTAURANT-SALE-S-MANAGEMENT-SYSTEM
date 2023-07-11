
<?php 
include_once"header.php";
session_start();
if (!isset($_SESSION['ur_name'])) {
  header('location:../index.php');
}else{
  $uname=$_SESSION['ur_name'];
   $cheotype=$_SESSION['cheo_type'];
}
?>
<link rel="stylesheet" type="text/css" href="../css/styl.css">
<link rel="stylesheet" type="text/css" href="../css/mpukj3.css">
<link rel="stylesheet" type="text/css" href="../css/responinsive.inc.css">

<div id="wrapper">
    <section>
        <div class="container wlcm-bar"> 
          <div class="wlcm-bar-pic-holder">
            <div class="wlcm-bar-pic"> <?php echo "<img src='../images/".$_SESSION['ipt_img_kuaji']."' alt='weka picha'>";?></div>
            <div class="wlcm-bar-msg"><p><?php echo ucwords($_SESSION['msg1']);?></p></div>
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



    <section class="menu-list" >
    	<div class="container">
          
           <article class="lft-menu-list" >
            <div class="h2"><p>CHAKULA KILICHOPO</p></div>
            
            <!--<div class="fd-tl">
            
             
             </div>-->
              <div id="chakula" nameid="chakula">
             <div class="wng-list">
                    <table border="0" width="100%" cellspadding="3" >
                     
                          <?php
                             $conn=mysqli_connect('localhost','root','');
                             mysqli_select_db($conn,'menu_mpya');
                             

                             $slct="SELECT * FROM food_add WHERE food_type='wanga' ORDER BY food_add_id ASC";
                             $ql=mysqli_query($conn,$slct);
                             
                                  echo "<tr id='row-thead'>";
                                   echo "<th  class='clm_left'> WANGA</th>";
                                   echo "<th class='clm_right'> WATU</th>";
                                   echo "<th class='clm_right'> SALIO</th>";
                                   echo "<th class='clm_center'> ALETI</th>";
                               echo "</tr>";
                             while ($rows=mysqli_fetch_array($ql)) {
                              $dbalert = $rows['alet_icon'];
                              $wng=$rows['food_aded'];
                              $ID = $rows['food_add_id'];

                               echo "<tr class='row_data'>";

                                   echo "<td >";
                                   echo $rows['food_aded'];
                                    echo"</td>";

                                   echo "<td class='clm_right'>"; 
                                   echo $rows['mboga_mnt_aded'];
                                   echo"</td>";

                                   echo "<td class='clm_right'>";
                                          echo $rows['mboga_added_salio'];
                              
                                   echo"</td>";

                                   echo "<td class='td_alet'>";
                                          $imaga="<img src='../gifs/new.gif'>";
                                          $new='<a href="../fnct-inc/update.inc.php?ida='.$ID.'">'.$imaga.'</a>';
                                          
                                          if ($dbalert==0) {
                                             echo $new; 
                                          }else{
                                            echo " ";
                                          }
                                         
                              
                                   echo"</td>";
                               echo "</tr>";
                             }


                          ?>
                    </table>
                          
                  </div>
                   
                                   
                   <div class="mbg-list">
                       <table border="0" width="100%" cellspadding="3">
                      
                      <?php
                        $con=mysqli_connect('localhost','root','');
                        mysqli_select_db($con,'menu_mpya');

                        $sct="SELECT * FROM food_add  WHERE  food_type='mboga' ORDER BY food_add_id ASC";
                        $query=mysqli_query($con,$sct);


                      echo"<tr id='row-thead'>";
                        echo"<th class='clm_left'>MBOGA</th>";
                        echo"<th class='clm_right'> WATU </th>";
                        echo"<th class='clm_right'> SALIO</th>";
                        echo "<td class='clm_center'> ALETI</td>";
                      echo"</tr>";

                      while ($row=mysqli_fetch_array($query)) {
                             $dbalet = $row['alet_icon'];
                              $wng=$row['food_aded'];
                              $id_no= $row['food_add_id'];

                        echo "<tr class='row_data'>";
                             echo "<td>";
                                  echo $row['food_aded'];
                             echo "</td >";
                             echo "<td class='clm_right'>";
                                   echo $row['mboga_mnt_aded'];
                             echo "</td>";
                             echo "<td class='clm_right'>";
                                 echo $row['mboga_added_salio'];
                             echo"</td>";

                             echo "<td class='td_alet'>";
                                     $image="<img src='../gifs/new.gif'>";
                                     $new_ms='<a href="../fnct-inc/update.inc.php?idb='.$id_no.'">'.$image.'</a>';
                                          
                                          if ($row['alet_icon']==0) {
                                             echo $new_ms; 
                                          }else{
                                            echo " ";
                                          }
                             echo"</td>";
                        echo "</tr>";
                      }
                      
                      ?>
                    </table>

                  </div>
                </div>


           </article>
           <aside class="rgt-menu-list">
               <div  class="chng-order">
                  <p>CHAKULA KILICHOAGIZWA</p>
                   <div class="span">
                   <table border="0" cellspacing="0" >
                   <?php 
                          $conn=mysqli_connect('localhost','root','');
                          mysqli_select_db($conn,'menu_mpya');
                          $slct="SELECT * FROM  food_pchs ORDER BY id DESC LIMIT 10";
                         $SLCTpros=mysqli_query($conn,$slct);
                         while ($rows=mysqli_fetch_array($SLCTpros)) {
                          $wng=$rows['wanga'];
                          $mbg=$rows['mboga'];
                          $ord=$rows['Pchs_id'];
                          $prch_id=$rows['id'];
                          $prch_alet=$rows['alet_icon'];
                          $plt_na=$rows['Plt_no'];
                          echo "<tr>";
                                 echo "<td>";

                                 echo"<div class='chk-lb'> <div class='lb'><label>Oda na:-</label></div> <div class='h2-na'><h2 >"; echo $ord; echo "</h2></div> </div>";
                                 echo"<div class='chk-lb'> <div class='lb'><label>Sahani na:-</label></div> <div class='h2-na'><h2 >"; echo $plt_na; echo "</h2></div> </div>";
                                echo"<h3>";echo $wng." --- ".$mbg; echo"</h3>";
                                 echo "</td>";

                                 echo "<td width='20%' class='td_alet'>"; 
                                        $imag_order="<img src='../gifs/new.gif'>";
                                        $new_ms='<a href="../fnct-inc/update.inc.php?idp='.$prch_id.'">'.$imag_order.'</a>';
                                          
                                          if ($prch_alet==0) {
                                             echo $new_ms; 
                                          }else{
                                            echo " ";
                                          }
                                 echo "</td>";

                          echo "</tr>";
                          
                      
               }
                   ?>
                   </table>
                 </div>
                    
               </div>
 

           </aside>
    		
    	</div>
    </section>
  </div>

	


<?php 
include_once"footer.php";
?>