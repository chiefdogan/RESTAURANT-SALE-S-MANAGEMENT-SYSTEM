
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
  <title>login |Welcome</title>
  <meta http-equiv="EXPIRES" content="-1">
  <!--<link rel="stylesheet" type="text/css" href="../css/styl.css">-->
  <link rel="stylesheet" type="text/css" href="../css/prch_orda_form.css">
   
</head>
<body id="purchase_body">


    <div id="wrapper">

    <section class="contents-list-main_store_hold">
     <div class="contents-list-prch_rpot_cover">
     <div class="contents-list-prch_rpot">
          <table border="0" cellspacing="0">
            <tr >
              <th class="logo_row" colspan="7">
                <img src="report_img/ako2.png">
              </th>
              
            </tr>

           <tr >
             <td class="headings_row_main_store" colspan="7">
               <div class="main_heding_main_store">
                 <div> <p>RIPOTI YA MAUZO KWA UJUMLA</p> </div>
                 <div class="date_main_store">
                   <?php echo date('d-m-Y');?>
                 </div>
               </div>
              </td>  
           </tr>
          <tr class="row-thead">
              <th class="">S/N</th>
               <th class="">WANGA</th>
               <th class="">MBOGA</th>
               <th class="">IDADI /<br>MAUZO</th>
               <th class="">IDADI /<br>SAHANI</th>
               <th class="">BEI /<br>SAHANI</th>
               <th class="">SAMANI /<br>YA MAUZO</th> 
          </tr>
          <?php
          $conn=mysqli_connect('localhost','root','');
          mysqli_select_db($conn,'menu_mpya');

          

            if (isset($_POST['submit'])) {
              $dbselect=mysqli_real_escape_string($conn, $_POST['date_text']);
              if (empty($dbselect)) {
               
              $select="SELECT wanga , mboga,Cost,SUM(T_cost),SUM(Plt_no),COUNT(*) FROM food_pchs 
                         GROUP BY wanga,mboga  HAVING COUNT(*) >= 1";
                $QRY=mysqli_query($conn, $select);
                 
                while ($rows=mysqli_fetch_array($QRY)) {
                  $total_sum_count +=$rows['COUNT(*)'];
                  $total_sum_plate +=$rows['SUM(Plt_no)'];
                  $total_sum_cost +=$rows['- '];
                  $total_sum_t_cost +=$rows['SUM(T_cost)'];
                  $id_inc+=1;
                  echo "<tr class='tr'>";
                       echo "<td class='list_clmn'>"; echo 222; echo"</td>";
                       echo "<td class='wanga_list_clmn'>"; echo$rows['wanga']; echo"</td>";
                       echo "<td class='wanga_list_clmn'>"; echo $rows['mboga']; echo"</td>";
                       echo "<td class='list_clmn '>"; echo $rows['COUNT(*)']; echo"</td>";
                       echo "<td class='list_clmn'>";echo $rows['SUM(Plt_no)']; echo "</td>";
                       echo "<td class='list_clmn'>";echo $rows['Cost']; echo "</td>";
                       echo "<td class='list_clmn'>";echo $rows['SUM(T_cost)']; echo "</td>";
                  echo "</tr>";
            }
             echo "<tr class='whole_row'>";   
                 echo "<td class='total-column' colspan='3'>"; echo 'JUMLA (TSH)'; echo"</td>";
                 echo "<td class='total-clumn'>"; echo $total_sum_count; echo"</td>";
                 echo "<td class='total-clumn'>";echo $total_sum_plate; echo "</td>";
                 echo "<td class='total-clumn'>";echo $total_sum_cost; echo "</td>";
                 echo "<td class='total-clumn'>";echo $total_sum_t_cost; echo "</td>";
            echo "</tr>";
             }else{
             
                 
                $select="SELECT wanga , mboga, Cost, SUM(T_cost), SUM(Plt_no), COUNT(*) FROM food_pchs WHERE wanga='$dbselect'|| mboga='$dbselect' GROUP BY wanga,mboga  HAVING COUNT(*) >= 1";
                $QRY=mysqli_query($conn, $select);

                while ($rows=mysqli_fetch_array($QRY)) {
                  $total_sum_count +=$rows['COUNT(*)'];
                  $total_sum_plate +=$rows['SUM(Plt_no)'];
                  $total_sum_cost +=$rows[' -'];
                  $total_sum_t_cost +=$rows['SUM(T_cost)'];
                  $id_inc+=1;
                  echo "<tr class='tr'>";
                       echo "<td class='list_clmn'>"; echo $id_inc; echo"</td>";
                       echo "<td class='wanga_list_clmn'>"; echo$rows['wanga']; echo"</td>";
                       echo "<td class='wanga_list_clmn'>"; echo $rows['mboga']; echo"</td>";
                       echo "<td class='list_clmn '>"; echo $rows['COUNT(*)']; echo"</td>";
                       echo "<td class='list_clmn'>";echo $rows['SUM(Plt_no)']; echo "</td>";
                       echo "<td class='list_clmn'>";echo $rows['Cost']; echo "</td>";
                       echo "<td class='list_clmn'>";echo $rows['SUM(T_cost)']; echo "</td>";
                  echo "</tr>";
               }
                echo "<tr class='whole_row'>";   
                 echo "<td class='total-column' colspan='3'>"; echo 'JUMLA'; echo"</td>";
                 echo "<td class='total-clumn'>"; echo $total_sum_count; echo"</td>";
                 echo "<td class='total-clumn'>";echo $total_sum_plate; echo "</td>";
                 echo "<td class='total-clumn'>";echo $total_sum_cost; echo "</td>";
                 echo "<td class='total-clumn'>";echo $total_sum_t_cost; echo "</td>";
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
             <label><p>CHAGUA KWA WANGA /MBOGA</p></label><br>
            </div>

            <form action="" method="POST">
              <input type="text" name="date_text" ><br>
              <input type="submit" name="submit" value="Chagua">
            </form>
            
          </div >

           <ul>
                <a target="report" href="meneja_sales_summary_form_ujumla.php"><li class="view_sheet_btn">Mauzo Kwa Ujumla</li></a>
          </ul>

                
        </div>
    </aside>
  </div>
</body>
</html>