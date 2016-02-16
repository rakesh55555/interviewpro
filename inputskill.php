 <?php
  session_start();
  if($_SESSION['s1id']==session_id())
  { 
      require("connect.php");
     $hremail=$_SESSION['mail1'];
     $rnn=0;
      $resn1 = mysql_query("SELECT * FROM hr_requirement  where hremail='$hremail'   ");
      while($rown= mysql_fetch_assoc($resn1))
               {  
      
  
      $resn = mysql_query("SELECT * FROM notification where rqid=".$rown['rqid']);
    
      $rn1=mysql_num_rows($resn);
      $rnn+=$rn1;
    }
    ?>
<html>
<head><title>Interview Pro</title>
   <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="css/input1.css" rel='stylesheet' type='text/css' />
  <script src="js/jasny-bootstrap.min.js"></script>
</head>
<body >




<TABLE   width="100%" height="100%"  cellpadding="0" cellspacing="0" >

<tr valign="top"><td width="100%">
 <?php include('head.php');  ?>
<nav>
      <?php include ('nav.php');  ?>
   <?php echo "<p style='float:right;'>Welcome to you  ".$_SESSION['name1']."<br><a href='logout1.php'>Logout</a></p>";
  }
  else
  {
    echo "<script>alert('You Must Login First...');</script>";
                  echo "<script>window.location='hrlogin.php';</script>";
  }
?>
   </nav>


</td>
</tr>



<tr vallign="top"><td>
  
<center>
  <div class="container container-fluid">
  
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin: auto;">
    <div class="panel panel-info">
        <div class="panel-heading"><h3>Add New Skill</h3></div>
        <div class="panel-body">
     <img src="img/for2.png" style="float: left; " height="300px"></img>
     <form class="form-horizontal" action="inputskill.php" method="post">
          <fieldset>
              <div class="form-group">
                <label for="inputskill2" class="col-lg-3 control-label"><span class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;Add Skill</label>
                  <div class="col-lg-8">
                    <input class="form-control" id="inputskill12" name="inputskill2" placeholder="New skill" type="text" required >
                  </div>
              </div>

              <button type="submit" class="btn btn-success" name="submitskill">Submit</button>
                 <a href="showskill.php"><button  class="btn btn-warning">Update Skills</button></a><br><br>
            
    
        </fieldset>
      </form>
    </div>
        </div>
        </div>
  
  </div></center>

</td></tr>
<tr>
    <td colspan="2">
      <?php include('foot.php');  ?>
    </td>
  </tr>
</TABLE>
<?php
require("connect.php");

if(isset($_POST['submitskill']))
  { 
   $skill="NO";
   $skill=$_POST['inputskill2'];
   $sql="INSERT INTO `interview_pro_data`.`skill_master` (`skillid`, `skillname`) VALUES ('', '$skill');";
    
     If (mysql_query($sql)) {
     echo "<script>alert('Succefully Inserted.......')</script>";
     echo "<script>window.location='';</script>";

    }
   else{ echo "<script>alert('Alredy present.......')</script>";
     echo "<script>window.location='';</script>";}
    }

    


?>

</body>
</html>
