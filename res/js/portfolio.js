
BASE_URL = "http://localhost:8888/"

$(document).ready(function() {

	$("#nav-menu").hide();

	$(window).scroll(function() {
        if($(window).scrollTop() > 220) {
            setHeaderVisible(true);
        } else {
            setHeaderVisible(false);
        }
    });

    $(".project-card").click(function() {
    	projectId = $(this).attr("project-id");
    	showModalForProject(projectId);
    });

    $("#modal-back").click(function() {
    	$("#project-modal").modal("hide");
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

	projectModal = $("#project-modal");
	projectInfo  = $("#project-info");

	projectModal.modal({
    	blurring: true,
    	inverted: true
  	}).modal('show');

	$.get(BASE_URL + "view/project/" + projectId, function(data) {
		projectInfo.html(data);
		console.log(data);
	});

}