<?php
	session_start();
	//echo $_POST['content'];
	if (array_key_exists("content",$_POST)) {
		echo  $_POST['content'];
		$link = mysqli_connect("shareddb-i.hosting.stackcp.net","secretDiary-3335535c","jPeng1221qwaszx","secretDiary-3335535c");
		if (mysqli_connect_error()){
			die("Database Connection Eror");
		}
		$query="UPDATE users SET Diary=
		'".mysqli_real_escape_string($link,$_POST['content'])."' WHERE id = ".mysqli_real_escape_string($link, $_SESSION['newId'])." LIMIT 1";
		
		
		mysqli_query($link,$query);
		
		
		
		
		
		
	}



?>
