 <?php
  session_start();
  if($_SESSION['sid']==session_id())
  {  ?>

   
   
   
<html>
<head><title>Interview Pro</title>

   <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="css/custom.css" rel='stylesheet' type='text/css' />
  <script src="js/jasny-bootstrap.min.js"></script>
</head>
<body >
<?php 
require("connect.php");
 ?>
  
<TABLE   width="100%" height="100%"  cellpadding="0" cellspacing="0" >

<tr valign="top"><td width="100%">
  <?php include('head.php');  ?>
  <nav>  <?php include ('nav1.php');  ?>
 <?php echo "<p style='float:right;'>Welcome to you  ".$_SESSION['name']."<br><a href='logout.php'>Logout</a></p>";
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


<tr valign="top"><td>
 <center><div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
            
<div class="container container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div></div>
            <div>
              <h3 style="padding:0px; margin:0px; alignment-adjust:central; text-align:center;">Edit Candidate Data</h3>
            </div>
            
            </div>
      <div class="panel-body">
          <table class="table table-striped table-hover ">
              <thead>
                <tr class="info">

                    <th>Name </th>
                    <th>Email</th>
                    <th>Qualification</th>
                    <th>Experience</th>
                    <th>Phone Number</th>
                  
                    <th>Action</th>
                </div>
                 
                  
                
                  


                   <br><br>
                   <p>Candidate Section</p>
                </div>
         </center>


                <form method="post">

<?php
          
include_once("connect.php");
              
              
          
              $smail= test_input($_SESSION['mail']);
            
              
                 
              
              $res = mysql_query("SELECT * FROM candidate_profile WHERE `email`='$smail'");
           
         
              if($row= mysql_fetch_assoc($res))
              {
            
                 
                  echo "<tr class='danger'>";
                   $id=$row['profid'];
                  $nm=$row['name'];
                  $eml=$row['email'];
                  

                  $pn=$row['phno'];
                  $ql=$row['qualification'];
                  $ex=$row['experience'];
                  
                   if ($ex=='1') {
                     $ex="Fresher";
                   }
                   elseif ($ex=='2') {
                     $ex="1 Yr";
                   }
                    elseif ($ex=='2') {
                     $ex="Above 1Yr Less Than 2Yr ";
                   }
                   else{
                     $ex="2 yr or Above";
                   }
                  
                     

                  echo "<td>".$nm."</td><td>".$eml."</td><td>".$ql."</td><td>".$ex."</td><td>".$pn."</td><td><button name='edit' value='".$id."' type='submit' class='btn btn-info'>Edit</button></td></tr>"; 
                               
                 
          
             
            
          
          }
          else{echo "<b><font color='red' size='4'>First Input Your Data</font></b>"; }

             


    
    
             if(isset($_POST['edit']))
              {
                 $res1=mysql_query("SELECT * FROM candidate_profile WHERE `profid`=".$_POST['edit']);
               $row1= mysql_fetch_assoc($res1);
                $nm1=$row1['name'];
                 $eml1=$row1['email'];
                 $pn1=$row1['phno'];
                $ql1=$row1['qualification'];
                $ex1=$row1['experience'];
                  
               
               /* $res2=mysql_query("SELECT * FROM candidate_skill WHERE `profid`=".$_POST['edit']);
                
                 while($row2= mysql_fetch_assoc($res2))
              {
                 $res3=mysql_query("SELECT * FROM skill_master WHERE `skillid`=".$row2['skillid']);

                 while($row3= mysql_fetch_assoc($res3))
              {
                $sknm=$row3['skillname'];
              }
              }*/
                 
                 if ($ex1=='1') {
                    
                    echo "<table  border='2px solid ' ><tr  style='background-color:#99ccff;' ><td colspan='2' ><center><b>Edit Here</b></center></td></tr><br><tr> <td ><b><br>Name:<br><br> </b></td><td><input type='text' name='editnm'  value='".$nm1." '></td></tr><tr><td><b><br>Email:<br><br>  </b></td><td><input type='email' name='editmail'  value='".$eml1." '></td></tr><tr><td><b><br>Qualification:<br><br> </b></td><td><input type='text' name='editql'  value='".$ql1." '></td></tr><tr><td><b><br>Experience:<br><br> </b></td><td><select name='editex'><option value='1'  selected>Fresher</option><option value='2'>1 Yr</option><option value='3'>Above 1 Yr & Bellow 2 Yrs</option><option value='4'>2 Yr orabove 2 Yr</option></select></td></tr><tr><td><b><br>Phone:<br><br> </b></td><td><input type='text' name='editpn'  value='".$pn1." '></td></tr><tr><td colspan='2'><center><button name='updata' value='".$_POST['edit']."' type='submit' class='btn btn-info'>Ok</button></center></td></tr></center></tr></table>";  

                   }
                   elseif ($ex1=='2') {
             echo "<table  border='1px solid ' ><tr  style='background-color:#99ccff;' ><td colspan='2' ><center><b><br>Edit Here</b></center></td></tr><tr> <td ><b><br>Name:<br><br> </b></td><td><input type='text' name='editnm'  value='".$nm1." '></td></tr><tr><td><b><br>Email:<br><br> </b></td><td><input type='email' name='editmail'  value='".$eml1." '></td></tr><tr><td><b><br>Qualification:<br><br> </b></td><td><input type='text' name='editql'  value='".$ql1." '></td></tr><tr><td><b><br>Experience:<br><br> </b></td><td><select name='editex'><option value='1'  >Fresher</option><option value='2' selected>1 Yr</option><option value='3'>Above 1 Yr & Bellow 2 Yrs</option><option value='4'>2 Yr orabove 2 Yr</option></select></td></tr><tr><td><b><br>Phone:<br><br> </b></td><td><input type='text' name='editpn'  value='".$pn1." '></td></tr><tr><td colspan='2'><center><button name='updata' value='".$_POST['edit']."' type='submit' class='btn btn-info'>Ok</button></center></td></tr></center></tr></table>";  

                   }
                    elseif ($ex1=='3') {
                     echo "<table  border='1px solid ' ><tr  style='background-color:#99ccff;' ><td colspan='2' ><center><b><br>Edit Here</b></center></td></tr><tr> <td ><b><br>Name:<br><br> </b></td><td><input type='text' name='editnm'  value='".$nm1." '></td></tr><tr><td><b><br>Email:<br><br> </b></td><td><input type='email' name='editmail'  value='".$eml1." '></td></tr><tr><td><b><br>Qualification:<br><br> </b></td><td><input type='text' name='editql'  value='".$ql1." '></td></tr><tr><td><b><br>Experience:<br><br> </b></td><td><select name='editex'><option value='1'  >Fresher</option><option value='2'>1 Yr</option><option value='3' selected>Above 1 Yr & Bellow 2 Yrs</option><option value='4'>2 Yr orabove 2 Yr</option></select></td></tr><tr><td><b><br>Phone:<br><br> </b></td><td><input type='text' name='editpn'  value='".$pn1." '></td></tr><tr><td colspan='2'><center><button name='updata' value='".$_POST['edit']."' type='submit' class='btn btn-info'>Ok</button></center></td></tr></center></tr></table>";  

                   }
                   else{
                    echo "<table  border='1px solid ' ><tr  style='background-color:#99ccff;' ><td colspan='2' ><center><b><br>Edit Here</b></center></td></tr><tr> <td ><b><br>Name:<br><br> </b></td><td><input type='text' name='editnm'  value='".$nm1." '></td></tr><tr><td><b><br>Email:<br><br> </b></td><td><input type='email' name='editmail'  value='".$eml1." '></td></tr><tr><td><b><br>Qualification:<br><br> </b></td><td><input type='text' name='editql'  value='".$ql1." '></td></tr><tr><td><b><br>Experience:<br><br> </b></td><td><select name='editex'><option value='1'  >Fresher</option><option value='2'>1 Yr</option><option value='3'>Above 1 Yr & Bellow 2 Yrs</option><option value='4' selected>2 Yr orabove 2 Yr</option></select></td></tr><tr><td><b><br>Phone:<br><br> </b></td><td><input type='text' name='editpn'  value='".$pn1." '></td></tr><tr><td colspan='2'><center><button name='updata' value='".$_POST['edit']."' type='submit' class='btn btn-info'>Ok</button></center></td></tr></center></tr></table>";  

                   }
                 
           
       }
              
 if(isset($_POST['updata']))
              {
                $id=$_POST['updata'];
                 $a=$_POST['editnm'];
                 $b= test_input($_POST['editmail']);
            
                 $c=$_POST['editex'];
                 $d=$_POST['editql'];
                 $e=$_POST['editpn'];
                 $sql=" UPDATE  `candidate_profile` SET `name`= '$a',`email`= '$b',`phno`= '$e',`qualification`= '$d',`experience`= '$c'  WHERE  `profid`=".$id;
                 $sql1= " UPDATE  `candidate_account` SET `email`= '$b'  WHERE  `email`='$smail'";
                  if (!filter_var($b, FILTER_VALIDATE_EMAIL)) {
      
    
  echo "<script>alert('Invalid Email...Try Again......');</script>";
   echo "<script>window.location='';</script>";

}
                else{
                  $_SESSION['mail']=$b;
                  if(mysql_query($sql1)){
                 if(mysql_query($sql))
                {
                 
                  echo "<script>alert('Successfully Updated.');</script>";
                  echo "<script>window.location='';</script>";

                
                }}
              } 
            }


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
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
