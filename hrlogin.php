

<html>
<head><title>Interview Pro</title>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/custom2.css" rel='stylesheet' type='text/css' />
</head>
<body >
<TABLE   width="100%" height="100%"  cellpadding="0" cellspacing="0" >

<tr valign="top"><td width="100%">
<?php include('head.php');  ?></td>
</tr>
<tr vallign="top"><td >
<nav>
      <a  href="index.php"><font size="4" color="#33ccff" style="margin-left:50"><span id="hmbtn"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</span></a>
   </nav></td></tr>
<tr vallign="top"><td>
<center><p><b>HR of any company can login here to find the best employee they looking for </b></p>
  <div class="container container-fluid">
  
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin: auto;">
    <div class="panel panel-info">
        <div class="panel-heading"><h3>HR LogIn</h3></div>
        <div class="panel-body">
     <img src="img/login.png" style="float: left; " height="200px" width="300px"></img>
     <form class="form-horizontal"  method="post">
          <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label"><span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;Email</label>
                  <div class="col-lg-8">
                    <input class="form-control" name="mail1" id="inputEmail" placeholder="Email" type="email" required>
                  </div>
              </div>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-3 control-label"><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;Password</label>
                <div class="col-lg-8">
                  <input class="form-control" id="inputPassword" placeholder="Password" type="password" name="pw1" required>
                        </div>
              </div>

              <button type="submit" name="submit" class="btn btn-info">LogIn</button>
            </br><a id="forgot" href="forgothr.php">forgot password?</a>
                    <h4>New User? Click <a href="hrsignup.php"> HERE </a>to Sign Up</h4>
        </fieldset>
      
<?php 
 session_start(); 
 include_once( "connect.php"); 
 if(isset($_POST['submit'])){ 
 $a=test_input($_POST['mail1']);
  
$sql= "SELECT * FROM hr_account WHERE email='".$a."'"; 
 $res = mysql_query($sql); 
 if($res){ 
  $row= mysql_fetch_assoc($res); 
   
  $mail=$row['email'];
  $pwd=$row['password'];
 
   
    
  if($_POST['pw1']==$pwd){

  $_SESSION['mail1'] =$mail ; 
  $_SESSION['id1'] =$row['hr_account_id'] ; 
   $_SESSION['name1'] =$row['name'] ;
    $_SESSION['cnm'] =$row['companyname'] ;
   
  $_SESSION['s1id']=session_id();
   echo "<script>alert('Successfully Logged In...');</script>";
                  echo "<script>window.location='pool.php';</script>";
  
  }
  else{
     echo "<script>alert('Worng details...');</script>";
      echo "<script>window.location='';</script>";
     exit;             
  }

  }
  else{ 
  echo "<script>alert('Worng details...');</script>";
   echo "<script>window.location='';</script>";
  exit; 
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
</body>
</html>
