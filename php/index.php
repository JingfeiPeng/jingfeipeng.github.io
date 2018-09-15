<?php
	$weather="";
	$error="";
	if (array_key_exists('city',$_GET)){
		error_reporting(E_ERROR | E_PARSE);
		
		$city = str_replace(' ','',$_GET['city']);
		$urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."&appid=4b004762322691686ad742fb9db17fc3");

		$weatherArray = json_decode($urlContents, true);
		
		if ($weatherArray['cod'] ==200){
			$weather = "The Weather in ".$_GET['city']." is currently '".$weatherArray['weather'][0]['description']."'.";
			$tempInCelcius = intval($weatherArray['main']['temp']-273);
			$speed = intval(3.6*$weatherArray['wind']['speed']);
			$weather .=" The temperature is ".$tempInCelcius."&deg;c and the wind speed is ".$speed."km/h.";
			$weather .=" The humidity is ".$weatherArray['main']['humidity']."%.";
		} else{
			$error=$_GET['city']." could not be found";
			
		}
		
		
		/* ------------------- get DATA using Scrapping
		$city = str_replace(' ','',$_GET['city']);
		
		$file_headers = @get_headers("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        
        
        if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
    
            $error = $city." could not be found.";

        } else{
			$forcastPage=file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        
			$pageArray = explode('3 days)</span><p class="b-forecast__table-description-content"><span class="phrase">', $forcastPage);
			
			if (sizeof($pageArray)>1){
				$secondpageArray = explode('</span>',$pageArray[1]);
				if (sizeof($secondpageArray) > 1){
				$weather =  $secondpageArray[0];
				} else {
					$error="The website weather-forecast.com has changed format. We could no longer get information from it";
				}
			}else{
				$error=$city."could not be found.";
			}
		}*/
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Weather Scraper</title>
	<style type="text/css">
		html{
		  background: url(/images/backgroundPhp.jpg) no-repeat center center fixed; 
		  background-size:100% 100%;
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
			
		}
		body{
			background:none;
			text-align:center;
		}
		.container{
			margin-top:20%;
			color:white;
			width:450px;
		}
		.visible{
			text-shadow: 2px 2px black;
			
		}
		#weather{
			margin-top:5%;
			
		}
	
	
	</style>
	
	
	
  </head>
  <body>
	<div class="container">
		<h1 class="visible"> What's the weather? </h1>
		<p class="visible"> Enter the name of a city </p>
		<form>
		  <div class="form-group">
			<input type="text" class="form-control" name="city" id="city" aria-describedby="emailHelp" placeholder="Eg,Toronto, Beijing, Tokyo"
			value = "<?php 
				if (array_key_exists('city',$_GET)){
					echo $_GET['city'];
				}
			?>"
			>
			
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
		
		<div id="weather"> <?php
			if ($weather){
				echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
			} else if ($error){
				echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
			}


		?>
		</div>
		
		
		
		
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript">
	
		
		
		
		
	</script>
  
  
  
  
  
  
  </body>
</html>