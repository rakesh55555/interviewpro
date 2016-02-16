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

<?php include ('head.php');  ?>
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
  <center> <h3 ><b><font color="#3399ff">Tallent pool</font></b></h3></center>
  
   <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div   class="panel panel-info">
            <div class="panel-heading"><h3 style="padding:0px; text-align:center; alignment-adjust:central;">Search your Employee here</h3>
            <div class="panel-body">
          <form class="form-horizontal" method="post" action="">
            <div class="form-group">
            <label class="label label-info"><font size="4">Domain</font></label>
            <select id="getdomain" class="form-control" name="domainnm"    > 
          <option value="0" disabled="disabled" selected="selected">Select Domain</option>
          <?php 
                    $result = mysql_query("select * from skill_master");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "<option value='".$row['skillid']."'>".$row['skillname']."</option>";
                      }
                  ?>    
       </select>

     </div>

     <div class="form-group">   
    <label class="label label-info"><font size="4">State</font></label>
    <select id-"getstate" class="form-control" name="state[]"  multiple  >
<option value="0" selected="selected" disabled="disabled">Select State</option>
 <?php 
                    $result1 = mysql_query("select * from states where country_id=101");
                    while($row1 = mysql_fetch_assoc($result1))
                      {
                        echo "<option value='".$row1['name']."'>".$row1['name']."</option>";
                      }
                  ?>    
       </select>

 
</div>
<div class="form-group">
             <label class="label label-info"><font size="4">Experience</font></label>
            <select id="geteperience" class="form-control"name="experience" onchange="getexp()" >
   <option value="0" selected="selected" disabled="disabled">Select Experience</option>
  <option value="1">fresher</option>
  
  <option value="2">1 Yr</option>
  <option value="3">Above 1 Yr & Bellow 2 Yrs</option>
  <option value="4">2 Yr or Above</option>
 </select>
    <center><button name="btnsubmit1" type="submit" class="btn btn-success">Search</button></center>
  </div>

</form>
</div></div></div>
           
    </div>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div  id="showpics" class="panel panel-info">
    <div class="panel-heading"><h3 style="padding:0px; text-align:center; alignment-adjust:central;">Search Result </h3></div>
  <div class="panel-body">
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <img class="img-responssive" src="http://www.codingeek.com/wp-content/uploads/2015/04/Linearsearch.png" >
    </div>
   <p>For the company good employee  can be worth much more than any thing . We provides the facility to find best employee who will helpful to them </p>
    <p>The HR will be able view the Candidate  and also will be able to download the CV of the Candidate.</p></div>
  </div> 

 
<?php


      if(isset($_POST['btnsubmit1'])){

          echo '<style> #showpics{display:none;}</style>';
          echo "<div class='panel panel-info'><div class='panel-heading'>
          <h3 style='padding:0px; text-align:center; alignment-adjust:central;'>Search Result </h3></div>
          <div  class='panel-body'> 
            <table class='table table-striped table-hover '>
 <thead>
                <tr class='info'>
                  
                    <th>Candidate Nmaes </th>
                    <th>Download</th>
                    <th>Mail</th></tr>";
 echo "<tr id='op'><td colspan='3'><center><font size='5' color='red'><b>Select A option</b></font></center></td></tr>";
       
    if(isset($_POST['domainnm'])){
   echo "<div id='hide'><center><b><font color='red'>Search Through Domain</font></b></center></div>";
    echo "<style>#op{display:none;}</style>";
    
             
              
             
                   $pid=$_POST['domainnm'];
                   $sql3="SELECT * FROM candidate_profile q inner join candidate_skill e on q.profid=e.profid WHERE e.skillid=$pid ";
                 //$sql3="SELECT * FROM candidate_profile q inner join candidate_skill e on q.profid=e.profid WHERE e.skillid=$pid AND q.experience=$e";
               $res2= mysql_query($sql3);
             
                   if(mysql_num_rows($res2)>0){
               while($row3= mysql_fetch_assoc($res2))
              {  
                 $mid=$row3['profid'];
                echo "<tr id='hide'><td>".$row3['name']."</td><td><a href='http://localhost/interviewpro/uploads/cv/".$row3['cv']."'id='download' name='download'  target='_blank' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-download'></span>CV</a></td><td><a href='mail.php?id=$mid'id='mail' name='mail' class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-euro'></span>mail</a></td><tr>";
               
                //${'file1' . $j}=$row['name'];$j++;
              
              }}else {echo "<tr id='hide' ><td colspan='3'><center><font size='5' color='red'><b>No results found</b></font></center></td></tr>";}

          

              
              
             
        
/*$result = mysql_query("SELECT * FROM candidate_profile q inner join candidate_skill e on q.profid=e.profid WHERE q.state='Odisha' AND q.experience=$e");
    while($row4= mysql_fetch_assoc($result))
        {
          echo $row4['name'];
        }*/
       
}

 if(isset($_POST['state'])){
echo "<div id='hide'><center><b><font color='red'>Search Through State</font></b></center></div>";
 echo "<style>#op{display:none;}</style>";
       foreach($_POST['state'] as $value)
            { 
               $sql1="SELECT * FROM candidate_profile  WHERE state='$value'";
               //$sql1="SELECT * FROM candidate_profile  WHERE state='$value' AND experience='$e'";
             $res = mysql_query($sql1);
            
              if(mysql_num_rows($res)>0){
             while($row1= mysql_fetch_assoc($res))
              {
                
                $mid1=$row1['profid'];
              
                 echo "<tr id='hide'><td>".$row1['name']."</td><td><a href='http://localhost/interviewpro/uploads/cv/".$row1['cv']."'id='download' name='download'  target='_blank' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-download'></span>CV</a></td><td><a href='mail.php?id=$mid1'id='mail' name='mail' class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-euro'></span>mail</a></td><tr>";
                 //${'file' . $i}=$row['name'];$i++; 
              
           
            }
          }else {echo "<tr id='hide' ><td colspan='3'><center><font size='5' color='red'><b>No results found</b></font></center></td></tr>";}

                
           }       
          
           

     }
      if(isset($_POST['experience'])){
 echo "<div id='hide'><center><b><font color='red'>Search Through Experience</font></b></center></div>";
 echo "<style>#op{display:none;}</style>";
     if(isset($_POST['experience']))
           {$e=$_POST['experience'];
           
           $sql="SELECT * FROM candidate_profile WHERE `experience`='$e'";
           $r = mysql_query($sql);
             if(mysql_num_rows($r)>0){
               
            while($row= mysql_fetch_assoc($r))
              {
                 // ${'file' . $i}=$row['name'];$i++;
                $mid2=$row['profid'];
                  
                  echo "<tr id='hide'><td>".$row['name']."</td><td><a href='http://localhost/interviewpro/uploads/cv/".$row['cv']."'id='download' name='download'  target='_blank' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-download'></span>CV</a></td><td><a href='mail.php?id=$mid2' id='mail' name='mail' class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-euro'></span>mail</a></td><tr>";
                 
              }
            }else {echo "<tr id='hide' ><td colspan='3'><center><font size='5' color='red'><b>No results found</b></font></center></td></tr>";}
           
       
       }}
        
 if(isset($_POST['experience']) && isset($_POST['state']) && isset($_POST['domainnm'])){
 echo "<style>#hide,#hide1,#hide2,#hide3{display:none;}</style>";

 echo "<div><center><b><font color='red'>Search Through Experience And State And Domain</font></b></center></div>";
     
            
              
             
                   $pid=$_POST['domainnm'] ;
                 

   foreach($_POST['state'] as $value3)
            { 
                  $e1=$_POST['experience'];
                
              
               $sql1="SELECT * FROM candidate_profile q inner join candidate_skill e on q.profid=e.profid  WHERE e.skillid='$pid' AND state='$value3' AND experience='$e1'";
                 $r1 = mysql_query($sql1);
             
            
             while($ro= mysql_fetch_assoc($r1))
              {
                
                $mid1=$ro['profid'];
               
              
                 echo "<td>".$ro['name']."</td><td><a href='http://localhost/interviewpro/uploads/cv/".$ro['cv']."'id='download' name='download'  target='_blank' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-download'></span>CV</a></td><td><a href='mail.php?id=$mid1'id='mail' name='mail' class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-euro'></span>mail</a></td><tr>";
                 //${'file' . $i}=$row['name'];$i++; 
              }
           



     }
   
   }

    if( isset($_POST['state']) && isset($_POST['domainnm'])){
 echo "<style>#hide{display:none;}</style>";

 echo "<div id='hide1'><center><b><font color='red'>Search  State And Domain</font></b></center></div>";
  
           
              
             
                   $pid=$_POST['domainnm'] ;
                 

   foreach($_POST['state'] as $value3)
            { 
                  
                
              
               $sql1="SELECT * FROM candidate_profile q inner join candidate_skill e on q.profid=e.profid  WHERE e.skillid='$pid' AND state='$value3' ";
                 $r1 = mysql_query($sql1);
             
            
             while($ro= mysql_fetch_assoc($r1))
              {
                
                $mid1=$ro['profid'];
               
              
                 echo "<tr id='hide1'><td>".$ro['name']."</td><td><a href='http://localhost/interviewpro/uploads/cv/".$ro['cv']."'id='download' name='download'  target='_blank' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-download'></span>CV</a></td><td><a href='mail.php?id=$mid1'id='mail' name='mail' class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-euro'></span>mail</a></td><tr>";
                 //${'file' . $i}=$row['name'];$i++; 
              }
           



     
   }
   }


if(isset($_POST['experience']) &&  isset($_POST['domainnm'])){
 echo "<style>#hide{display:none;}</style>";

 echo "<div id='hide2'><center><b><font color='red'>Search Through Experience  And Domain</font></b></center></div>";
 
            
              
             
                   $pid=$_POST['domainnm'];
                 
          $e1=$_POST['experience'];
                
              
               $sql1="SELECT * FROM candidate_profile q inner join candidate_skill e on q.profid=e.profid  WHERE e.skillid='$pid'  AND experience='$e1'";
                 $r1 = mysql_query($sql1);
             
            
             while($ro= mysql_fetch_assoc($r1))
              {
                
                $mid1=$ro['profid'];
               
              
                 echo "<tr id='hide2'><td>".$ro['name']."</td><td><a href='http://localhost/interviewpro/uploads/cv/".$ro['cv']."'id='download' name='download'  target='_blank' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-download'></span>CV</a></td><td><a href='mail.php?id=$mid1'id='mail' name='mail' class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-euro'></span>mail</a></td><tr>";
                 //${'file' . $i}=$row['name'];$i++; 
              }
           



     
   }
   



if(isset($_POST['experience']) && isset($_POST['state'])){
 echo "<style>#hide{display:none;}</style>";

 echo "<div id='hide3'><center><b><font color='red'>Search Through Experience And State</font></b></center></div>";

             
                   
                 

   foreach($_POST['state'] as $value3)
            { 
                  $e1=$_POST['experience'];
                
              
               $sql1="SELECT * FROM candidate_profile   WHERE   state='$value3' AND experience=".$e1;
                 $r1 = mysql_query($sql1);
             
            
             while($ro= mysql_fetch_assoc($r1))
              {
                
                $mid1=$ro['profid'];
               
      
                 echo "<tr id='hide3'><td>".$ro['name']."</td><td><a href='http://localhost/interviewpro/uploads/cv/".$ro['cv']."'id='download' name='download'  target='_blank' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-download'></span>CV</a></td><td><a href='mail.php?id=$mid1'id='mail' name='mail' class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-euro'></span>mail</a></td><tr>";
                 //${'file' . $i}=$row['name'];$i++; 
              }
           



     }

     
   
   }



        }?>
   
</table>
           </div></div>
           </div></div></div>

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