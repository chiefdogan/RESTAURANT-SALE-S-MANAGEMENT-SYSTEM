
<?php 
session_start();
if (!isset($_SESSION['ur_name']) && $_SESSION['cheo_type'] !='admin' ) {
  header('location:../index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
  <!--<link rel="stylesheet" type="text/css" href="../css/styl.css">-->
 <link rel="stylesheet" type="text/css" href="../css/mpukj3.css">
</head>
<body id="mnj_mpauaji_check_body">

          
           <article class="lft-menu-list_mnj" >
            <div class="h2"><p>CHAKULA KILICHOPO</p></div>
              <div id="chakula" nameid="chakula">
                 <div class="wng-list">
                    <table border="0" width="100%" cellspadding="3" >
                     
                          <?php
                            $conn=mysqli_connect('localhost','root','');
                             mysqli_select_db($conn,'menu_mpya');
                             
      
                             $slct="SELECT * FROM food_add WHERE food_type='wanga' ORDER BY food_add_id ASC";
                             $ql=mysqli_query($conn,$slct);
                             
                                  echo "<tr id='row-thead-mnj'>";
                                   echo "<td class='clm_left'>WANGA </td>";
                                   echo "<td class='clm_right'> WATU</td>";
                                   echo "<td class='clm_right'> SALIO</td>";
                                    echo "<td class='clm_center'> ALETI</td>";
                               echo "</tr>";
                             while ($rows=mysqli_fetch_array($ql)) {
                              $dbalet = $rows['alet_icon'];
                              $wng=$rows['food_aded'];
                              $id_no= $rows['food_add_id'];

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

                                   echo "<td class='td_alet_mnj'>";
                                          $ms="<img src='../gifs/new.gif'>";
                                          $new='<a href="#?ida='.$ID.'">'.$ms.'</a>';
                                          
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
                       <table border="0" width="100%" cellspadding="3" >
                      
                      <?php
                        $con=mysqli_connect('localhost','root','');
                        mysqli_select_db($con,'menu_mpya');

                         $sct="SELECT * FROM food_add  WHERE  food_type='mboga' ORDER BY food_add_id ASC";
                        $query=mysqli_query($con,$sct);


                      echo"<tr id='row-thead-mnj'>";
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
                             echo "</td>";
                             echo "<td class='clm_right'>";
                                   echo $row['mboga_mnt_aded'];
                             echo "</td>";
                             echo "<td class='clm_right'>";
                                 echo $row['mboga_added_salio'];
                             echo"</td>";

                             echo "<td class='td_alet_mnj'>";
                                      $ms_a="<img src='../gifs/new.gif'>";
                                     $new_ms='<a href="../fnct-inc/update.inc.php?idb='.$id_no.'">'.$ms_a.'</a>';
                                          
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
</body>
</html>



