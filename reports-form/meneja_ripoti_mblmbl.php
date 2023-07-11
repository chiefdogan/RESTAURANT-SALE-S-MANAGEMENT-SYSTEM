
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
  <link rel="stylesheet" type="text/css" href="../css/prch_orda_form.css">
   
</head>
<body id="purchase_body">


    <div id="wrapper">

    <section class="contents-list-main_store_hold">
       <iframe name="chak_mtiririko">
         
       </iframe>
      
    </section>

    <aside class="sheet-list-iframe_main_store">           
        <div id="view_print_hold">
          
          <div  class="add-box">
              <p>RIPOTI</p>
          </div>

          <ul>
            <a target="chak_mtiririko" href="mpikaji-stock-sheet-report_mnj.php"><li class="view_sheet_btn"> Mauzo Jikoni</li></a>
            <a target="chak_mtiririko" href="manejor_karatasi_b.php"><li class="view_sheet_btn">Note Zilizopokelewa</li></a>
              <a target="chak_mtiririko" href="manejor_karatasi_c.php"><li class="view_sheet_btn"> Manunuzi</li></a>
                <a target="chak_mtiririko" href="manejor_karatasi_d.php"><li class="view_sheet_btn">Stoo Kuu</li></a>
          </ul>

                
        </div>
    </aside>
  </div>
 
</body>
</html>