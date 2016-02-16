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


   <tr vallign="top"><td >
  <div class="container container-fluid">
		<div class="panel panel-info">
   			<div class="panel-heading">
            <div></div>
            <div>
            	<h3 style="padding:0px; margin:0px; alignment-adjust:central; text-align:center;">Posted Skills</h3>
            </div>
            
            </div>
			<div class="panel-body">
					<table class="table table-striped table-hover ">
  						<thead>
    						<tr class="info">
      							<th>Sl no</th>
                    <th>Slkill names </th>
                    <th>Edit</th>
                   <th>Delete</th>
                     
                   <form method="post" >
                   <?php
                    require("connect.php");
              $res = mysql_query("SELECT * FROM skill_master");
              $i=1;
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
                  $skillnm=$row['skillname'];
                  $id=$row['skillid'];
                    echo "<td>".$skillnm."</td><td><button name='edit' type='submit' value='".$id."' class='btn btn-info'>Edit</button></td>";
                 echo "<td><button name='delete' type='submit' value='".$id."' class='btn btn-danger'>Delete</button></td></tr>"; 
                
                  } 
              
             
   if(isset($_POST['edit']))
              {
               
                  
                $res1=mysql_query("SELECT * FROM skill_master WHERE `skillid`=".$_POST['edit']);
                while($row1= mysql_fetch_assoc($res1))
            {
                
                 $skillnm1=$row1['skillname'];
                  echo "<center><input type='text' name='editskill1'  value='".$skillnm1." '><button name='sumbmiteditdata' value='".$_POST['edit']."' type='submit' class='btn btn-info'>Ok</button></td></tr></center>";  
          }
       }
             
  if(isset($_POST['sumbmiteditdata']))
              {
               $a=$_POST['editskill1'];
                $sql1=" UPDATE  `skill_master` SET `skillname`= '$a' WHERE `skillid`=".$_POST['sumbmiteditdata'];
                 if(mysql_query($sql1))
                {
                  
                  echo "<script>alert('Successfully Edited...');</script>";
                  echo "<script>window.location='';</script>";
                }
              } 


               if(isset($_POST['delete']))
              { 
               
                $sql=" DELETE FROM `skill_master` WHERE `skillid`=".$_POST['delete'];
               
                if(mysql_query($sql))
                {
                  
                  echo "<script>alert('Successfully Deleted...');</script>";
                  echo "<script>window.location='';</script>";
                }
                else{ echo "<script>alert('Can not Delete This Skill Is Used by Some Candidates ...');</script>";
                  echo "<script>window.location='';</script>";}
              }
           
            

              
      				    ?>
                  </form>			
    						
              </thead>
           	
					</table>
            </div>
           
        </div>
    </div>
</td></tr>
<tr>
    <td colspan="2">
     <?php include('foot.php');  ?>
    </td>
  </tr>
</TABLE>
</body>
</html>
