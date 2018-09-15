<?php
	session_start();
	$error ="";
	if (array_key_exists('email',$_POST)OR array_key_exists('password',$_POST)){
	$link = mysqli_connect("shareddb-h.hosting.stackcp.net","usersData-33317dae","jPeng1221qwaszx*","usersData-33317dae");
	if ( mysqli_connect_error()){
		die ("There was an error connecting to the database");
	}
	
	if ($_POST['email'] == ''){
		echo "<p> Email address is required </p>";
		
	} else if ($_POST['password']==''){
		echo "<p> Password is required";	
	} else{
		$email =$_POST['email'];
		$pass =$_POST['password'];
		$query="SELECT * FROM users WHERE email='".mysqli_real_escape_string($link,$email)."'";
		$result= mysqli_query($link,$query);
		
		if (mysqli_num_rows($result) >0){
			$error = "This email is already registered";
		}else{
			$query="INSERT INTO users (email,password) VALUES 
			('".mysqli_real_escape_string($link,$email)."','".mysqli_real_escape_string($link,$pass)."')";
			if (mysqli_query($link,$query)){
				$error="Sign up successful!";
				
			
				$_SESSION['email'] = $_POST['email'];
				header("Location:session.php");
				
				
			}else{
				 $error = "<p> There was a problem signing you up</p> ";
			}
			
		}
	}

	//$query = "UPDATE users SET password='ThisIsMaybeHardtoGuess' WHERE email ='pengjefferbms@gmail.com' LIMIT 1";
	
	//$query = "INSERT INTO users (email,password) VALUES('Stalin@gmail.com','SovietIsGood')";
	
	//$result = mysqli_query($link,$query);
	
	//if ($result){
	//	while ($row = mysqli_fetch_array($result)){
	//		print_r($row);
	//	}
	//}

	}

?>

<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Sign Up Form</title>
	<style type="text/css">

	
	</style>
  </head>
  <body>
		<form method = "POST">
		  <div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
		  </div>
		  <button type="submit" class="btn btn-primary">Sign up</button>
		</form>
		<div>
		<?php echo $error; ?>
		</div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>