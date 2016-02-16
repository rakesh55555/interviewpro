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

</head>
<body style=" background-color:#f2f2f2;">
<TABLE   width="100%" height="100%"  cellpadding="0" cellspacing="0" >

<tr valign="top"><td width="100%">
  <?php include('head.php');  ?>
<nav>
      <?php include ('nav.php');  ?> </nav>
    <?php echo "<p style='float:right;'>Welcome to you  ".$_SESSION['name1']."<br><a href='logout1.php'>Logout</a></p>";
  }
  else
  {
    echo "<script>alert('You Must Login First...');</script>";
                  echo "<script>window.location='hrlogin.php';</script>";
  }
?>
  
</td>
</tr>



<tr vallign="top"><td >

 <div class="container container-fluid">
  <center>
    <div class="col-lg-12  col-md-8 col-sm-4 col-xs-3" style="margin: auto;">
    <div class="panel panel-info">
        <div class="panel-heading"><h3>All CV of Candidates</h3></div>
        
     
<div class="panel-body">
 <table class="table table-striped table-hover ">
              <thead>
                <tr class="info">
                    <th>Sl no</th>
                    <th>Candidate Nmaes </th>
                    <th>Download</th>
                    </tr>

                   <form method="post">
 <?php 
     
      require("connect.php");
      
      $off= $_REQUEST['id'];
       $res1 = mysql_query("SELECT * FROM candidate_profile   ");
      $i=$off+1;
      $rn=mysql_num_rows($res1);
      $a=$rn/5;
      $a= ceil($a);
      $w=($a*5)-5;
      
    $n= $off+5;
    $p=$off-5;
   
  if($rn>=5){
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
     
      if($off>0){
      $res = mysql_query("SELECT * FROM candidate_profile order by profid desc limit 5 offset $off ");
      

      
      while($row= mysql_fetch_assoc($res))
               {  
                 if($i%2==0)
                  {
                    echo "<tr class='danger'>";
                  }
                  else
                  { 
                    echo "<tr class='warning'>";
                  }  
                echo "<td>".$i++."</td>";
                  $nm=$row['name'];
                 
                 echo "<td>".$nm."</td><td><a href='http://localhost/interviewpro/uploads/cv/".$row['cv']."'id='download' name='download'  target='_blank' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-download'></span>CV</a></td></tr>"; 
                       
                    $off++; 
                     
               }
             }
             else {
      $res = mysql_query("SELECT * FROM candidate_profile order by profid desc limit 5 offset 0 ");
      
      while($row= mysql_fetch_assoc($res))
               {  
                 if($i%2==0)
                  {
                    echo "<tr class='danger'>";
                  }
                  else
                  { 
                    echo "<tr class='warning'>";
                  }  
                echo "<td>".$i++."</td>";
                  $nm=$row['name'];
                 
                 echo "<td>".$nm."</td><td><a href='http://localhost/interviewpro/uploads/cv/".$row['cv']."'id='download' name='download'  target='_blank' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-download'></span>CV</a></td></tr>"; 
                       
                    $off++; 
                     
               }
             }
           
  
               
    ?>
    
  </table></form>
</div>
 <?php  
 echo"<div class='panel-footer panel-primary'>";
 echo    " <ul class='pagination pagination-sm'>";
         

                    for($k=0;$k<$a;$k++){
                          $l=$k*5; 
                        echo"<li ><a href='showcv.php?id=$l'>".($k+1)."</a></li>";
                                         
                                          }
                                          echo "</ul>";
         

?>
</div>
  
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
</body>
</html>
