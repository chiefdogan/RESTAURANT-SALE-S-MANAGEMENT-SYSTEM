
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
  <!--<link rel="stylesheet" type="text/css" href="../css/styl.css">-->
  <link rel="stylesheet" type="text/css" href="../css/prch_orda_form.css">
   
</head>
<body id="purchase_body">


    <div id="wrapper">

    <section class="contents-list-main_store_hold">
    <iframe name="display" src='account_order_report.php' id="acc_iframe" > </iframe>
      
    </section>

    <aside class="sheet-list-iframe_main_store">           
        <div id="view_print_hold">
          <div class="print_btn_select_form" >
          <div class="label_head">
             <label><p>FANYA CHAGUO MAALUM</p></label><br>
          </div>
            <form action="" method="POST">
              <input type="text" name="date_text" placeholder="mfn:2018-09-02"><br>
              <!--<input type="text" name="date_text"><br>-->
              <input type="submit" name="submit" value="Chagua">
              <?php
               $_SESSION['send']=$_POST['submit'];
               $_SESSION['tft']=mysql_real_escape_string($_POST['date_text']);
               


              ?>
            </form>
          </div >

           <ul>
             <a target="display" href="account_order_report.php"><li class="view_sheet_btn">Angalia fomu</li></a>
             <a target="display" href="../PDF_REPORTS/account_orda_report.inc.php" ><li class="print_btn" >Chapa fomu</li></a>
              <a target="report" href="account_orda_form.php"><li class="view_sheet_btn">Jaza Taarifa</li></a>
          </ul>
          
        </div>
    </aside>
  </div>
 

<?php 
include_once"footer.php";
?>