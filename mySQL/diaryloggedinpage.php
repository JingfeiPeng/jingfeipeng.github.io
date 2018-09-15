<?php
	session_start();
	$diaryContent = "";
	if (isset( $_SESSION['test'])){
		echo $_SESSION['id'].'<br>';
		echo $_SESSION['test'];
		
	}
	if (array_key_exists('id',$_COOKIE)){
		$_SESSION['id']=$_COOKIE['id'];
	}
	
	if (array_key_exists("id",$_SESSION)){
		$link = mysqli_connect("shareddb-i.hosting.stackcp.net","secretDiary-3335535c","jPeng1221qwaszx","secretDiary-3335535c");
		if (mysqli_connect_error()){
			die("Database Connection Eror");
		}
		$query = "SELECT diary FROM users WHERE id=".$_SESSION['id']." LIMIT 1";
		$row = mysqli_fetch_array (mysqli_query($link, $query));
		$diaryContent = $row['diary'];
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
		<p style="display:inline;"><?php echo $userName; ?> </p>
		<ul class="navbar-nav">
		  <li class="nav-item active">
			<a class="nav-link" href='secretD.php?logout=1'>Log Out</a>
		  </li>
		</ul>
	  </div>
	</nav>


	<div class="container" id="containerLoggedInPage">
		
		<textarea id="diary" class="form-control"><?php echo $diaryContent; ?></textarea>
		
	</div>
	
	
	
	
	
<?php
	include("footer.php");


?>