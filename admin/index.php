
<html lang="en-us">

<head>
<title>InterviewPro</title>

<style>

*{margin:0; padding:0}
body{background:#000; }
.form{width:400px; margin:0 auto; background:#99ccff; margin-top:150px}
.header{height:44px; background:#17233B}
.header h2{height:44px; line-height:44px; color:#fff; text-align:center}

.inp{background:#12192C; width:90%; border-radius:0 3px 3px 0; border:none; outline:none; color:#999; font-family: 'Source Sans Pro', sans-serif} 
.inp{display:inline-block; vertical-align:top; height:40px; line-height:40px; background:#12192C;}

.btn{margin-top:20px;height:40px; border:none; background:#0C6; width:50%; outline:none; font-family: 'Source Sans Pro', sans-serif; font-size:20px; font-weight:bold; color:#eee; border-bottom:solid 3px #093; border-radius:3px; cursor:pointer}
ul li{height:40px; margin:15px 0; list-style:none}

</style>
</head>
<body>
<div class="form">
<div class="header"><h2>Admin LogIn</h2></div>
<div class="login">
<form action="" method="post">
<ul>
<li>
<center><input type="mail" required class="inp" name="user"    placeholder="    User Name Or Email"/></center></li>
<li><center>
<input type="password" required class="inp"      name="pass"   placeholder="    User Password"/></center></li>
<li><center>
<button name="login"  class="btn">LOGIN</button></center>
</li>
</ul>
</form>

</div><br/>
</div>
<?php
session_start(); 
include_once( "../connect.php");
  if(isset($_POST['login'])){ 

 $a=test_input($_POST['user']);
  
$sql= "SELECT * FROM admin WHERE username='$a'"; 
 $res = mysql_query($sql); 
 if($res){ 
  $row= mysql_fetch_assoc($res); 
   
  
  $pwd=$row['password'];
 
   
    
  if($_POST['pass']==$pwd){
 $_SESSION['s2id']=session_id();
 echo "<script>alert('Successfully Logged In...');</script>";
    echo "<script>window.location='skill.php';</script>";              
  
  }
  else{
     echo "<script>alert('Worng details...');</script>";
                  
  }

  }}
function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
?>

</body>
</html>