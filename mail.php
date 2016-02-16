<?php
  session_start();
  if($_SESSION['s1id']==session_id())
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
  <a  href="pool.php"><font size="4" color="#33ccff" style="margin-left:50"><span id="hmbtn"><span class="glyphicon glyphicon-book"></span>&nbsp;Tallent Pool</span></a>
 <?php echo "<p style='float:right;'>Welcome to you  ".$_SESSION['name1']."<br><a href='logout1.php'>Logout</a></p>";
  }
  else
  {
    echo "<script>alert('You Must Login First...');</script>";
                  echo "<script>window.location='hrlogin.php';</script>";
  }
?></nav>


</td>
</tr>



<tr vallign="top"><td >
   <center><div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
            
<div class="container container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <div></div>
            <div>
              <?php
               include('connect.php');
$n=$_REQUEST['id'];
$re = mysql_query("SELECT * FROM candidate_profile  where profid=".$n);
      if($rown= mysql_fetch_assoc($re))
               { $n1=$rown['name']; 
             
              echo "<h3 style='padding:0px; margin:0px; alignment-adjust:central; text-align:center;''>send mail to  ".$n1." </h3>";} ?>
            </div>
            
            </div>
      <div class="panel-body">
 <form class="form-horizontal" action="" method="post">
  <?php
 
$n=$_REQUEST['id'];
$re = mysql_query("SELECT * FROM candidate_profile  where profid=".$n);
      if($rown= mysql_fetch_assoc($re))
               { $n1=$rown['email']; }

            echo " <center><label for='mailto'><span class='glyphicon glyphicon-euro'></span>&nbsp;Email To:</label>";
            echo " <input type='text' name='mailto' value='$n1' ><br><br>";
  ?>
 
 
 <label for="from"><span class="glyphicon glyphicon-user"></span>&nbsp;From:&nbsp;&nbsp;&nbsp;&nbsp;</label>
  <input type="text" name="from" placeholder="Email" required ><br><br>
 <label for="sub"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Subject:</label>
  <input type="text" name="sub" placeholder="subject" required ><br><br>
  <label for="msg" style="vertical-align:top;"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Message:&nbsp;&nbsp;</label>
  <textarea rows="4" cols="20" name="msg" required></textarea><br><br>
  <input type="submit" name="sendmail" value="send"><br>


<?php  
if(isset($_POST['sendmail'])){
          $to = $_POST['mailto'];
         $subject = $_POST['sub'];
         
         $message = $_POST['msg'];
        
         $f=test_input($_POST['from']);
          if (!filter_var($f, FILTER_VALIDATE_EMAIL)) {
      
    
  echo "<script>alert('Invalid Email...Try Again......');</script>";
   echo "<script>window.location='';</script>";

}

         $header = "From:".$f."\r\n";
        
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
           echo "<script>alert('Mail Sent ...');</script>";
                  echo "<script>window.location='';</script>";
         }else {
           echo "<script>alert('Mail Could not sent...');</script>";
                  echo "<script>window.location='';</script>";
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
  </td></tr>
 <tr>
    <td colspan="2">
      <?php include('foot.php');  ?>
    </td>
  </tr>
</TABLE>
</body>
  </html>

