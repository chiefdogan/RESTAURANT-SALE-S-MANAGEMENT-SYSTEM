
<?php 
session_start();
include"../php-inc/connect.inc.php";
if (!isset($_SESSION['ur_name']) && $_SESSION['cheo_type'] !='admin' ) {
  header('location:../index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>meneja</title>
  <link rel="stylesheet" type="text/css" href="../css/prch_orda_form.css">
   
</head>
<body id="purchase_body">


    <div id="wrapper">

    <section class="contents-list-main_store_hold">
     <div class="contents-list-prch_rpot_cover">
     <div class="contents-list-prch_rpot">
          <table border="0" cellspacing="0">
            <tr >
              <th class="logo_row" colspan="10">
                <img src="report_img/ako2.png">
              </th>
              
            </tr>

           <tr >
             <td class="headings_row_main_store" colspan="10">
               <div class="main_heding_main_store">
                 <div> <p>SALES SUMMARY REPORT</p> </div>
                 <div class="date_main_store">
                   <?php echo date('d-m-Y');?>
                 </div>
               </div>
              </td>  
           </tr>

          <tr class="row-thead_a">
              <th class="">S/N</th>
               <th class="orda_clm">NAMBA YA/<br> ODA</th>
               <th class="">WANGA</th>
               <th class="">MBOGA</th>
               <th class="">KIASI /<br>LIPWA</th>
               <th class="">IDADI /<br>SAHANI</th>
               <th class="">BEI /<br>SAHANI</th>
               <th class="">CHENJI /<br>BAKI</th>
               <th class="">BEI /<br>CHAKULA</th> 
               <th class="">TAREHE</th> 
          </tr>
          <?php
          /*$conn=mysql_connect('localhost','root','');
          mysql_select_db('menu_mpya');*/

          

            if (isset($_POST['submit'])) {

              $dbselect=mysqli_real_escape_string($conn, $_POST['date_text']);

               if (empty($dbselect)) {
                 
                $select="SELECT * FROM food_pchs  ORDER BY id DESC";
                $QRY=mysqli_query($conn, $select);

                while ($rows=mysqli_fetch_array($QRY)) {
                  $total_paid +=$rows['Mnt_pd'];
                  $total_plates +=$rows['Plt_no'];
                  $total_cost +=$rows['-'];
                  $total_change +=$rows['Chng'];
                  $total_costs +=$rows['T_cost'];
                  echo "<tr class='tr'>";
                       echo "<td class='list_clmn_id'>"; echo$rows['id']; echo"</td>";
                       echo "<td class='list_clmn_a'>"; echo$rows['order_no']; echo"</td>";
                       echo "<td class='wanga_list_clmn_a'>"; echo$rows['wanga']; echo"</td>";
                       echo "<td class='wanga_list_clmn_a'>"; echo $rows['mboga']; echo"</td>";
                       echo "<td class='list_clmn_a'>"; echo $rows['Mnt_pd']; echo"</td>";
                       echo "<td class='list_clmn_a'>";echo $rows['Plt_no']; echo "</td>";
                       echo "<td class='list_clmn_a'>";echo $rows['Cost']; echo "</td>";
                       echo "<td class='list_clmn_a'>";echo $rows['Chng']; echo "</td>";
                       echo "<td class='list_clmn_a'>";echo $rows['T_cost']; echo "</td>";
                       echo "<td class='list_clmn_date'>";echo $rows['date_entered']; echo "</td>";
                  echo "</tr>";
               }
                echo "<tr class='whole_row'>";   
                 echo "<td class='total-column_hd' colspan='4'>"; echo 'JUMLA (TSH)'; echo"</td>";
                 echo "<td class='total-clumn_a'>"; echo $total_paid; echo"</td>";
                 echo "<td class='total-clumn_a'>";echo $total_plates; echo "</td>";
                 echo "<td class='total-clumn_a'>";echo $total_cost; echo "</td>";
                 echo "<td class='total-clumn_a'>";echo $total_change; echo "</td>";
                 echo "<td class='total-clumn_a'>";echo $total_costs; echo "</td>";
            echo "</tr>";
            }else{

                 $select="SELECT * FROM food_pchs WHERE date_entered='$dbselect' || wanga='$dbselect'|| mboga='$dbselect' ORDER BY id DESC";
                $QRY=mysqli_query($conn, $select);

                while ($rows=mysqli_fetch_array($QRY)){

                  $total_paid +=$rows['Mnt_pd'];
                  $total_plates +=$rows['Plt_no'];
                  $total_cost +=$rows['-'];
                  $total_change +=$rows['Chng'];
                  $total_costs +=$rows['T_cost'];
                  
                  echo "<tr class='tr'>";
                       echo "<td class='list_clmn_id'>"; echo$rows['id']; echo"</td>";
                       echo "<td class='list_clmn_a'>"; echo$rows['Order_no']; echo"</td>";
                       echo "<td class='wanga_list_clmn_a'>"; echo$rows['wanga']; echo"</td>";
                       echo "<td class='wanga_list_clmn_a'>"; echo $rows['mboga']; echo"</td>";
                       echo "<td class='list_clmn_a'>"; echo $rows['Mnt_pd']; echo"</td>";
                       echo "<td class='list_clmn_a'>";echo $rows['Plt_no']; echo "</td>";
                       echo "<td class='list_clmn_a'>";echo $rows['Cost']; echo "</td>";
                       echo "<td class='list_clmn_a'>";echo $rows['Chng']; echo "</td>";
                       echo "<td class='list_clmn_a'>";echo $rows['T_cost']; echo "</td>";
                       echo "<td class='list_clmn_date'>";echo $rows['date_entered']; echo "</td>";
                  echo "</tr>";
            }
             echo "<tr class='whole_row'>";   
                 echo "<td class='total-column_hd' colspan='4'>"; echo 'JUMLA (TSH)'; echo"</td>";
                 echo "<td class='total-clumn_a'>"; echo $total_paid; echo"</td>";
                 echo "<td class='total-clumn_a'>";echo $total_plates; echo "</td>";
                 echo "<td class='total-clumn_a'>";echo $total_cost; echo "</td>";
                 echo "<td class='total-clumn_a'>";echo $total_change; echo "</td>";
                 echo "<td class='total-clumn_a'>";echo $total_costs; echo "</td>";
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
          <div class="label_head">
             <label><p>CHAGUA KWA TAREHE /WANGA/ MBOGA</p></label><br>
             </div>
            <form action="" method="POST">
              <input type="text" name="date_text" placeholder="mfn:2018-09-02"><br>
              <!--<input type="text" name="date_text"><br>-->
              <input type="submit" name="submit" value="Chagua">
              <?php
               
               


              ?>
            </form>
          </div >

          <ul>
                <a target="report" href="meneja_sales_summary_form.php"><li class="view_sheet_btn">Mauzo kwa Ufupi</li></a>
          </ul>
             
        </div>
    </aside>
  </div>

<?php 
include_once"footer.php";
?>