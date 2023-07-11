
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
 <section class="contents-list-input">

   <div class="contents-list-input_heading">
   <h3>
     <?php
               if ($_SESSION['grn_sc']) {
                echo"<span>"; echo $_SESSION['grn_sc']; echo"</span>";
                 
               }else{
                echo "JAZA TAARIFA ZA BIDHAA ILIYOLETWA";
               }
            ?>  
      </h3>
    </div>

         
    <form action="../fnct-inc/grn_form.inc.php" method="POST">            
      <div class=" grn_input">
         <div class="input-cover">
          <label class="label-a">Jina La Mleta Bidhaa</label><br>
           <input type="text" name="sup_name" title="Jina La Mleta Bidhaa" ><br>
         <div class="alert_msg_grn_a"><?php echo $_SESSION['sup-name'];?></div>
        </div>
      </div>

      <div class=" grn_input">
          <div class="input-cover">
            <div class="label-a">
              <label >Jina la Bidhaa</label> <br><input type="text" name="item_nam" title="Jina la Bidhaa">
            </div>
          </div>
             <div class="alert_msg_grn_a">
               <?php
                echo $_SESSION['order_num'];
                 echo "<span>";   echo $_SESSION['item_nam']; echo "</span>";
               ?>
             </div>
      </div>

      <div class=" grn_input">
        <div class="input-cover">
           <div class="label-a">
            <label >Kiasi Kilichopokelewa</label> <br><input type="number" name="recved_qty" min='1' title="Kiasi Kilichopokelewa">
        </div>
      </div>
        <div class="alert_msg_grn_a ">
         <?php

            echo $_SESSION['produced_qty'];
            echo "<span>"; echo $_SESSION['recved_qty']; echo "</span>";

          ?>
        </div>
      </div>

      <div class=" grn_input">
          <div class="input-cover">
              <div class="label-a"><label >Chagua Kizio</label> <br>
                 <select name="selct_unit" class="input_select" title="Chagua Kizio">
                     <option value="KG">KG</option>
                      <option value="LITER">LITER</option>
                 </select>
                 <br>
              </div>
          </div>
       <div class="alert_msg_grn_a">
         <?php
            echo $_SESSION['produced_qty'];
           echo "<span>"; echo $_SESSION['selct_unit']; echo "</span>";
          ?>
       </div>
    </div>

      <div class=" grn_input">
        <div class="input-cover">
          <div class="label-a">
            <label>Bei ya Kila Kiwango</label> <br><input type="number" name="unit_cost" min='1' title="Bei ya Kila Kiwango"><br>
          </div>
        </div>

         <div class="alert_msg_grn_a">
           <?php
              echo "<span>"; echo $_SESSION['unit_cost']; echo "</span>";
           ?>
         </div>
      </div>

        <div class="input-list-d">
          <input type="submit" name="sbmt" value="Tuma data" title="Bonyeza kutuma data">
       </div>
  </form>
 </section>

    <aside class="sheet-list-iframe">
            
            <div id="view_print_hold">
            <div  class="add-box">
              <p>REPOTI</p>
          </div>
          <ul>
            <a target="report" href="grn_form.php"><li class="view_sheet_btn">Angalia fomu</li></a>
            <!--<a target="report" href="grn_orda_report.php"><li class="view_sheet_btn">Angalia repoti</li></a>-->
          </ul>
        </div>
    </aside>

  </div>
 

<?php 
include_once"footer.php";
?>