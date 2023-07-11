
<?php 
session_start();
if (!isset($_SESSION['ur_name']) && $_SESSION['cheo_type'] !='stoo' ) {
  header('location:../index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>login |Welcome</title>
  <meta http-equiv="EXPIRES" content="-1">
  <link rel="stylesheet" type="text/css" href="../css/styl.css">
  <link rel="stylesheet" type="text/css" href="../css/prch_orda_form.css">
   
</head>
<body id="purchase_body">


    <div id="wrapper">

    <section class="contents-list-main_store_hold">
     <div class="contents-list-prch_rpot_cover">
     <div class="contents-list-prch_rpot">
          <table border="0" cellspacing="2">
            <tr >
              <th class="logo_row" colspan="10">
                <img src="report_img/ako2.jpg">
              </th>
              
            </tr>

           <tr >
             <td class="headings_row_main_store" colspan="10">
               <div class="main_heding_main_store">
                 <div> <p>PURCHASE ORDER REPORT</p> </div>
                 <div class="date_main_store_a">
                   <?php echo date('d-m-Y');?>
                 </div>
               </div>
              </td>  
           </tr>

          <tr class="row-thead">
              <th class="date_nt">S/N</th>
              <th class="date_nt">AINA YA VIFAA</th>
               <th class="date_nt">OPENING<br>BALANCE</th>
               <th class="date_nt">KIASI<br>KILICHOOMBWA</th>
               <th class="date_nt">KIASI<br>KILICHOTOLEWA</th>
               <th class="date_nt">JUMLA/ <br> KIASI KILICHOPO</th>
               <th class="date_nt">KIZIO</th>
               <th class="date_nt">BEI @</th>
               <th class="date_nt">JUMLA</th>

            </tr>
             <?php
              $conn=mysql_connect('localhost','root','');
              mysql_select_db('menu_mpya');
              
              $_SESSION['sbmt']=$_POST['submit'];

              if (isset($_POST['submit'])) {
              $dbselect=mysql_real_escape_string($_POST['date_text']);
              $_SESSION['specify']=$dbselect;

               if (empty($dbselect)) {

              $select="SELECT * FROM  purche_order_rpt ORDER BY id ASC";
              $query=mysql_query($select,$conn);
              $count=mysql_num_rows($query);
              if ($count==true) {
               while ($rows=mysql_fetch_array($query)) {
                $sum_opn+=$rows['balance_open'];
                $sum_reqst += $rows['Amount_rqsted'];
                $sum_resved += $rows['Amount_rcved'];
                $sum_trvd += $rows['Toatal_good_available'];
                $sum_tcost += $rows['Total_cost'];
                   echo "<tr class='tr_a'>";
                     echo "<td class='list_clmn_mnj indent'>";echo $rows['ID'];echo "</td>";
                     echo "<td class='list_clmn_mnj indent'>";echo $rows['vifaa_aina'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['balance_open'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['Amount_rqsted'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['Amount_rcved'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['Toatal_good_available'];echo "</td>";
                     echo "<td class='list_clmn_mnj date_nt'>";echo $rows['kizio'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['Cost_per_unit'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['Total_cost'];echo "</td>";

                   echo "</tr>";
                 }
                   echo "<tr class='whole_row'>";
                     echo "<td class='indent' colspan='2'>";echo"TOTAL (TSH)";echo "</td>";
                     echo "<td class='qtity'>";echo $sum_opn;echo "</td>";
                     echo "<td class='qtity'>";echo $sum_reqst;echo "</td>";
                     echo "<td class='qtity'>";echo $sum_resved;echo "</td>";
                     echo "<td class='qtity'>";echo $sum_trvd;echo "</td>";
                     echo "<td class='qtity'>";echo "</td>";
                     echo "<td class='qtity'>";echo "</td>";
                     echo "<td class='qtity'>";echo $sum_tcost;echo "</td>";
            
                   echo "</tr>";  
              }
            }else{
              $select="SELECT * FROM  purche_order_rpt WHERE vifaa_aina='$dbselect'||balance_open='$dbselect'||
                      Amount_rqsted='$dbselect' ||Amount_rcved='$dbselect' || Toatal_good_available='$dbselect'||
                       kizio='$dbselect'|| Cost_per_unit='$dbselect' || Total_cost='$dbselect' ORDER BY id ASC"; 
              $query=mysql_query($select,$conn) or die(mysql_error());
              $count=mysql_num_rows($query);
              if ($count==true) {
               while ($rows=mysql_fetch_array($query)) {
                $sum_opn+=$rows['balance_open'];
                $sum_reqt += $rows['Amount_rqsted'];
                $sum_resved += $rows['Amount_rcved'];
                $sum_reqst += $rows['Amount_rqsted'];
                $sum_trvd += $rows['Toatal_good_available'];
                $sum_tcost += $rows['Total_cost'];
                   echo "<tr class='tr_a'>";
                     echo "<td class='list_clmn_mnj indent'>";echo $rows['ID'];echo "</td>";
                     echo "<td class='list_clmn_mnj indent'>";echo $rows['vifaa_aina'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['balance_open'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['Amount_rqsted'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['Amount_rcved'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['Toatal_good_available'];echo "</td>";
                     echo "<td class='list_clmn_mnj date_nt'>";echo $rows['kizio'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['Cost_per_unit'];echo "</td>";
                     echo "<td class='list_clmn_mnj qtity'>";echo $rows['Total_cost'];echo "</td>";
                     
                   echo "</tr>";
                 }
                   echo "<tr class='whole_row'>";
                     echo "<td class='indent' colspan='2'>";echo"TOTAL (TSH)";echo "</td>";
                     echo "<td class='qtity'>";echo $sum_opn;echo "</td>";
                     echo "<td class='qtity'>";echo $sum_reqt;echo "</td>";
                     echo "<td class='qtity'>";echo $sum_resved;echo "</td>";
                     echo "<td class='qtity'>";echo $sum_trvd;echo "</td>";
                     echo "<td class='qtity'>";echo "</td>";
                     echo "<td class='qtity'>";echo "</td>";
                     echo "<td class='qtity'>";echo $sum_tcost;echo "</td>";

                   echo "</tr>";  
              }
            }
          }



            ?>
          </table>
       
     </div>
     </div>
     
      
    </section>

    <aside class="sheet-list-iframe_main_store">           
        <div id="view_print_hold">
             <div class="print_btn_select_form" >
             <label><p>FANYA CHAGUO MAALUM</p></label><br>
            <form action="" method="POST">
              <input type="text" name="date_text" ><br>
              <!--<input type="text" name="date_text"><br>-->
              <input type="submit" name="submit" value="Chagua">

            </form>
          </div >
           <!--<div  class="add-box">
              <p>REPOTI</p>
          </div>-->
          <ul>
            
            <!--<a target="report"  href="prch_orda_report.php"><li class="view_sheet_btn">Angalia repoti</li></a>-->
            <a target="report" href="prch_orda_form.php"><li class="view_sheet_btn">Jaza Taarifa Za Bidhaa</li></a>
            <a target="report" href="../PDF_REPORTS/prch_fomu_report.inc.php"><li class="view_sheet_btn">Chapa fomu</li></a>

          </ul>

        </div>
    </aside>
  </div>
 

<?php 
include_once"footer.php";
?>