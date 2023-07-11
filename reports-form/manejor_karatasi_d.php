
<?php 
session_start();
if (!isset($_SESSION['ur_name']) && $_SESSION['cheo_type'] !='admin' ) {
  header('location:../index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
 <!--  <link rel="stylesheet" type="text/css" href="../css/styl.css">
 <link rel="stylesheet" type="text/css" href="../css/mpukj3.css">-->
  <link rel="stylesheet" type="text/css" href="../css/prch_orda_form.css">
</head>
<body id="kts-b-body">

          
           <article class="lft-menu-list_mnj" >
              <div class="contents-list-prch_rpot">
          <table border="0" cellspacing="0">
            <tr >
              <th class="logo_row" colspan="9">
                <img src="report_img/ako2.jpg">
              </th>
              
            </tr>

           <tr >
             <td class="headings_row_main_store" colspan="9">
               <div class="main_heding_main_store">
                 <div> <p>STOO KUU</p> </div>
                 <div class="date_main_store_a">
                   <?php echo date('d-m-Y');?>
                 </div>
               </div>
              </td>  
           </tr>

          <tr class="row-thead_b">
              <th class="th1">S/N</th>
              <th class="th2">BIDHAA</th>
               <th class="th3">KIASI<BR> KILICHOPO</th>
               <th class="th4">KIZIO</th>
               <th class="th5">BEI/KIZIO</th>
               <th class="th6">THAMANI (Tsh)</th> 
               <th class="th7">TAREHE</th> 
          </tr>
            <?php
             $conn=mysqli_connect('localhost','root','');
             mysqli_select_db($conn,'menu_mpya');

             $slct="SELECT * FROM  main_store ORDER BY ID DESC";
             $process=mysqli_query($conn,$slct);
             $count=mysqli_num_rows( $process);
             if ($count) {
                while ($rows=mysqli_fetch_array($process)) {
                  $id=$rows['ID'];
                  $itm=$rows['ITEMS'];
                  $itm_amt=$rows['TOTAL_AMOUNT'];
                  $un_ms=$rows['UNIT_MESSURE'];
                  $un_cst=$rows['UNIT_COST'];
                  $t_cst=$rows['TOTAL_COST'];
                  $date=$rows['date_enta'];

                  $sum_amnt +=  $rows['TOTAL_AMOUNT'];
                  $sum_tcost += $rows['TOTAL_COST'];
                  echo "<tr class='tr_a'>";
                  echo "<td class='list_clmn_mnj_b date_nt_b'>$id</td>";
                  echo "<td class='list_clmn_mnj_b indent_b'>$itm</td>";
                  echo "<td class='list_clmn_mnj_b qtity'>$itm_amt</td>";
                  echo "<td class='list_clmn_mnj_b indent_b'>$un_ms</td>";
                  echo "<td class='list_clmn_mnj_b qtity'>$un_cst</td>";
                  echo "<td class='list_clmn_mnj_b qtity'>$t_cst</td>";
                  echo "<td class='list_clmn_mnj_b date_nt_b durtion_d'>$date</td>";
                  echo"</tr>";
                }
                 echo "<tr class='whole_row'>";
                  echo "<td class='indent_b' colspan='2'>";echo"JUMLA (TSH)";echo "</td>";
                  echo "<td class='list_clmn_mnj_b qtity'>";echo $sum_amnt;echo"</td>";
                  echo "<td class='list_clmn_mnj_b date_nt'>";echo"</td>";
                  echo "<td class='list_clmn_mnj_b qtity'>";echo"</td>";
                  echo "<td class='list_clmn_mnj_b qtity'>"; echo $sum_tcost; echo"</td>";
                  echo "<td class='list_clmn_mnj_b date_nt_b'>";echo"</td>";
                  echo "</tr>";
             }
            ?>
          </table>
       
     </div>
           </article>
</body>
</html>



