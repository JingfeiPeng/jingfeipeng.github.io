<?php
	session_start();
	$diaryContent = "";
	



	if (array_key_exists('newId',$_COOKIE)){
		$_SESSION['newId']=$_COOKIE['newId'];
	}
	
	if (array_key_exists("newId",$_SESSION)){
		$link = mysqli_connect("shareddb-i.hosting.stackcp.net","secretDiary-3335535c","jPeng1221qwaszx","secretDiary-3335535c");
		if (mysqli_connect_error()){
			die("Database Connection Eror");
		}
		$query = "SELECT * FROM users WHERE id=".$_SESSION['newId']." LIMIT 1";
		$row = mysqli_fetch_array (mysqli_query($link, $query));
		$diaryContent = $row['Diary'];
		$userName = $row['email'];
	}else{
		header("Location:secretD.php");
		
	}
	

	
	
	
	
	
	include("header.php");
?>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Secret Diary</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	  			<small style="margin-top:20px"> The diary will be automatically saved </small>

		<ul class="navbar-nav navbar-right ml-auto">
		  <li class="nav-item active">
		  </li>
		  <li class="nav-item active">
			<a class="nav-link"> Logged in as: <?php echo $userName; ?> </a>
		  </li>
		  <li class="nav-item active">
			<a style="padding:0px 10px;" class="nav-link float-right" href='index.php?logout=1'> <button class="btn btn-danger">Log Out</button></a>
		  </li>
		</ul>
	  </div>
	</nav>


	<div class="container" id="containerLoggedInPage">
		
		<textarea id="diary" name="diaryCon" class="form-control"><?php echo $diaryContent; ?></textarea>
		
	</div>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	
	
<?php
	include("footer.php");


?>