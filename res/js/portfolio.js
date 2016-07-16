

$(document).ready(function() {
	console.log("yo\nyo\nyo\n");

	$("#nav-menu").hide();

	$(window).scroll(function() {
        if($(window).scrollTop() > 0) {
            setHeaderVisible(true);
        } else {
            setHeaderVisible(false);
        }
    });

});

function setHeaderVisible (visible) {
	menu = $("#nav-menu");

	if (visible) {
		menu.fadeIn(250);
	} else {
		menu.fadeOut(250);
	}
}