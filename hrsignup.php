<html>
<head><title>Interview Pro</title>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/custom.css" rel='stylesheet' type='text/css' />
</head>
<body >
<TABLE   width="100%" height="100%"  cellpadding="0" cellspacing="0" >

<tr valign="top"><td width="100%">
 <?php include('head.php');  ?></td>
</tr>
<tr vallign="top"><td>
<nav>
      <a  href="index.php"><font size="4" color="#33ccff" style="margin-left:50"><span id="hmbtn"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</span></a>
   </nav></td></tr>
<tr vallign="top"><td>

<center><p><b>HR from any company  can signup here to find the best Employee they looking for </b></p>
  <div class="container container-fluid">
  
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin: auto;">
    <div class="panel panel-info">
        <div class="panel-heading"><h3>HR Sign Up</h3></div>
        <div class="panel-body">
       <img src="img/sign.png" style="float: left; " height="300px" width="300px"></img>
      <form class="form-horizontal" action="" method="post">
          <fieldset>
               <div class="form-group">
                <label for="inputname" class="col-lg-3 control-label"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Name</label>
                <div class="col-lg-8">
                  <input class="form-control" id="inputname" placeholder="Name" type="text" name="name" required>
                        </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label"><span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;Email</label>
                  <div class="col-lg-8">
                    <input class="form-control" id="inputEmail" placeholder="Email" type="email" name="email" required>
                  </div>
              </div>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-3 control-label"><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;Password</label>
                <div class="col-lg-8">
                  <input class="form-control" id="inputPassword" placeholder="Password" type="password" name="password" required>
                        </div>
              </div>
              <div class="form-group">
               <label for="companynm" class="col-lg-3 control-label"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;Company Name</label>
                <div class="col-lg-8">
                  <input class="form-control" id="companynm" placeholder="1st Company Name" type="text" name="company" required>
                        </div>
              </div>
             
              <div class="form-group">
               <label for="qnans" class="col-lg-3 control-label"><span class="glyphicon glyphicon-home"></span>&nbsp;&nbsp;1st School Name</label>
                <div class="col-lg-8">
                  <input class="form-control" id="qnans" placeholder="1st school Name" type="text" name="school" required>
                        </div>
              </div>
             
             <button type="submit" class="btn btn-info" name="signup1">Sign Up</button><br><br>
        </fieldset>
      </form>
    </div>
        </div>
        </div>
  
  </div></center>
</td>
</tr>

 <tr>
    <td colspan="2">
       <?php include('foot.php');  ?>
    </td>
  </tr>
</TABLE>
<?php
require("connect.php");
if(isset($_POST['signup1']))
  { 
   $nm=$em=$pwd=$scnm=$cnm="NO";
 $nm=$_POST['name'];
 $em=test_input($_POST['email']);
  if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
      
    
  echo "<script>alert('Invalid Email...Try Again......');</script>";
   echo "<script>window.location='';</script>";

}
else{
 $pwd=$_POST['password'];
 $scnm=$_POST['school'];
 $cnm=$_POST['company'];
  $sql= "SELECT * FROM candidate_account WHERE email='".$em."'"; 
 $res = mysql_query($sql); 
 if($res){ 
  $sql="INSERT INTO `interview_pro_data`.`hr_account` (`hr_account_id`, `name`, `email`, `password`,`companyname`, `qnans`) VALUES ('', '$nm', '$em', '$pwd','$cnm', '$scnm');";
 If (mysql_query($sql)) {
     echo "<script>alert('Succefully Signed Up.......')</script>";
     echo "<script>window.location='hrlogin.php';</script>";

    }

  }
  else{
     echo "<script>alert('Email Already Registred.......')</script>";
     echo "<script>window.location='candsignup.php';</script>";
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
</body>
</html>
