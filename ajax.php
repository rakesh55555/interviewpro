<?php
	include('connect.php');
	if(isset($_POST['getid']))
	{
		$bid = $_POST['getid'];
$sql="SELECT * FROM states  WHERE country_id=$bid ";
		$result = mysql_query($sql);
		echo "<option value='0' selected>select State</option>";
		while($row = mysql_fetch_assoc($result))
		{
		
		echo "<option value='".$row['name']."'>".$row['name']."</option>";

		}

			
	}


	