
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
            <div class="h2"><p>VYAKULA VILIVYOISHA</p></div>
                   <div class="wng-list">
                     <table border="0" cellspadding="3">
                        <tr id="row-thead-mnj">
                          <th class='clm_left'>WANGA</th>
                          <th class='clm_center'>ALERT</th>
                        </tr>
                        <?php

                         $conn=mysqli_connect('localhost','root','');
                        mysqli_select_db($conn,'menu_mpya');
                        $select="SELECT * FROM food_deleted WHERE food_type='wanga' ORDER BY ID DESC LIMIT 10";
                        $process=mysqli_query($conn,$select);
                        while ($rows=mysqli_fetch_array($process)) {
                          $delete_alet = $rows['alet_icon'];
                          $delete_id= $rows['ID'];
                         echo "<tr class='row_data'>"; 
                          echo "<td>"; echo $rows['mboga']; echo"</td>";

                          echo "<td class='td_alet_mnj'>";
                                 $delete_msa="<img src='../gifs/new.gif'>";
                                 $delete_ms='<a href="../fnct-inc/update.inc.php?id='.$delete_id.'">'.$delete_msa.'</a>'; 
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

                   <table border="0" cellspadding="3">
                        <tr id="row-thead-mnj">
                          <th class='clm_left'>MBOGA</th>
                          <th class='clm_center'>ALERT</th>
                        </tr>
                        <?php

                       $conn=mysqli_connect('localhost','root','');
                        mysqli_select_db($conn,'menu_mpya');
                        $slect="SELECT * FROM food_deleted WHERE food_type='mboga' ORDER BY ID DESC LIMIT 10";
                        $proces=mysqli_query($conn,$slect);
                        while ($rows=mysqli_fetch_array($proces)) {
                          $delt_mbg_alet = $rows['alet_icon'];
                          $delete_mbg_id= $rows['ID'];

                         echo "<tr class='row_data'>"; 
                          echo "<td >"; echo $rows['mboga']; echo"</td>";

                          echo "<td class='td_alet_mnj'>";
                                $delete_a="<img src='../gifs/new.gif'>";
                                 $delete_mbg_ms='<a href="../fnct-inc/update.inc.php?id='.$delete_mbg_id.'">'.$delete_a.'</a>'; 
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
</body>
</html>



