 <?php
  session_start();
  if($_SESSION['sid']==session_id())
  {?>
<html>
<head><title>Interview Pro</title>
   <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="css/input1.css" rel='stylesheet' type='text/css' />
  
  <script src="js/jasny-bootstrap.min.js"></script>
</head>
<body >
<TABLE   width="100%" height="100%"  cellpadding="0" cellspacing="0" >

<tr valign="top"><td width="100%">
  <?php include('head.php');  ?>
<nav>
        <?php include ('nav1.php');  ?>
    <?php echo "<p style='float:right;'>Welcome to you  ".$_SESSION['name']."<br><a href='logout.php'>Logout</a></p>";
  }
  else
  {
    echo "<script>alert('You Must Login First...');</script>";
                  echo "<script>window.location='candlogin.php';</script>";
  }
?></nav>
</td>
</tr>


<tr vallign="top"><td>


<center><div id="input" >
 <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
  	 <h4><b><span class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;&nbsp;<u>Candidates Regd form</u>&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-star"></span></b></h4>
  	<p align="left"> <label for="name"><span class="glyphicon glyphicon-user"></span>&nbsp;Name:</label>
  <input type="text" name="name" placeholder="Name"  requiredd ><br><br>
  
   
  

   <label for="phno"><span class="glyphicon glyphicon-phone"></span>&nbsp;Mob Num:</label>
  <input type="text" name="phno" placeholder="Phone number" required ><br><br>
  
<label for="state"><span class="glyphicon glyphicon-globe"></span>&nbsp;State:</label>
  <select name="state" required >
<option value="0" selected="selected" disabled="disabled">Select State</option>
<option value='Andaman and Nicobar Islands'>Andaman and Nicobar Islands</option>
<option value='Andhra Pradesh'>Andhra Pradesh</option>
<option value='Arunachal Pradesh'>Arunachal Pradesh</option>
<option value='Assam'>Assam</option>
<option value='Bihar'>Bihar</option>
<option value='Chandigarh'>Chandigarh</option>
<option value='Chhattisgarh'>Chhattisgarh</option>
<option value='Dadra and Nagar Haveli'>Dadra and Nagar Haveli</option>
<option value='Daman and Diu'>Daman and Diu</option>
<option value='Delhi'>Delhi</option>
<option value='Goa'>Goa</option>
<option value='Gujarat'>Gujarat</option>
<option value='Haryana'>Haryana</option>
<option value='Himachal Pradesh'>Himachal Pradesh</option>
<option value='Jammu and Kashmir'>Jammu and Kashmir</option>
<option value='Jharkhand'>Jharkhand</option>
<option value='Karnataka'>Karnataka</option>
<option value='Kerala'>Kerala</option>
<option value='Lakshadweep'>Lakshadweep</option>
<option value='Madhya Pradesh'>Madhya Pradesh</option>
<option value='Maharashtra'>Maharashtra</option>
<option value='Manipur'>Manipur</option>
<option value='Meghalaya'>Meghalaya</option>
<option value='Mizoram'>Mizoram</option>
<option value='Nagaland'>Nagaland</option>
<option value='Odisha'>Odisha</option>
<option value='Puducherry'>Puducherry</option>
<option value='Punjab'>Punjab</option>
<option value='Rajasthan'>Rajasthan</option>
<option value='Sikkim'>Sikkim</option>
<option value='Tamil Nadu'>Tamil Nadu</option>
<option value='Telengana'>Telengana</option>
<option value='Tripura'>Tripura</option>
<option value='Uttar Pradesh'>Uttar Pradesh</option>
<option value='Uttarakhand'>Uttarakhand</option>
<option value='West Bengal'>West Bengal</option>
</select><br><br>
<label for="address" style="vertical-align:top;"><span class="glyphicon glyphicon-home"></span>&nbsp;Address:</label>
  <textarea name="address" rows="5" cols="20"  required >Address!!!!</textarea><br><br>
  <label for="qualification" style="vertical-align:top;"><span class="glyphicon glyphicon-book"></span>&nbsp;Qualification:</label>
  <input type="text" name="qualification" placeholder="Qualification" required  ><br><br>
   <label for="experience"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Experience:</label>
    <select name="experience" required >
   <option value="0" selected="selected" disabled="disabled" required >Select Experience</option>
  <option value="1">Fresher</option>
  <option value="2">1 Yr</option>
  <option value="3">Above 1 Yr & Bellow 2 Yrs</option>
  <option value="4">2 Yr or Above</option>
 </select> <br><br>
 <label for="dob"><span class="glyphicon glyphicon-star"></span>&nbsp;DOB:</label>
  <input type="date" name="dob" placeholder="yy/mm/dd" required ><br><br>
  <label for="fileup"><span class="glyphicon glyphicon-book"></span>&nbsp;Upload CV:</label>
  <input type="file"  accept="application/pdf" name="cv1"   required > </input>
                        
                       
  </p>
    <button type="submit" value="submit" name="Submit"><b>Submit Form</b></button> 
  <?php 
  include_once('connect.php');
  if(isset($_POST['Submit']))
  {   $email1= test_input($_SESSION['mail']);
    
    $sql1="SELECT * FROM candidate_profile  where email='$email1'";
                 $r1 = mysql_query($sql1);
             
            
             if($ro= mysql_fetch_assoc($r1))
              {

    
      echo "<script>alert('Already Inserted.......')</script>";
     echo "<script>window.location='';</script>";
  
             }
else{ 
  $name1=$cvnm=$mob=$state1=$add=$qual=$exp=$dob1="NO";
    
      $name1= test_input($_POST['name']);
      
    
        


   
       
      $mob=test_input($_POST['phno']);
      if (strlen($mob)==10 ) {
    

      
      $state1=$_POST['state'];
      
      $exp=$_POST['experience'];
      
      $add=test_input($_POST['address']);
      
      $qual=test_input($_POST['qualification']);
    
      $dob1=$_POST['dob'];
   
    
        if(!$_FILES['cv1']['error'])
        {
          $cvnm=$_FILES["cv1"]["name"];

          move_uploaded_file($_FILES["cv1"]["tmp_name"], "uploads/cv/".basename( $_FILES["cv1"]["name"]));
          //echo "The file ". basename( $_FILES["cv1"]["name"]). " has been uploaded.";*/
         }
      

      
   
         

    if (mysql_query("INSERT INTO `interview_pro_data`.`candidate_profile` (`profid`, `name`, `email`, `phno`, `state`, `address`, `cv`, `qualification`, `experience`,`dob`) VALUES ('', '$name1', '$email1', '$mob', '$state1','$add', '$cvnm', '$qual', $exp, '$dob1') ")) {
     echo "<script>alert('Succefully Inserted and try to add skill')</script>";
     echo "<script>window.location='';</script>";

    }

}
else{ echo "<script>alert('Invalid Phone number...Try Again......');</script>";
   echo "<script>window.location='';</script>";}

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
</div></center></td></tr>
 <tr>
    <td colspan="2">
     <?php include('foot.php');  ?>
    </td>
  </tr>
</TABLE>



</body>
</html>
