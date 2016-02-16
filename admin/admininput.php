 <?php
  session_start();
  if($_SESSION['s2id']==session_id())
  {  ?>


<html lang="en-us">

<head>
<title>InterviewPro</title>
<link href="../css/bootstrap.css" rel='stylesheet' type='text/css' />
<style>

*{margin:0; padding:0}
body{background:#000; }

.header{height:44px; background:#17233B}
.bg-primary h2{height:44px; line-height:44px; color:#fff; text-align:center}

.inp{background:#12192C; width:90%; border-radius:0 3px 3px 0; border:none; outline:none; color:#999; font-family: 'Source Sans Pro', sans-serif} 
.inp{display:inline-block; vertical-align:top; height:40px; line-height:40px; background:#12192C;}

.btn2{height:40px; border:none; background:#0C6; width:25%; outline:none; font-family: 'Source Sans Pro', sans-serif; font-size:20px; font-weight:bold; color:#eee; border-bottom:solid 3px #093; border-radius:3px; cursor:pointer}
.btn1{height:40px; border:none; background:#27273D; width:25%; outline:none; font-family: 'Source Sans Pro', sans-serif; font-size:20px; font-weight:bold; color:#eee; border-bottom:solid 3px #27273D; border-radius:3px; cursor:pointer}

ul li{height:40px; margin:15px 0; list-style:none}

</style>
</head>
<body>
	<?php include('../connect.php'); ?>
	<p style=" margin-left:100px; "><a href='skill.php'><font size="5" color="red" > Skills</font></a><br>
		<a href='admininput.php'><font size="5" color="red" > Practice set</font></a>
<a  style="float:right; margin-right:100px;" href='logout.php'><font size="5" color="red" >  Logout</font></a></p><br><br>
<div  class='col-lg-4 col-sm-12 col-md-4 col-xs-12'>
  <div class='panel panel-primary'>
        <div class='panel-heading'><h4>Add Practice sets</h4></div>
        
     
<div class='panel-body'>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
<ul>
<li><center>
<select class="inp" name="skill" required>
	<option value="0" selected="selected" disabled="disabled">Select Subject</option>
 <?php 
                    $result1 = mysql_query("select * from skill_master ");
                    while($row1 = mysql_fetch_assoc($result1))
                      {
                        echo "<option value='".$row1['skillid']."'>".$row1['skillname']."</option>";
                      }
                  ?>    
</select>

</center></li>	
<li>
<center><input type="text"  class="inp"  name="name"    placeholder="    Enter Practice name"  /></center></li>
<li><center>
	<input type="file"  class="inp"   accept="application/pdf"  name="file1"  ></input>
</center></li>
<li><center>
<button name="submit"  class="btn2">Submit</button>
<button name="update"  class="btn1" >Update</button>
</center></li>
</ul>
<?php 

 if(isset($_POST['submit'])){ 
  
  $a=$_POST['skill'];

  $b=$_POST['name'];
 

  if(!$_FILES['file1']['error'])
        {
          $nm=$_FILES["file1"]["name"];

          move_uploaded_file($_FILES["file1"]["tmp_name"], "uploads/practice/".basename( $_FILES["file1"]["name"]));
          
         }
        

        
   
            
         if (mysql_query("INSERT INTO `interview_pro_data`.`practice_set` (`id`, `name`, `skillid`, `nqn`) VALUES ('', '$b', $a,'$nm') ")) {
     echo "<script>alert('Succefully Inserted ')</script>";
     echo "<script>window.location='';</script>";


 }
}
?>

</form>

</div><br>
<br>
</div></div></div><form method="post" action="">
<?php
if(isset($_POST['update'])){
     $i=1;
$a=$_POST['skill'];
 echo "<div class='container container-fluid'>
  <center>
    <div class='col-lg-8 col-sm-12 col-md-8 col-xs-12' style='float:right; margin-top:10px; '>
    <div class='panel panel-primary'>
        <div class='panel-heading'><h4>Update Practice sets</h4></div>
        
     
<div class='panel-body'>
   <form method='post' action='jobdecp.php'>
 <table class='table table-striped table-hover '>
              <thead>
                <tr class='info'>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Action </th>
                   
                    </tr>";
 $res = mysql_query("SELECT * FROM practice_set where skillid=".$a);
 if(mysql_num_rows($res)>0){
 while($row= mysql_fetch_assoc($res))
{
                  $nm=$row['name'];
                  $id=$row['id'];

              if($i%2==0)
                  {
                    echo "<tr class='warning'>";
                  }
                  else
                  { 
                    echo "<tr class='danger'>";
                  } 
                   echo "<td>".$i++."</td>";

                   echo "<td>".$nm."</td>"; 
                 echo "<td><button name='delete' type='submit' value='".$id."' class='btn btn-danger'>Delete</button></td></tr>"; 


}
}
else {echo "<tr ><td colspan='3'><center><font size='5' color='red'><b>No results found</b></font></center></td></tr>";}


}
if(isset($_POST['delete'])){
$sql1=" SELECT * FROM `practice_set` WHERE `id`=".$_POST['delete'];
 $sql=" DELETE FROM `practice_set` WHERE `id`=".$_POST['delete'];
           $result=mysql_query($sql1);
           $row1=mysql_fetch_assoc($result);   
                if(mysql_query($sql))
                {
                  @unlink("uploads/practice/".$row1['question']);
                  echo "<script>alert('Successfully Deleted...');</script>";
                  echo "<script>window.location='';</script>";
                }



}





?>


</form>
</table>

</body>
</html>
<?php 
  }
  else
  {
    echo "<script>alert('You Must Login First...');</script>";
                  echo "<script>window.location='index.php';</script>";
  }
?>