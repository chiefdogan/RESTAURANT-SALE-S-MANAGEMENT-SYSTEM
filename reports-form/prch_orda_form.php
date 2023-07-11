
<?php 
session_start();
if (!isset($_SESSION['ur_name']) && $_SESSION['cheo_type'] !='stoo' ) {
  header('location:../index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>meneja</title>
  <meta http-equiv="EXPIRES" content="-1">
  <link rel="stylesheet" type="text/css" href="../css/styl.css">
  <link rel="stylesheet" type="text/css" href="../css/prch_orda_form.css">
   
</head>
<body id="purchase_body">


    <div id="wrapper">

    <section class="contents-list-input">

         <div class="contents-list-input_heading">

          
            <h3>
            <?php
               if ($_SESSION['toto_alet']) {
                echo"<span>"; echo $_SESSION['toto_alet']; echo"</span>";
                 
               }else{
                echo "JAZA TAARIFA ZA BIDHAA ILIYOOMBWA";
               }
            ?>
            </h3>

          </div>

         
            <form action="../fnct-inc/prch_form.inc.php" method="POST">            
              <div class="lb_prch input-list">
                  <div class="input-cover">
                        <label class="label-a">Jina La Bidhaa </label><br>
                          <input type="text" name="item_nam" title="Jina La Bidhaa" ><br>
                      <div class="alert_msg_grn">
                           <?php echo $_SESSION['item-nm'];?>
                      </div>
                  </div>
              </div>

               <div class="lb_prch input-list">
                  <div class="input-cover">
                        <label class="label-a">Kiasi cha bidhaa Kilichopo </label><br>
                          <input type="number" name="balance" min='0' title="Jaza kiasi cha bidhaa kilichopo" ><br>
                      <div class="alert_msg_grn">
                           <?php echo $_SESSION['balance'];?>
                      </div>
                  </div>
              </div>

              <div class="lb_prch input-list-a">
                  <div class="input-cover">
                      <div class="label-a"><label >Kiasi Kilichoombwa</label><br> 
                        <input type="number" name="order_num" min='1' title="Jaza kiasi kilichoombwa">
                      </div>
                  </div>
                   <div class="alert_msg_grn">
                     <?php
                      echo $_SESSION['order_nm'];
                     ?>
                   </div>
              </div>

              <div class="lb_prch input-list-b">
                  <div class="input-cover">
                      <div class="label-a"><label >Kiasi Kilichotolewa</label><br>
                          <input type="number" name="recved_qty" min='1' title="Kiasi kilichotolwewa"><br>
                      </div>
                  </div>
                   <div class="alert_msg_grn">
                     <?php
                       echo $_SESSION['recved_qt'];
                      ?>
                   </div>
              </div>

              <div class="lb_prch input-list-b">
                  <div class="input-cover">
                    <div class="label-a"><label >Chagua Kizio</label> <br>
                     <select name="selct_unit" class="input_select" title="Chagua Kizio">
                         <option value="KG">KG</option>
                          <option value="LITER">LITER</option>
                     </select>
                     <br>
                   </div>
                  </div>
                   <div class="alert_msg_grn">
                     <?php
                       echo $_SESSION['selct_unt'];
                      ?>
                   </div>
              </div>

              <div class="lb_prch input-list-c">
                  <div class="input-cover">
                      <div class="label-a"><label>Bei ya Kila Kiwango</label> <br>
                          <input type="number" name="unit_cost" min='1' title="Bei ya Kila Kiwango"><br>
                      </div>
                  </div>
                   <div class="alert_msg_grn">
                       <?php
                          echo $_SESSION['unit_cst'];
                       ?>
                   </div>
              </div>

              <div class="input-list-d">
              <input type="submit" name="submit" value="Tuma data" title="Bonyeza kutuma data">
              </div>

            </form>
      
    </section>

    <aside class="sheet-list-iframe">           
        <div id="view_print_hold">
            <div  class="add-box">
              <p>REPOTI</p>
          </div>
          <ul>
            <a target="report" href="prch_form.php"><li class="view_sheet_btn">Angalia fomu</li></a>
            <!--<a target="report" href="prch_orda_report.php"><li class="view_sheet_btn">Angalia repoti</li></a>
            <a target="report" href="../PDF_REPORTS/prch_fomu_report.inc.php"><li class="view_sheet_btn">Print fomu</li></a>-->
          </ul>

        </div>
    </aside>
  </div>
 

<?php 
include_once"footer.php";
?>