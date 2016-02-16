<?php

	
    
    session_start();
	session_destroy();
	setcookie(PHPSESSID,session_id(),time()-1);
echo "<script>alert('Successfully Logged Out...');</script>";
                  echo "<script>window.location=' index.php';</script>";
?>