
<?php 
session_start();
if (!isset($_SESSION['ur_name']) && $_SESSION['cheo_type'] !='admin' ) {
  header('location:../index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
 <!-- <link rel="stylesheet" type="text/css" href="../css/styl.css">
 <link rel="stylesheet" type="text/css" href="../css/mpukj3.css">-->
  <link rel="stylesheet" type="text/css" href="../css/prch_orda_form.css">
</head>
<body id="kts-b-body">

          
           <article class="lft-menu-list_mnj" >
                 <div class="contents-list-prch_rpot_mnj">
          <table border="0" cellspacing="0">
            <tr >
              <th class="logo_row" colspan="9">
                <img src="report_img/ako2.jpg">
              </th>
              
            </tr>

           <tr >
             <td class="headings_row_main_store" colspan="9">
               <div class="main_heding_main_store">
                 <div> <p>MAIN STORE</p> </div>
                 <div class="date_main_store_a">
                   <?php echo date('d-m-Y');?>
                 </div>
               </div>
              </td>  
           </tr>

          <tr class="row-thead_b">
              <th class="date_nt">S/N</th>
              <th class="date_nt">ITEM</th>
               <th class="date_nt">QUANTITY<br>RECEIVED</th>
               <th class="date_nt">UNITS</th>
               <th class="date_nt">COST</th>
               <th class="date_nt">OUR <br>ORDER NO</th>
               <th class="date_nt">DATE</th> 
          </tr>
          <?php
          $conn=mysqli_connect('localhost','root','');
          mysqli_select_db($conn,'menu_mpya');

          
              $selct='SELECT * FROM good_rcved_nt ORDER BY ID ASC ';
          $qry=mysqli_query($conn,$selct);
          while ($rows=mysqli_fetch_assoc($qry)) {
            $id_no=$rows['ID'];
            $sum_a += $rows['Qty_received'];
            $sum_b += $rows['Total_cost'];
            
            echo "<tr class='tr_a'>";
            echo "<td class='list_clmn_mnj_b indent_b'>"; echo $rows['ID']; echo"</td>";
            echo "<td class='list_clmn_mnj_b indent_b'>";echo $rows['item_name'];echo"</td>";
            echo "<td class='list_clmn_mnj_b qtity'>";echo $rows['Qty_received'];echo"</td>";
            echo "<td class='list_clmn_mnj_b indent_b'>";echo $rows['kizio'];echo"</td>";
            echo "<td class='list_clmn_mnj_b qtity'>";echo $rows['Cost_per_unit'];echo"</td>";
            echo "<td class='list_clmn_mnj_b qtity'>"; echo$rows['Total_cost']; echo"</td>";
            echo "<td class='list_clmn_mnj_b date_ent durtion'>"; echo $rows['Date_ent']; echo"</td>";
            echo "</tr>";
            }
            echo "<tr class='whole_row'>";
                     echo "<td class='indent_b list_clmn_mnj_b' colspan='2'>";echo"TOTAL (TSH)";echo "</td>";
                     echo "<td class=' qtity list_clmn_mnj_b'>";echo $sum_a;echo "</td>";
                     echo "<td class='qtity'>";  echo "</td>";
                     echo "<td class='qtity'>"; echo "</td>";
                     echo "<td class='qtity list_clmn_mnj_b'>"; echo $sum_b; echo "</td>";
                     echo "<td class='qtity'>"; echo "</td>";
                   echo "</tr>"; 

          ?>
            
            <tr></tr>
          </table>

     </div>
           </article>
</body>
</html>



