$(document).ready(function(){
	$("#dream_form").submit(function(){
		dream_form = $("#dream_form");
		dream_form.addClass("loading");
		return false;
	});
});
