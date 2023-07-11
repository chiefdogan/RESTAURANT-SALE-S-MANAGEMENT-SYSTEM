
<?php 
session_start();
if (!isset($_SESSION['ur_name']) && $_SESSION['cheo_type'] !='muhasibu' ) {
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
 <div id="sect_asid_hold">
 <section class="contents-list-input">
   <div class="contents-list-input_heading">  
      <h3>JAZA TAARIFA ZA BIDHAA ILIYOLETWA</h3>
    </div>

         
    <form action="../fnct-inc/account_form.inc.php" method="POST" enctype="multipart/form-data">            
      <div class="input-list">
         <div class="input-cover">
          <label class="label-a">Jina La Mleta Afisa</label><br>
           <input type="text" name="Afisa_name" title="Jina La Mleta Bidhaa" ><br>
         <div class="alert_msg_grn"><?php echo $_SESSION['Afisa_name'];?></div>
        </div>
      </div>

      <div class="input-list-a">
          <div class="input-cover">
            <div class="label-a">
              <label >Kiasi Kilichopokelewa</label> <br><input type="number" name="cash_recv" min="1" title="Jaza Kiasi Kilichopokelewa">
            </div>
          </div>
             <div class="alert_msg_grn">
               <?php
                echo $_SESSION['order_num'];
                 echo "<span>";   echo $_SESSION['cash_recv']; echo "</span>";
               ?>
             </div>
      </div>

   
      <div class="input-list-b">
          <div class="input-cover">
              <div class="label-a"><label >Sehemu Iliyotoka</label> <br>
                 <select name="place_from" class="input_select" title="Chagua Sehemu">
                     <option value="Chakula">Chakula</option>
                      <option value="Dukani">Dukani</option>
                      <option value="Baa">Baa</option>
                 </select>
                 <br>
              </div>
          </div>
       <div class="alert_msg_grn">
         <?php
            echo $_SESSION['produced_qty'];
           echo "<span>"; echo $_SESSION['place_from']; echo "</span>";
          ?>
       </div>
    </div>

      <div class="input-list-c">
        <div class="input-cover">
          <div class="label-a">
           <br>
          </div>
        </div>

         <div class="alert_msg_grn">
           <?php
              echo "<span>"; echo $_SESSION['file']; echo "</span>";
           ?>
         </div>
      </div>

        <div class="input-list-d">
          <input type="submit" name="sbmt_recv" value="Tuma data" title="Bonyeza kutuma data">
       </div>
  </form>
 </section>

    <aside class="sheet-list-iframe">
            
        <div id="view_print_hold">
          <div  class="add-box">
            <p>REPOTI</p>
          </div>
          <ul>
            <a target="report" href="account_form.php"><li class="view_sheet_btn">Angalia fomu</li></a>
          </ul>
       </div>
    </aside>
    </div>
  </div>
 

<?php 
include_once"footer.php";
?>