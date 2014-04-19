// login and logout
$(document).ready(function(){

var text = "<div class='logout'><a class='input' href='logout.php'>logout</a></div>";
var logout = $(text);

//hover to show up
$("div.welcome").hover(function() {
$(logout).appendTo("div.welcome");
}, function(){
$(logout).remove();
});

});