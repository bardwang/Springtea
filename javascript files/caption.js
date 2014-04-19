//Caption

$(document).ready(function(){
	var animating = false;
	$(".desaturate").hover(
	//mouseenter
	function(){
		var text = $(this).attr('alt');
		var caption = $('<div class="textanimate">' + text + '</div>');
		
		if(!animating){
			animating = true;
			$(caption).appendTo(".photo").hide().show('fade',500);
		}
	},
	//mouseleave
	function(){
		$('.textanimate').hide('fade',500, function(){
			$(this).remove();
			animating = false;
			}
		);
	}
	);
});