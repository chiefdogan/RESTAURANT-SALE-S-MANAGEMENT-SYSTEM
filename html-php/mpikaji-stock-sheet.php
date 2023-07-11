
<?php 
session_start();
if (!isset($_SESSION['ur_name'])) {
  header('location:../index.php');
}else{
  $uname=$_SESSION['ur_name'];
   $cheotype=$_SESSION['cheo_type'];
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Mpikaji</title>
  <link rel="icon"  href="../img/AKO.jpg">
  <link rel="stylesheet" type="text/css" href="../css/styl.css">
  <link rel="stylesheet" type="text/css" href="../css/mpikaji-stock-sheet.css">
  <link rel="stylesheet" type="text/css" href="../css/responinsive.inc.css">
  <link rel="stylesheet" type="text/css" href="../css/animate.css"> 
</head>

<body>
<div class="main-container">
    <header>
           <div class="hr-ttl">
               <img src="../img/AKO.jpg">

           </div>

       <div class="main_title">
           <div class="main_head">
              <h1>RESTAURANT SALE'S MANAGEMENT SYSTEM</h1>
           </div>
           <div class="hom-out">
             <div  class="hom-lk"><a href="mpikaji.php">Mwanzo</a></div>
              <div class="logout"><a href="../lgn-inc/lgt.inc.php" onclick="return confirm(Unataka kutoka ??)">Toka</a></div>   
           </div>
       </div>

     
    </header>


    <div id="wrapper">

    <section class="contents-list-input">
       <div class="container-pic">
         <div class="muhudumu-pic">
           <?php
           echo "<img src='../images/".$_SESSION['ipt_img']."'>";

           ?>
            
          </div>

          <div class="view_sheet_btn-cover">

            <ul>
              <a target="frme" href="mpikaji-stock-sheet-report.php"><li class="view_sheet_btn mpj_link flash animated" >Angalia fomu</li></a>
              <a  href="../PDF_REPORTS/mpikaji-stock-sheet-report.inc.php" target="frme" ><li class="view_sheet_btn mpj_link flash animated" >Chapa fomu</li></a>
            </ul>
            <div class="search_box">
            	<form action="mpikaji-stock-sheet-report.php" method="POST" class="search_frm" target="frme">
            		<input type="text" name="item_nam" class="mpaji_sech">
                    <input type="submit" name="sechi" class="mpaji_sbt" value="Tafuta" >
            	</form>
            </div>
          </div>
      </div>
           <form action="../fnct-inc/mpikaji-stock-sheet.inc.php" method="POST" class="sheet_form">            
              <div class="input-list"><label>Jina La Bidhaa </label><br><input type="text" name="item-name" class="item_nam" title="Jina La Bidhaa " ><br>
                 <div class="alert_msg"><?php echo $_SESSION['item-name'];?></div>
              </div>

              <div class="input-list-a">
	              <div class="input-cover">
		              <div class="label-a"><label >Kiasi Kilichoagizwa</label> <br>
		                 <input type="number" name="order_num" min="1">
		              </div>

		              <div class="label-b"><label >Kiasi Kilichofikishwa</label><br>
		                 <input type="number" name="issed_num" min="1">
		              </div>
	              </div>

	               <div class="alert_msg">
	                 <?php
	                  echo $_SESSION['order_num'];
	                   echo "<span>";   echo $_SESSION['issed_num']; echo "</span>";
	                 ?>
	               </div>

              </div>

              <div class="input-list-b">
	              <div class="input-cover">
		              <div class="label-a"><label >Kiasi Kilichozalishwa</label> <br> 
		                 <input type="number" name="produced_qty" min="1"><br>
		              </div>

		              <div class="label-b"><label >Kiasi Kilichouzwa</label> <br>
		                 <input type="number" name="sales_qty" min="1"><br>
		              </div>
	              </div>

	               <div class="alert_msg">
	                 <?php

	                   echo $_SESSION['produced_qty'];
	                  echo "<span>"; echo $_SESSION['sales_qty']; echo "</span>";

	                  ?>
	               </div>
              </div>


              <div class="input-list-c">
	              <div class="input-cover">
		              <div class="label-a"><label>Kiasi Kilichokataliwa</label> <br>
		                 <input type="number" name="rejected_qty" min="1"><br>
		              </div>

		              <div class="label-b"><label>Bei kwa Kila Uzo</label> <br>
		                  <input type="number" name="sales_cost" min="1"><br>
		              </div>
	              </div>

	               <div class="alert_msg">
	                 <?php
	                    echo "<span>"; echo $_SESSION['sales_cost']; echo "</span>";
	                 ?>
	               </div>
              </div>

          <div class="input-list-d">
              <input type="submit" name="submit" value="Tuma data">
          </div>

      </form>
      
    </section>

    <aside class="sheet-list-iframe">
       <iframe name="frme"></iframe>
    </aside>
  </div>
 

<?php 
include_once"footer.php";
?>