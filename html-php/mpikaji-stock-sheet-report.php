
<?php 
session_start();
if (!isset($_SESSION['ur_name']) ) {
  header('location:../index.php');
}else{
  $uname=$_SESSION['ur_name'];
   $cheotype=$_SESSION['cheo_type'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>stock-sheet-report</title>

  <link rel="stylesheet" type="text/css" href="../css/stock-sheet-report.css">
  <!--<link rel="stylesheet" type="text/css" href="../css/responinsive.inc.css">-->
  <script  src="../js/sjfunction.js"></script>
    
</head>
<body>
<div class="main-container-rpt">
 <table border="1" >
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
 $conn=mysql_connect('localhost','root','');
 mysql_select_db('menu_mpya');


if (isset($_POST['sechi'])) {
  $ield=mysql_real_escape_string(ucfirst($_POST['item_nam']));

 $_SESSION['field']=$ield;
 $_SESSION['field_tuma']=$_POST['sechi'];


  if (!$ield) {
    $select="SELECT * FROM stock_sheet ORDER BY ID ASC";
$Qry=mysql_query($select);
while ($rows=mysql_fetch_array($Qry)) {
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
    echo "<td class='mnt_alin'> $Order_ptn </td>";
    echo "<td class='mnt_alin'> $Issue_ptn </td>";
    echo "<td class='mnt_alin'> $Total_ptn_produce </td>";
    echo "<td class='mnt_alin'> $Sales_ptn </td>";
    echo "<td class='mnt_alin'> $Trans_rejct</td>";
    echo "<td class='mnt_alin'> $Sale_price </td>";
    echo "<td class='mnt_alin'> $C_balanc</td>";
    echo "<td class='mnt_alin'> $S_amunt</td>";
    echo "<td class='mnt_alin'> $C_stock_valu </td>";
    echo "<td class='mnt_alin'> $Varianc </td>";

    echo "</tr>";
}
  
  }else{

        $select="SELECT * FROM stock_sheet WHERE Item_name='$ield' || Ordered_ptn='$ield' || Issued_ptn='$ield'
         ||Total_ptn_produced='$ield' ||Sale_ptn='$ield' || Trans_reject='$ield' ||Sales_price='$ield' ||C_balance='$ield'
          || S_amount='$ield' || C_stock_value='$ield' || Date_entered='$ield' ORDER BY ID ASC";
$Qry=mysql_query($select) or die(mysql_error());
while ($rows=mysql_fetch_array($Qry)) {
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

    echo "<td> $Item_nam </td>";
    echo "<td class='mnt_alin'> $Order_ptn </td>";
    echo "<td class='mnt_alin'> $Issue_ptn </td>";
    echo "<td class='mnt_alin'> $Total_ptn_produce </td>";
    echo "<td class='mnt_alin'> $Sales_ptn </td>";
    echo "<td class='mnt_alin'> $Trans_rejct</td>";
    echo "<td class='mnt_alin'> $Sale_price </td>";
    echo "<td class='mnt_alin'> $C_balanc</td>";
    echo "<td class='mnt_alin'> $S_amunt</td>";
    echo "<td class='mnt_alin'> $C_stock_valu </td>";
    echo "<td class='mnt_alin'> $Varianc </td>";

    echo "</tr>";
}
 

  }
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
      <td class="column_dec mnt_alin"><?php echo $Varianc_sum;?></td>
    </tr>
   
   
 </table>

  </div>
 

<?php 
include_once"footer.php";
?>