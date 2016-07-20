

$(document).ready(function() {

	$("#nav-menu").hide();

	$(window).scroll(function() {
        if($(window).scrollTop() > 0) {
            setHeaderVisible(true);
        } else {
            setHeaderVisible(false);
        }
    });

    $(".project-card").click(function() {
    	projectId = $(this).attr("project-id");
    	showModalForProject(projectId);
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

function showModalForProject(projectId) {
	$("#project-modal").modal('show');
	console.log(projectId);
}