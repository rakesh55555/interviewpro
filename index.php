<html>
<head><title>Interview Pro</title>
  <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/custom1.css" rel='stylesheet' type='text/css' />
<link href="css/jasny-bootstrap.min.css" rel='stylesheet' type='text/css' />
</head>
<body style="background-color:black;" >
<?php include('connect.php');?>

<TABLE   width="100%" height="100%"  cellpadding="0" cellspacing="0" >

<tr valign="top"><td width="100%">
 <?php include('head.php');  ?></td>
</tr>
<tr vallign="top"><td>
<center><img src="img/welcome.png" height="50px" width="200px"></center>
<p class="text-info"><b><font color="white" >Hire the best developers,


Don't waste time interviewing developers who aren't suitable for the job. Find out quickly how well someone can suitable for your requirement . With Interview Pro, you set your own Requirement and watch which candidates are suitable for your company. 


This is a just a glimpse into what we're building. To get full access to our online interview engine, sign up below .</font></b></p>
<div >
   <div  class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div  id="hrlogin" class="panel panel-info" >
            <div class="panel-heading"><h4 style="padding:0px; text-align:center; alignment-adjust:central;">HR can login here</h4>
            </div>
                  <div >
                    <p>Best employee can make a company best among all.</br>Chose the the employee for your company who can explore their knowledge. HR from any company can log into the web site and can search for the candidates whom they want.<br>HR can also see the Cv of any student whom they search and can fix their interview<br><br><br><br><br><br></p>
                    <center><a href="hrlogin.php"><button class="button"><h3><b>LOGIN</b></h3></button></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="hrsignup.php"><button class="button"><h3><b>SIGN UP</b></h3></button></a>
                   <br><br>
                   <p><b>HR Section</b></p></div></center>
                </div>
          </div>
        
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
         <div  id="hrlogin" class="panel panel-info">
            <div class="panel-heading"><h4 style="padding:0px; text-align:center; alignment-adjust:central;">Candidates can login here</h4>
            </div>
               <div >
                  <div>
                    <p>Best sudents come her.Get a job in acompany of your own choice .Just upload your cv and get a job in your hand.<br><br>Students can also see the requirement of any company whom they search and can fix their interview<br><br><br><br><br><br></p>
                   <center> <a href="candlogin.php"><button class="button"><h3><b>LOGIN</b></h3></button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="candsignup.php"><button class="button"><h3><b>SIGN UP</b></h3></button></a> <br><br>
                    <p><b>Candidate Section</b></p></center>
                   </div>
                </div>
          </div>
        </div> 
        </div>
</div>
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
