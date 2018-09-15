
<!DOCTYPE html>
<html>
  <head>
    <title>Email App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
    <link rel="stylesheet" href="app.min.css">
    <style>
      /* TODO */
	  
	@-webkit-keyframes pulse {
		0% {
			background-color: #CCC;
		}
		25% {
			background-color: #EEE;
		}
		50% {
			background-color: #CCC;
		}
		75% {
			background-color: #EEE;
		}
		100% {
			background-color: #CCC;
		}
	}
		
    </style>
  </head>

  <body>
    <div class="app-page" data-page="home">
      <div class="app-topbar">
        <div class="app-title">Send An Email</div>
		
      </div>
      <div class="app-content">
		<p class="app-section">
			Click below to send an email
		</p>
		<div class="app-section" id="contact-list">
			<div class="app-button" data-target="sendemail">List of Already Sent Recipients</div>
		</div>
		
        <div class="app-section">
          <div class="app-button" id="new-user">send to new user
        </div>
      </div>
    </div>
	</div>
	
	<div class="app-page" data-page="sendemail">
		<div class="app-topbar">
			<div class="app-title">Send Email</div>
			<div class="right app-button" data-back>Done</div>
		</div>

		<div class="app-content">
			<div class="app-section" id="message">
			</div>
			
			<div class="app-section">
				From: <input class="app-input" type="email"  id="sender-email" placeholder="Sender Email Address">
			</div>
			<div class="app-section">
				To: <input class="app-input" id="recipient-email" placeholder="Recipient Email Address">
			</div>

			<form class="app-section">
				<input class="app-input" name="subject" id="subject" placeholder="Subject">
				<textarea class="app-input" name="message" id="content" placeholder="Message"></textarea>
				<div class="app-button green app-submit" id=
				"send-button">Send</div>
			</form>
		</div>
	</div>
	
    <script src="zepto.js"></script>
    <script src="app.min.js"></script>
    <script>

	
	
      App.controller('home', function (page) {
		if (typeof localStorage !=='undefined'){
			$(page).find("#new-user")
				.clickable()
				.click(function(){
					if (localStorage.getItem("recipient-email") !== null){
						localStorage.removeItem("recipient-email");
					}
					App.load("sendemail");
				});
			
			if (localStorage.getItem("recipient-list") !== null){
				var recipientList = JSON.parse(localStorage.getItem("recipient-list"));
				$.each(recipientList,function(index, value){
					$(page).find("#contact-list").append('<div class="app-button redirect">' + value + "</div>");
					$(page).find("#contact-list").show();
					$(page).find(".redirect")
						.clickable()
						.on("click",function(){
						localStorage.setItem("recipient-email",$(this).html());
						App.load('sendemail');						
					});
				});
			} else{
				$(page).find("#contact-list").hide();
				
			}
		}
      });
	  
	  App.controller('sendemail', function (page) {
		  $(page).find("#message").hide();
			
		  if (typeof localStorage !== "undefined"){
			  if (localStorage.getItem("sender-email") !== null){
				  $(page).find("#sender-email").val(localStorage.getItem("sender-email"));
			  }
			  if (localStorage.getItem("recipient-email") !== null){
				  $(page).find("#recipient-email").val(localStorage.getItem("recipient-email"));
			  }
		  } 
		  
		$(page).find("#send-button").clickable().on('click',function(){	  
			  $.ajax({
				  type: 'GET',
				  url: 'http://jingfeipeng.tech/mobileApp/appjs/sendemail.php?callback=response',
				  // data to be added to query string:
				  data: { 	to: $("#recipient-email").val(),
							from: $("#sender-email").val(),
							subject:	$("#subject").val(),
							message:$("#content").val() },
				  // type of data we are expecting in return:
				  dataType: 'jsonp',
				  timeout: 300,
				  context: $('body'),
				  success: function(data){
					// Supposing this JSON payload was received:
					//   {"project": {"id": 42, "html": "<div>..." }}
					// append the HTML to context object.
					if (data.success== true){
						$(page).find("#message").html("Your email was sent successfully").show();
					} else{
						$(page).find("#message").html("Your email couldn't not be sent").show();
					}
				  },
				  error: function(xhr, type){
					$(page).find("#message").html("Your email couldn't not be sent due to ajax error").show();
				  }
				});
			
				if (typeof localStorage !== 'undefined') {
                  localStorage.setItem("sender-email", $("#sender-email").val());
                  var recipientList = new Array();
                  if (localStorage.getItem("recipient-list") !== null) {
                      recipientList = JSON.parse(localStorage.getItem("recipient-list"));
                  }
                  if ($("#recipient-email").val() !=="" &&$.inArray($("#recipient-email").val(), recipientList) == -1) {   
                      recipientList.push($("#recipient-email").val());
                      recipientList.sort();
					  console.log(recipientList);
                      localStorage.setItem("recipient-list", JSON.stringify(recipientList));
                  }
              } else {
                  alert("local storage is not working");
              }
		});
      });

      

      try {
        App.restore();
      } catch (err) {
        App.load('home');
      }
    </script>
  </body>
</html>
