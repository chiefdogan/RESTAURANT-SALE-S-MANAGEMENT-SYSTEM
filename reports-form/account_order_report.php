<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/prch_orda_form.css">
</head>
<body>

   <div class="contents-list-prch_rpot_cover">
     <div class="contents-list-prch_rpot">
          <table border="0" cellspacing="0">
            <tr >
              <th class="logo_row" colspan="7">
                <img src="report_img/ako2.jpg">
              </th>
              
            </tr>

           <tr >
             <td class="headings_row_main_store" colspan="7">
               <div class="main_heding_main_store">
                 <div> <p>ACCOUNTANT REPORT</p> </div>
                 <div class="date_main_store_a">
                   <?php echo date('d-m-Y');?>
                 </div>
               </div>
              </td>  
           </tr>

          <tr class="row-thead_acc">
              <th class="th1">S/N</th>
              <th class="th2">ATENDATE NAME</th>
               <th class="th3">AMOUNT RECEIVED</th>
               <th class="th4">SECTION FROM</th>
               <!--<th class="th5">ATT/SIGNATURE</th>
               <th class="th5">ACC/SIGNATURE</th>-->
               <th class="th6">DATE</th> 
          </tr>
          <?php
          $conn=mysql_connect('localhost','root','');
          mysql_select_db('menu_mpya');

          
               $_SESSION['sbmt']=$_SESSION['send'];
            if (isset($_SESSION['send'])) {
             
              $dbselect=$_SESSION['tft'];
              $_SESSION['specify']=$dbselect;

               if (empty($dbselect)) {
                 
              $selct='SELECT * FROM acc_receive ORDER BY ID ASC ';   
             $qry=mysql_query($selct,$conn);
             $count=mysql_affected_rows($conn);
             if ($count==TRUE) {
              
             
             while ($rows=mysql_fetch_assoc($qry)) {
            
            echo "<tr class='tr_a'>";
            echo "<td class='list_clmn_mnj_acc  indent_b'>";echo $rows['id'];echo"</td>";
            echo "<td class='list_clmn_mnj_acc  indent_b'>";echo $rows['Afisa_name'];echo"</td>";
            echo "<td class='list_clmn_mnj_acc  qtity'>";echo $rows['Amount_recv'];echo"</td>";
            echo "<td class='list_clmn_mnj_acc  Section_td  indent_b'>";echo $rows['Section_from'];echo"</td>";
            /*echo "<td class='td_signature'>";echo "<img src='../sahihi/".$rows['Signature']."' alt='weka picha'>";echo"</td>";
            echo "<td class='td_signature'>";echo "<img src='../sahihi/".$rows['Signature']."' alt='weka picha'>";echo"</td>";*/
            echo "<td class='list_clmn_mnj indent date_ent_acc'>"; echo $rows['Date_recv']; echo"</td>";
            echo "</tr>";
            $amnt_sum +=$rows['Amount_recv'];
               }
               echo "<tr class='whole_row_acc'>";
            echo "<td colspan='2' class='Section_td'>";echo "SUM (TSH)";echo"</td>";
            echo "<td class='qtity'>";echo $amnt_sum;echo"</td>";
            echo "<td  colspan='4'>";echo "";echo"</td>";
            echo "</tr>";
            }
            }
            else{
              
          $selct="SELECT * FROM acc_receive where Date_recv='$dbselect' || Afisa_name='$dbselect' ||
          Amount_recv='$dbselect'|| Section_from='$dbselect'  ORDER BY id ASC";
          $qry=mysql_query($selct);
          while ($rows=mysql_fetch_assoc($qry)) {
            
            echo "<tr class='tr_a'>";
            echo "<td class='list_clmn_mnj_acc indent_b'>";echo $rows['id'];echo"</td>";
            echo "<td class='list_clmn_mnj_acc indent_b'>";echo $rows['Afisa_name'];echo"</td>";
            echo "<td class='list_clmn_mnj_acc qtity'>";echo $rows['Amount_recv'];echo"</td>";
            echo "<td class='list_clmn_mnj_acc Section_td indent_b'>";echo $rows['Section_from'];echo"</td>";
           /* echo "<td class='td_signature'>";echo "<img src='../sahihi/".$rows['Signature']."' alt='weka picha'>";echo"</td>";
            echo "<td class='td_signature'>";echo "<img src='../sahihi/".$rows['Signature']."' alt='weka picha'>";echo"</td>";*/
            echo "<td class='list_clmn_mnj indent date_ent_acc'>"; echo $rows['Date_recv']; echo"</td>";
            echo "</tr>";
            $amnt_sum +=$rows['Amount_recv'];
            }
            echo "<tr class='whole_row_acc'>";
            echo "<td colspan='2' class='Section_td'>";echo "SUM (TSH)";echo"</td>";
            echo "<td class='qtity ' >";echo $amnt_sum;echo"</td>";
            echo "<td  colspan='4'>";echo "";echo"</td>";
            echo "</tr>";
          }
        }

          ?>
            
            <tr></tr>
          </table>

     </div>
       
     </div>

</body>
</html>