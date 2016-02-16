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
  <link href="css/custom2.css" rel='stylesheet' type='text/css' />
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style1.css" rel='stylesheet' type='text/css' />
<link href="css/jasny-bootstrap.min.css" rel="stylesheet">
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>

</head>
<body style=" background-color:#f2f2f2;">
<TABLE   width="100%" height="100%"  cellpadding="0" cellspacing="0" >

<tr valign="top"><td width="100%">
  <?php include('head.php');  ?>
<nav>
      <?php include ('nav.php');  ?>
    <?php echo "<p style='float:right;'><b>Welcome to you  ".$_SESSION['name1']."</b><br><a href='logout1.php'>Logout</a></p>";
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
<?php 
require("connect.php");
 ?>
  <div class="container container-fluid" id="jobs">
  <center>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin: auto;">
    <div class="panel panel-info">
        <div class="panel-heading"><h4>Post  Requirement </h4></div>
        
     
<div class="panel-body">

<article>

<form method="post" action="">
  <ul>
        <li>
          <label for="jobnm">Job Title:</label>
            <input type="text" size="40" name="jobnm" required >
        </li>
        <li>
          <label for="jobrq">Job Requirement:</label>
            <input type="text" size="40" id="jobrq" name="jobrq" required >
        </li>
        <li>
            <label for="skill">Required Skill:</label>
            <select name="skill[]" multiple required >
               <option value="0" disabled="disabled" selected="selected">Select Skill</option>
                <?php 
                    $result = mysql_query("select * from skill_master");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "<option value='".$row['skillname']."'>".$row['skillname']."</option>";
                      }
                  ?>   
            </select>
        </li>
        <li>
            <label for="exp">Required Experience:</label>
            <select name="exp" >
                <option>Fresher</option>
                
                <option>Experienced</option>
                <option>Both</option>
               
            </select>
        </li>
        <li>
          <label for="vacancy">Vacancy Number:</label>
            <input type="text"  name="vacancy" required >
        </li>
       
         <li> <label for="gender">Gender Preference:</label></li>
            <label><input type="radio" name="gender"  value="Male" checked="checked" >Male</label>
            <label><input type="radio" name="gender"  value="Female" > Female</label>
             <label><input type="radio" name="gender" value="Both" >Both</label>
        </li> 
       <br><br>
       <li>
          <label for="qual">Required Qualification:</label>
            <textarea cols="50" rows="5" name="qual" required ></textarea>
    </li>
       <li>
          <label for="salary">Salary(Per Annum):</label>
            <input type="text" size="40" name="salary" required />
        </li>
        <li>
          <label for="salary">Job Location:</label></li>
            <label for="country">Country:</label>
            <select id="country" name="country"  onchange="getState()" required >
             <option value="0" disabled="disabled" selected="selected">Select Country</option>
                  <?php 
                    $result = mysql_query("select * from countries");
                    while($row = mysql_fetch_assoc($result))
                      {
                        echo "<option value='".$row['country_id']."'>".$row['name']."</option>";
                      }
                  ?>   
               
            </select>
        <br>
            <label for="state">State:</label>
            <select id="state" name="state" required >
                
              <option value="0" disabled="disabled"  >Select State</option> 
            </select>
      <br>
      
            <label for="city">City:</label>
           <input type="text" name="city" required >
        </li>
         <li>
          <label for="mob">Mobile Number:</label>
            <input type="text" size="40" name="mob" required />
        </li>
         <li>
          <label for="mob">Company Website:</label>
            <input type="text" size="40" name="web" value="http://www." required/>
        </li>
         <li>
          <label for="abtcmp">About Comapny :<br><font size="2">with in 450(words)</font> </label>
            <textarea cols="50" rows="5" name="abtcmp" required ></textarea>
    </li>
          <li>
          <label for="add">Comapny Address:</label>
            <textarea cols="50" rows="5" name="add" required ></textarea>
    </li>
    
   
         <li>
          <label for="dtto">Valid Till Date:</label>
            <input type="date" size="40" id="dtto" name="dtto" placeholder="yy-mm-dd" required />
        </li>
  </ul>
    <p>
        <button type="submit" name="submit">Submit</button>
        <button type="reset">Reset</button>
    </p>
</form>
</article>



 </div>


</td></tr>
<tr>
    <td colspan="2">
     <?php include('foot.php');  ?>
    </td>
  </tr>
</TABLE>

<script>
  function getState()
  {
    var id = $('#country').val();
    var datastring  = 'getid='+id;
    $.ajax({
      type: "POST",
      data: datastring,
      url: "ajax.php",
      success: function(data)
      {
       
         
          $('#state').html(data);

      },
        
    });
  }

  </script>

</body>
</html>
<?php 
 require("connect.php");
  if(isset($_POST['submit']))
  { 
                      $nm=$_POST['jobnm'];
                      $rq=$_POST['jobrq'];
                      $skl=$_POST['skill'];
                      $exp=$_POST['exp'];
                      $vac=$_POST['vacancy'];
                      $gn=$_POST['gender'];
                      $ql=$_POST['qual'];
                      $sal=$_POST['salary'];
                      $cid=$_POST['country'];
                      $st=$_POST['state'];
                      $ct=$_POST['city'];
                      $mob=$_POST['mob'];
                      $web=test_input($_POST['web']);
                      $abt=$_POST['abtcmp'];
                      $add=$_POST['add'];
                      $dt=$_POST['dtto'];
                      $ml=$_SESSION['mail1'];
                      $cpnm=$_SESSION['cnm'];
                      $hrid=$_SESSION['id1'];
                      $sql1="SELECT * FROM countries  where country_id=".$cid;
                                     $r1 = mysql_query($sql1);
             
            
             if($ro= mysql_fetch_assoc($r1))
              {
                $cnm=$ro['name'];
                
             }
    $skl1=implode(",",$skl);
  if (!filter_var($web, FILTER_VALIDATE_URL) === false) {
    if (mysql_query("INSERT INTO `interview_pro_data`.`hr_requirement` (`rqid`, `jobname`, `jobrequirement`, `rqexp`, `end_date`, `vacancynumber`, `rqgender`, `rqqualification`, `salary`,`jobcountry`, `jobstate`, `jobcity`, `cmpaddress`,`mob`, `skills`, `about`, `web`,`hremail`,`companyname`) VALUES ('', '$nm', '$rq', '$exp', '$dt','$vac', '$gn', '$ql', '$sal' , '$cnm', '$st','$ct', '$add', '$mob', '$skl1', '$abt', '$web', '$ml', '$cpnm') ")) 
    {
     echo "<script>alert('Succefully Post Updated ')</script>";
     echo "<script>window.location='';</script>";
     }
} 
else {
     echo "<script>alert('Invalid Url Try again ')</script>";
   
}
   
  }

 function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }



?>