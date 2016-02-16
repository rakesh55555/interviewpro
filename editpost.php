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
<link href="css/custom2.css" rel='stylesheet' type='text/css' />
<link href="css/jasny-bootstrap.min.css" rel="stylesheet">
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>

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


<tr vallign="top"><td>

  <div class="container container-fluid" id="jobs">
  <center>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin: auto;">
    <div class="panel panel-info">
        <div class="panel-heading"><h4>Job Openings by <?php echo $_SESSION['name1'];?>
        </h4></div>
        
     
<div class="panel-body">
   <form method="post" action="">
 <table class="table table-striped table-hover ">
              <thead>
                <tr class="info">
                    <th>Sl No</th>
                    <th>Job Title</th>
                    <th>Skills </th>
                    <th>Experience</th>
                     <th>Location</th>
                     <th>Action</th>
                    </tr>
                    <?php 
     
      require("connect.php");
      $hremail=$_SESSION['mail1'];
      $off= $_REQUEST['id'];
      $res1 = mysql_query("SELECT * FROM hr_requirement  where hremail='$hremail'   ");
      $i=$off+1;
      $rn=mysql_num_rows($res1);
      $a=$rn/10;
      $a= ceil($a);
      if($off>0){
      $res = mysql_query("SELECT * FROM hr_requirement  where hremail='$hremail' order by rqid DESC  limit 10 offset $off ");
      

      
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
                 
                 echo "<td>".$nm."</td><td>".$row['skills']."</td><td>".$row['rqexp']."</td><td>".$row['jobcountry'].",".$row['jobstate'].",".$row['jobcity']."</td><td><button name='edit' type='submit' class='action' value='".$row['rqid']."' ><b>Edit</b></button><button name='delete' type='submit' class='action' value='".$row['rqid']."' ><b>Delete</b></button></td></tr>"; 
                       
                    $off++; 
               }
             }
             else {
      $res = mysql_query("SELECT * FROM hr_requirement  where hremail='$hremail' order by rqid DESC  limit 10 offset 0 ");
      
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
                 
                 echo "<td>".$nm."</td><td>".$row['skills']."</td><td>".$row['rqexp']."</td><td>".$row['jobcountry'].",".$row['jobstate'].",".$row['jobcity']."</td><td><button name='edit' type='submit' class='action' value='".$row['rqid']."' ><b>Edit</b></button><button name='delete' type='submit' class='action' value='".$row['rqid']."' ><b>Delete</b></button></td></tr>"; 
                       
                    $off++; 
                     
               }
             }
             
               
    ?>
</table>
    <?php  
 echo"<div class='panel-footer panel-primary'>";
 echo    " <ul class='pagination pagination-sm'>";
              
                    for($k=0;$k<$a;$k++){
                          $l=$k*10; 
                        echo"<li ><a href='editpost.php?id=$l'>".($k+1)."</a></li>";
                                          }

?>
</ul>              


</div>

 </div>
  </div>
   
<?php 
 if(isset($_POST['edit']))
  { 

$id=$_POST['edit'];

$s="SELECT * FROM hr_requirement  where rqid=".$id;
                 $a = mysql_query($s);
             
            
           $rw= mysql_fetch_assoc($a);
             
  echo "<table  border='2px solid ' >
  <tr  style='background-color:#99ccff;' ><td colspan='2' ><center><b>Edit post Here</b></center></td></tr>
 
  <tr><td><b><br>Vacancies:<br><br>  </b></td><td><input type='text' name='b'  value='".$rw['vacancynumber']." '></td></tr>
  <tr><td><b><br>Qualification:<br><br> </b></td><td><input type='text' name='c'  value='".$rw['rqqualification']." '></td></tr>
  <tr><td><b><br>Experience:<br><br> </b></td><td><select name='d'><option value='Fresher'  required>Fresher</option><option value='Experienced'>Experienced</option><option value='Both'>Both</option></select></td></tr>
  <tr><td><b><br>salary(per Annum):<br><br> </b></td><td><input type='text' name='e'  value='".$rw['salary']." '></td></tr>
 <tr><td><b><br>Valid Till:<br><br> </b></td><td><input type='text' name='f'  value='".$rw['end_date']." '></td></tr>
  <tr><td colspan='2'><center><button name='uprq' value='".$_POST['edit']."' type='submit' class='btn btn-info'>Ok</button></center></td></tr></center></tr></table>";  


 }
 if(isset($_POST['uprq']))
  {
$id1=$_POST['uprq'];
  $b=$_POST['b'];
  $c=$_POST['c'];
  $d=$_POST['d'];
  $e=$_POST['e'];
  $f=$_POST['f'];

$sql=" UPDATE  `hr_requirement` SET `vacancynumber`= $b,`rqqualification`= '$c',`rqexp`= '$d',`salary`= $e,`end_date`= '$f'  WHERE  `rqid`=".$id1;
 if(mysql_query($sql))
                {
                 
                  echo "<script>alert('Successfully Edited.');</script>";
                  echo "<script>window.location='';</script>";

                
                }
   }

if(isset($_POST['delete']))
  { 

$sql=" DELETE FROM `hr_requirement` WHERE `rqid`=".$_POST['delete'];
               
                if(mysql_query($sql))
                {
                  
                  echo "<script>alert('Successfully Deleted...');</script>";
                  echo "<script>window.location='';</script>";
                }
              }



?>
 </td>
  </tr></form>
  <tr>
    <td colspan="2">
      <?php include('foot.php');  ?>
   
    </td>
  </tr>

</TABLE>
</body>
</html>

              


             


 

