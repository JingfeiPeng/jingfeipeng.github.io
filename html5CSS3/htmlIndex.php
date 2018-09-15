
<!DOCTYPE html>
<html>
  <head>
    <title>HTML 5 and CSS 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
	<style>
	#gradient{
		width:500px;
		height:200px;
		background-color:blue;
		background:linear-gradient(to bottom right,white,red,green,black,blue);
	}
	#radialgradient{
		width:500px;
		height:200px;
		background-color:blue;
		background: radial-gradient(white,blue);
	}
	#gradient2{
		width:500px;
		height:200px;
		background-color:blue;
		background:linear-gradient(to top right, yellow,green);
	}
	h2{
		text-shadow: 2px 2px 4px green;
		color:white;
	}
	h3{
		text-shadow: 0 0 5px red;
		color:white;
	}
	</style>
  </head>

  <body>
	<div id="gradient">
	<h2>This is gradient</h2></div>
	<div id="radialgradient"><h3>This is gradient</h3></div>
    <div id="gradient2"></div>
	
      <video width="320" height="240" controls id="video">
      
        <source src="video.mp4" type="video/mp4">
          
          Please upgrade your browser!
      </video>
      
        <button id="play">Play</button>
      
      
      <audio controls>
      
        <source src="audio.mp3" type="audio/mpeg">
          
          Please upgrade your browser!
          
      </audio>
      
      <script>
      
          document.getElementById("play").onclick = function() {
              
              if (document.getElementById("video").paused) {
              
                document.getElementById("video").play();
                  this.innerHTML = "Pause";
                  
              } else {
                  
                document.getElementById("video").pause();
                  this.innerHTML = "Play";
                  
              }
              
              
          }
            
      
      </script>
   
  </body>
</html>
