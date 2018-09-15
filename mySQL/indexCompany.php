<?php
		$company ="";
		$firstName = "";
		$BNnumber = "";
		$lastName = "";
		$contact = "";
		$endPeriod = "";
		if (array_key_exists("companyNAME",$_GET)){
			$link = mysqli_connect("shareddb-h.hosting.stackcp.net","company-33311ce0","jPeng1221qwaszx*","company-33311ce0");
			if ( mysqli_connect_error()){
				die ("There was an error connecting to the database");
			}
		
			//$query = "UPDATE companyData SET password='ThisIsMaybeHardtoGuess' WHERE email ='pengjefferbms@gmail.com' LIMIT 1";
			
			//$query = "INSERT INTO companyData (email,password) VALUES('Stalin@gmail.com','SovietIsGood')";
			
			//mysqli_query($link,$query);
			
			$query="SELECT * FROM companyData where Company like '%".mysqli_real_escape_string($link,$_GET['companyNAME'])."%'";
			$result= mysqli_query($link,$query);
			if ($result){
				while ($row = mysqli_fetch_array($result)){
					$company = $row['Company'];
					$BNnumber = $row[2];
					$firstName = $row[3];
					$lastName = $row[4];
					$endPeriod = $row[5];
					$contact = $row[6];
				}
			}
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

    <title>Company Data</title>
	<style type="text/css">
	@page { size: auto;  margin: 0mm; }
	#div1{
		margin-left:120px;
		margin-top:100px;
		background-image:url("companyData.png");
		width:1000px;
		height:1200px;
		background-size:90%;
		background-repeat:no-repeat;
		-webkit-print-color-adjust: exact;
		
	}
	.text{
		font-style:italic;
		color:blue;
		font-size:113%;
	}
	#companyName{
		position:relative;
		left:270px;
		top:103px;
	}
	#BNnumber{
		position:absolute;
		left:800px;
		top:204px;
	}
	#FirstName{
		position:absolute;
		left:730px;
		top:248px;
	}
	#inputDIV{
		margin-top:300px;
		
	}
	#endPeriod{
		position:absolute;
		left:400px;
		top:517px;
		
	}
	#contact{
		position:absolute;
		left: 390px;
		top:248px;
		
	}

	
	</style>
  </head>
  <body>
  
  
  <div id="div1">
	<div id="companyName" class= "text">

		<?php 
			$lengthAllowed=33;
			$length = strlen($company);
			if ($length<$lengthAllowed){
				echo "<p>".$company."</p>";
				
			}else{
				echo '<p style="position:relative;top:-10px;">';
				for ($i = 0; $i<$lengthAllowed; $i++){
					echo $company[$i];
				}
				echo "<br>";
				for ($i = $lengthAllowed; $i <$length; $i++){
					echo $company[$i];
				}
				echo "</p>";
			}

		?>

	</div>
	
	<div id="BNnumber">
		<p class= "text">
		<?php 
			echo $BNnumber;
		?>
		</p>
	</div>
	
	<div id="FirstName">
		<p class= "text">
		<?php
			echo $firstName." ".$lastName;
		?>
		</p>
	</div>
	
	<div id="endPeriod">
		<p class="text">
			<?php echo $endPeriod; ?>
		</p>
	</div>
	<div id="contact">
		<p class="text">
			<?php echo $contact; ?>
		</p>
	</div>
  
  
  
  </div>
  
  	<div class="container" id="inputDIV">
		<form>
		  <div class="form-group">
			<label for="company">Company Name</label>
			<input type="text" class="form-control" name="companyNAME" id="company" aria-describedby="Company Name" placeholder="Company Name">
			<small id="companyHelp" class="form-text text-muted">You can input Full or Part of the Company Name.</small>
		  </div>
		  <button type="submit" class="btn btn-primary" onclick="hide()">Submit</button>
		</form>
	</div>
	  <script type="text/javascript">
		function hide(){
			document.getElementById("inputDIV").style.display = "none";
		}
	  
	  </script>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>




