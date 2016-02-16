<html>
<head><title>Interview Pro</title>
   <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="css/input1.css" rel='stylesheet' type='text/css' />
  <script src="js/jasny-bootstrap.min.js"></script>
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

<center><p><b>Here enter your email to recover your password</b></p>
  <div class="container container-fluid">
  
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin: auto;">
    <div class="panel panel-info">
        <div class="panel-heading"><h3>Password recovery for HR</h3></div>
        <div class="panel-body">
     <img src="img/for.jpg" style="float: left; " height="300px"></img>
     <form method="post" class="form-horizontal">
          <fieldset>
              <div class="form-group">
                <label for="inputEmail" id="forg" class="col-lg-3 control-label"><span class="glyphicon glyphicon-euro"></span>&nbsp;&nbsp;Email</label>
                  <div class="col-lg-8">
                    <input class="form-control" id="forg" placeholder="Email" type="email" name="Email" >
                  </div>
              </div>

              <button type="submit" id="forg" class="btn btn-info" name="btnforgot">Submit</button>
    <br><br><a href="hrlogin.php">log In</a>
        </fieldset>
    <?php
           require("connect.php");
        if(isset($_POST['btnforgot']))
           {
            echo "<style>#forg{display:none;}</style>";
              $em=test_input($_POST['Email']);
              
                if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                  echo "<script>alert('Invalid Email...');</script>";
                  echo "<script>window.location='';</script>";
                  exit;
               }
               
               $sql= "SELECT * FROM hr_account WHERE email='".$em."'";
             $res = mysql_query($sql); 
              if($row= mysql_fetch_assoc($res))
              {
            
                  $id=$row['hr_account_id'];
                
                  $nm=$row['name'];
                  $pw=$row['password'];
                  $qn=$row['qnans'];
                  echo "<b>Hii Mr.  ".$nm."  Enter your 1st School Name</b><input type='text' name='qns' required ><button type='submit' value='".$id."' class='btn btn-info' name='btnschooll'>Submit</button>";
              } 
              else{
                echo "<b><font color='red' size='5' >Email is Not Registred</font></b>";
              }        
           }

        if(isset($_POST['btnschooll']))
           {
            echo "<style>#forg{display:none;}</style>";
            $q=$_POST['btnschooll'];
            $v=$_POST['qns'];
            $sql1= "SELECT * FROM hr_account WHERE hr_account_id='".$q."'";
             $res1 = mysql_query($sql1);
             
             $row1= mysql_fetch_assoc($res1);
             if($row1['qnans']==$v){
              echo "<b>Enter New Password:</b><input type='password' name='nwpw' ><button type='submit' value='".$q."' class='btn btn-info' name='pwup'>Reset Password</button>";
               
               }
                else{
                echo "<script>alert('Wrong Ans...');</script>";
               }
             }
              if(isset($_POST['pwup']))
           {
            $p=$_POST['nwpw'];
            $q1=$_POST['pwup'];
             $sql3=" UPDATE  `hr_account` SET `password`= '$p'  WHERE  `hr_account_id`=".$q1;
            if(mysql_query($sql3))
                {
                  
                  echo "<script>alert('Password Updated...');</script>";
                  echo "<script>window.location='hrlogin.php';</script>";
                  session_start();
                  session_destroy();
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

</td></tr>
<tr>
    <td colspan="2">
      <?php include('foot.php');  ?>
    </td>
  </tr>
</TABLE>
</body>
</html>
