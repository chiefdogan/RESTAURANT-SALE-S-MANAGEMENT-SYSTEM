
<?php 
session_start();
if (!isset($_SESSION['ur_name'])) {
  header('location:../index.php');
}else{
  $uname=$_SESSION['ur_name'];
   $cheotype=$_SESSION['cheo_type'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Mpikaji</title>
  <link rel="icon"  href="../img/AKO.jpg">
  <link rel="stylesheet" type="text/css" href="../css/styl.css">
<link rel="stylesheet" type="text/css" href="../css/mpukj3.css">
<link rel="stylesheet" type="text/css" href="../css/mpikaji.a.inc.css">
<link rel="stylesheet" type="text/css" href="../css/responinsive.inc.css">
<link rel="stylesheet" type="text/css" href="../css/animate.css">

    
</head>
<body>
<div class="main-container">
    <header>
       <div class="hr-ttl">
           <img src="../img/AKO.jpg">

      </div>

       <div class="main_title">
           <div class="main_head">
              <h1>RESTAURANT SALE'S MANAGEMENT SYSTEM</h1>
           </div>
           <div class="hom-out">
             <div  class="hom-lk"><a href="mpikaji.php">Mwanzo</a></div>
             <div class="logout"><a href="../lgn-inc/lgt.inc.php">Toka</a></div>    
           </div>
       </div>

     
    </header>


    <div id="wrapper">

   <section>
        <div class="container wlcm-bar"> 
          <div class="wlcm-bar-pic-holder">
            <div class="wlcm-bar-pic"> <?php echo "<img src='../images/".$_SESSION['ipt_img']."' alt='weka picha'>";?></div>
            <div class="wlcm-bar-msg"><p><?php echo $_SESSION['msg2'];?></p></div>
          </div>
             
          <div class="wlcm-bar-alert">
             <div class="alert_sms">
              <h4><?php echo $_SESSION['add'];?></h4>
            </div>
            <div class="message">
              <marquee><h4><?php include_once'../fnct-inc/sms_all.inc.php';?></h4></marquee>
            </div>
          </div>


        </div>
    </section>

    <section class="menu-list">
      <div class="form_hold">
        <div class="lgn_h2"><h2>ONGEZA CHAKULA KILICHOPIKWA</h2></div>
            <form action="../fnct-inc/add-menu.inc.php" method="POST">
                

                 <div class="mbg-add-fd">
                    <label>CHAGUA AINA YA CHAKULA</label><br>
                    <select type="text" class="input" name="select">
                       <option value="wanga"> Wanga</option>
                       <option value="mboga">Mboga</option>
                    </select>
                   
                    <p class="alert"><?php echo $_SESSION['mboga'];?></p>
                  </div>

                      <div class="wng-add-fd">
                    <label>ONGEZA AINA YA CHAKULA</label><br> <input type="text" class="input" name="wng-add">
                    <p class="alert"><?php echo $_SESSION['wanga'];?></p>
                      </div>

                      <div class="wng-add-amt">
                    <label>KIASI  KILICHOZALISHWA</label><br> <input type="number" class="input" min="1" name="wng-amt">
                    <p class="alert"><?php echo $_SESSION['adadi-watu'];?></p>
                      </div>

            

                <button class="submit" type="submit" name="subt">Ongeza</button>


                <div class="edit-view">
                 <!-- <a href="#">View</a>-->
                </div>
    
          </form>
      </div>

      <div class="food_added">

                <article class="add_lft-menu-list" >
            <div class="h2"><p>CHAKULA KILICHOONGEZWA</p></div>
            
            <!--<div class="fd-tl">
            
             
             </div>-->
              <div id="chakula" nameid="chakula">
             <div class="wng-list wng-list_added">
                    <table border="0" width="100%" cellspadding="3" >
                     
                          <?php
                             $conn=mysql_connect('localhost','root','');
                             mysql_select_db('menu_mpya');
                             

                             $slct="SELECT * FROM food_add WHERE food_type='wanga' ORDER BY food_add_id ASC";
                             $ql=mysql_query($slct,$conn);
                             
                                  echo "<tr id='row-thead'>";
                                   echo "<th  class='clm_left'> WANGA</th>";
                                   echo "<th class='clm_right'> WATU</th>";
                                   echo "<th class='clm_right'> SALIO</th>";
                                   echo "<th class='clm_center'> ALETI</th>";
                               echo "</tr>";
                             while ($rows=mysql_fetch_array($ql)) {
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
                                           
                                          $new='<a href="#?ida='.$ID.'">MPYA</a>';
                                          
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
                   
                                   
                   <div class="mbg-list wng-list_added">
                       <table border="0" width="100%" cellspadding="3">
                      
                      <?php
                        $con=mysql_connect('localhost','root','');
                        mysql_select_db('menu_mpya');

                        $sct="SELECT * FROM food_add  WHERE  food_type='mboga' ORDER BY food_add_id ASC";
                        $query=mysql_query($sct, $con);


                      echo"<tr id='row-thead'>";
                        echo"<th class='clm_left'>MBOGA</th>";
                        echo"<th class='clm_right'> WATU </th>";
                        echo"<th class='clm_right'> SALIO</th>";
                        echo "<td class='clm_center'> ALETI</td>";
                      echo"</tr>";

                      while ($row=mysql_fetch_array($query)) {
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
                                 
                                     $new_ms='<a href="#?idb='.$id_no.'">MPYA</a>';
                                          
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
        
      </div>


    </section>
  </div>
 

<?php 
include_once"footer.php";
?>