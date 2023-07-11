
<?php 
include_once"header-mpkiji.php";
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
<link rel="stylesheet" type="text/css" href="../css/mpikaji.a.inc.css">
<link rel="stylesheet" type="text/css" href="../css/responinsive.inc.css">
<link rel="stylesheet" type="text/css" href="../css/animate.css">

    
    <div id="wrapper">
    <section>
        <div class="container wlcm-bar"> 
          <div class="wlcm-bar-pic-holder">
            <div class="wlcm-bar-pic"> <?php echo "<img src='../images/".$_SESSION['ipt_img']."' alt='weka picha'>";?></div>
            <div class="wlcm-bar-msg"><p><?php echo $_SESSION['msg2'];?></p></div>
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


    <section class="menu-list">
      <div class="container">
            <article class="lft-menu-list">
            <div class="h2"><p>VYAKULA VILIVYOISHA</p></div>
            
            <!--<div class="fd-tl">
            
             
             </div>-->

             <div class="wng-list">
                     <table cellspacing="0px">
                        <tr id="row-thead">
                          <th><div class="wng-t"><p>WANGA</p></div></th>
                          <th>ALERT</th>
                        </tr>
                        <?php

                        $conn=mysql_connect('localhost','root','');
                        mysql_select_db('menu_mpya');
                        $select="SELECT * FROM food_deleted WHERE food_type='wanga' ORDER BY ID DESC LIMIT 10";
                        $process=mysql_query($select,$conn);
                        while ($rows=mysql_fetch_array($process)) {
                          $delete_alet = $rows['alet_icon'];
                          $delete_id= $rows['ID'];
                         echo "<tr class='row_data'>"; 
                          echo "<td>"; echo $rows['mboga']; echo"</td>";
                          echo "<td class='td_alet'>";
                                 $delete_order="<img src='../gifs/new.gif'>";
                                 $delete_ms='<a href="../fnct-inc/update.inc.php?id='.$delete_id.'">'.$delete_order.'</a>'; 
                                  if ($delete_alet==0) {
                                     echo $delete_ms; 
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

                   <table cellspacing="0px">
                        <tr id="row-thead">
                          <th><div class="mbg-t"><p>MBOGA</p></div></th>
                          <th>ALERT</th>
                        </tr>
                        <?php

                        $conn=mysql_connect('localhost','root','');
                        mysql_select_db('menu_mpya');
                        $slect="SELECT * FROM food_deleted WHERE food_type='mboga' ORDER BY ID DESC LIMIT 10";
                        $proces=mysql_query($slect,$conn);
                        while ($rows=mysql_fetch_array($proces)) {
                          $delt_mbg_alet = $rows['alet_icon'];
                          $delete_mbg_id= $rows['ID'];

                         echo "<tr class='row_data'>"; 
                          echo "<td>"; echo $rows['mboga']; echo"</td>";

                          echo "<td class='td_alet'>";
                           $delete_mbg_ms="<img src='../gifs/new.gif'>";
                                 $delete_mbg_ms='<a href="../fnct-inc/update.inc.php?id='.$delete_mbg_id.'">'.$delete_mbg_ms.'</a>'; 
                                  if ($delt_mbg_alet==0) {
                                     echo $delete_mbg_ms; 
                                  }else{
                                    echo " ";
                                  }
                          echo"</td>";

                        echo "</tr>";
                      }

                        ?>
                     </table>
                  

                  </div>


           </article>

           <aside class="rgt-mpkj-list">
            <div  class="add-box">
              <p>ONGEZA CHAKULA</p>
            </div>

            <div class="rept-box headShake ">
               <ul>
                 <a href="mpikaji-add-menu.php"><li class="animated">Ongeza chakula</li></a>
                 <a href="mpikaji-stock-sheet.php"><li class="animated">Repot Stock Karatasi</li></a>
               </ul>
            </div>
              

           </aside>
        
      </div>
    </section>
  </div>
 

<?php 
include_once"footer.php";
?>