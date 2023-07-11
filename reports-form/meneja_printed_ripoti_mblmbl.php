
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
  <title>meneja</title>
  <meta http-equiv="EXPIRES" content="-1">
  <link rel="stylesheet" type="text/css" href="../css/prch_orda_form.css">
   
</head>
<body id="body_blank">


    <div id="wrapper">

    <section class="contents-list-main_store_hold sms-holder"> 
       <form action="../fnct-inc/sms_all.inc.php" method="POST" class="txt_area_form">
       <div class="txt_hold">
          <div class="text_area">
           <textarea type="text" name="txt_area" placeholder="Ankika Ujumbe"></textarea>
          </div>

          <div class="dt_ed_btn">
             <?php
              $tx_area=mysqli_real_escape_string(ucwords(strtolower($_POST['txt_area'])));
               $_SESSION['edting']=$tx_area;

                $select="SELECT * FROM sms_all ORDER BY ID DESC LIMIT 1";
              $query=mysqli_query($conn,$select);
              $count=mysqli_num_rows($query);
              if ($count==true) {
                while ($rows=mysqli_fetch_array($query)) {
                  $id_no= $rows['ID'];
                  $id= $rows['ID'];
                  
                }
               
              }
                 echo "<button type='submit' name='editing'>Sahihisha Ujumbe </button>";
                echo "<a href='../fnct-inc/delete.inc.php?id=".$id_no."'>Futa Ujumbe </a>";

             ?>

             
           </div>
         </div>

         <button type="submit" name="submit" class="submt">Tuma Ujumbe</button>
       </form>
      
    </section>

  </div>

</body>
</html>
