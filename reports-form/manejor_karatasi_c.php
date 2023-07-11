
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
              <th class="date_nt">S/N</th>
              <th class="date_nt">AINA YA VIFAA</th>
               <th class="date_nt">OPENING<br>BALANCE</th>
               <th class="date_nt">KIASI<br>KILICHOOMBWA</th>
               <th class="date_nt">KIASI<br>KILICHOTOLEWA</th>
               <th class="date_nt">JUMLA/ <br> KIASI KILICHOPO</th>
               <th class="date_nt">KIZIO</th>
               <th class="date_nt">BEI @</th>
               <th class="date_nt">JUMLA</th>
              <!-- <th class="date_ent">SAHIHI</th>-->
            </tr>
            <?php
             $conn=mysqli_connect('localhost','root','');
              mysqli_select_db($conn,'menu_mpya');

              $select="SELECT * FROM  purche_order_rpt ORDER BY id ASC";
              $query=mysqli_query($conn,$select);
              $count=mysqli_num_rows($query);
              if ($count==true) {
               while ($rows=mysqli_fetch_array($query)) {
                $sum_opn+=$rows['balance_open'];
                $sum_reqst += $rows['Amount_rqsted'];
                $sum_resved += $rows['Amount_rcved'];
                $sum_reqst += $rows['Amount_rqsted'];
                $sum_trvd += $rows['Toatal_good_available'];
                $sum_tcost += $rows['Total_cost'];
                   echo "<tr class='tr_a'>";
                     echo "<td class='list_clmn_mnj_b indent_b'>";echo $rows['ID'];echo "</td>";
                     echo "<td class='list_clmn_mnj_b indent_b'>";echo $rows['vifaa_aina'];echo "</td>";
                     echo "<td class='list_clmn_mnj_b qtity'>";echo $rows['balance_open'];echo "</td>";
                     echo "<td class='list_clmn_mnj_b qtity'>";echo $rows['Amount_rqsted'];echo "</td>";
                     echo "<td class='list_clmn_mnj_b qtity'>";echo $rows['Amount_rcved'];echo "</td>";
                     echo "<td class='list_clmn_mnj_b qtity'>";echo $rows['Toatal_good_available'];echo "</td>";
                     echo "<td class='list_clmn_mnj_b date_nt_b'>";echo $rows['kizio'];echo "</td>";
                     echo "<td class='list_clmn_mnj_b qtity'>";echo $rows['Cost_per_unit'];echo "</td>";
                     echo "<td class='list_clmn_mnj_b qtity'>";echo $rows['Total_cost'];echo "</td>";
                    /* echo "<td class='list_clmn_mnj'>";echo $rows['signature'];echo "</td>";*/
                   echo "</tr>";
                 }
                   echo "<tr class='whole_row'>";
                     echo "<td class='indent_b list_clmn_mnj_b' colspan='2'>";echo"TOTAL (TSH)";echo "</td>";
                     echo "<td class='list_clmn_mnj_b qtity'>";echo $sum_opn;echo "</td>";
                     echo "<td class='list_clmn_mnj_b qtity'>";echo $sum_reqst;echo "</td>";
                     echo "<td class='list_clmn_mnj_b qtity'>";echo $sum_resved;echo "</td>";
                     echo "<td class='list_clmn_mnj_b qtity'>";echo $sum_trvd;echo "</td>";
                     echo "<td class='qtity'>";echo "</td>";
                     echo "<td class='qtity'>";echo "</td>";
                     echo "<td class='list_clmn_mnj_b qtity'>";echo $sum_tcost;echo "</td>";
                     /*echo "<td class='qtity'>";echo "</td>";*/
                   echo "</tr>";  
              }
              ?>
          </table>
       
     </div>
           </article>
</body>
</html>



