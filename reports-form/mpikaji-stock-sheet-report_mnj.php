
<?php 
session_start();
if (!isset($_SESSION['ur_name']) && $_SESSION['cheo_type'] !='admin' ) {
  header('location:../index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>menejat</title>

  <link rel="stylesheet" type="text/css" href="../css/stock-sheet-report.css">
  <script  src="../js/sjfunction.js"></script>
  
</head>
<body>
  <div class="main-container-rpt">
   <table border="1" id="">
     <tr id="tb-hd">
       <th colspan="11" height="100">
        <div class="hd_ttle_cover">
          <div class="logo_ttle_hold">
            <div class="logo_hold">
              <img src="../PDF_REPORTS/images/ako.jpg">
            </div>
            <div class="ttle_hold">
              <p>Tanzania's Caterer of Choice</p>
            </div>
          </div>
          <div class="typ_mlo_th_hold">
           <div class="typ_mlo_hold">
             <div class="typ_hold">
               <p>KITCHEN CELLS CONTROL SHEET</p>
             </div>
             <div class="mlo_hold">
               <p><?php echo strtoupper($_SESSION['selected_mlo'])?></p>
             </div>
           </div>
           <div class="trh_hold">
             <p><?php echo $_SESSION['date']?></p>
           </div>
         </div>
       </div>
       <div class="close-button"><a href="javascript:void(0)" onclick="closeButton()">
         <div class="close-sgn1"></div>
         <div class="close-sgn2"></div>
       </a></div>

     </th>
   </tr>

   <tr class="row-thead" >
     <th width="100px">item</th>
     <th width="20px">O/bal<br>porton</th>
     <th width="20px">Iss/portion</th>
     <th width="20px">Total <br>portion</th>
     <th width="20px">Sale portion</th>
     <th width="20px">Trans/ reject</th>
     <th width="20px">Sales price</th>
     <th width="20px">C/balance</th>
     <th width="20px">S/amount</th>
     <th width="20px">C/stock value</th>
     <th width="60px">Date</th>
   </tr>

   
   <?php
   $conn=mysqli_connect('localhost','root','');
   mysqli_select_db($conn,'menu_mpya');


   $select="SELECT * FROM stock_sheet ORDER BY ID ASC";
   $Qry=mysqli_query($conn,$select);
   while ($rows=mysqli_fetch_array($Qry)) {
    $Item_nam=            $rows['Item_name'];
    $Order_ptn=           $rows['Ordered_ptn'];
    $Issue_ptn=           $rows['Issued_ptn'];
    $Total_ptn_produce=   $rows['Total_ptn_produced'];
    $Sales_ptn=           $rows['Sale_ptn'];
    $Trans_rejct=         $rows['Trans_reject'];
    $Sale_price=          $rows['Sales_price'];
    $C_balanc=            $rows['C_balance'];
    $S_amunt=             $rows['S_amount'];
    $C_stock_valu=        $rows['C_stock_value'];
    $Varianc=             $rows['Date_entered'];
    $Order_ptn_sum +=           $rows['Ordered_ptn'];
    $Issue_ptn_sum +=           $rows['Issued_ptn'];
    $Total_ptn_produce_sum +=   $rows['Total_ptn_produced'];
    $Sales_ptn_sum +=           $rows['Sale_ptn'];
    $Trans_rejct_sum +=         $rows['Trans_reject'];
    $Sale_price_sum +=          $rows['Sales_price'];
    $C_balanc_sum +=            $rows['C_balance'];
    $S_amunt_sum +=             $rows['S_amount'];
    $C_stock_valu_sum +=        $rows['C_stock_value'];
    

    echo "<tr class='table-tr'>";

    echo "<td class='list_clmn_mnj_c'> $Item_nam </td>";
    echo "<td class='list_clmn_mnj_c'> $Order_ptn </td>";
    echo "<td class='list_clmn_mnj_c'> $Issue_ptn </td>";
    echo "<td class='list_clmn_mnj_c'> $Total_ptn_produce </td>";
    echo "<td class='list_clmn_mnj_c'> $Sales_ptn </td>";
    echo "<td class='list_clmn_mnj_c'> $Trans_rejct</td>";
    echo "<td class='list_clmn_mnj_c'> $Sale_price </td>";
    echo "<td class='list_clmn_mnj_c'> $C_balanc</td>";
    echo "<td class='list_clmn_mnj_c'> $S_amunt</td>";
    echo "<td class='list_clmn_mnj_c'> $C_stock_valu </td>";
    echo "<td class='list_clmn_mnj_e'> $Varianc </td>";

    echo "</tr>";
  }
  



  ?>
  <tr class="whole_row">
    <td class='total-column'>TOTAL AMOUNT</td>
    <td class="column_dec mnt_alin"><?php echo $Order_ptn_sum;?></td>
    <td class="column_dec mnt_alin"><?php echo $Issue_ptn_sum;?></td>
    <td class="column_dec mnt_alin"><?php echo $Total_ptn_produce_sum;?></td>
    <td class="column_dec mnt_alin"><?php echo $Sales_ptn_sum;?></td>
    <td class="column_dec mnt_alin"><?php echo $Trans_rejct_sum;?></td>
    <td class="column_dec mnt_alin"><?php echo $Sale_price_sum;?></td>
    <td class="column_dec mnt_alin"><?php echo $C_balanc_sum ;?></td>
    <td class="column_dec mnt_alin"><?php echo $S_amunt_sum;?></td>
    <td class="column_dec mnt_alin"><?php echo $C_stock_valu_sum;?></td>
    <td class="column_dec mnt_alin"><?php echo $Varianc;?></td>
  </tr>
  
  
</table>

</div>


<?php 
include_once"footer.php";
?>