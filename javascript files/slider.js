// Reference: jQuery Image Slider from Helping Develop
// http://www.youtube.com/watch?v=5_P3Auq-U8c 
var numofslides = 4;
var sli = "explode";
var count = 1;

$(document).ready(function(){
	//to show the first image
	$(".slider #"+count).show("explode",2000).delay(2000);
	
	//to get text from img-alt
	var text = $(".slider #"+count).attr('alt');
	var caption = $('<div class="textanimate2">' + text + '</div>');
	var caption2 = $('<div class="capimg">' + 'Click' + '</div>');
	//to show caption
	$(caption).appendTo(".caption").hide().show('fade',2000).delay(2000);
	
	var interval = setInterval(function(){gallery()},4500);
	//hover to stop
	$("div.main").hover(function() {
	clearInterval(interval);
	}, function(){
	interval = setInterval(function(){gallery()},4500);
	});
	
	$("div.slider").hover(function() {
	$(caption2).appendTo("div.slider");
	}, function(){
	$(caption2).remove();
	});
});

function gallery(){
	
	if(sli == "explode"){
	sli = "blind";
	}
	else if(sli == "blind"){
	sli = "fade";
	}
	else if(sli == "fade"){
	sli = "scale";
	}
	else{
	sli = "clip";
	}
	//image action
		$('.textanimate2').hide('fade',500, function(){
			$(this).remove();
			});
		$(".slider #"+count).hide("slide",{direction: "down"}, 500);
		
			
	//to count the current slide
		if(count == numofslides){
			count = 1;
			sli = "explode";
		}else{
			count = count + 1;
		}
	
		$(".slider #"+count).show(sli,3000).delay(1000);
	//caption action
		text = $(".slider #"+count).attr('alt');
		caption = $('<div class="textanimate2">' + text + '</div>');
		$(caption).appendTo(".caption").hide().show('fade',3000).delay(1000);

	}