
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
<body id="purchase_body">


    <div id="wrapper">

    <section class="contents-list-main_store_hold">
       <iframe name="chak_mtiririko" >
         
       </iframe>
      
    </section>

    <aside class="sheet-list-iframe_main_store">           
        <div id="view_print_hold">

        <div  class="add-box">
              <p>RIPOTI</p>
          </div>

          <ul>
            <a target="chak_mtiririko" href="manejor_mpakuaji_check.php"><li class="view_sheet_btn">Chakula Kilichopo</li></a>
            <a target="chak_mtiririko" href="manejor_mpikaji_alets.php"><li class="view_sheet_btn">Chakula Kilichoisha</li></a>
          </ul>
                
        </div>
    </aside>
  </div>
 

<?php 
include_once"footer.php";
?>