
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

	@media only screen and (max-width:770px){
        #info{
            width:90%;
        }
	}
	</style>
	</head>
	
    <body>
	<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark py-1 space">
	  <a class="navbar-brand py-1" id="logo" href="#"><em>JP</em></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse menu-margin" id="navbarTogglerDemo02">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		  <li class="nav-item menu-margin">
			<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item menu-margin">
			<a class="nav-link" href="project.html">Porfolio</a>
		  </li>
		  <li class="nav-item active menu-margin">
			<a class="nav-link" href="contact.html">Contact</a>
		  </li>
		  <li class="nav-item menu-margin">
			<a class="nav-link"onclick="underConstruction()" href="#">Games</a>
		  </li>
		  <li class="nav-item menu-margin">
			<a class="nav-link" onclick="underConstruction()" href="#">Resume</a>
		  </li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
		  <input class="form-control mr-sm-2" type="search" placeholder="Search">
		  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
	  </div>
	</nav>
	<div class="clear"></div>
	
	
	


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="clear"></div>
	<footer id="footer">
		<div class="container">
		<p>
			<div class="row">
				<div class="col-sm"><b>&copy; Jingfei Jeffer Peng 2018</b></div>
				<div class="col-sm"><b>features</b></div>
				<div class="col-sm"><b>placeholder</b></div>
				<div class="col-sm"><b>sources</b></div>
			</div>
			<div class="row" style="color:#CBCFD1">
				<div class="col-sm"></div>
				<div class="col-sm"><a href="index.php">Home</a></div>
				<div class="col-sm">placeholder sub-index</div>
				<div class="col-sm"><a href="disclaimer">references</a></div>
			</div>
			
		</p>
		</div>
	</footer>
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
