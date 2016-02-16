 <?php
  session_start();
  if($_SESSION['sid']==session_id())
  {?>
 
<html>
<head><title>Interview Pro</title>
  <style type="text/css">
 button{padding: 1px 2px;
  font-size: 1px;
  text-align: center;
  cursor: pointer;
  outline: none;
  background-color: #33ccff;
  color: #000;}
  body{
  background-color: #E6E6FA;
}
  </style>
   <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  
  
  <script src="js/jasny-bootstrap.min.js"></script>

</head>
<body  link="#C0C0C0" >
<TABLE   width="100%" height="100%"  cellpadding="0" cellspacing="0" >

<tr valign="top"><td width="100%">
 <?php include('head.php');  ?>

<nav>
       <?php include ('nav1.php');  ?></nav>
   

    <?php echo "<p style='float:right;'>Welcome to you  ".$_SESSION['name']."<br><a href='logout.php'>Logout</a></p>";
  }
  else
  {
    echo "<script>alert('You Must Login First...');</script>";
                  echo "<script>window.location='candlogin.php';</script>";
  }
?>


</td>
</tr>


<tr vallign="top"><td>

  <div class="container container-fluid">
  <center>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin: auto;">
    <div class="panel panel-info">
        <div class="panel-heading"><h4>Job Openings</h4></div>
        
     
<div class="panel-body">
   <form method="post" action="jobdecp.php">
 <table class="table table-striped table-hover ">
              <thead>
                <tr class="info">
                    <th>Sl No</th>
                    <th>Job Title</th>
                    <th>Skills </th>
                    <th>Experience</th>
                     <th>Location</th>
                     <th>Details</th>
                    </tr>
                    <?php 
     
      require("connect.php");
       $email1= $_SESSION['mail'];
  $off= $_REQUEST['id'];
      $res1 = mysql_query("SELECT * FROM hr_requirement    ");
      $i=$off+1;
      $rn=mysql_num_rows($res1);
      $a=$rn/10;
      $a= ceil($a);
        $w=($a*10)-10;
      
    $n= $off+10;
    $p=$off-10;
   
  if($rn>=10){
   if($off>0){
    if($off==$w){

           
                              
           echo    "<ul class='pager'><li><a href='showcv.php?id=$p'>Previous</a></li></ul>";
           }
           else{
             echo   " <ul class='pager'><li><a href='showcv.php?id=$n'>Next</a></li> <li><a href='showcv.php?id=$p'>Previous</a></li></ul>";
          
           }
         }

             else{

                echo    "<ul class='pager'><li><a href='showcv.php?id=$n'>Next</a></li></ul>";

             }}
    
    $sql1="SELECT * FROM candidate_profile  where email='$email1'";
                 $r1 = mysql_query($sql1);
             
            
             if($ro= mysql_fetch_assoc($r1))
              {

    
    
    
      if($off>0){
      $res = mysql_query("SELECT * FROM hr_requirement ORDER BY rqid DESC limit 10 offset $off ");
      

      
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
                   $dt= date("Y-m-d");
                 if($row['end_date']<$dt){
                    echo "<td>".$nm."<span class='badge'><font color='red'>#Expired</font></span></td><td>".$row['skills']."</td><td>".$row['rqexp']."</td><td>".$row['jobcity']."</td><td><button type='submit' name='view' class='action' value='".$row['rqid']."'><b>View</b></button></td></tr>"; 
                 }
                  else{
                  echo "<td>".$nm."</td><td>".$row['skills']."</td><td>".$row['rqexp']."</td><td>".$row['jobcity']."</td><td><button type='submit' name='view' class='action' value='".$row['rqid']."'><b>View</b></button></td></tr>"; 
                     }  
                    $off++; 
                     
               }
             }
             else {
      $res = mysql_query("SELECT * FROM hr_requirement ORDER BY rqid DESC limit 10 offset 0 ");
      
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
                 $dt= date("Y-m-d");
                
                
                 if($row['end_date']<$dt){
                    echo "<td>".$nm."<span class='badge' ><font color='red'>#Expired</font></span></td><td>".$row['skills']."</td><td>".$row['rqexp']."</td><td>".$row['jobcity']."</td><td><button type='submit' name='view' class='action' value='".$row['rqid']."'><b>View</b></button></td></tr>"; 
                 }
                  else{
                  echo "<td>".$nm."</td><td>".$row['skills']."</td><td>".$row['rqexp']."</td><td>".$row['jobcity']."</td><td><button type='submit' name='view' class='action' value='".$row['rqid']."'><b>View</b></button></td></tr>"; 
                     }  
                    $off++; 
               }
             }}
else{ 
       echo "<script>alert('Input your details 1st .......')</script>";
     echo "<script>window.location='input.php';</script>";        
    }   
    ?>
</table></form>
    <?php  
 echo"<div class='panel-footer panel-primary'>";
 echo    " <ul class='pagination pagination-sm'>";
              
                    for($k=0;$k<$a;$k++){
                          $l=$k*10; 
                        echo"<li ><a href='viewjob.php?id=$l'>".($k+1)."</a></li>";
                                          }

?>
</ul>              


</div>

 </div>
  </div>
</div>



    </td>
  </tr>

  <tr>
    <td colspan="2">
    <?php include('foot.php');  ?>
    </td>
  </tr>

</TABLE>

</body>
</html>
