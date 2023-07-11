
<?php 
session_start();
if (!isset($_SESSION['ur_name']) && $_SESSION['cheo_type'] !='admin' ) {
  header('location:../index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>meneja</title>
  <meta http-equiv="EXPIRES" content="-1">
  <!--<link rel="stylesheet" type="text/css" href="../css/styl.css">-->
  <link rel="stylesheet" type="text/css" href="../css/prch_orda_form.css">
   
</head>
<body id="body_blank">


    <div id="wrapper">

    <section class="contents-list-main_store_hold sms-holder">
     <div class="contents-list-prch_rpot_cover">
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
                 <div> <p>RIPOTI YA MAUZO KWA UJUMLA</p> </div>
                 <div class="date_main_store">
                   <?php echo date('d-m-Y');?>
                 </div>
               </div>
              </td>  
           </tr>
          <tr class="row-thead">
               <th class="">JINA/KWANZA</th>
               <th class="">JINA/PILI</th>
               <th class="">JINA/MTUMIAJI</th>
               <th class="">JINSIA</th>
               <th class="">KAZI</th>
               <th class="">FUTA</th>
               <th style="width:10px;">MUDA</th>
               <th class="">TAREHE</th> 
          </tr>
          <?php
          $conn=mysql_connect('localhost','root','');
          mysql_select_db('menu_mpya');

          

            if (isset($_POST['submi'])) {
                $input_a=mysql_real_escape_string($_POST['date_text']);
              if (!$input_a) {
                
                $select="SELECT *  FROM users order by user_id desc";
                $QRY=mysql_query($select, $conn);

                while ($rows=mysql_fetch_array($QRY)) {
                  $id_no=$rows['user_id'];

                  echo "<tr class='tr'>";
                       echo "<td class='wanga_list_clmn'>"; echo$rows['Fr_name']; echo"</td>";
                       echo "<td class='wanga_list_clmn'>"; echo$rows['Last_name']; echo"</td>";
                       echo "<td class='wanga_list_clmn'>"; echo$rows['Ur_name']; echo"</td>";
                       echo "<td class='wanga_list_clmn_genda'>"; echo $rows['gender']; echo"</td>";
                       echo "<td class='list_clmn'>"; echo $rows['role_id']; echo"</td>";
                       //echo "<td class='list_clmn'>"; echo "<a href='../fnct-inc/delete.inc.php?id=".$id_no."'>Hariri</a>"; echo"</td>";
                       echo "<td class='list_clmn'>"; echo "<a href='../fnct-inc/delete.inc.php?user_id=".$id_no."'>Futa</a>"; echo"</td>";
                       echo "<td class='list_clmn_font durtion'>";echo $rows['Time_enta']; echo "</td>";
                       echo "<td class='list_clmn_font durtion'>";echo $rows['Date_enta']; echo "</td>";

                  echo "</tr>";
               }
              }else{
                 $select="SELECT *  FROM users WHERE Fr_name='$input_a' ||Last_name='$input_a' || Ur_name='$input_a' ||gender='$input_a'
                        ||role_id='$input_a'||Date_enta='$input_a' order by user_id desc";
                $QRY=mysql_query($select, $conn);

                while ($rows=mysql_fetch_array($QRY)) {
                  $id_no=$rows['user_id'];

                  echo "<tr class='tr'>";
                       echo "<td class='wanga_list_clmn'>"; echo$rows['Fr_name']; echo"</td>";
                       echo "<td class='wanga_list_clmn'>"; echo$rows['Last_name']; echo"</td>";
                       echo "<td class='wanga_list_clmn'>"; echo$rows['Ur_name']; echo"</td>";
                       echo "<td class='wanga_list_clmn_genda'>"; echo $rows['gender']; echo"</td>";
                       echo "<td class='list_clmn'>"; echo $rows['role_id']; echo"</td>";
                       //echo "<td class='list_clmn'>"; echo "<a href='../fnct-inc/delete.inc.php?id=".$id_no."'>Hariri</a>"; echo"</td>";
                       echo "<td class='list_clmn'>"; echo "<a href='../fnct-inc/delete.inc.php?user_id=".$id_no."'>Futa</a>"; echo"</td>";
                       echo "<td class='list_clmn_font durtion'>";echo $rows['Time_enta']; echo "</td>";
                       echo "<td class='list_clmn_font durtion'>";echo $rows['Date_enta']; echo "</td>";

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
             <label><p>CHAGUA KWA WANGA /MBOGA</p></label><br>
          </div>
            <form action="" method="POST">
              <input type="text" name="date_text" ><br>
              <!--<input type="text" name="date_text"><br>-->
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