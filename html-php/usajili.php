
<!--<link rel="stylesheet" type="text/css" href="../css/styl.css">
<link rel="stylesheet" type="text/css" href="../css/mpukj3.css">-->
<link rel="stylesheet" type="text/css" href="../css/signup.a.inc.css">
<link rel="stylesheet" type="text/css" href="../css/responinsive.inc.css">

<div id="main-wrappa">
      <?php 
        session_start();
       if (!isset($_SESSION['ur_name'])) {
        header('location:../index.php');
        }else{
       $uname=$_SESSION['ur_name'];
       $cheotype=$_SESSION['cheo_type'];
    }
          
        ?>

 <div id="wrapper">

      <div class="menu-list">
      <div id="contain">
      <div class="secess_msg"><h4><?php echo $_SESSION['msg_alert'];?></h4></div>
          <form action="../php-inc/signup.inc.php" method="POST" enctype="multipart/form-data">

          <div class="fr_g">
                <div class="inp-lbl"><span class="lbl-id">FIRST NAME</span><input type="text" name="fr_name"></div>
                <div class="alet_hold">
                  <?php echo $_SESSION['msga'];?>
                </div>
                <div class="inp-lbl"><span class="lbl-id">USER NAME</span><input type="text" name="ur_name"></div>
                <div class="alet_hold">
                  <?php echo $_SESSION['msgc'];?>
                </div>
          </div>

          <div class="sd_g">
                 <div class="inp-lbl"><span class="lbl-id">LAST NAME</span><input type="text" name="lst_name"></div>
                 <div class="alet_hold">
                   <?php echo $_SESSION['msgb'];?>
                 </div>
                 <div class="inp-lbl"><span class="lbl-id">NAFASI YA KAZI</span>
                  <select type="text" name="echo" lass="inp-lbl" placeholder="Ingiza Username....">
                    <option value="muuzaji">MUUZAJI</option>
                    <option value="mpakuaji">MPAKUAJI</option>
                    <option value="mpikaji">MPISHI</option>
                    <option value="stoo">STOO</option>
                    <option value="muhasibu">MUHASIBU</option>
                    <option value="admin">ADMIN</option>
                  </select>
                  <div class="alet_hold">
                    <?php echo $_SESSION['#'];?>
                  </div>

                </div>
             </div>

             <div class="sd_gender">
                                           <span class="lb-id">CHAGUA JINSIA</span>
                   <div class="gnd-lbl"><span class="gnd-id">ME</span><input type="radio" name="gnd" value="M"></div>
                   <div class="gnd-lbl"><span class="gnd-id">KE</span><input type="radio" name="gnd" value="F"></div>
                   <div class="alet_hold">
                     <?php echo $_SESSION['#'];?>
                   </div>
              </div>

              <div class="upload_hold">

                                            <span class="lb-id">WEKA PICHA</span>
                 <div class="gnd-lbl image_input"><input type="file" name="image" ></div>
                 <div class="alet_hold">
                   <?php echo $_SESSION['||empty($id6)'];?>
                 </div>
              </div>
              
             <div class="pwd-ipt">

                <div class="sd_g_pwd_a">
                   <div class="inp-lbl"><span class="lbl-id">NENO LA SIRI</span><input type="password" minlength="8" name="pwd"></div>
                   <div class="alet_hold">
                     <?php echo $_SESSION['msgd'];?>
                   </div>
                </div>

                <div class="sd_g_pwd_b">
                  <div class="inp-lbl"><span class="lbl-id">DHIBITISHA NENO LA SIRI</span><input type="password" minlength="8" name="cnf-pwd"></div>
                  <div class="alet_hold">
                    <?php echo $_SESSION['msgd'];?>
                  </div>
                  </div>
            </div> 
             
            
             
             
                <div class="in-lbl"><input type="submit" name="sbmt" value="Tuma"></div>
        
          </form>
            
      </div>
   </div>
  </div>
</div>
    <?php 
include_once"footer.php";
?>



 

  


