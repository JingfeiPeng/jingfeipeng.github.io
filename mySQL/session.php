<?php
	//setcookie("customerID","1234",time()+60*60*24);
	//setcookie("customerID","1234",time()+60*60*24);
	//$_COOKIE["customerID"] = "test";
	//echo $_COOKIE["customerID"];
	session_start();
	echo $_SESSION['email'];
	echo $_SESSION['id'];
	echo "<br>".$_SESSION['test2'];
	
	
	
?>
