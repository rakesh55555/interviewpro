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
<nav>
       <?php include ('nav1.php');  ?>
     <?php echo "<p style='float:right;'>Welcome to you  ".$_SESSION['name']."<br><a href='logout.php'>Logout</a></p>";
  }
  else
  {
     echo "<script>alert('You Must Login First...');</script>";
                  echo "<script>window.location='candlogin.php';</script>";
  }
?>
   </nav>
  </td>
</tr>



<tr vallign="top"><td>
<center><p><b>Skills are the most important attribute of a candidate to get a job.Here candidates can add their skills to get better job oppurtunities<b></p> 
 <center><div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div  id="hrlogin" class="panel panel-info">
            <div class="panel-heading"><h3 style="padding:0px; text-align:center; alignment-adjust:central;">Add skills</h3>
            </div>
                 <p id="warning"><b><font color="red" size="3">If You have already added your skills then try to <a href="cand_skillup.php">update skill</a></font>
                  <form class="form-horizontal" method="post" action="">
                  <?php
          
                    include_once("connect.php");
                    $mail=$_SESSION['mail'];;
              $res1 = mysql_query("SELECT * FROM candidate_profile WHERE `email`='$mail'");
             
        
              if($row1= mysql_fetch_assoc($res1))
              {
            
                    $nm= $row1['name'];
                  
                   $id=$row1['profid'];
                  
                  
                  
                  echo "<b>Hii Mr.  ".$nm."   To Add Your Skill here</b>";
                  ?>
                  <select name='selectskill[]' multiple> <option value='0' selected='selected' disabled='disabled'>Select Skill</option>
                   <br><br>

                   <br><br>
                    <?php
            
                 
                  $result = mysql_query("select * from skill_master");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "<option value='".$row['skillid']."'>".$row['skillname']."</option>";
                      }
                  
                   echo "</select><br><button type='submit' name='submitskill' value='".$skil."'>submit</button>";
                
                
               if(isset($_POST['submitskill']))
              {
              $res1=mysql_query("SELECT * FROM candidate_skill WHERE `profid`=".$id);
                 if($row1= mysql_fetch_assoc($res1)){
              
             echo "<script>alert('You have already added your skills try to update...');</script>";
                  echo "<script>window.location='';</script>";
             

            }
          
          else{ 
                foreach($_POST['selectskill'] as $value)
                 {
             
            
             
              if(mysql_query("INSERT INTO `interview_pro_data`.`candidate_skill` (`id`,`skillid`, `profid`) VALUES ('', '$value','$id');")){
                echo "<script>alert('Skills Successfully Inserted...');</script>";
                  echo "<script>window.location='';</script>";
                }
                }
             
              }
            }
          }else{

            echo "<style>#warning{display:none;}</style>";
            echo "<font color='red' size='3'>Try to input your details first </font>";}
            
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
