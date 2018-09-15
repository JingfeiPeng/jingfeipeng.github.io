<?php
	session_start();
	
	$_SESSION['test'] = 3;
	$error ="";
	if (array_key_exists("logout",$_GET)){
		unset($_SESSION);
		setcookie("id","",time()-60*60);
		$_COOKIE["id"] = "";
	} else if ((array_key_exists("id",$_SESSION) AND $_SESSION['id'])OR
				(array_key_exists("id",$_COOKIE) AND $_COOKIE['id'])){
		header("Location:diaryloggedinpage.php");
	}
	
	
	if (array_key_exists("submit",$_POST)){
		
		$link = mysqli_connect("shareddb-i.hosting.stackcp.net","secretDiary-3335535c","jPeng1221qwaszx","secretDiary-3335535c");
		
		if (mysqli_connect_error()){
			die("Database Connection Eror");
			
		}
			
		if (!$_POST['email']){
			$error .="<br>An email address is required";
			
		}
		if (!$_POST['password']){
			$error .="<br>Password is required";
		}
		if (strlen($_POST['password'])<6){
			$error .="<br>Password must be over 6 characters";
		}
		if ($error !=""){
			$error ="<p> There were error(s) in your form:".$error;
			
		}else if ($_POST['signup']=='1'){
			
			$query="SELECT id from users WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";
			
			$result=mysqli_query($link,$query);
			
			
			if (mysqli_num_rows($result)>0){
				$error= "That email address is taken";
			
			} else {
				$query ="INSERT INTO users (email,password) VALUEs ('".mysqli_real_escape_string($link, $_POST['email'])."',
						'".mysqli_real_escape_string($link, $_POST['password'])."')";
			
				if(!mysqli_query($link, $query)){
					$error = "<p> Could not sign you up, please try again later</p>";
				} else{
					$_SESSION['id']=mysqli_insert_id($link);
					echo $_SESSION['id'];
					$_SESSION['userId'] = $_SESSION['id'];
					$idNum =  mysqli_insert_id($link);
					$query = "UPDATE users SET password ='".md5(md5($idNum).$_POST['password'])."'WHERE id=".$idNum." LIMIT 1";
					if(mysqli_query($link,$query)){
	
						if (isset($_POST['stayLoggedIn'])){
							setcookie("id",$idNum,time()+60*60*24);
						}
			ss			header("Location: diaryloggedinpage.php");
					}
				}
			}
		} else{
			$query ="SELECT * FROM users WHERE email ='".mysqli_real_escape_string($link,$_POST['email'])."'";
			$result = mysqli_query($link,$query);
			$row = mysqli_fetch_array($result);
			if (isset($row)){
				$hashedPassword = md5(md5($row['id']).$_POST['password']);
				if ($hashedPassword == $row['password']){
					$_SESSION['id'] = $row['id'];
					
					if (isset($_POST['stayLoggedIn'])){
						setcookie("id",$row['id'],time()+60*60*24);
					}
					header("Location: diaryloggedinpage.php");
					
				} else{
					$error = "That email/password combination could not be found.";
				} 
					
			}else{
					$error = "That email/password combination could not be found.";
				}
			
		}
		
	}

?>
<?php include("header.php"); ?>

	<div class="container" id="homepageCon">
	<h1> Secret Diary </h1>
	<p><strong> Store your thoughts permantly and secure</strong> </p>
		<div id="error">
			<?php if ($error!==""){
				echo "<div style='color:black;text-shadow:none;' class='alert alert-danger' role='alert'>".$error."</div>";
				
				
			}?></div>
	
		<form method="post" id="signUpForm">
		<p> Interested? Sign up now</p>
		<div class="form-group">
			<input type="email" class="form-control" name="email" placeholder="Your Email">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="password">
		</div>
		<div class="form-group">
			<input  type="checkbox"  name="stayLoggedIn" value=1>
			stay logged in
		</div>
		<div class="form-group">
			<input type="hidden" name="signup" value="1">
			<input type="submit" class="btn btn-success" name="submit" value="Sign Up!">
		</div>
		
		<p>Already have an account? <a style="text-decoration:underline"class="toggleForms">Log In </a></p>
			
		</form>

		<form method="post" id="logInForm">
			<p> Login using your email and password</p>
			<div class="form-group">
				<input type="email" class="form-control" name="email" placeholder="Your Email">
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="password" placeholder="password">
			</div>
			<div class="form-group">
				<input type="checkbox" name="stayLoggedIn" value=1>
				stay logged in
			</div>
			<div class="form-group">
				<input type="hidden" name="signup" value="0">
				<input type="submit" class="btn btn-success" name="submit" value="Log In!">
			</div>
		<p>Don't have an account? <a style="text-decoration:underline" class="toggleForms href="#">Sign Up</a></p>
		</form>
		
		

<?php include("footer.php"); ?>
