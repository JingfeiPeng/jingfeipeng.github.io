		$(".toggleButton").hover(function(){
			$(this).addClass("highlightedbutton");
			
		},function(){
			$(this).removeClass("highlightedbutton");
		});
		
		$(".toggleButton").click(function(){
			$(this).toggleClass("active");
			$(this).removeClass("highlightedbutton");
			var panelId = $(this).attr("id")+"Panel";
			$("#"+panelId).toggleClass("hidden");
			var numOfActivePanels = 4-$('.hidden').length;
			$(".panel").width(($(window).width()/numOfActivePanels)-10);
		});
		$("textarea").height($(window).height()-$("header").height()-15)
		$(".panel").width(($(window).width()/4)-10);
		
		function updateOutput(){
			$("iframe").contents().find("html").html("<html><head><style type='text/css'>"
			+ $("#cssPanel").val()+
			"</style></head><body>"+
			$("#htmlPanel").val()
			+"</body></html>"
			);
			
			document.getElementById("outputPanel").contentWindow.eval($("#javascriptPanel").val());
		
		}
		updateOutput();
		$("textarea").on('change keyup paste',function(){
			updateOutput();
		});
		
		