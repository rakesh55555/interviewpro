 <?php
  session_start();
  if($_SESSION['s2id']==session_id())
  {  ?>

<html>
<head><title>Interview Pro</title>
   <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
 
</head>
<body style="background-color:black;">
<p style=" margin-left:100px; "><a href='skill.php'><font size="5" color="red" > Skills</font></a><br>
    <a href='admininput.php'><font size="5" color="red" > Practice set</font></a>
<a  style="float:right; margin-right:100px;" href='logout.php'><font size="5" color="red" >  Logout</font></a></p><br><br>





<center>
  <div class="container container-fluid">

    <div class="col-lg-8 col-sm-12 col-md-8 col-xs-12" style="margin-left: 175px;">
    <div class="panel panel-Primary">
        <div class="panel-heading"><h4>Add New Skill</h4></div>
        <div class="panel-body">
    <center>
     <form class="form-horizontal" action="" method="post">
          <fieldset>
              <div class="form-group">
                <label for="inputskill2" class="col-lg-3 control-label"><span class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;Add Skill</label>
                  <div class="col-lg-8">
                    <input class="form-control" id="inputskill12" name="inputskill2" placeholder="New skill" type="text" required >
                  </div>
              </div>

              <button type="submit" class="btn btn-primary" name="submitskill">Submit</button>
              
               
    
        </fieldset>
      </form><center>
   
        </div><br><br><br>
          

  

 

   
        
             <div class="panel-heading"><h4>update Skill</h4></div>
             
            
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

                    require("../connect.php");
              $res = mysql_query("SELECT * FROM skill_master");
              $i=1;
              while($row= mysql_fetch_assoc($res))
               {
                
                  if($i%2==0)
                  {
                    echo "<tr class='info'>";
                  }
                  else
                  { 
                    echo "<tr >";
                  }  
                  echo "<td>".$i++."</td>";
                  $skillnm=$row['skillname'];
                  $id=$row['skillid'];
                   echo "<td>".$skillnm."</td><td><button name='edit' type='submit' value='".$id."' class='btn btn-primary'>Edit</button></td>"; 
                 echo "<td><button name='delete' type='submit' value='".$id."' class='btn btn-danger'>Delete</button></td><tr>"; 
                 
                  } 
              
             
   if(isset($_POST['edit']))
              {
               
                  
                $res1=mysql_query("SELECT * FROM skill_master WHERE `skillid`=".$_POST['edit']);
                while($row1= mysql_fetch_assoc($res1))
            {
                
                 $skillnm1=$row1['skillname'];
                  echo "<center><input type='text' name='editskill1'  value='".$skillnm1." '><button name='sumbmiteditdata' value='".$_POST['edit']."' type='submit' class='btn btn-primary'>Ok</button></td></tr></center>";  
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
              mysql_query( "ALTER TABLE `interview_pro_data`.`candidate_skill` DROP FOREIGN KEY `fkskillid`;");
                mysql_query( "ALTER TABLE `interview_pro_data`.`candidate_skill` ADD CONSTRAINT `fkskillid`FOREIGN KEY (`skillid`)REFERENCES `interview_pro_data`.`skill_master` (`skillid`) ON DELETE CASCADE ON UPDATE CASCADE;");

                $sql=" DELETE FROM `skill_master` WHERE `skillid`=".$_POST['delete'];
               
                if(mysql_query($sql))
                {
                  mysql_query(" ALTER TABLE `interview_pro_data`.`candidate_skill` 
DROP FOREIGN KEY `fkskillid`");
 mysql_query("ALTER TABLE `interview_pro_data`.`candidate_skill` ADD CONSTRAINT `fkskillid` FOREIGN KEY (`skillid`) REFERENCES `interview_pro_data`.`skill_master` (`skillid`) ON DELETE NO ACTION ON UPDATE CASCADE");

                  echo "<script>alert('Successfully Deleted...');</script>";
                  echo "<script>window.location='';</script>";
                }
              }
           
            

              
                  ?>
                  </form>     
                
              </thead>
            </table>
        
<?php
require("../connect.php");

if(isset($_POST['submitskill']))
  { 
   $skill="NO";
   $skill=$_POST['inputskill2'];
   $sql="INSERT INTO `interview_pro_data`.`skill_master` (`skillid`, `skillname`) VALUES ('', '$skill');";
    
     If (mysql_query($sql)) {
     echo "<script>alert('Succefully Inserted.......')</script>";
     echo "<script>window.location='';</script>";

    }
    else{  echo "<script>alert('Already Present.......')</script>";
     echo "<script>window.location='';</script>";}
    }

     
 

?>

</body>
</html>
<?php 
  }
  else
  {
    echo "<script>alert('You Must Login First...');</script>";
                  echo "<script>window.location='index.php';</script>";
  }
?>