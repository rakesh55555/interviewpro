 <?php
  session_start();
  if($_SESSION['s1id']==session_id())
  {
   require("connect.php");
   
     


    ?>
<html>
<head><title>Interview Pro</title>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/custom2.css" rel='stylesheet' type='text/css' />
<link href="css/jasny-bootstrap.min.css" rel="stylesheet">
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<script type='text/javascript' src="js/bootstrap.min.js"></script>
</head>
<body style=" background-color:#f2f2f2;">
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


<tr vallign="top"><td id="jobs">
<form method="post" action="">


 
  <div class="container container-fluid">

    <div class="col-lg-6 col-dm-6 col-sm-12 col-xs-12" style="margin: auto;" >
    <div class="panel panel-info">
      <div class="panel-heading"><h5>Your Post</h5></div>
        
     
<div class="panel-body">
  <table class="table table-striped table-hover ">
              <thead>
                <tr class="info">
                    <th>Sl No</th>
                    <th>Job Title</th>
                    
                     <th>View</th>
                    </tr>


   <?php 
     
      require("connect.php");
      $hremail=$_SESSION['mail1'];
    
          $i=1;   
      $res = mysql_query("SELECT * FROM hr_requirement  where hremail='$hremail' order by rqid DESC  ");
      
      while($row= mysql_fetch_assoc($res))
               {  
                 if($i%2==0)
                  {
                    echo "<tr class='warning'>";
                  }
                  else
                  { 
                    echo "<tr class='danger'>";
                  }  
                echo "<td>".$i++."</td>";
                  $nm=$row['jobname'];
                  $resb = mysql_query("SELECT * FROM notification  where rqid=".$row['rqid']);
                  $rn1=mysql_num_rows($resb);
                
                  if($rn1>0){
                 echo "<td>".$nm."<span class='badge'>".$rn1."</span></td><td><button name='view'  type='submit'  data-toggle='collapse' data-target='#demo' class='action' value='".$row['rqid']."'  ><b>view</b></button></td></tr>"; 
                     }  
                    else{
                        echo "<td>".$nm."</td><td><button name='view'  type='submit'  data-toggle='collapse' data-target='#demo' class='action' value='".$row['rqid']."'  ><b>view</b></button></td></tr>"; 
                    
                    }
                     
               }
             


    ?>
  </table>
</div>

</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin: auto;"  >
    <div class="panel panel-info">
      <div class="panel-heading"><h5>Candidates </h5></div>
      <div class="panel-body" >
 <table class="table table-striped table-hover ">
              <thead>
                <tr class="info">
                    <th>Sl No</th>
                    <th>Name</th>
                    
                     <th>Phone</th>
                      <th>Details</th>
                    </tr>


  <?php
  
      $l=0;
      $i=1;
 if(isset($_POST['view']))
  {
     $t=$_POST['view'];
     $_SESSION['t']=$t;


 $res5 = mysql_query("SELECT * FROM applied_candidate  where rqid='$t' order by id desc");
 $rn2=mysql_num_rows($res5);
 if($rn2>0){
while($row5= mysql_fetch_assoc($res5))
               {  
        $res6 = mysql_query("SELECT * FROM candidate_profile  where profid=".$row5['candidate_prof_id']);      
while($row6= mysql_fetch_assoc($res6))
               { 
               $x= " SELECT * FROM notification  where rqid='$t' AND pid=".$row6['profid'];
                $xx=mysql_query($x);
               
               
               
            if($i%2==0)
                  {
                    echo "<tr class='warning'>";
                  }
                  else
                  { 
                    echo "<tr class='danger'>";
                  }  
                echo "<td>".$i++."</td>";
               

              if( mysql_fetch_assoc($xx)){
 echo "<td>".$row6['name']."<span class='badge'>new</span></td><td>".$row6['phno']."</td><td><button name='details'  type='submit' value='".$row6['profid']."'>Details</button></td></tr>"; 
                     
                   
                    }      
               else{
                echo "<td>".$row6['name']."</td><td>".$row6['phno']."</td><td><button name='details'  type='submit' value='".$row6['profid']."'>Details</button></td></tr>"; 
               }         
             
            
              
            }


               }

 

   }else{echo "<tr><td colspan='4'><center><b><font color='red' size='4'>No one has applied for this job</fonr></b></center></td></tr>";}
}
 


      ?>
  </table>

      </div>


</td></tr>
      <tr vallign="top"><td>
<?php
if(isset($_POST['details']))
  {
   
echo "<style>#jobs{display:none;}</style>";

 $sql7="SELECT * FROM candidate_profile  WHERE profid=".$_POST['details']; 
 $res7 = mysql_query($sql7);
            
            
             while($row7= mysql_fetch_assoc($res7))
              {

    
$sql8="SELECT * FROM candidate_skill  WHERE profid=".$row7['profid']; 
 $res8 = mysql_query($sql8);
       while($row8= mysql_fetch_assoc($res8))
              { 

$sql9="SELECT * FROM skill_master  WHERE skillid=".$row8['skillid']; 
           $res9 = mysql_query($sql9);

 $row9= mysql_fetch_assoc($res9);
$im.=$row9['skillname']." , ";
           if($row7['experience']==1) {
            $ep="Fresher";
           } 
 elseif($row7['experience']==2) { $ep="1yr";}
elseif($row7['experience']==3) { $ep="More than 1yr less than 2 Yr";}
else{ $ep=" 2 Yr or More";}


         }
 echo "<div class='col-lg-6 col-sm-6 col-md-12 col-xs-12' style='margin-left:300px;' id='eco'>
    <div class='panel panel-info'>
      <div class='panel-heading'><h5>Candidate Details</h5></div>
      
     
<div class='panel-body'>
<table class='table table-striped table-hover '>
<tr><td class='danger'><b>Name </b></td><td class='default'>".$row7['name']."</td></tr>
<tr><td class='danger'><b>Email </b></td><td class='default'>".$row7['email']."</td></tr>
<tr><td class='danger'><b>Skills </b></td><td class='default'>".$im."</td></tr>

<tr><td class='danger'><b>Phone Number  </b></td><td class='default'>".$row7['phno']."</td></tr>
<tr><td class='danger'><b>State </b></td><td class='default'>".$row7['state']."</td></tr>
<tr><td class='danger'><b>Address  </b></td><td class='default'>".$row7['address']."</td></tr>
<tr><td class='danger'><b> Qualification  </b></td><td class='default'>".$row7['qualification']."</td></tr>
<tr><td class='danger'><b>Experience  </b></td><td class='default'>".$ep."</td></tr>
<tr><td class='danger'><b>Date of Birth  </b></td><td class='default'>".$row7['dob']."</td></tr>
</table>
 <center><a href='http://localhost/interviewpro/uploads/cv/".$row7['cv']."' target='_blank' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-download'></span>CV</a>
<a href='appliedcand.php'  class='btn btn-success btn-xs' >Ok</a>
  <center>                
</div><div></div>";




}
 $hremail=$_SESSION['mail1'];
    
      
      $y=$_SESSION['t'];
      $resn = mysql_query("DELETE  FROM notification where rqid='$y'  AND pid=".$_POST['details']);
               
    


}
?>


      </td></tr>
  <tr>
    <td colspan="2">
      <?php include('foot.php');  ?>
    </td>
  </tr>

</TABLE>






   
</body>
</html>

              


             


 

