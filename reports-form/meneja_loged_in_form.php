
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
<body id="body_blank">


    <div id="wrapper">

    <section class="contents-list-main_store_hold sms-holder">
     <div class="contents-list-prch_rpot_cover">
     <div class="contents-list-prch_rpot">
          <table border="0" cellspacing="1">
            <tr >
              <th class="logo_row" colspan="7">
                <img src="report_img/ako2.jpg">
              </th>
              
            </tr>

           <tr >
             <td class="headings_row_main_store" colspan="7">
               <div class="main_heding_main_store">
                 <div> <p>WATU WALIOINGIA KATIKA MFUMO</p> </div>
                 <div class="date_main_store">
                   <?php echo date('d-m-Y');?>
                 </div>
               </div>
              </td>  
           </tr>
          <tr class="row-thead">
               <th class="">JINA LA KWANZA</th>
               <th class="">JINA LA PILI</th>
               <th class="">JINSIA</th>
               <th class="">KAZI</th>
               <th class="">MUDA</th>
               <th class="">TAREHE</th> 
          </tr>
          <?php


          

            if (isset($_POST['submi'])) {
              $dbselect=mysqli_real_escape_string($_POST['date_text']);
               if (empty($dbselect)) {
              
                $select="SELECT * FROM loged_in ORDER BY ID DESC";
                $QRY=mysqli_query($conn,$select);

                while ($rows=mysqli_fetch_array($QRY)) {
                  echo "<tr class='tr_a'>";
                       echo "<td class='list_clmn_mnj indent'>"; echo$rows['Fr_name']; echo"</td>";
                       echo "<td class='list_clmn_mnj indent'>"; echo $rows['Last_name']; echo"</td>";
                       echo "<td class='list_clmn_mnj indent'>"; echo $rows['gender']; echo"</td>";
                       echo "<td class='list_clmn_mnj indent'>";echo $rows['cheo']; echo "</td>";
                       echo "<td class='list_clmn_mn durtion'>";echo $rows['Time_enta']; echo "</td>";
                       echo "<td class='list_clmn_mn durtion'>";echo $rows['Date_enta']; echo "</td>";
                  echo "</tr>";
               }
             }else{

              
                 
               $select="SELECT * FROM loged_in WHERE Fr_name='$dbselect' OR Last_name='$dbselect' OR cheo='$dbselect' OR Date_enta='$dbselect'";
                $QRY=mysqli_query($select, $conn);
                 
                while ($rows=mysqli_fetch_array($QRY)) {
                  echo "<tr class='tr_a'>";
                       echo "<td class='list_clmn_mnj indent'>"; echo$rows['Fr_name']; echo"</td>";
                       echo "<td class='list_clmn_mnj indent'>"; echo $rows['Last_name']; echo"</td>";
                       echo "<td class='list_clmn_mnj'>"; echo $rows['gender']; echo"</td>";
                       echo "<td class='list_clmn_mnj'>";echo $rows['cheo']; echo "</td>";
                       echo "<td class='list_clmn_mn'>";echo $rows['Time_enta']; echo "</td>";
                       echo "<td class='list_clmn_mn'>";echo $rows['Date_enta']; echo "</td>";
                  echo "</tr>";
            }
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
             <label><p>CHAGUA KWA JINA LA KWANZA/ KAZI/ TEREHE</p></label><br>
          </div>
            <form action="" method="POST">
              <input type="text" name="date_text" ><br>
              <input type="submit" name="submi" value="Chagua">
              <?php
               
               


              ?>
            </form>
          </div >
          <!--<div class="print_btn" >
            <a  href="#" target="_blank">Print fomu(total rvd)</a>
          </div >-->

          <!-- <div class="view_sheet_btn">
              <a target="report" href="meneja_sales_summary_form_ujumla.php">Mauzo Kwa Ujumla</a>
          </div>-->

          <!--<div class="view_sheet_btn">
             <a target="report" href="grn_orda_form.php">Jaza Taarifa Za Bidhaa</a>
          </div>-->
                
        </div>
    </aside>
  </div>
</body>
</html>