<?php
  session_start();
  if($_SESSION['sid']==session_id())
  {?>
<html>
<head><title>Interview Pro</title>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<link href="css/jasny-bootstrap.min.css" rel="stylesheet">
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jasny-bootstrap.min.js"></script>

</head>
<body style=" background-color:#f2f2f2;">
<TABLE   width="100%" height="100%"  cellpadding="0" cellspacing="0" >

<tr valign="top"><td width="100%">
 <?php include('head.php');  ?>
<nav>
       <?php include ('nav1.php');  ?>

    <?php echo "<p style='float:right;'>Welcome to you  ".$_SESSION['name']."<br><a href='logout1.php'>Logout</a></p>";
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


<tr vallign="top"><td >
<form method="post" action="">

<?php 

require("connect.php");
  if(isset($_POST['view']))
  { 

 $_SESSION['rid']=$_POST['view'];}
$id=$_SESSION['rid'];

 $sql="SELECT * FROM hr_requirement  where rqid=".$id;
                 $r = mysql_query($sql);
             
            
             if($row= mysql_fetch_assoc($r))
              {
                      $jn=$row['jobname'];
                      $rq=$row['jobrequirement'];
                      $ex=$row['rqexp'];
                      $ed=$row['end_date'];
                      $vac=$row['vacancynumber'];
                      $gn=$row['rqgender'];
                      $ql=$row['rqqualification'];
                      $sal=$row['salary'];
                      $cnm=$row['jobcountry'];
                      $st=$row['jobstate'];
                      $ct=$row['jobcity'];
                      $cadd=$row['cmpaddress'];
                      $mb=$row['mob'];
                      $skl=$row['skills'];
                      $abt=$row['about'];
                      $w=$row['web'];
                      $ml=$row['hremail'];
                      $cpnm=$row['companyname'];

                      
              }

    $sql1="SELECT * FROM hr_account  where email='$ml'";
                 $r1 = mysql_query($sql1);
             
            
             if($ro= mysql_fetch_assoc($r1))
              {
                   
         $name=$ro['name'];

              }

  


?>
 
  <div class="container container-fluid">

    <div class="col-lg-6 col-sm-6 col-md-12 col-xs-12" style="margin: auto;">
    <div class="panel panel-info">
      <div class="panel-heading"><h5>Vacancy Detail</h5></div>
        
     
<div class="panel-body">
<table class="table table-striped table-hover ">
<tr><td class='danger'><b>Job Title </b></td><td class='default'><?php echo $jn;?></td></tr>
<tr><td class='danger'><b>Job Requirement </b></td><td class='default'><?php echo $rq;?></td></tr>
<tr><td class='danger'><b>Number Of Vacancy  </b></td><td class='default'><?php echo $vac;?></td></tr>
<tr><td class='danger'><b>Key Skills </b></td><td class='default'><?php echo $skl;?></td></tr>
<tr><td class='danger'><b>Qualification  </b></td><td class='default'><?php echo $ql;?></td></tr>
<tr><td class='danger'><b> Salary (Per Annum)  </b></td><td class='default'><?php echo $sal;?></td></tr>
<tr><td class='danger'><b>Experience  </b></td><td class='default'><?php echo $ex;?></td></tr>
<tr><td class='danger'><b>Valid Till  </b></td><td class='default'><?php echo $ed;?></td></tr>
</table>
                  
</div><br><br>
 <div class="panel-heading"><h5>Job Location</h5></div>
        
     
<div class="panel-body">
<table class="table table-striped table-hover ">
<tr><td class='danger'><b>Country </b></td><td class='default'><?php echo $cnm;?></td></tr>
<tr><td class='danger'><b>State </b></td><td class='default'><?php echo $st;?></td></tr>
<tr><td class='danger'><b>City  </b></td><td class='default'><?php echo $ct;?></td></tr>

</table>
</div><br><br>
 <div class="panel-heading"><h5>Company Details</h5></div>
     <table class="table table-striped table-hover ">
<tr><td class='danger'><b>Company Name </b></td><td class='default'><?php echo $cpnm;?></td></tr>
<tr><td class='danger'><b>Company Details </b></td><td class='default'><?php echo $abt;?></td></tr>

</table>   
     
<div class="panel-body">

</div><br><br>
<div class="panel-heading"><h5>Hr Contact Details</h5></div>
        
     
<div class="panel-body">
<table class="table table-striped table-hover ">
<tr><td class='danger'><b>Contact Person </b></td><td class='default'><?php echo $name;?></td></tr>
<tr><td class='danger'><b>Address </b></td><td class='default'><?php echo $cadd;?></td></tr>
<tr><td class='danger'><b>Mobile </b></td><td class='default'><?php echo $mb;?></td></tr>
<tr><td class='danger'><b>Email </b></td><td class='default'><?php echo $ml;?></td></tr>
<tr><td class='danger'><b>Website </b></td><td class='default'><?php echo $w;?></td></tr>


</table>   
     
</div>
 </div>
</div>
<div class="col-lg-6 col-sm-6 col-md-12 col-xs-12" style="margin: auto;">
    <div class="panel panel-info">
      <div class="panel-heading"><h5>Apply here</h5></div>
      <div class="panel-body"><center><h4>Company Website</h4></center>
<iframe src="<?php echo $w; ?>" width="100%" height="400" frameborder="1" scrolling="yes" ></iframe>
<br><br>
 <center><button style="padding: 10px 15px;
  font-size: 10px;
  text-align: center;
  cursor: pointer;
  outline: none;
  background-color: #3399ff;
  color: #000;"type="submit"  name="apply" class="action"  ><b>Apply For this job</b></button>
  <a href="viewjob.php" style="padding: 10px 15px;
  font-size: 10px;
  text-align: center;
  cursor: pointer;
  outline: none;
  background-color: #3399ff;
  color: #000;"type="submit" class="action"><b>Go Back</b></a>

</center>
      </div>
</td></tr>
 <tr>
    <td colspan="2">
      <?php include('foot.php');  ?>
   
 
    </td>
  </tr>
</TABLE>

<?php  if(isset($_POST['apply']))
  { 
$idd=$_SESSION['rid'];
$cm=  $_SESSION['mail']; 




$sql2="SELECT * FROM candidate_profile  where email='$cm'";
                 $r1 = mysql_query($sql2);
             
            
             if($ro= mysql_fetch_assoc($r1))
              {

               $pid= $ro['profid'];
              }





   
  $sql3="SELECT * FROM applied_candidate  where rqid=$idd AND candidate_prof_id=$pid";           
        $re=mysql_query($sql3); 
        $rp=mysql_fetch_assoc($re);


        if( $rp['candidate_prof_id']==$pid && $rp['rqid']==$idd)   {
           
                 echo "<script>alert('You have already Applied for this job')</script>";
     echo "<script>window.location='viewjob.php';</script>";
}
               

                           
else{
  if (mysql_query("INSERT INTO `interview_pro_data`.`notification` (`id`,  `rqid`,  `pid`) VALUES ('',  '$idd', '$pid') ")) {
     


   if (mysql_query("INSERT INTO `interview_pro_data`.`applied_candidate` (`id`,  `rqid`, `candidate_prof_id`) VALUES ('',  '$idd', '$pid') ")) {
     echo "<script>alert('Succefully Applied for this job')</script>";
     echo "<script>window.location='viewjob.php';</script>";
}
}
 }             
   
                      
            
             
                


     
  }
 ?>
</form>
</body>
</html>
