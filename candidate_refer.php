 <?php
  session_start();
  if($_SESSION['sid']==session_id())
  {?>
<html>
<head><title>Interview Pro</title>
   <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
 
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

<div >
   <div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div  id="cand_New" class="panel panel-info">
            <div class="panel-heading"><h4 style="padding:0px; text-align:center; alignment-adjust:central;">!!! Welcome dear  <?php echo $_SESSION['name'];?> !!!</h4>
            </div><div class="panel-body">
               <?php include('slide.php');?>

               <br><center><a href="input.php"><button name="refer" style="border-radius:15px; height:50px; width:100px; background-color:#33ccff;"><font color="black" >Get Started</font></button></a></center>


                  </div></div></div>

</td></tr>
 <tr>
    <td colspan="2">
       <?php include('foot.php');  ?>
    </td>
  </tr>
  
</TABLE>
</body>
</html>
