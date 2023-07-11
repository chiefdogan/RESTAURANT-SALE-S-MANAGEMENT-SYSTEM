
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
                 <div> <p>GOODS RECEIVED NOTE</p> </div>
                 <div class="date_main_store_a">
                   <?php echo date('d-m-Y');?>
                 </div>
               </div>
              </td>  
           </tr>

          <tr class="row-thead">
              <th class="date_nt">S/N</th>
              <th class="date_nt" style="width:80px">ITEM</th>
               <th class="date_nt" style="width:20px" >QUANTITY<br>RECEIVED</th>
               <th class="date_nt">UNITS</th>
               <th class="date_nt">COST</th>
               <th class="date_nt" style="width:10px">OUR <br>ORDER NO</th>
               <th class="date_nt" style="width:70px">DATE</th> 
          </tr>
          <?php
          $conn=mysql_connect('localhost','root','');
          mysql_select_db('menu_mpya');


            $_SESSION['sbmt']=$_POST['submit'];

            if (isset($_POST['submit'])) {
            $dbselect=mysql_real_escape_string($_POST['date_text']);
            $_SESSION['specify']=$dbselect;

            if (empty($dbselect)) {
                 
             $selct='SELECT * FROM good_rcved_nt ORDER BY ID ASC ';   
             $qry=mysql_query($selct);
             while ($rows=mysql_fetch_assoc($qry)) {
              $sum_revd += $rows['Qty_received'];
              $sum_tcost += $rows['Total_cost'];
            
            echo "<tr class='tr_a'>";
            echo "<td class='list_clmn_mnj indent'>";echo $rows['ID'];echo"</td>";
            echo "<td class='list_clmn_mnj indent'>";echo $rows['item_name'];echo"</td>";
            echo "<td class='list_clmn_mnj qtity'>";echo $rows['Qty_received'];echo"</td>";
            echo "<td class='list_clmn_mnj date_nt'>";echo $rows['kizio'];echo"</td>";
            echo "<td class='list_clmn_mnj qtity'>";echo $rows['Cost_per_unit'];echo"</td>";
            echo "<td class='list_clmn_mnj qtity'>"; echo$rows['Total_cost']; echo"</td>";
            echo "<td class='list_clmn_mnj date_ent'>"; echo $rows['Date_ent']; echo"</td>";
            echo "</tr>";
               }
            echo "<tr class='whole_row'>";
            echo "<td class='indent' colspan='2'>";echo"TOTAL (TSH)";echo "</td>";
            echo "<td class='list_clmn_mnj qtity'>";echo $sum_revd;echo"</td>";
            echo "<td class='list_clmn_mnj date_nt'>";echo"</td>";
            echo "<td class='list_clmn_mnj qtity'>";echo"</td>";
            echo "<td class='list_clmn_mnj qtity'>"; echo $sum_tcost; echo"</td>";
            echo "<td class='list_clmn_mnj date_ent'>";echo"</td>";
            echo "</tr>";
            }else{
              
              $selct="SELECT * FROM good_rcved_nt where  Date_ent='$dbselect' || item_name='$dbselect'|| 
                     Qty_received='$dbselect' || kizio='$dbselect' || Cost_per_unit='$dbselect'|| Total_cost='$dbselect' ORDER BY ID ASC";
          $qry=mysql_query($selct);
          while ($rows=mysql_fetch_assoc($qry)) {
            $sum_revd += $rows['Qty_received'];
              $sum_tcost += $rows['Total_cost'];
            $id_no=$rows['ID'];
            
            echo "<tr class='tr_a'>";
            echo "<td class='list_clmn_mnj indent'>"; echo $rows['ID']; echo"</td>";
            echo "<td class='list_clmn_mnj indent'>";echo $rows['item_name'];echo"</td>";
            echo "<td class='list_clmn_mnj qtity''>";echo $rows['Qty_received'];echo"</td>";
            echo "<td class='list_clmn_mnj date_nt'>";echo $rows['kizio'];echo"</td>";
            echo "<td class='list_clmn_mnj qtity'>";echo $rows['Cost_per_unit'];echo"</td>";
            echo "<td class='list_clmn_mnj qtity'>"; echo$rows['Total_cost']; echo"</td>";
            echo "<td class='list_clmn_mnj date_ent'>"; echo $rows['Date_ent']; echo"</td>";
            echo "</tr>";
            }
             echo "<tr class='whole_row'>";
            echo "<td class='indent' colspan='2'>";echo"TOTAL (TSH)";echo "</td>";
            echo "<td class='list_clmn_mnj qtity'>";echo $sum_revd;echo"</td>";
            echo "<td class='list_clmn_mnj date_nt'>";echo"</td>";
            echo "<td class='list_clmn_mnj qtity'>";echo"</td>";
            echo "<td class='list_clmn_mnj qtity'>"; echo $sum_tcost; echo"</td>";
            echo "<td class='list_clmn_mnj date_ent'>";echo"</td>";
            echo "</tr>";
          }
        }

          ?>
            
            <tr></tr>
          </table>

     </div>
       
     </div>
      
    </section>

    <aside class="sheet-list-iframe_main_store">           
        <div id="view_print_hold">
          <div class="print_btn_select_form" >
             <label>FANYA CHAGUO MAALUM</label><br>
            <form action="" method="POST">
              <input type="text" name="date_text" placeholder="mfn:2018-09-02"><br>
              <!--<input type="text" name="date_text"><br>-->
              <input type="submit" name="submit" value="Chagua">

            </form>
          </div >
  
          <!--  <div  class="add-box">
              <p>REPOTI</p>
          </div>-->
          <ul>
            <!--<a target="report" href="grn_orda_report.php"><li class="view_sheet_btn">Angalia Report</li></a>-->
            <a target="report" href="grn_orda_form.php"><li class="view_sheet_btn">Jaza Taarifa Za Bidhaa</li></a>
            <a target="report" href="../PDF_REPORTS/grn_fomu_report.inc.php"><li class="view_sheet_btn">Chapa fomu</li></a>
          </ul>
                
        </div>
    </aside>
  </div>
 

<?php 
include_once"footer.php";
?>