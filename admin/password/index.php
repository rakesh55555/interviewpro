<html lang="en-us">

<head>
<title>InterviewPro</title>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<style>

*{margin:0; padding:0}
body{background:#000; }
.form{width:400px; margin:0 auto; background:#fff; margin-top:10px}
.header{height:44px; background:#17233B}
.header h2{height:44px; line-height:44px; color:#fff; text-align:center}

.inp{background:#12192C; width:90%; border-radius:0 3px 3px 0; border:none; outline:none; color:#999; font-family: 'Source Sans Pro', sans-serif} 
.inp{display:inline-block; vertical-align:top; height:40px; line-height:40px; background:#12192C;}

.btn2{height:40px; border:none; background:#0C6; width:25%; outline:none; font-family: 'Source Sans Pro', sans-serif; font-size:20px; font-weight:bold; color:#eee; border-bottom:solid 3px #093; border-radius:3px; cursor:pointer}
.btn1{height:40px; border:none; background:#27273D; width:25%; outline:none; font-family: 'Source Sans Pro', sans-serif; font-size:20px; font-weight:bold; color:#eee; border-bottom:solid 3px #27273D; border-radius:3px; cursor:pointer}

ul li{height:40px; margin:15px 0; list-style:none}

</style>
</head>
<body>
	<?php
$con = mysql_connect("localhost","root","123") or die("error to connect");
	mysql_select_db("interview_pro_data",$con);
?>
	<p style=" margin-left:100px; "><a href='../skill.php'><font size="5" color="red" > Skills</font></a><br>
		<a href='../admininput.php'><font size="5" color="red" > Practice set</font></a>
<a  style="float:right; margin-right:100px;" href='../logout.php'><font size="5" color="red" >  Logout</font></a></p><br><br>
<div class="form">
<div class="header"><h2>Update admin Password</h2></div>
<div class="login">
<form  action=" " method="post" >
<ul>
<li><center><input type="password"  class="inp"  name="key"    placeholder=" Enter admin Secrete Key"  /></center></li>
<li><center><input type="password"  class="inp"  name="newpass"    placeholder=" Enter New Password"  /></center></li>
<li><center>
<button name="submit"  class="btn2">Submit</button>
<?php

if(isset($_POST['submit'])){ 
$a=$_POST['key'];
$b=$_POST['newpass'];

  $res = mysql_query("SELECT * FROM admin ");
             
              if($row= mysql_fetch_assoc($res))
               {
               	if($row['key']==$a){
               $sql1=" UPDATE  `admin` SET `password`= '$b'";
                if(mysql_query($sql1)){ echo "<br><b><font size='4' color='red'>Password successfully changed</font></b>";

               session_start();
	               session_destroy();

                 }

               	}
               	else{echo "<br><b><font size='4' color='red'>Key didn't match</font></b>";}

               }



}


?>
</center></li>
</ul>
</form>
</body>
</html>