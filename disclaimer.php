
<!doctype html>
<html>
	<head>
    
	<title>Jingfei Jeffer Peng</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
	<style type="text/css">
	body{
		font-family: 'Fira Sans', sans-serif;
		margin:0;
		padding:0;
	}
	p{
		margin:0px;
		padding:0px;
	}		
	#logo{
			margin-left:15%;
			position:relative;
	}
	.menu-margin{
		margin:0 25px;
	}

	
	#footer{
		position:fixed;
		margin-top:4%;
		bottom:0;
		width:100%;
		text-align:center;

	}
	#footer a{
		color:#CBCFD1;
	}
	#footer p{
		padding-top:30px;
		font-size:120%;
	}
	#footer p{
		font-weight:200;
		
	}
	#disclaimer{
		margin-top:100px !important;
		text-align: center;
		width:500px;
		margin:0 auto;
	}
	@media only screen and (max-width:770px){
        #info{
            width:90%;
        }
	}
	</style>
	</head>
	
    <body>
	<?php include("navbar.php");?>
	<div class="clear"></div>
	
	<div id="disclaimer">
		<h2> Copyright Infomration</h2>
		<p> The four images on the home page were found using google search (except the school image). <p>
		<p>I do not have copyright for these four images.<p>
		<p>If you have copyright for them and would like them to be taken down, please contact me and I will take them down ASAP</p>
	
	
	</div>
	


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script type="text/javascript">
	$("#logo").click(function(){
		if ($(this).css("font-weight")=="400"){
			$(this).animate({
				left:"-=10%",
			},2000, function() {
				$(this).css("font-weight", "bold");
            });
		} else {
			$(this).animate({
				left:"+=10%",
			},2000,function(){
				$(this).css("font-weight","normal");
			});
		}});
	
		function underConstruction(){
			alert("This page is under construction. Come back later XD");
		}
	</script>
	
	</body>
</html>
