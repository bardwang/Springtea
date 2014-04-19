//Caption

$(document).ready(function(){
		var text = $(".photo").children('img').attr('alt');
		var caption = $('<div class="textanimate">' + text + '</div>');
		$(caption).appendTo(".photo").hide().show('fade',500);
		}
	);