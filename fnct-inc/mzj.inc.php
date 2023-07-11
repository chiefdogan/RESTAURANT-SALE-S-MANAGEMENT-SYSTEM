<?php
session_start();
//include_once 'add-menu.inc.php';
include"../php-inc/connect.inc.php";

if (isset($_POST['submit'])) {
	$nameF=mysqli_real_escape_string(strtoupper($conn, $_POST['wng']));
	$mboga0=mysqli_real_escape_string(strtoupper($conn, $_POST['mbg']));
	$mboga1=mysqli_real_escape_string(strtoupper($conn, $_POST['mbga']));
	$mboga2=mysqli_real_escape_string(strtoupper($conn, $_POST['mbgb']));
	$mboga3=mysqli_real_escape_string(strtoupper($conn, $_POST['mbgc']));
	$mboga4=mysqli_real_escape_string(strtoupper($conn, $_POST['mbgd']));
	$mboga5=mysqli_real_escape_string(strtoupper($conn, $_POST['mbge']));
	$mboga6=mysqli_real_escape_string(strtoupper($conn, $_POST['mbgf']));
	$mboga7=mysqli_real_escape_string(strtoupper($conn, $_POST['mbgg']));

	$bei=mysqli_real_escape_string($conn, $_POST['beio']);
	$beia=mysqli_real_escape_string($conn, $_POST['beia']);
	$beib=mysqli_real_escape_string($conn, $_POST['beib']);
	$beic=mysqli_real_escape_string($conn, $_POST['beic']);
	$beid=mysqli_real_escape_string($conn, $_POST['beid']);
	$beie=mysqli_real_escape_string($conn, $_POST['beie']);
	$beif=mysqli_real_escape_string($conn, $_POST['beif']);
	$beig=mysqli_real_escape_string($conn, $_POST['beig']);


	$Quantity=mysqli_real_escape_string($conn, $_POST['quantity']);
	$Quantity1=mysqli_real_escape_string($conn, $_POST['be1']);
	$Quantity2=mysqli_real_escape_string($conn, $_POST['be2']);
	$Quantity3=mysqli_real_escape_string($conn, $_POST['be3']);
	$Quantity4=mysqli_real_escape_string($conn, $_POST['be4']);
	$Quantity5=mysqli_real_escape_string($conn, $_POST['be5']);
	$Quantity6=mysqli_real_escape_string($conn, $_POST['be6']);
	$Quantity7=mysqli_real_escape_string($conn, $_POST['be7']);


	if (empty($nameF) || empty($mboga0)&&empty($mboga1)&&empty($mboga2)&&empty($mboga3)&&empty($mboga4)&&empty($mboga5)&&empty($mboga6)&&empty($mboga7)) {
		header('location:../html-php/muuzaji.php?muuzaji=Empty0');
		$_SESSION['alt']="Haujachagua Wanga au mboga";
		exit();
	}else
	if(empty($bei)&&empty($beia)&&empty($beib)&&empty($beic)&&empty($beid)&&empty($beie)&&empty($beif)&&empty($beig)){
		header('location:../html-php/muuzaji.php?muuzaji=Empty1');
		$_SESSION['alt']="Haujajaza kiasi cha fedha";
		exit();
	}
	else{
    //==============================================================================================================

    $fd_prch="SELECT  Pchs_id FROM  food_pchs ORDER BY id DESC LIMIT 1";
    $fd_qry=mysqli_query($conn, $fd_prch);
    $fd_id=mysqli_fetch_array( $fd_qry);
    $_SESSION['cnt'] = $fd_id['Pchs_id'];

		if ($nameF && $mboga0) {
			if ($bei<1000) {
				$_SESSION['alt']="Bei ni kuanzia 1000";
			   header('location:../html-php/muuzaji.php?muuzaji=bei>1000');
		       exit();
			}else{
			$ct=1000; 
			$pdt=$Quantity *$ct;
       if ($Quantity<=0) {
         $_SESSION['alt']="Namba hasi haziruhusiwi";
         header('location:../html-php/muuzaji.php');
       }else
			if ($bei<$pdt) {
			   $_SESSION['alt']="Umeingiza kiasi kidogo.Ingiza kuanzia ".$pdt."/=";
			   header('location:../html-php/muuzaji.php');
		       exit();
			}else{

			

      //------------------------------------------------------------------------------------
       $sqly = mysqli_query($conn, "SELECT * FROM food_add ORDER BY food_add_id ASC ");
       $retrie = mysqli_affected_rows($conn);
       if ($retrie >=1) {
           while($row=mysqli_fetch_assoc($sqly)){

            $db_deletde_id = $row['food_add_id'];
           }  }

       $sql = mysqli_query($conn, "SELECT * FROM food_add where food_aded= '$nameF' ORDER BY food_add_id ASC ");
       $retriev = mysqli_affected_rows($conn);
       if ($retriev >=1) {
           while($row=mysqli_fetch_assoc($sql)){

            $dbk_id = $row['food_add_id'];
            $dbwanga = $row['food_aded'];
            $f_type=$row['food_type'];
            $dbQuantity = $row['mboga_added_salio'];
           } }

      
          $user_slct="SELECT user_id FROM users  ORDER BY user_id ASC";
          $user_qry=mysqli_query($conn, $user_slct,$conn);
          while ($row=mysqli_fetch_assoc($user_qry)) {
            $role_id=$row['user_id'];
          }


       $sql_mboga = mysqli_query($conn, "SELECT * FROM food_add where food_aded = '$mboga0' ORDER BY food_add_id ASC");
       $retriev_mboga = mysqli_affected_rows($conn);
       if ($retriev_mboga >=1) {
           while($row=mysqli_fetch_assoc($sql_mboga)){

            $dbk_id_mboga = $row['food_add_id'];
            $dbmboga = $row['food_aded'];
            $fd_type=$row['food_type'];
            $dbQuantity_mboga = $row['mboga_added_salio'];
          } }
    //---------------------------------------------------------------------------------------

 
    $total = $dbQuantity - $Quantity;
    $total_mboga = $dbQuantity_mboga - $Quantity;

    if ($dbQuantity <=0) {

        if ($retriev <= 0) {
               $_SESSION['alt']='Chakula '. $nameF.' kimeisha ';
               header('location:../html-php/muuzaji.php?muuzaji=error5');
               
            }elseif($retriev<= 1){
               $delete="DELETE FROM food_add where food_add_id = '$dbk_id'";
               mysqli_query($conn, $delete);
               $deleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW())";
               mysqli_query($conn, $deleted) or die(mysql_error());
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?');
            }

      }elseif($dbQuantity_mboga <=0){

               if ($retriev_mboga <= 0 ) {
                 $_SESSION['alt']='Mboga hii '.$mboga0." Imeisha ";
                 header('location:../html-php/muuzaji.php?muuzaji=error2');
               
            }elseif($retriev_mboga <= 1 ){
               $delete="DELETE FROM food_add where food_add_id = '$dbk_id_mboga'";
               mysqli_query($conn, $delete);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW())";
               mysqli_query($conn, $dbdeleted) or die(mysqli_error($conn));
               $_SESSION['alt']='Mboga hii '.$mboga0." Imeisha ";
               header('location:../html-php/muuzaji.php?');
            }

    /* }elseif( $dbQuantity <=0 && $dbQuantity_mboga <=0){

              if ($retriev <= 0 && $retriev_mboga <= 0 ) {
                $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga0.' Imeisha ';
                 header('location:../html-php/muuzaji.php?muuzaji=error');
             }elseif( $retriev <= 1 && $retriev_mboga <= 1 ){

              $delete="DELETE FROM food_add  where food_add_id ='$dbk_id'";
               mysql_query($delete,$conn) or die(mysql_error());
               $deleted="INSERT INTO  food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW()) ";
               mysql_query($deleted,$conn) or die(mysql_error());

               $delete="DELETE FROM food_add where food_add_id ='$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW() ) ";
               mysql_query($dbdeleted,$conn) or die(mysql_error());

               $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga0.' Kimeisha';
                header('location:../html-php/muuzaji.php?');

              }*/

    }elseif($Quantity >$dbQuantity_mboga){

           $_SESSION['alt']="Chakula hakitoshi.Kinawatosha watu ".$dbQuantity_mboga;
    	    header('location:../html-php/muuzaji.php?muuzaji=error3');
    }
    elseif($Quantity >$dbQuantity){

    	$_SESSION['alt']="Chakula hakitoshi.Kinawatosha watu ".$dbQuantity;
    	 header('location:../html-php/muuzaji.php?muuzaji=error4');
    }
    else{

    $df=$bei -$pdt;
	$_SESSION['chg']=$df;
	$_SESSION['chk']=$nameF."--". $mboga0;

	$_SESSION['cnt']+=1;
	$nt=$_SESSION['cnt'];
   
    $_SESSION['order']=1894940;
    $_SESSION['inc']+=1;
    $order=$_SESSION['order'] + $_SESSION['inc'];

    $sql = ("UPDATE food_add set mboga_added_salio = '$total' where food_add_id = '$dbk_id'");
    $retriev = mysqli_query($conn, $sql);

    $sql_mboga = ("UPDATE food_add set mboga_added_salio = '$total_mboga' where food_add_id = '$dbk_id_mboga'");
    $retriev_mboga = mysqli_query($conn, $sql_mboga);

    $_SESSION['plt_no']=$Quantity;

    $ist="INSERT INTO food_pchs(user_id,Order_no,wanga, mboga, Mnt_pd, Plt_no, Cost,T_cost, Chng, Pchs_id, date_entered) 
		     VALUES('$role_id','$order', '$nameF', '$mboga0', '$bei', '$Quantity', '$ct', '$pdt', '$df', '$nt', NOW())";
             mysqli_query($conn, $ist) or die("No data has been inserted");
   
   $_SESSION['alt']="Umefanikiwa kununa chakula";
   header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');
    }
    exit();
    
		   }
		 }
	  }else{


  //=============================================================================================================
	if ($nameF && $mboga1) {
			if ($beia<1500) {
				$_SESSION['alt']="Bei ni kuanzia 1500";
			   header('location:../html-php/muuzaji.php?muuzaji=bei>1500');
		       exit();
			}else{
			$ct=1500;
			$pdt=$Quantity1 *$ct;
      if ($Quantity1<=0) {
         $_SESSION['alt']="Namba hasi haziruhusiwi";
         header('location:../html-php/muuzaji.php');
       }else

			if ($beia<$pdt) {
				$_SESSION['alt']="Umeingiza kiasi kidogo.Ingiza kuanzia ".$pdt."/=";
			   header('location:../html-php/muuzaji.php');
		       exit();
			}else{
		//-----------------------------------------------------------------------------------
	       $sqly = mysqli_query($conn, "SELECT * FROM food_add ORDER BY food_add_id ASC ");
       $retrie = mysqli_affected_rows($conn);
       if ($retrie >=1) {
           while($row=mysqli_fetch_assoc($sqly)){

            $db_deletde_id = $row['food_add_id'];
           }  }

       $sql = mysqli_query($conn, "SELECT * FROM food_add where food_aded= '$nameF' ORDER BY food_add_id ASC ");
       $retriev = mysqli_affected_rows($conn);
       if ($retriev >=1) {
           while($row=mysql_fetch_assoc($sql)){

            $dbk_id = $row['food_add_id'];
            $dbwanga = $row['food_aded'];
            $f_type=$row['food_type'];
            $dbQuantity = $row['mboga_added_salio'];
           } }

      
          $user_slct="SELECT user_id FROM users  ORDER BY user_id ASC";
          $user_qry=mysqli_query($conn, $user_slct);
          while ($row=mysqli_fetch_assoc($user_qry)) {
            $role_id=$row['user_id'];
          }


       $sql_mboga = mysqli_query($conn, "SELECT * FROM food_add where food_aded = '$mboga1' ORDER BY food_add_id ASC");
       $retriev_mboga = mysqli_affected_rows($conn);
       if ($retriev_mboga >=1) {
           while($row=mysqli_fetch_assoc($sql_mboga)){

            $dbk_id_mboga = $row['food_add_id'];
            $dbmboga = $row['food_aded'];
            $fd_type=$row['food_type'];
            $dbQuantity_mboga = $row['mboga_added_salio'];
          } }
    //--------------------------------------------------------------------------------------
         $total = $dbQuantity - $Quantity1;
         $total_mboga = $dbQuantity_mboga - $Quantity1;

      if ($dbQuantity <=0) {

        if ($retriev <= 0) {
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');
               
            }elseif($retriev<= 1){
               $delete="DELETE FROM food_add where food_add_id = '$dbk_id'";
               mysqli_query($conn, $delete);
               $deleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW())";
               mysqli_query($conn, $deleted) or die(mysqli_error($conn));
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');
            }

       

      }elseif($dbQuantity_mboga <=0){

               if ($retriev_mboga <= 0 ) {
                 $_SESSION['alt']='Mboga hii '.$mboga1." Imeisha ";
                 header('location:../html-php/muuzaji.php?error');
               
            }elseif($retriev_mboga <= 1 ){
                $delete="DELETE FROM food_add where food_add_id = '$dbk_id_mboga'";
               mysqli_query($conn, $delete);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW())";
               mysqli_query($conn, $dbdeleted) or die(mysqli_error($conn));
               $_SESSION['alt']='Mboga hii '.$mboga1." Imeisha ";
               header('location:../html-php/muuzaji.php?');
            }
         

    /*}elseif( $dbQuantity <=0 && $dbQuantity_mboga <=0){

              if ($retriev <= 0 && $retriev_mboga <= 0 ) {
                $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga1.' Imeisha ';
                 header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');

            }elseif( $retriev <= 1 && $retriev_mboga <= 1 ){

               $delete="DELETE FROM food_add  where food_add_id ='$dbk_id'";
               mysql_query($delete,$conn) or die(mysql_error());
               $deleted="INSERT INTO  food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW()) ";
               mysql_query($deleted,$conn) or die(mysql_error());

               $delete="DELETE FROM food_add where food_add_id ='$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW() ) ";
               mysql_query($dbdeleted,$conn) or die(mysql_error());

               $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga1.' Imeisha ';
                header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');

              }*/

   

    }elseif ($Quantity1 > $dbQuantity_mboga) {

       	$_SESSION['alt']=$mboga1." hakitoshi.Kinawatosha watu ".$dbQuantity_mboga;
    	 header('location:../html-php/muuzaji.php?muuzaji=Error6');

       }elseif($Quantity1 > $dbQuantity){

    	$_SESSION['alt']=$nameF." hakitoshi.Kinawatosha watu ".$dbQuantity;
    	 header('location:../html-php/muuzaji.php?muuzaji=Error7');

     }else{

    	$df=$beia -$pdt;
		$_SESSION['chg']=$df;
		$_SESSION['chk']=$nameF."--". $mboga1;

		$_SESSION['cnt']+=1;
		$nt=$_SESSION['cnt'];

		$_SESSION['order']=1894940;
        $_SESSION['inc']+=1;
        $order=$_SESSION['order'] + $_SESSION['inc'];

    	$sql = ("UPDATE food_add set mboga_added_salio = '$total' where food_add_id = '$dbk_id'");
    $retriev = mysqli_query($conn, $sql);

    $sql_mboga = ("UPDATE food_add set mboga_added_salio = '$total_mboga' where food_add_id = '$dbk_id_mboga'");
    $retriev_mboga = mysqli_query($conn, $sql_mboga);

    $_SESSION['plt_no']=$Quantity1;

    $ist="INSERT INTO food_pchs(user_id,Order_no,wanga, mboga, Mnt_pd, Plt_no, Cost,T_cost, Chng, Pchs_id, date_entered) 
         VALUES('$role_id','$order', '$nameF', '$mboga1', '$beia', '$Quantity1', '$ct', '$pdt', '$df', '$nt', NOW())";
             mysqli_query($conn, $ist) or die("No data has been inserted");

       $_SESSION['alt']="Umefanikiwa kununa chakula";
       header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');
    }
      exit();
		    }
		 }
		}else{
      //=========================================================================================================================
			if ($nameF && $mboga2) {
			if ($beib<2000) {
			   $_SESSION['alt']="Bei ni kuanzia 2000";
			   header('location:../html-php/muuzaji.php?muuzaji=bei>2000');
		       exit();
			}else{
			$ct=2000;
			$pdt=$Quantity2 *$ct;
      if ($Quantity2<=0) {
         $_SESSION['alt']="Namba hasi haziruhusiwi";
         header('location:../html-php/muuzaji.php');
       }else

			if ($beib<$pdt) {
			   $_SESSION['alt']="Umeingiza kiasi kidogo.Ingiza kuanzia ".$pdt."/=";
			   header('location:../html-php/muuzaji.php');
		       exit();

			}else{

						//-------------------------------------------------------------------------------
	      $sqly = mysqli_query($conn, "SELECT * FROM food_add ORDER BY food_add_id ASC ");
       $retrie = mysqli_affected_rows($conn);
       if ($retrie >=1) {
           while($row=mysqli_fetch_assoc($sqly)){

            $db_deletde_id = $row['food_add_id'];
           }  }

       $sql = mysqli_query($conn, "SELECT * FROM food_add where food_aded= '$nameF' ORDER BY food_add_id ASC ");
       $retriev = mysqli_affected_rows($conn);
       if ($retriev >=1) {
           while($row=mysqli_fetch_assoc($sql)){

            $dbk_id = $row['food_add_id'];
            $dbwanga = $row['food_aded'];
            $f_type=$row['food_type'];
            $dbQuantity = $row['mboga_added_salio'];
           } }

      
          $user_slct="SELECT user_id FROM users  ORDER BY user_id ASC";
          $user_qry=mysqli_query($conn, $user_slct);
          while ($row=mysqli_fetch_assoc($user_qry)) {
            $role_id=$row['user_id'];
          }


       $sql_mboga = mysqli_query($conn, "SELECT * FROM food_add where food_aded = '$mboga2' ORDER BY food_add_id ASC ");
       $retriev_mboga = mysqli_affected_rows($conn);
       if ($retriev_mboga >=1) {
           while($row=mysqli_fetch_assoc($sql_mboga)){

            $dbk_id_mboga = $row['food_add_id'];
            $dbmboga = $row['food_aded'];
            $fd_type=$row['food_type'];
            $dbQuantity_mboga = $row['mboga_added_salio'];
          } }
    //--------------------------------------------------------------------
         $total = $dbQuantity - $Quantity2;
         $total_mboga = $dbQuantity_mboga - $Quantity2;


    if ($dbQuantity <=0) {

        if ($retriev <= 0) {
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?muuzaji=error1');
               
            }elseif($retriev<= 1){
              $delete="DELETE FROM food_add where food_add_id = '$dbk_id'";
               mysqli_query($conn, $delete);
               $deleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW())";
               mysqli_query($conn, $deleted) or die(mysqli_error($conn));
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?');
            }

       

      }elseif($dbQuantity_mboga <=0){

               if ($retriev_mboga <= 0 ) {
                 $_SESSION['alt']='Mboga hii '.$mboga2." Imeisha ";
                 header('location:../html-php/muuzaji.php?muuzaji=error8');
               
            }elseif($retriev_mboga <= 1 ){
               $delete="DELETE FROM food_add where food_add_id = '$dbk_id_mboga'";
               mysqli_query($conn, $delete);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW())";
               mysqli_query($conn, $dbdeleted) or die(mysqli_error($conn));
               $_SESSION['alt']='Mboga hii '.$mboga2." Imeisha ";
               header('location:../html-php/muuzaji.php?');
            }

     /* }elseif( $dbQuantity <=0 && $dbQuantity_mboga <=0){

              if ($retriev <= 0 && $retriev_mboga <= 0 ) {
                $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga2.' Imeisha ';
                 header('location:../html-php/muuzaji.php?muuzaji=error');
              }elseif( $retriev <= 1 && $retriev_mboga <= 1 ){

               $delete="DELETE FROM food_add  where food_add_id ='$dbk_id'";
               mysql_query($delete,$conn) or die(mysql_error());
               $deleted="INSERT INTO  food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW()) ";
               mysql_query($deleted,$conn) or die(mysql_error());

               $delete="DELETE FROM food_add where food_add_id ='$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW() ) ";
               mysql_query($dbdeleted,$conn) or die(mysql_error());

               $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga2.' Imeisha ';
                header('location:../html-php/muuzaji.php?');

              }*/
         
    } elseif ($Quantity2 > $dbQuantity_mboga) {

       	$_SESSION['alt']=$mboga2."hakitoshi.Kinawatosha watu ".$dbQuantity_mboga;
    	 header('location:../html-php/muuzaji.php?muuzaji=Error9');
       	
       }elseif($Quantity2 > $dbQuantity){

    	$_SESSION['alt']=$nameF."hakitoshi.Kinawatosha watu ".$dbQuantity;
    	 header('location:../html-php/muuzaji.php?muuzaji=Error1a');

     }else{

     	    $df=$beib -$pdt;
			$_SESSION['chg']=$df;
			$_SESSION['chk']=$nameF."--". $mboga2;

			$_SESSION['cnt']+=1;
			$nt=$_SESSION['cnt'];

			$_SESSION['order']=1894940;
            $_SESSION['inc']+=1;
            $order=$_SESSION['order'] + $_SESSION['inc'];

           $sql = ("UPDATE food_add set mboga_added_salio = '$total' where food_add_id = '$dbk_id'");
          $retriev = mysql_query($sql,$conn);

          $sql_mboga = ("UPDATE food_add set mboga_added_salio = '$total_mboga' where food_add_id = '$dbk_id_mboga'");
          $retriev_mboga = mysql_query($sql_mboga,$conn);

          $_SESSION['plt_no']=$Quantity2;

          $ist="INSERT INTO food_pchs(user_id,Order_no,wanga, mboga, Mnt_pd, Plt_no, Cost,T_cost, Chng, Pchs_id, date_entered) 
         VALUES('$role_id','$order', '$nameF', '$mboga2', '$beib', '$Quantity2', '$ct', '$pdt', '$df', '$nt', NOW())";
             mysql_query($ist) or die("No data has been inserted");
           $_SESSION['alt']="Umefanikiwa kununa chakula";
           header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');

         }
	     exit();
		     }
		  }
		}else{

      //==============================================================================================================
if ($nameF && $mboga3) {
			if ($beic<2500) {
				$_SESSION['alt']="Bei ni kuanzia 2500";
			   header('location:../html-php/muuzaji.php?muuzaji=bei>2500');
		       exit();
			}else{
			$ct=2500;
			$pdt=$Quantity3 *$ct;

      if ($Quantity3<=0) {
         $_SESSION['alt']="Namba hasi haziruhusiwi";
         header('location:../html-php/muuzaji.php');
       }else

			if ($beic<$pdt) {
				$_SESSION['alt']="Umeingiza kiasi kidogo.Ingiza kuanzia ".$pdt."/=";
			   header('location:../html-php/muuzaji.php');
		       exit();
			}else{

		//--------------------------------------------------------------------------------
	        $sqly = mysql_query("SELECT * FROM food_add ORDER BY food_add_id ASC ");
       $retrie = mysql_affected_rows($conn);
       if ($retrie >=1) {
           while($row=mysql_fetch_assoc($sqly)){

            $db_deletde_id = $row['food_add_id'];
           }  }

       $sql = mysql_query("SELECT * FROM food_add where food_aded= '$nameF' ORDER BY food_add_id ASC ");
       $retriev = mysql_affected_rows($conn);
       if ($retriev >=1) {
           while($row=mysql_fetch_assoc($sql)){

            $dbk_id = $row['food_add_id'];
            $dbwanga = $row['food_aded'];
            $f_type=$row['food_type'];
            $dbQuantity = $row['mboga_added_salio'];
           } }

      
          $user_slct="SELECT user_id FROM users  ORDER BY user_id ASC";
          $user_qry=mysql_query($user_slct,$conn);
          while ($row=mysql_fetch_assoc($user_qry)) {
            $role_id=$row['user_id'];
          }


       $sql_mboga = mysql_query("SELECT * FROM food_add where food_aded = '$mboga3' ORDER BY food_add_id ASC ");
       $retriev_mboga = mysql_affected_rows($conn);
       if ($retriev_mboga >=1) {
           while($row=mysql_fetch_assoc($sql_mboga)){

            $dbk_id_mboga = $row['food_add_id'];
            $dbmboga = $row['food_aded'];
            $fd_type=$row['food_type'];
            $dbQuantity_mboga = $row['mboga_added_salio'];
          } }
        //----------------------------------------------------------------------------------------
         $total = $dbQuantity - $Quantity3;
         $total_mboga = $dbQuantity_mboga - $Quantity3;

        if ($dbQuantity <=0) {

        if ($retriev <= 0) {
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?');
               
            }elseif($retriev<= 1){
              $delete="DELETE FROM food_add where food_add_id = '$dbk_id'";
               mysql_query($delete,$conn);
               $deleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW())";
               mysql_query($deleted,$conn) or die(mysql_error());
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?');
            }

       

        }elseif($dbQuantity_mboga <=0){

               if ($retriev_mboga <= 0 ) {
                 $_SESSION['alt']='Mboga hii '.$mboga3." Imeisha ";
                 header('location:../html-php/muuzaji.php?muuzaji=error');
               
            }elseif($retriev_mboga <= 1 ){
               $delete="DELETE FROM food_add where food_add_id = '$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW())";
               mysql_query($dbdeleted,$conn) or die(mysql_error());
               $_SESSION['alt']='Mboga hii '.$mboga3." Imeisha ";
               header('location:../html-php/muuzaji.php?');
            }

            /* }elseif( $dbQuantity <=0 && $dbQuantity_mboga <=0){

              if ($retriev <= 0 && $retriev_mboga <= 0 ) {
                $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga3.' Imeisha ';
                 header('location:../html-php/muuzaji.php?muuzaji=error');
              }elseif( $retriev <= 1 && $retriev_mboga <= 1 ){

               $delete="DELETE FROM food_add  where food_add_id ='$dbk_id'";
               mysql_query($delete,$conn) or die(mysql_error());
               $deleted="INSERT INTO  food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW()) ";
               mysql_query($deleted,$conn) or die(mysql_error());

               $delete="DELETE FROM food_add where food_add_id ='$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW() ) ";
               mysql_query($dbdeleted,$conn) or die(mysql_error());

               $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga3.' Imeisha ';
                header('location:../html-php/muuzaji.php?');

              }  */

    }elseif ($Quantity3 > $dbQuantity_mboga) {

       	$_SESSION['alt']=$mboga3."hakitoshi.Kinawatosha watu ".$dbQuantity_mboga;
    	 header('location:../html-php/muuzaji.php?muuzaji=Error');

       }elseif($Quantity3 > $dbQuantity){

    	$_SESSION['alt']=$nameF." hakitoshi.Kinawatosha watu ".$dbQuantity;
    	 header('location:../html-php/muuzaji.php?muuzaji=Error');

     }else{
     	    $df=$beic -$pdt;
			$_SESSION['chg']=$df;
			$_SESSION['chk']=$nameF."--". $mboga3;

			$_SESSION['cnt']+=1;
			$nt=$_SESSION['cnt'];

			$_SESSION['order']=1894940;
            $_SESSION['inc']+=1;
            $order=$_SESSION['order'] + $_SESSION['inc'];

          $sql = ("UPDATE food_add set mboga_added_salio = '$total' where food_add_id = '$dbk_id'");
          $retriev = mysql_query($sql,$conn);

          $sql_mboga = ("UPDATE food_add set mboga_added_salio = '$total_mboga' where food_add_id = '$dbk_id_mboga'");
          $retriev_mboga = mysql_query($sql_mboga,$conn);

          $_SESSION['plt_no']=$Quantity3;

          $ist="INSERT INTO food_pchs(user_id,Order_no,wanga, mboga, Mnt_pd, Plt_no, Cost,T_cost, Chng, Pchs_id, date_entered) 
          VALUES('$role_id','$order', '$nameF', '$mboga3', '$beic', '$Quantity3', '$ct', '$pdt', '$df', '$nt', NOW())";
             mysql_query($ist) or die("No data has been inserted");

           $_SESSION['alt']="Umefanikiwa kununa chakula";
           header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');

     }
     exit();
		  }
		 }
		}else{
      //==================================================================================================================
			if ($nameF && $mboga4) {
			if ($beid<3000) {
				$_SESSION['alt']="Bei ni kuanzia 3000";
			   header('location:../html-php/muuzaji.php?muuzaji=bei>3000');
		       exit();
			}else{
			$ct=3000;
			$pdt=$Quantity4 *$ct;

      if ($Quantity4<=0) {
         $_SESSION['alt']="Namba hasi haziruhusiwi";
         header('location:../html-php/muuzaji.php');
       }else

			if ($beid<$pdt) {
			   $_SESSION['alt']="Umeingiza kiasi kidogo.Ingiza kuanzia ".$pdt."/=";
			   header('location:../html-php/muuzaji.php');
		       exit();
			}else{

	 //------------------------------------------------------------------------------------------------
	         $sqly = mysql_query("SELECT * FROM food_add ORDER BY food_add_id ASC ");
       $retrie = mysql_affected_rows($conn);
       if ($retrie >=1) {
           while($row=mysql_fetch_assoc($sqly)){

            $db_deletde_id = $row['food_add_id'];
           }  }

       $sql = mysql_query("SELECT * FROM food_add where food_aded= '$nameF' ORDER BY food_add_id ASC ");
       $retriev = mysql_affected_rows($conn);
       if ($retriev >=1) {
           while($row=mysql_fetch_assoc($sql)){

            $dbk_id = $row['food_add_id'];
            $dbwanga = $row['food_aded'];
            $f_type=$row['food_type'];
            $dbQuantity = $row['mboga_added_salio'];
           } }

      
          $user_slct="SELECT user_id FROM users  ORDER BY user_id ASC";
          $user_qry=mysql_query($user_slct,$conn);
          while ($row=mysql_fetch_assoc($user_qry)) {
            $role_id=$row['user_id'];
          }


       $sql_mboga = mysql_query("SELECT * FROM food_add where food_aded = '$mboga4' ORDER BY food_add_id ASC ");
       $retriev_mboga = mysql_affected_rows($conn);
       if ($retriev_mboga >=1) {
           while($row=mysql_fetch_assoc($sql_mboga)){

            $dbk_id_mboga = $row['food_add_id'];
            $dbmboga = $row['food_aded'];
            $fd_type=$row['food_type'];
            $dbQuantity_mboga = $row['mboga_added_salio'];
          } }
        //-----------------------------------------------------------------------------------
         $total = $dbQuantity - $Quantity4;
         $total_mboga = $dbQuantity_mboga - $Quantity4;

        if ($dbQuantity <=0) {

        if ($retriev <= 0) {
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?muuzaji=error');
               
            }elseif($retriev<= 1){
              $delete="DELETE FROM food_add where food_add_id = '$dbk_id'";
               mysql_query($delete,$conn);
               $deleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW())";
               mysql_query($deleted,$conn) or die(mysql_error());
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?');
            }

       

      }elseif($dbQuantity_mboga <=0){

               if ($retriev_mboga <= 0 ) {
                 $_SESSION['alt']='Mboga hii '.$mboga4." Imeisha ";
                 header('location:../html-php/muuzaji.php?muuzaji=error');
               
            }elseif($retriev_mboga <= 1 ){
              $delete="DELETE FROM food_add where food_add_id = '$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW())";
               mysql_query($dbdeleted,$conn) or die(mysql_error());
               $_SESSION['alt']='Mboga hii '.$mboga4." Imeisha ";
               header('location:../html-php/muuzaji.php?');
            }
         

    /*}elseif( $dbQuantity <=0 && $dbQuantity_mboga <=0){

              if ($retriev <= 0 && $retriev_mboga <= 0 ) {
                $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga4.' Imeisha ';
                 header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');
              }elseif( $retriev <= 1 && $retriev_mboga <= 1 ){

               $delete="DELETE FROM food_add  where food_add_id ='$dbk_id'";
               mysql_query($delete,$conn) or die(mysql_error());
               $deleted="INSERT INTO  food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW()) ";
               mysql_query($deleted,$conn) or die(mysql_error());

               $delete="DELETE FROM food_add where food_add_id ='$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW() ) ";
               mysql_query($dbdeleted,$conn) or die(mysql_error());

               $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga4.' Imeisha ';
                header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');

              }*/



    }elseif ($Quantity4 > $dbQuantity_mboga) {

       	$_SESSION['alt']=$mboga4."hakitoshi.Kinawatosha watu ".$dbQuantity_mboga;
    	header('location:../html-php/muuzaji.php?muuzaji=Error');

       }elseif($Quantity4 > $dbQuantity){

    	$_SESSION['alt']=$nameF." hakitoshi.Kinawatosha watu ".$dbQuantity;
    	 header('location:../html-php/muuzaji.php?muuzaji=error');

     }else{

     	    $df=$beid - $pdt;
			$_SESSION['chg']=$df;
			$_SESSION['chk']=$nameF."--". $mboga4;

			$_SESSION['cnt']+=1;
			$nt=$_SESSION['cnt'];

			$_SESSION['order']=1894940;
            $_SESSION['inc']+=1;
            $order=$_SESSION['order'] + $_SESSION['inc'];

            $sql = ("UPDATE food_add set mboga_added_salio = '$total' where food_add_id = '$dbk_id'");
            $retriev = mysql_query($sql,$conn);

            $sql_mboga = ("UPDATE food_add set mboga_added_salio = '$total_mboga' where food_add_id = '$dbk_id_mboga'");
            $retriev_mboga = mysql_query($sql_mboga,$conn);

            $_SESSION['plt_no']=$Quantity4;

			    $ist="INSERT INTO Food_pchs(user_id, Order_no, wanga, mboga, Mnt_pd, Plt_no, Cost, T_cost, Chng, Pchs_id, date_entered) 
		      VALUES('$role_id', '$order', '$nameF', '$mboga4', '$beid', '$Quantity4', '$ct', '$pdt','$df','$nt',NOW())";
           mysql_query($ist) or die("No data has been inserted");

           $_SESSION['alt']="Umefanikiwa kununa chakula";
           header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');

     }

			
		       exit();
		      }
		     }
		}else{
      //================================================================================================================
			if ($nameF && $mboga5) {
			if ($beie<3000) {
				$_SESSION['alt']="Bei ni kuanzia 3000";
			   header('location:../html-php/muuzaji.php?muuzaji=bei>3000');
		       exit();
			}else{
			$ct=3000;
			$pdt=$Quantity5 * $ct;

      if ($Quantity5<=0) {
         $_SESSION['alt']="Namba hasi haziruhusiwi";
         header('location:../html-php/muuzaji.php');
       }else

			if ($beie<$pdt) {
			   $_SESSION['alt']="Umeingiza kiasi kidogo.Ingiza kuanzia ".$pdt."/=";
			   header('location:../html-php/muuzaji.php');
		       exit();
			}else{

		//-------------------------------------------------------------------------------------
	         $sqly = mysql_query("SELECT * FROM food_add ORDER BY food_add_id ASC ");
       $retrie = mysql_affected_rows($conn);
       if ($retrie >=1) {
           while($row=mysql_fetch_assoc($sqly)){

            $db_deletde_id = $row['food_add_id'];
           }  }

       $sql = mysql_query("SELECT * FROM food_add where food_aded= '$nameF' ORDER BY food_add_id ASC ");
       $retriev = mysql_affected_rows($conn);
       if ($retriev >=1) {
           while($row=mysql_fetch_assoc($sql)){

            $dbk_id = $row['food_add_id'];
            $dbwanga = $row['food_aded'];
            $f_type=$row['food_type'];
            $dbQuantity = $row['mboga_added_salio'];
           } }

      
          $user_slct="SELECT user_id FROM users  ORDER BY user_id ASC";
          $user_qry=mysql_query($user_slct,$conn);
          while ($row=mysql_fetch_assoc($user_qry)) {
            $role_id=$row['user_id'];
          }


       $sql_mboga = mysql_query("SELECT * FROM food_add where food_aded = '$mboga5' ORDER BY food_add_id ASC ");
       $retriev_mboga = mysql_affected_rows($conn);
       if ($retriev_mboga >=1) {
           while($row=mysql_fetch_assoc($sql_mboga)){

            $dbk_id_mboga = $row['food_add_id'];
            $dbmboga = $row['food_aded'];
            $fd_type=$row['food_type'];
            $dbQuantity_mboga = $row['mboga_added_salio'];
          } }        //------------------------------------------------------------------------------------------
         $total = $dbQuantity - $Quantity5;
         $total_mboga = $dbQuantity_mboga - $Quantity5;

     if ($dbQuantity <=0) {

         if ($retriev <= 0) {
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?muuzaji=error');
               
            }elseif($retriev<= 1){
              $delete="DELETE FROM food_add where food_add_id = '$dbk_id'";
               mysql_query($delete,$conn);
               $deleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW())";
               mysql_query($deleted,$conn) or die(mysql_error());

               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?');
            }

       

      }elseif($dbQuantity_mboga <=0){

               if ($retriev_mboga <= 0 ) {
                 $_SESSION['alt']='Mboga hii '.$mboga5." Imeisha ";
                 header('location:../html-php/muuzaji.php?muuzaji=error');
               
            }elseif($retriev_mboga <= 1 ){
               $delete="DELETE FROM food_add where food_add_id = '$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW())";
               mysql_query($dbdeleted,$conn) or die(mysql_error());
               $_SESSION['alt']='Mboga hii '.$mboga5." Imeisha ";
               header('location:../html-php/muuzaji.php?');
            }

    /*}elseif( $dbQuantity <=0 && $dbQuantity_mboga <=0){

              if ($retriev <= 0 && $retriev_mboga <= 0 ) {
                $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga5.' Imeisha ';
                 header('location:../html-php/muuzaji.php?muuzaji=error');

              }elseif( $retriev <= 1 && $retriev_mboga <= 1 ){

               $delete="DELETE FROM food_add  where food_add_id ='$dbk_id'";
               mysql_query($delete,$conn) or die(mysql_error());
               $deleted="INSERT INTO  food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW()) ";
               mysql_query($deleted,$conn) or die(mysql_error());

               $delete="DELETE FROM food_add where food_add_id ='$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW() ) ";
               mysql_query($dbdeleted,$conn) or die(mysql_error());

               $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga5.' Imeisha ';
                header('location:../html-php/muuzaji.php?');

              }*/

    }elseif ($Quantity5 > $dbQuantity_mboga) {

       	$_SESSION['alt']=$mboga5."hakitoshi.Kinawatosha watu ".$dbQuantity_mboga;
    	header('location:../html-php/muuzaji.php?muuzaji=Error');

      }elseif($Quantity5 > $dbQuantity){

    	$_SESSION['alt']=$nameF." hakitoshi.Kinawatosha watu ".$dbQuantity_mboga;
    	 header('location:../html-php/muuzaji.php?muuzaji=Error');

     }else{
     	    $df=$beie -$pdt;
			$_SESSION['chg']=$df;
			$_SESSION['chk']=$nameF."--". $mboga5;

			$_SESSION['cnt']+=1;
			$nt=$_SESSION['cnt'];

			$_SESSION['order']=1894940;
            $_SESSION['inc']+=1;
            $order=$_SESSION['order'] + $_SESSION['inc'];

        $sql = ("UPDATE food_add set mboga_added_salio = '$total' where food_add_id = '$dbk_id'");
        $retriev = mysql_query($sql,$conn);

        $sql_mboga = ("UPDATE food_add set mboga_added_salio = '$total_mboga' where food_add_id = '$dbk_id_mboga'");
        $retriev_mboga = mysql_query($sql_mboga,$conn);

        $_SESSION['plt_no']=$Quantity5;

         $ist="INSERT INTO food_pchs(user_id,Order_no,wanga, mboga, Mnt_pd, Plt_no, Cost,T_cost, Chng, Pchs_id, date_entered) 
         VALUES('$role_id','$order', '$nameF', '$mboga5', '$beie', '$Quantity5', '$ct', '$pdt', '$df', '$nt', NOW())";
             mysql_query($ist) or die("No data has been inserted");

           $_SESSION['alt']="Umefanikiwa kununa chakula";
           header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');

     }
			
		      exit();
		      }
		     }
		}else{
      //================================================================================================================
			if ($nameF && $mboga6) {
			if ($beif<4000) {
				$_SESSION['alt']="Bei ni kuanzia 4000";
			   header('location:../html-php/muuzaji.php?muuzaji=bei>4000');
		       exit();
			}else{
			$ct=4000;
			$pdt=$Quantity6 * $ct;
      if ($Quantity6<=0) {
         $_SESSION['alt']="Namba hasi haziruhusiwi";
         header('location:../html-php/muuzaji.php');
       }else

			if ($beif<$pdt) {
			   $_SESSION['alt']="Umeingiza kiasi kidogo.Ingiza kuanzia ".$pdt."/=";
			   header('location:../html-php/muuzaji.php');
		       exit();
			}else{

	//------------------------------------------------------------------------------------
	         $sqly = mysql_query("SELECT * FROM food_add ORDER BY food_add_id ASC ");
       $retrie = mysql_affected_rows($conn);
       if ($retrie >=1) {
           while($row=mysql_fetch_assoc($sqly)){

            $db_deletde_id = $row['food_add_id'];
           }  }

       $sql = mysql_query("SELECT * FROM food_add where food_aded= '$nameF' ORDER BY food_add_id ASC ");
       $retriev = mysql_affected_rows($conn);
       if ($retriev >=1) {
           while($row=mysql_fetch_assoc($sql)){

            $dbk_id = $row['food_add_id'];
            $dbwanga = $row['food_aded'];
            $f_type=$row['food_type'];
            $dbQuantity = $row['mboga_added_salio'];
           } }

      
          $user_slct="SELECT user_id FROM users  ORDER BY user_id ASC";
          $user_qry=mysql_query($user_slct,$conn);
          while ($row=mysql_fetch_assoc($user_qry)) {
            $role_id=$row['user_id'];
          }


       $sql_mboga = mysql_query("SELECT * FROM food_add where food_aded = '$mboga6' ORDER BY food_add_id ASC ");
       $retriev_mboga = mysql_affected_rows($conn);
       if ($retriev_mboga >=1) {
           while($row=mysql_fetch_assoc($sql_mboga)){

            $dbk_id_mboga = $row['food_add_id'];
            $dbmboga = $row['food_aded'];
            $fd_type=$row['food_type'];
            $dbQuantity_mboga = $row['mboga_added_salio'];
          } }
        //-----------------------------------------------------------------------------------------------
         $total = $dbQuantity - $Quantity6;
         $total_mboga = $dbQuantity_mboga - $Quantity6;

    if ($dbQuantity <=0) {

          if ($retriev <= 0) {
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?muuzaji=error');
               
            }elseif($retriev<= 1){
               $delete="DELETE FROM food_add where food_add_id = '$dbk_id'";
               mysql_query($delete,$conn);
               $deleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW())";
               mysql_query($deleted,$conn) or die(mysql_error());
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?');
            }

       

    }elseif($dbQuantity_mboga <=0){

               if ($retriev_mboga <= 0 ) {
                 $_SESSION['alt']='Mboga hii '.$mboga6." Imeisha ";
                 header('location:../html-php/muuzaji.php?muuzaji=error');
               
            }elseif($retriev_mboga <= 1 ){
               $delete="DELETE FROM food_add where food_add_id = '$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW())";
               mysql_query($dbdeleted,$conn) or die(mysql_error());
               $_SESSION['alt']='Mboga hii '.$mboga6." Imeisha ";
               header('location:../html-php/muuzaji.php?');
            }

      /* }elseif( $dbQuantity <=0 && $dbQuantity_mboga <=0){

              if ($retriev <= 0 && $retriev_mboga <= 0 ) {
                $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga6.' Imeisha ';
                 header('location:../html-php/muuzaji.php?muuzaji=error');
              }elseif( $retriev <= 1 && $retriev_mboga <= 1 ){

              $delete="DELETE FROM food_add  where food_add_id ='$dbk_id'";
               mysql_query($delete,$conn) or die(mysql_error());
               $deleted="INSERT INTO  food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW()) ";
               mysql_query($deleted,$conn) or die(mysql_error());

               $delete="DELETE FROM food_add where food_add_id ='$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW() ) ";
               mysql_query($dbdeleted,$conn) or die(mysql_error());

               $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga6.' Imeisha ';
                header('location:../html-php/muuzaji.php?');

              }*/
         

    }elseif ($Quantity6 > $dbQuantity_mboga) {

       	$_SESSION['alt']=$mboga6."hakitoshi.Kinawatosha watu ".$dbQuantity_mboga;
    	header('location:../html-php/muuzaji.php?muuzaji=Error');

       }elseif($Quantity6 > $dbQuantity){

    	$_SESSION['alt']=$nameF." hakitoshi.Kinawatosha watu ".$dbQuantity;
    	 header('location:../html-php/muuzaji.php?muuzaji=Erro');

     }else{

     	$df=$beif -$pdt;
			$_SESSION['chg']=$df;
			$_SESSION['chk']=$nameF."--". $mboga6;

			$_SESSION['cnt']+=1;
			$nt=$_SESSION['cnt'];

			$_SESSION['order']=1894940;
            $_SESSION['inc']+=1;
            $order=$_SESSION['order'] + $_SESSION['inc'];

        $sql = ("UPDATE food_add set mboga_added_salio = '$total' where food_add_id = '$dbk_id'");
        $retriev = mysql_query($sql,$conn);

        $sql_mboga = ("UPDATE food_add set mboga_added_salio = '$total_mboga' where food_add_id = '$dbk_id_mboga'");
        $retriev_mboga = mysql_query($sql_mboga,$conn);

        $_SESSION['plt_no']=$Quantity7;

        $ist="INSERT INTO food_pchs(user_id,Order_no,wanga, mboga, Mnt_pd, Plt_no, Cost,T_cost, Chng, Pchs_id, date_entered) 
         VALUES('$role_id','$order', '$nameF', '$mboga6', '$beif', '$Quantity6', '$ct', '$pdt', '$df', '$nt', NOW())";
             mysql_query($ist) or die("No data has been inserted");
           $_SESSION['alt']="Umefanikiwa kununa chakula";
           header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');

     }
      exit();
		   }
		 }
		}else{
      //================================================================================================================
			if ($nameF && $mboga7) {
			if ($beig<5000) {
				$_SESSION['alt']="Bei ni kuanzia 5000";
			   header('location:../html-php/muuzaji.php?muuzaji=bei>5000');
		       exit();
			}else{
			$ct=5000;
			$pdt=$Quantity7 * $ct;
      
      if ($Quantity7<=0) {
         $_SESSION['alt']="Namba hasi haziruhusiwi";
         header('location:../html-php/muuzaji.php');
       }else

			if ($beig<$pdt) {
				$_SESSION['alt']="Umeingiza kiasi kidogo.Ingiza kuanzia ".$pdt."/=";
			   header('location:../html-php/muuzaji.php');
		       exit();
			}else{


	   //--------------------------------------------------------------------------------------
	     $sqly = mysql_query("SELECT * FROM food_add ORDER BY food_add_id ASC ");
       $retrie = mysql_affected_rows($conn);
       if ($retrie >=1) {
           while($row=mysql_fetch_assoc($sqly)){

            $db_deletde_id = $row['food_add_id'];
           }  }

       $sql = mysql_query("SELECT * FROM food_add where food_aded= '$nameF' ORDER BY food_add_id ASC ");
       $retriev = mysql_affected_rows($conn);
       if ($retriev >=1) {
           while($row=mysql_fetch_assoc($sql)){

            $dbk_id = $row['food_add_id'];
            $dbwanga = $row['food_aded'];
            $f_type=$row['food_type'];
            $dbQuantity = $row['mboga_added_salio'];
           } }

      
          $user_slct="SELECT user_id FROM users  ORDER BY user_id ASC";
          $user_qry=mysql_query($user_slct,$conn);
          while ($row=mysql_fetch_assoc($user_qry)) {
            $role_id=$row['user_id'];
          }


       $sql_mboga = mysql_query("SELECT * FROM food_add where food_aded = '$mboga7' ORDER BY food_add_id ASC ");
       $retriev_mboga = mysql_affected_rows($conn);
       if ($retriev_mboga >=1) {
           while($row=mysql_fetch_assoc($sql_mboga)){

            $dbk_id_mboga = $row['food_add_id'];
            $dbmboga = $row['food_aded'];
            $fd_type=$row['food_type'];
            $dbQuantity_mboga = $row['mboga_added_salio'];
          } }
        //------------------------------------------------------------------------------
         $total = $dbQuantity - $Quantity7;
         $total_mboga = $dbQuantity_mboga - $Quantity7;

    if ($dbQuantity <=0) {

        if ($retriev <= 0) {
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?muuzaji=error');
               
            }elseif($retriev<= 1){
               $delete="DELETE FROM food_add where food_add_id = '$dbk_id'";
               mysql_query($delete,$conn);
               $deleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW())";
               mysql_query($deleted,$conn) or die(mysql_error());
               $_SESSION['alt']='Chakula '. $nameF." kimeisha ";
               header('location:../html-php/muuzaji.php?');
            }

       

      }elseif($dbQuantity_mboga <=0){

               if ($retriev_mboga <= 0 ) {
                 $_SESSION['alt']='Mboga hii '.$mboga7." Imeisha ";
                 header('location:../html-php/muuzaji.php?muuzaji=Error');
               
            }elseif($retriev_mboga <= 1 ){
               $delete="DELETE FROM food_add where food_add_id = '$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW())";
               mysql_query($dbdeleted,$conn) or die(mysql_error());
               $_SESSION['alt']='Mboga hii '.$mboga7." Imeisha ";
               header('location:../html-php/muuzaji.php?');
            }

            /* }elseif( $dbQuantity <=0 && $dbQuantity_mboga <=0){

              if ($retriev <= 0 && $retriev_mboga <= 0 ) {
                $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga7.' Imeisha ';
                 header('location:../html-php/muuzaji.php?muuzaji=error');
              }elseif( $retriev <= 1 && $retriev_mboga <= 1 ){

              $delete="DELETE FROM food_add  where food_add_id ='$dbk_id'";
               mysql_query($delete,$conn) or die(mysql_error());
               $deleted="INSERT INTO  food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbwanga', '$f_type', NOW(), NOW()) ";
               mysql_query($deleted,$conn) or die(mysql_error());

               $delete="DELETE FROM food_add where food_add_id ='$dbk_id_mboga'";
               mysql_query($delete,$conn);
               $dbdeleted="INSERT INTO food_deleted(food_add_id, mboga, food_type, deleted_time, deleted_date) 
                         VALUES('$db_deletde_id', '$dbmboga', '$fd_type', NOW(), NOW() ) ";
               mysql_query($dbdeleted,$conn) or die(mysql_error());

               $_SESSION['alt']='Chakula '. $nameF. ' and '.$mboga0.' Imeisha ';
                header('location:../html-php/muuzaji.php?');

              }*/

    }elseif ($Quantity7 > $dbQuantity_mboga) {

       	 $_SESSION['alt']=$mboga7."hakitoshi.Kinawatosha watu ".$dbQuantity_mboga;
    	 header('location:../html-php/muuzaji.php?muuzaji=Error');

       }
       elseif($Quantity7 > $dbQuantity){

    	$_SESSION['alt']=$nameF." hakitoshi.Kinawatosha watu ".$dbQuantity;
    	 header('location:../html-php/muuzaji.php?muuzaji=error');

     }else{
     	   $df=$beig -$pdt;
			$_SESSION['chg']=$df;
			$_SESSION['chk']=$nameF."--". $mboga7;

			$_SESSION['cnt']+=1;
			$nt=$_SESSION['cnt'];

			$_SESSION['order']=1894940;
            $_SESSION['inc']+=1;
            $order=$_SESSION['order'] + $_SESSION['inc'];

        $sql = ("UPDATE food_add set mboga_added_salio = '$total' where food_add_id = '$dbk_id'");
        $retriev = mysql_query($sql,$conn);

        $sql_mboga = ("UPDATE food_add set mboga_added_salio = '$total_mboga' where food_add_id = '$dbk_id_mboga'");
        $retriev_mboga = mysql_query($sql_mboga,$conn);

        $_SESSION['plt_no']=$Quantity8;

        $ist="INSERT INTO food_pchs(user_id,Order_no,wanga, mboga, Mnt_pd, Plt_no, Cost,T_cost, Chng, Pchs_id, date_entered) 
         VALUES('$role_id','$order', '$nameF', '$mboga7', '$beig', '$Quantity7', '$ct', '$pdt', '$df', '$nt', NOW())";
             mysql_query($ist) or die("No data has been inserted");
           $_SESSION['alt']="Umefanikiwa kununa chakula";
           header('location:../html-php/muuzaji.php?muuzaji=Successfully+bought');

     }
     exit();
		    }
		   }
		 }
		}
	   }
	  }
	 }
	}
   }
  }
		
}
	
}else{
  header('location:../html-php/muuzaji.php?muuzaji=Nothing+done');
  exit();
}





?>