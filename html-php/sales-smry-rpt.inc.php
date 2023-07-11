
<?php 
session_start();
if (!isset($_SESSION['ur_name'])) {
  header('location:../index.php');
  exit();
}else{
  $uname=$_SESSION['ur_name'];
   $cheotype=$_SESSION['cheo_type'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Muuzaji</title>
  
  <link rel="stylesheet" type="text/css" href="../css/styl.css">
<link rel="stylesheet" type="text/css" href="../css/mpukj3.css">
<link rel="stylesheet" type="text/css" href="../css/mpikaji.a.inc.css">
<link rel="stylesheet" type="text/css" href="../css/report.css">
<link rel="stylesheet" type="text/css" href="../css/responinsive.inc.css">
<link rel="icon"  href="../img/AKO.jpg">

    
</head>
<body id="kts-b-body">
<div class="main-container">
   <header>
      <div class="hr-ttl">
           <img src="../img/AKO.jpg">

      </div>

           <div class="hom-out">
                  <div  class="hom-lk"><a href="muuzaji.php">Mwanzo</a></div>
                  <div class="logout"><a href="../lgn-inc/lgt.inc.php">Toka</a></div>  
       </div>

     
    </header>


    <div id="wrapper">

     <section>
        <div class="container wlcm-bar"> 
          <div class="wlcm-bar-pic-holder">
            <div class="wlcm-bar-pic"> <?php echo "<img src='../images/".$_SESSION['ipt_img_mzji']."' alt='weka picha'>";?></div>
            <div class="wlcm-bar-msg"><p><?php echo ucwords($_SESSION['msg']);?></p></div>
          </div>
             
          <div class="wlcm-bar-alert">
             <div class="alert_sms">
              <h4></h4>
            </div>
            <div class="message">
              <marquee><h4><?php include_once'../fnct-inc/sms_all.inc.php';?></h4></marquee>
            </div>
          </div>
        </div>

     <section class="menu-list">

      <div class="view_sheet_cover">

            
            <div class="img_owner_muuzj">
              <form action="#" method="POST" class="Search_form">
                <input type="text" name="item_name" class="inp_sech"  placeholder="Andika Unachotaka">
                <input type="submit" name="sech" value="Tafuta" class="inp_tfta" >
              </form>
           </div>
           <div  class="view_sheet_drop" >
             <label >Chagua Aina Mlo</label>
              <form action="" method="POST" class="mlo_form">
                 <select name="selct_mlo">
                   <option value="Launch">Mchana</option>
                  <option value="Dinner">Usiku</option>
                  <option value="Launch / Dinner">Mchana/ Usiku</option>
                </select>
                    <input type="submit" name="submit" value="Weka">
               </form>
               <?php 
                if (isset($_POST['selct_mlo'])) {
                    $mlo=$_POST['selct_mlo'];
                    $_SESSION['selected_mlo']= $mlo;
                    header('location: sales-smry-rpt.inc.php');

                }
               ?>
              
            </div >
             
             <ul>
               <a  href="../PDF_REPORTS/sales-smry-rpt-pdf.inc.php" target="_blank"><li id="print_btn" class="view_sheet_btn"> Chapa fomu</li> </a>
             </ul>

          </div>

      <div id="tb-wrapper">
        <table class="tb_report">
          <thead>
              <div id="tb-hd">
                <div class="tb-hd-a">
                  <div class="tb-hd-aa">
                    <img src="../img/ako.jpg">
                  </div>
                  <div class="tb-hd-ab">
                    <h2>AKO CATERING SERVICE LTD.</h2>
                    <h4>CASHIER SALE'S SUMMARY REPORT</h4>
                    <h3 class="trh_typ">
                      <?php
                        echo "Trh : ".date('d/ m/ Y');
                      ?>
                    </h3>
                    <h3 class="mlo_typ">
                      <?php
                        echo $_SESSION['selected_mlo'];
                      ?>
                    </h3>
                  </div>
                </div>
                <div class="tb-hd-c">
                  <p>
                    Plot no: 29393 Urafiki Area<br>
                    P. O. BOX 63314 Dar es salaam, Tanzania<br>
                    Tel: +255 22 2400646<br>
                    Fax: +255 736 618174<br>
                    Email: info@akogroup.co.tz <br>
                    Website: www.akogroup.co.tz
                  </p>
                   <p class="rept-id">
                     <?php
                     
                      /* $_SESSION['rept-id']=027401;
                       $_SESSION['rept-id-inc']+=1;
                       $rpt_id=$_SESSION['rept-id'] + $_SESSION['rept-id-inc'];
                       $_SESSION['rpt_n']=$rpt_id;*/
                      // echo "No : ".$_SESSION['report_id'];

                     ?>
                   </p>
                </div>
              </div>
          </thead>
          <tbody>
              <tr class="sales_smry_tr">

                <th>NAMBA YA ODA</th>    
                <th >WANGA</th>
                <th>MBOGA</th>
                <th>IDADI YA SAHANI</th>
                <th>JUMLA YA MAUZO</th>
                <th >TAREHE</th>

              </tr>
              <?php
                $con=mysql_connect('localhost','root','');
                mysql_select_db('menu_mpya');

               

            if (isset($_POST['sech'])) {
               $nm_item=mysql_real_escape_string($_POST['item_name']);
               
               $_SESSION['sech']=$_POST['sech'];
               $_SESSION['itm_name']=$nm_item;

               if (empty($nm_item)) {
             /*   $select="SELECT id, order_no, wanga, mboga, Plt_no, T_cost,date_entered from food_pchs ORDER BY id DESC";*/
               $select=" SELECT id, order_no, wanga , mboga,SUM(T_cost),SUM(Plt_no),date_entered ,COUNT(*) FROM food_pchs 
                         GROUP BY wanga,mboga  HAVING COUNT(*) >= 1 ORDER BY wanga ASC ";
                $QRY=mysql_query($select, $con);

                while ($rows=mysql_fetch_array($QRY)) {
                  $total_costs +=$rows['SUM(T_cost)'];
                  $total_plates +=$rows['SUM(Plt_no)'];
                  echo "<tr>";
                        /* echo "<td class='algn_ct cent_td'>"; echo$row['id']; echo"</td>";*/
                       echo "<td class='algn_ct cent_td'>"; echo$rows['order_no']; echo"</td>";
                       echo "<td class='algn_ct_fd'>"; echo$rows['wanga']; echo"</td>";
                       echo "<td class='algn_ct_fd'>"; echo $rows['mboga']; echo"</td>";
                       echo "<td class='algn_ct lft_td'>";echo $rows['SUM(Plt_no)']; echo "</td>";
                       echo "<td class='algn_ct lft_td'>";echo $rows['SUM(T_cost)']; echo "</td>";
                       echo "<td class='algn_ct cent_td date_ent'>";echo $rows['date_entered']; echo "</td>";
                  echo "</tr>";

                  
                  
                }
                echo "<tr class='whole_row'>";
                         echo "<td colspan='3' class='total-column'> TOTAL AMOUNT </td>";
                         echo "<td class='column_dec lft_td'> $total_plates </td>";
                         echo "<td class='column_dec lft_td'> $total_costs </td>";
                         echo "<td class='column_dec'> </td>";
                            
                  echo "</tr>";
               }
            else{

                
                $select="SELECT id, order_no, wanga , mboga,SUM(T_cost),SUM(Plt_no),date_entered ,COUNT(*) FROM food_pchs WHERE (wanga='$nm_item' || 
                  mboga='$nm_item' || date_entered='$nm_item')  GROUP BY wanga,mboga  HAVING COUNT(*) >= 1 ORDER BY wanga ASC ";
                $QRY=mysql_query($select, $con);

                while ($row=mysql_fetch_array($QRY)) {
                  $total_costs +=$row['SUM(T_cost)'];
                  $total_plates +=$row['SUM(Plt_no)'];
                  echo "<tr>";
                      /* echo "<td class='algn_ct cent_td'>"; echo$row['id']; echo"</td>";*/
                       echo "<td class='algn_ct cent_td'>"; echo$row['order_no']; echo"</td>";
                       echo "<td class='algn_ct'>"; echo$row['wanga']; echo"</td>";
                       echo "<td class='algn_ct'>"; echo $row['mboga']; echo"</td>";
                       echo "<td class='algn_ct lft_td'>";echo $row['SUM(Plt_no)']; echo "</td>";
                       echo "<td class='algn_ct lft_td'>";echo $row['SUM(T_cost)']; echo "</td>";
                       echo "<td class='algn_ct cent_td date_ent'>";echo $row['date_entered']; echo "</td>";
                  echo "</tr>";

                  
                  
                }
                echo "<tr class='whole_row'>";
                         echo "<td colspan='3' class='total-column'> TOTAL AMOUNT </td>";
                         echo "<td class='column_dec lft_td'> $total_plates </td>";
                         echo "<td class='column_dec lft_td'> $total_costs </td>";
                         echo "<td class='column_dec'>  </td>";

                            
                  echo "</tr>";

            }
            }
                    
                  
              ?>
          </tbody>
          <?php
             
          ?>
        </table>
        
      </div>
     </section>
  </div>
 

<?php 
include_once"footer.php";
?>