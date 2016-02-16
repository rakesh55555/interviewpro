<?php
  session_start();
  if($_SESSION['sid']==session_id())
  {?>
<html>
<head><title>Interview Pro</title>
   <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  
  <script src="js/jasny-bootstrap.min.js"></script>
</head>
<body >



<TABLE   width="100%" height="100%"  cellpadding="0" cellspacing="0" >

<tr valign="top"><td width="100%">
  <?php include('head.php');  ?>

<nav> <?php include ('nav1.php');  ?>
     <?php echo "<p style='float:right;'>Welcome to you  ".$_SESSION['name']."<br><a href='logout.php'>Logout</a></p>";
  }
  else
  {
     echo "<script>alert('You Must Login First...');</script>";
                  echo "<script>window.location='candlogin.php';</script>";
  }
?>
   </nav></td></tr>
  

<tr vallign="top"><td>
<center><p><b>Skills are the most important attribute of a candidate to get a job.Here candidates can add their skills to get better job oppurtunities<b></p> 
 <center><div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div  id="hrlogin" class="panel panel-info">
            <div class="panel-heading"><h3 style="padding:0px; text-align:center; alignment-adjust:central;">Enter Your pH no for edit data</h3>
            </div>
                 
                  <form class="form-horizontal" method="post" action="">
                  <?php
          
                    include_once("connect.php");
                    $mail=$_SESSION['mail'];;
              $res1 = mysql_query("SELECT * FROM candidate_profile WHERE `email`='$mail'");
             
        
              if($row1= mysql_fetch_assoc($res1))
              {
            
                    $nm= $row1['name'];
                  
                   $id1=$row1['profid'];
                  
                 
                  
                  echo "<p id='msg'><b>Hii Mr.  ".$nm."   <input type='submit'name='upadskill' value='click'>To Add Your Skill here</b></p>";
                  echo "<p id='msg'><b>Hii Mr.  ".$nm."   <input type='submit' name='upreskill' value='click'>To Remove Your Skill here</b><p>";
                  ?>
                  
                   <br><br>

                   <br><br>
                    <?php
              if(isset($_POST['upadskill']))
              {     
                   echo "<style>#msg{display:none;}</style>";
                   echo "<select name='selectskill'  class='form-control'  style='max-width:40%;' > <option value='0' selected='selected' disabled='disabled'>Select Skill</option>";
                  $result = mysql_query("select * from skill_master");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "  <option value='".$row['skillid']."'>".$row['skillname']."</option>";
                      }
                  
                   echo "</select><br><button type='submit' name='addskill' ><font color='black'>Add skill</font></button><a href='cand_skillup.php'><button type='submit' ' ><font color='black'>Cancel</font></button></a>";
                
                }
             
              if(isset($_POST['upreskill']))
              {    
                $mail=$_SESSION['mail'];
                      echo "<style>#msg{display:none;}</style>";
                
                   echo "<select name='selectskill1' class='form-control'  style='max-width:40%;' > <option value='0' selected='selected' disabled='disabled'>Select Skill</option>";
                  $result = mysql_query("select * from candidate_profile where email= '$mail'");
                    while($row = mysql_fetch_assoc($result))
                      {
                        $pid=$row['profid'];
                        echo $pid;
                         $result1 = mysql_query("select * from candidate_skill where profid=$pid");
                    while($row1 = mysql_fetch_assoc($result1))
                      {
                        $sid=$row1['skillid'];
                        $result2 = mysql_query("select * from skill_master where skillid=$sid");
                    while($row2 = mysql_fetch_assoc($result2))
                      {
                        echo "  <option value='".$row2['skillid']."'>".$row2['skillname']."</option>";
                      }
                    }
                  }
                  
                   echo "</select><br><button type='submit' name='remskill' ><font color='black'>Remove Skill</font></button><a href='cand_skillup.php'><button type='submit'><font color='black'>Cancel</font></button></a>";
                
                }
               if(isset($_POST['addskill']))
              {  $i=1;
                $a=$_POST['selectskill'];
                
                 $res1=mysql_query("SELECT * FROM candidate_skill WHERE `skillid`=".$a." AND`profid`=".$id1);
                 if($row1= mysql_fetch_assoc($res1)){
                  $s=$row1['skillid'];
                  
                  if($a==$s){
                    $re1=mysql_query("SELECT * FROM skill_master WHERE `skillid`=".$s);
                    $ro=mysql_fetch_assoc($re1);
                    $sn=$ro['skillname'];
                    echo "<br><font color='red' size='4'>".$sn."  Already Present</font>";
                    exit;
                  }
                 
                 }
                  else{
                    if ($i==1) {
                      $sqlin="INSERT INTO `interview_pro_data`.`candidate_skill` (`id`,`skillid`, `profid`) VALUES ('', '$a','$id1');";
    
     If (mysql_query($sqlin)) {
     echo "<script>alert('Skill Succefully Added.......')</script>";
     echo "<script>window.location='';</script>";
                     $i++;
                             } 
                    }
                   
                  }

              }
            if(isset($_POST['remskill']))
              {  $i=1;
                $a=$_POST['selectskill1'];
                
                 $res1=mysql_query("SELECT * FROM candidate_skill WHERE `profid`=".$id1);
                 while($row1= mysql_fetch_assoc($res1)){
                  $s=$row1['skillid'];
                  
                  if($a==$s){
                    $sq=" DELETE FROM `candidate_skill` WHERE `skillid`=$a AND `profid`=$id1" ;
               
                if(mysql_query($sq))
                {
                  
                  echo "<script>alert('Skill Successfully Removed...');</script>";
                  echo "<script>window.location='';</script>";
                }
                    
                  }
                  else{ 
                        if($i==1){
                    $re=mysql_query("SELECT * FROM skill_master WHERE `skillid`=".$a);
                    $ro1=mysql_fetch_assoc($re);
                    $sn1=$ro1['skillname'];
                   echo "<br><font color='red' size='4'>".$sn1."  is not  Present</font>";
                   $i++;
                     }
                     } 
                    }
                   
                  }
                 

              

          }
             
              
            
?>
                   <br><br>
                   <p>Candidate Section</p>
                </div></div>
         </center>

 

          </form>
  </td></tr>
  <tr>
    <td colspan="2">
      <?php include('foot.php');  ?>
    </td>
  </tr>
</TABLE>
</body>
</html>
