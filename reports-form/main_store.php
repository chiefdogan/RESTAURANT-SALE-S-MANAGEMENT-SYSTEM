
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

          <tr class="row-thead">
              <th class="">S/N</th>
              <th class="">BIDHAA</th>
               <th class="">KIASI<BR> KILICHOPO</th>
               <th class="">KIZIO</th>
               <th class="">BEI/KIZIO</th>
               <th class="">THAMANI (Tsh)</th> 
               <th class="">TAREHE</th> 
          </tr>
            <?php
             $conn=mysql_connect('localhost','root','');
             mysql_select_db('menu_mpya');
            
             $_SESSION['sbmt']=$_POST['submit'];
          if (isset($_POST['submit'])) {

            $dbselect=mysql_real_escape_string($_POST['date_text']);
            $_SESSION['specify']=$dbselect;

            if (empty($dbselect)) {

             $slct="SELECT * FROM  main_store ORDER BY ID DESC";
             $process=mysql_query($slct);
             $count=mysql_num_rows( $process);
             if ($count) {
                while ($rows=mysql_fetch_array($process)) {              
                  $sum_amnt +=  $rows['BALANCE'];
                  $sum_tcost += $rows['Total_cost_balance'];
                  echo "<tr class='table-tr' >";
                  echo "<td class='list_clmn_mnj indent'>";   echo $rows['ID'];    echo"</td>";
                  echo "<td class='list_clmn_mnj indent'>";    echo $rows['ITEMS']; echo"</td>";
                  echo "<td class='list_clmn_mnj qtity'>";    echo $rows['BALANCE'];echo"</td>";
                  echo "<td class='list_clmn_mnj date_nt'>"; echo $rows['UNIT_MESSURE'];echo"</td>";
                  echo "<td class='list_clmn_mnj qtity'>";    echo$rows['UNIT_COST']; echo"</td>";
                  echo "<td class='list_clmn_mnj qtity'>";    echo$rows['Total_cost_balance'];echo"</td>";
                  echo "<td class=' date_ent '>"; echo$rows['date_enta']; echo"</td>";
                  echo"</tr>";
                }
                  echo "<tr class='whole_row'>";
                  echo "<td class='indent' colspan='2'>";    echo"TOTAL (TSH)";echo "</td>";
                  echo "<td class='list_clmn_mnj qtity'>";   echo $sum_amnt;   echo"</td>";
                  echo "<td class='list_clmn_mnj date_nt'>";echo"</td>";
                  echo "<td class='list_clmn_mnj qtity'>";   echo"</td>";
                  echo "<td class='list_clmn_mnj qtity'>";   echo $sum_tcost;  echo"</td>";
                  echo "<td class=' date_ent'>";echo"</td>";
                  echo "</tr>";
             
           }
            }else{
                 $slct="SELECT * FROM  main_store WHERE ITEMS='$dbselect' || date_enta='$dbselect'|| BALANCE='$dbselect'||
                        UNIT_MESSURE='$dbselect'|| UNIT_COST='$dbselect'|| Total_cost_balance='$dbselect' ORDER BY ID DESC";
             $process=mysql_query($slct);
             $count=mysql_num_rows( $process);
             if ($count) {
                while ($rows=mysql_fetch_array($process)) {              
                  $sum_amnt +=  $rows['BALANCE'];
                  $sum_tcost += $rows['Total_cost_balance'];
                  echo "<tr class='table-tr' >";
                  echo "<td class='list_clmn_mnj indent'>";echo $rows['ID']; echo"</td>";
                  echo "<td class='list_clmn_mnj font_td indent'>";echo $rows['ITEMS']; echo"</td>";
                  echo "<td class='list_clmn_mnj qtity'>";echo $rows['BALANCE'];echo"</td>";
                  echo "<td class='list_clmn_mnj font_td date_nt'>";echo $rows['UNIT_MESSURE'];echo"</td>";
                  echo "<td class='list_clmn_mnj qtity'>";echo$rows['UNIT_COST'];echo"</td>";
                  echo "<td class='list_clmn_mnj qtity'>";echo$rows['Total_cost_balance'];echo"</td>";
                  echo "<td class=' date_ent'>";echo$rows['date_enta'];echo"</td>";
                  echo"</tr>";
                }
                  echo "<tr class='whole_row'>";
                  echo "<td class='indent' colspan='2'>";echo"TOTAL (TSH)";echo "</td>";
                  echo "<td class='list_clmn_mnj qtity'>";echo $sum_amnt;echo"</td>";
                  echo "<td class='list_clmn_mnj date_nt'>";echo"</td>";
                  echo "<td class='list_clmn_mnj qtity'>";echo"</td>";
                  echo "<td class='list_clmn_mnj qtity'>"; echo $sum_tcost; echo"</td>";
                  echo "<td class=' date_ent'>";echo"</td>";
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
              <input type="text" name="date_text" placeholder="mfn:2018-09-02"><br>
              <!--<input type="text" name="date_text"><br>-->
              <input type="submit" name="submit" value="Chagua">

            </form>
          </div >
             <!--<div  class="add-box">
              <p>REPOTI</p>
          </div>-->
          <ul>
            <a target="report" href="../PDF_REPORTS/main_store_report.inc.php">
              <li class="view_sheet_btn">Chapa fomu</li>
            </a>
          </ul>

        </div>
    </aside>
  </div>
 

<?php 
include_once"footer.php";
?>