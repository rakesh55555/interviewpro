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
        <div class="panel-heading"><h4>Practice sets</h4></div>
        
     
<div class="panel-body">
   <form method="post" action="jobdecp.php">
 <table class="table table-striped table-hover ">
              <thead>
                <tr class="info">
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Subject </th>
                    <th>Download</th>
                    </tr>
                  



                <form method="post">
 <?php 
     
      require("connect.php");
      
        $smail= test_input($_SESSION['mail']);
            $i=1;
               
                 
              
              $res = mysql_query("SELECT * FROM candidate_profile WHERE `email`='$smail'");
           
         
              if($row= mysql_fetch_assoc($res))
              {
               $id=$row['profid'];
 
 $res1 = mysql_query("SELECT * FROM candidate_skill WHERE  profid =".$id);
         
              while($row1= mysql_fetch_assoc($res1))
              {

                $id1=$row1['skillid'];
                
$res2 = mysql_query("SELECT * FROM practice_set WHERE skillid=".$id1);
               while($row2= mysql_fetch_assoc($res2))
              {

               if($i%2==0)
                  {
                    echo "<tr class='warning'>";
                  }
                  else
                  { 
                    echo "<tr class='danger'>";
                  } 

                   $nm=$row2['name'];
                   $id2=$row2['skillid'];
                echo "<td>".$i++."</td>";
              $res3 = mysql_query("SELECT * FROM skill_master WHERE skillid =".$id2);
                  if($row3= mysql_fetch_assoc($res3))
              {
                 
                 echo "<td>".$nm."</td><td>".$row3['skillname']."</td><td><a href='http://localhost/interviewpro/uploads/practice/".$row2['nqn']."'id='download' name='download'  target='_blank' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-download'></span>Download</a></td></tr>"; 

              }
            }

              }
          }









function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

     ?>


  </table>
</div>
</div>
</div>




    </td>
</tr>

 <tr>
    <td colspan="2">
       
       <?php include('foot.php');?>
    </td>
  </tr>
</TABLE>
</body>
</html>